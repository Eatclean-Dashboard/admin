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

                            <form action="{{ route('admin.passwordchange') }}" method="POST">
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
                                            <input type="password" class="form-control" name="new_password">
                                            @if ($errors->has('new_password'))
                                                <div class=" text-danger text-start">{{ $errors->first('new_password') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Confirm Password</label>
                                            <input type="password" class="form-control" name="confirm_password">
                                            @if ($errors->has('confirm_password'))
                                                <div class=" text-danger text-start">{{ $errors->first('confirm_password') }}</div>
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
