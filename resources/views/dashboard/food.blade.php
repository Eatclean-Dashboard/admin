@extends('admin')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <div class="mt-2">
                                <h4 class="card-title">Foods</h4>
                            </div>
    
                            <div class="text-end">
                                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center">Import</button>
                            </div>
                        </div>
                        <table id="datatable" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Calories (g)</th>
                                    <th>Carbs (g)</th>
                                    <th>Protein (g)</th>
                                    <th>Total Fat (g)</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($foods as $food)
                                    <tr>
                                        <td>{{ $loop->index + $foods->firstItem() }}</td>
                                        <td>{{ $food->name }}</td>
                                        <td>{{ $food->calories }}</td>
                                        <td>{{ $food->carbs }}</td>
                                        <td>{{ $food->protein }}</td>
                                        <td>{{ $food->total_fat }}</td>
                                        <td></td>
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
                                @if ($foods->onFirstPage())
                                    <li class="page-item disabled">
                                        <span class="page-link">&laquo;</span>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $foods->previousPageUrl() }}" rel="prev">&laquo;</a>
                                    </li>
                                @endif

                                {{-- Pagination Elements --}}
                                @foreach ($foods->getUrlRange(1, $foods->lastPage()) as $page => $url)
                                    <li class="page-item {{ ($page == $foods->currentPage()) ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                    </li>
                                @endforeach

                                {{-- Next Page Link --}}
                                @if ($foods->hasMorePages())
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $foods->nextPageUrl() }}" rel="next">&raquo;</a>
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
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0">Import Food</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.foodimport') }}" method="POST" enctype="multipart/form-data">
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
