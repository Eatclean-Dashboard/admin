@extends('admin')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <div class="mt-2">
                                <h4 class="card-title">Plan</h4>
                            </div>

                            <div class="text-end">
                                <a href="{{ route('admin.planadd') }}"><button class="btn btn-success">Add</button></a>

                                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target=".importplan">Import</button>
                            </div>

                        </div>
                        <table id="datatable" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Meal Plan</th>
                                    <th>Ingredients</th>
                                    <th>Calories</th>
                                    <th>Price</th>
                                    <th>Image Rectangular</th>
                                    <th>Image Oval</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($plans as $plan)
                                    <tr>
                                        <td>{{ $loop->index + $plans->firstItem() }}</td>
                                        <td>{{ $plan->name }}</td>
                                        <td>{{ $plan->type }}</td>
                                        <td>{{ $plan?->mealplan->name }}</td>
                                        <td>{!! $plan->ingredients !!}</td>
                                        <td>{{ $plan->calories }}</td>
                                        <td>{{ $plan->price }}</td>
                                        <td><img src="{{ $plan->image_rectangular }}" width="50" height="50" alt=""></td>
                                        <td><img src="{{ $plan->image_oval }}" width="50" height="50" alt=""></td>
                                        <td>
                                            <a href="{{ route('admin.oneplan', $plan->id) }}" title="View">
                                                <button class="btn btn-success btn-sm"><i class="dripicons-preview"></i></button>
                                            </a>
                                            <a href="" title="Delete">
                                                <button class="btn btn-danger btn-sm"><i class="dripicons-trash"></i></button>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="text-center">
                                        <td colspan="10">No data available.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav aria-label="...">
                            <ul class="pagination justify-content-end mb-0">
                                {{-- Previous Page Link --}}
                                @if ($plans->onFirstPage())
                                    <li class="page-item disabled">
                                        <span class="page-link">&laquo;</span>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $plans->previousPageUrl() }}" rel="prev">&laquo;</a>
                                    </li>
                                @endif

                                {{-- Pagination Elements --}}
                                @foreach ($plans->getUrlRange(1, $plans->lastPage()) as $page => $url)
                                    <li class="page-item {{ ($page == $plans->currentPage()) ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                    </li>
                                @endforeach

                                {{-- Next Page Link --}}
                                @if ($plans->hasMorePages())
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $plans->nextPageUrl() }}" rel="next">&raquo;</a>
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

    <div class="modal fade importplan" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0">Import Plan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.planimport') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <input type="file" name="import_file" class="form-control">
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-success">Import</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

@endsection
