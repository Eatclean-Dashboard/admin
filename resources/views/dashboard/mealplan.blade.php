@extends('admin')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <div class="mt-2">
                                <h4 class="card-title">Meal Plan</h4>
                            </div>

                            <div class="text-end">
                                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center">Add</button>
                            </div>

                        </div>
                        <table id="datatable" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($mealPlans as $mealplan)
                                    <tr>
                                        <td>{{ $loop->index + $mealPlans->firstItem() }}</td>
                                        <td>{{ $mealplan->name }}</td>
                                        <td>{{ Str::limit($mealplan->description, 50, '...') }}</td>
                                        <td>
                                            <a href="{{ route('admin.mealplanview', $mealplan->id) }}" title="view" class="btn btn-success btn-sm"><i class="dripicons-preview"></i></a>
                                            <a href="" class="btn btn-info btn-sm"><i class="dripicons-document-edit"></i></a>
                                            <a href="" class="btn btn-danger btn-sm"><i class="dripicons-trash"></i></a>
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
                                {{-- Previous Page Link --}}
                                @if ($mealPlans->onFirstPage())
                                    <li class="page-item disabled">
                                        <span class="page-link">&laquo;</span>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $mealPlans->previousPageUrl() }}" rel="prev">&laquo;</a>
                                    </li>
                                @endif

                                {{-- Pagination Elements --}}
                                @foreach ($mealPlans->getUrlRange(1, $mealPlans->lastPage()) as $page => $url)
                                    <li class="page-item {{ ($page == $mealPlans->currentPage()) ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                    </li>
                                @endforeach

                                {{-- Next Page Link --}}
                                @if ($mealPlans->hasMorePages())
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $mealPlans->nextPageUrl() }}" rel="next">&raquo;</a>
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

    <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0">Add Meal Plan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.addmealplan') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="E.g Vegetarian">
                            @if ($errors->has('name'))
                                <div class=" text-danger text-start">{{ $errors->first('name') }}</div>
                            @endif
                        </div>
                        <div>
                            <label for="">Description</label>
                            <input type="text" name="description" value="{{ old('description') }}" class="form-control">
                            @if ($errors->has('description'))
                                <div class=" text-danger text-start">{{ $errors->first('description') }}</div>
                            @endif
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-success">Add</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

@endsection
