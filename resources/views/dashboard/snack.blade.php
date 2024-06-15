@extends('admin')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <div class="mt-2">
                                <h4 class="card-title">Snack</h4>
                            </div>

                            <div class="text-end">
                                <a href=""><button class="btn btn-success">Add</button></a>
                            </div>

                        </div>
                        <table id="datatable" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Meal Plan</th>
                                    <th>Name</th>
                                    <th>Calories</th>
                                    <th>Carbs</th>
                                    <th>Protein</th>
                                    <th>Fat</th>
                                    <th>Image</th>
                                    <th>Oval Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($snacks as $snack)
                                    <tr>
                                        <td>{{ $loop->index + $snacks->firstItem() }}</td>
                                        <td>{{ $snack?->mealplan->name }}</td>
                                        <td>{{ $snack->fruit }}</td>
                                        <td>{!! $snack->calories !!}</td>
                                        <td>{{ $snack->carbs }}</td>
                                        <td>{{ $snack->protein }}</td>
                                        <td>{{ $snack->fat }}</td>
                                        <td><img src="{{ $snack->image }}" width="50" height="50" alt=""></td>
                                        <td><img src="{{ $snack->oval_image }}" width="50" height="50" alt=""></td>
                                        <td>
                                            <a href="{{ route('admin.editsnack', $snack->id) }}" title="Edit">
                                                <button class="btn btn-success btn-sm"><i class="dripicons-document-edit"></i></button>
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
                                @if ($snacks->onFirstPage())
                                    <li class="page-item disabled">
                                        <span class="page-link">&laquo;</span>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $snacks->previousPageUrl() }}" rel="prev">&laquo;</a>
                                    </li>
                                @endif

                                {{-- Pagination Elements --}}
                                @foreach ($snacks->getUrlRange(1, $snacks->lastPage()) as $page => $url)
                                    <li class="page-item {{ ($page == $snacks->currentPage()) ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                    </li>
                                @endforeach

                                {{-- Next Page Link --}}
                                @if ($snacks->hasMorePages())
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $snacks->nextPageUrl() }}" rel="next">&raquo;</a>
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
