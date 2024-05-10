@extends('admin')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <div class="mt-2">
                                <h4 class="card-title">In-active Users</h4>
                            </div>

                        </div>
                        <table id="datatable" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Gender</th>
                                    <th>Joined</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($inactiveUsers as $inactive)
                                    <tr>
                                        <td>{{ $loop->index + $inactiveUsers->firstItem() }}</td>
                                        <td>{{ $inactive->name }}</td>
                                        <td>{{ $inactive->email }}</td>
                                        <td>{{ ucwords($inactive->gender) }}</td>
                                        <td>{{ \Carbon\Carbon::parse($inactive->created_at)->format('d M Y') }}</td>
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
                                @if ($inactiveUsers->onFirstPage())
                                    <li class="page-item disabled">
                                        <span class="page-link">&laquo;</span>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $inactiveUsers->previousPageUrl() }}" rel="prev">&laquo;</a>
                                    </li>
                                @endif

                                {{-- Pagination Elements --}}
                                @foreach ($inactiveUsers->getUrlRange(1, $inactiveUsers->lastPage()) as $page => $url)
                                    <li class="page-item {{ ($page == $inactiveUsers->currentPage()) ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                    </li>
                                @endforeach

                                {{-- Next Page Link --}}
                                @if ($inactiveUsers->hasMorePages())
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $inactiveUsers->nextPageUrl() }}" rel="next">&raquo;</a>
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
