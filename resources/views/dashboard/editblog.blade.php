@extends('admin')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css">
<script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.min.js"></script>

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <div class="mt-2">
                                <h4 class="card-title">Edit Blog</h4>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div>
                                    <form action="{{ route('admin.updateblog', $blog->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PATCH')
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Title <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="title" value="{{ $blog->title }}">
                                                    @if ($errors->has('title'))
                                                        <div class=" text-danger text-start">{{ $errors->first('title') }}</div>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Category <span class="text-danger">*</span></label>
                                                    <select class="form-control" name="category_id" id="">
                                                        @foreach ($categories as $category)
                                                                @if ($category->id == $blog->category_id)
                                                                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                                                    @else
                                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                                @endif
                                                        @endforeach
                                                    </select>
                                                    @if ($errors->has('category_id'))
                                                        <div class=" text-danger text-start">{{ $errors->first('category_id') }}</div>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Image <span class="text-danger">*</span></label>
                                                    <input type="file" class="form-control" name="image">
                                                    <img src="{{ $blog->image }}" width="50" height="50" alt="">
                                                    @if ($errors->has('image'))
                                                        <div class=" text-danger text-start">{{ $errors->first('image') }}</div>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Tags <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="tags" id="tags-input" value="{{ $blog->tags}}">
                                                    @if ($errors->has('tags'))
                                                        <div class=" text-danger text-start">{{ $errors->first('tags') }}</div>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Publish date (Set date you want post to be published) </label>
                                                    <input type="datetime-local" class="form-control" name="publish_date" value="{{ $blog->publish_date }}">
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Status <span class="text-danger">*</span></label>
                                                    <select name="status" id="" class="form-control">
                                                        <option value="publish"{{ $blog->status === 'publish' ? ' selected' : '' }}>Publish</option>
                                                        <option value="draft"{{ $blog->status === 'draft' ? ' selected' : '' }}>Draft</option>
                                                    </select>
                                                    @if ($errors->has('status'))
                                                        <div class=" text-danger text-start">{{ $errors->first('status') }}</div>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="form-label">Content <span class="text-danger">*</span></label>
                                                    <textarea class="form-control" name="content" id="summernote" cols="30" rows="10">{{ $blog->content }}</textarea>
                                                    @if ($errors->has('content'))
                                                        <div class=" text-danger text-start">{{ $errors->first('content') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-success">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var input = document.querySelector('#tags-input');
            new Tagify(input);
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 200,
                minHeight: null,
                maxHeight: null,
                focus: true
            });
        });
    </script>
@endsection
