<?php

namespace App\Services;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Support\Str;

class BlogService
{
    public function viewCategory()
    {
        $categories = BlogCategory::get();

        return view('dashboard.blogcategory', compact('categories'));
    }

    public function createCategory($request)
    {
        try {

            BlogCategory::create([
                'name' => $request->name,
                'slug' => Str::slug($request->name)
            ]);

            return back()->with('success', 'Created successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function createBlogView()
    {
        $categories = BlogCategory::get();

        return view('dashboard.createblog', compact('categories'));
    }

    public function storeBlog($request)
    {
        try {

            $date = $request->input('publish_date') ?? null;

            if($date !== null){
                $status = 'draft';
            } else{
                $status = $request->status;
            }

            $tagsArray = json_decode($request->input('tags'), true);

            $tags = array_map(function($tag) {
                return $tag['value'];
            }, $tagsArray);

            $tagsAsString = json_encode($tags);

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = time() . rand(10, 1000) . '.' . $file->extension();
                $file->move('blogs', $filename, 'public');
                $path = config('services.base_url') . 'blogs/' . $filename;
            }else {
                $path = null;
            }

            $is_published = $request->status === "publish" ? 1 : 0;

            Blog::create([
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'category_id' => $request->category_id,
                'image' => $path,
                'tags' => $tagsAsString,
                'content' => $request->content,
                'publish_date' => $date,
                'status' => $status,
                'is_published' => $is_published
            ]);

            return back()->with('success', 'Created successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function blogView()
    {
        $categories = BlogCategory::get();
        $blogs = Blog::with('blogcategory')->paginate(25);

        return view('dashboard.viewblog', compact('categories', 'blogs'));
    }

    public function blogEdit($id)
    {
        $categories = BlogCategory::get();
        $blog = Blog::with('blogcategory')->findOrFail($id);

        return view('dashboard.editblog', compact('categories', 'blog'));
    }

    public function blogUpdate($request, $id)
    {
        $blog = Blog::findOrFail($id);
        try {

            $date = $request->input('publish_date') ?? null;

            $tagsArray = json_decode($request->input('tags'), true);

            $tags = array_map(function($tag) {
                return $tag['value'];
            }, $tagsArray);

            $tagsAsString = json_encode($tags);

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = time() . rand(10, 1000) . '.' . $file->extension();
                $file->move('blogs', $filename, 'public');
                $path = config('services.base_url') . 'blogs/' . $filename;
            }else {
                $path = $blog->image;
            }

            $blog->update([
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'category_id' => $request->category_id,
                'image' => $path,
                'tags' => $tagsAsString,
                'content' => $request->content,
                'publish_date' => $date,
                'status' => $request->status,
            ]);

            return back()->with('success', 'Updated successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function viewSingleBlog($id)
    {
        $categories = BlogCategory::get();
        $blog = Blog::with('blogcategory')->findOrFail($id);

        return view('dashboard.viewsingleblog', compact('categories', 'blog'));
    }

    public function deleteBlog($id)
    {
        $blog = Blog::findOrFail($id);

        if ($blog->image) {
            $filename = basename($blog->image);
            $oldPath = public_path('blogs/' . $filename);
            if (file_exists($oldPath)) {
                unlink($oldPath);
            }
        }

        $blog->delete();

        return back()->with('success', 'Deleted successfully');
    }
}

