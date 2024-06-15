<?php

namespace App\Http\Controllers;

use App\Services\BlogService;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public $service;

    public function __construct(BlogService $blogService)
    {
        $this->service = $blogService;
    }

    public function category()
    {
        return $this->service->viewCategory();
    }

    public function createCategory(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:100', 'unique:blog_categories,name']
        ]);

        return $this->service->createCategory($request);
    }

    public function createBlogView()
    {
        return $this->service->createBlogView();
    }

    public function storeBlog(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string'],
            'category_id' => ['required', 'string', 'exists:blog_categories,id'],
            'image' => ['required', 'image', 'mimes:png,jpg,jpeg', 'max:2048'],
            'tags' => ['required', 'string'],
            'content' => ['required', 'string']
        ]);

        return $this->service->storeBlog($request);
    }

    public function blogView()
    {
        return $this->service->blogView();
    }

    public function blogEdit($id)
    {
        return $this->service->blogEdit($id);
    }

    public function blogUpdate(Request $request, $id)
    {
        return $this->service->blogUpdate($request, $id);
    }

    public function viewSingleBlog($id)
    {
        return $this->service->viewSingleBlog($id);
    }

    public function deleteBlog($id)
    {
        return $this->service->deleteBlog($id);
    }

    public function reelsView()
    {
        return $this->service->reelsView();
    }

    public function createReelView()
    {
        return $this->service->createReelView();
    }

    public function storeReel(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string'],
            'category_id' => ['required', 'string', 'exists:blog_categories,id'],
            'cover_image' => ['required', 'image', 'mimes:png,jpg,jpeg', 'max:2048'],
            'video' => ['required', 'mimes:mp4,mov,ogg,qt', 'max:20000']
        ]);

        return $this->service->storeReel($request);
    }
}
