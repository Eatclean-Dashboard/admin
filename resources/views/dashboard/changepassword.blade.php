@extends('admin')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="">
                            <div class="mt-2 mb-5">
                                <h4 class="card-title">Change Password</h4>
                            </div>

                            <form action="{{ route('admin.changepassword') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Old Password <span class="text-danger">*</span></label>
                                            <input type="password" class="form-control" name="old_password">
                                            @if ($errors->has('old_password'))
                                                <div class=" text-danger text-start">{{ $errors->first('old_password') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">New Password <span class="text-danger">*</span></label>
                                            <input type="password" class="form-control" name="password">
                                            @if ($errors->has('password'))
                                                <div class=" text-danger text-start">{{ $errors->first('password') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Confirm Password</label>
                                            <input type="password" class="form-control" name="password_confirmation">
                                            @if ($errors->has('password_confirmation'))
                                                <div class=" text-danger text-start">{{ $errors->first('password_confirmation') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-success">Change Password</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>
    </div>

@endsection
