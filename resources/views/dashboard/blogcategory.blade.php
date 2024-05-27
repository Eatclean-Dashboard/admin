@extends('admin')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <div class="mt-2">
                                <h4 class="card-title">Blog Category</h4>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div>
                                    <form action="{{ route('admin.createblogcategory') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label">Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="name">
                                            @if ($errors->has('name'))
                                                <div class=" text-danger text-start">{{ $errors->first('name') }}</div>
                                            @endif
                                        </div>

                                        <button type="submit" class="btn btn-success">Create</button>
                                    </form>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse;  border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @forelse ($categories as $category)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $category->name }}</td>
                                                <td>
                                                    <button class="btn btn-danger btn-sm">Delete</button>
                                                </td>
                                            </tr>
                                        @empty
                                            
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
