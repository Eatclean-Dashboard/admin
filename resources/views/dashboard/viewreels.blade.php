@extends('admin')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <div class="mt-2">
                                <h4 class="card-title">Reels</h4>
                            </div>

                            <div class="text-end">
                                <a href="{{ route('admin.createreel') }}"><button class="btn btn-success">Create</button></a>
                            </div>
                        </div>
                        <table id="datatable" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Cover Image</th>
                                    <th>Video</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($reels as $reel)
                                    <tr>
                                        <td>{{ $loop->index + $reels->firstItem() }}</td>
                                        <td>{{ $reel->title }}</td>
                                        <td>{{ $reel->blogcategory->name }}</td>
                                        <td><img src="{{ $reel->cover_image }}" width="50" height="50" alt=""></td>
                                        <td>
                                            <video width="100" height="100" controls>
                                                <source src="{{ $reel->video }}" type="video/mp4">
                                                Your browser does not support the video tag.
                                                <track label="{{ $reel->title }}" kind="captions" srclang="en" src="resources/myvideo-en.vtt" default>
                                            </video>
                                        </td>
                                        <td>{{ ucwords($reel->status) }}</td>
                                        <td>
                                            <div class="d-flex gap-3">
                                                {{-- <a href="{{ route('admin.blogedit', $reel->id) }}" class="btn btn-info btn-sm" title="view"><i class="fas fa-edit"></i></a>

                                                <form action="{{ route('admin.blogdelete', $reel->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm" title="view"><i class="fas fa-trash"></i></button>
                                                </form> --}}
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="text-center">
                                        <td colspan="7">No data available.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav aria-label="...">
                            <ul class="pagination justify-content-end mb-0">
                                
                                @if ($reels->onFirstPage())
                                    <li class="page-item disabled">
                                        <span class="page-link">&laquo;</span>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $reels->previousPageUrl() }}" rel="prev">&laquo;</a>
                                    </li>
                                @endif
       
                                @foreach ($reels->getUrlRange(1, $reels->lastPage()) as $page => $url)
                                    <li class="page-item {{ ($page == $reels->currentPage()) ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                    </li>
                                @endforeach

                                @if ($reels->hasMorePages())
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $reels->nextPageUrl() }}" rel="next">&raquo;</a>
                                    </li>
                                @else
                                    <li class="page-item disabled">
                                        <span class="page-link">&raquo;</span>
                                    </li>
                                @endif
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>
    </div>

@endsection
