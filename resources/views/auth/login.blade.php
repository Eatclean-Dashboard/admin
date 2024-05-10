@extends('admin-login')

@section('content')
    <div class="account-pages my-5 pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center mt-4">
                                <div class="mb-3">
                                    <a href="index.html" class="auth-logo">
                                        <img src="{{ $path }}/assets/images/logo.png" height="80" class="logo-dark mx-auto"
                                            alt="">
                                        <img src="{{ $path }}/assets/images/logo.png" height="80" class="logo-light mx-auto"
                                            alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="p-3">
                                <h4 class="font-size-18 text-muted mt-2 text-center">Welcome Back !</h4>
                                <p class="text-muted text-center mb-4">Sign in to continue.</p>

                                <form class="form-horizontal" action="{{ route('admin.login') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label" for="username">Email</label>
                                        <input type="text" class="form-control" name="email" placeholder="Enter email address">
                                        @if ($errors->has('email'))
                                            <div class=" text-danger text-start">{{ $errors->first('email') }}</div>
                                        @endif
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="userpassword">Password</label>
                                        <input type="password" class="form-control" name="password" placeholder="Enter password">
                                        @if ($errors->has('password'))
                                            <div class=" text-danger text-start">{{ $errors->first('password') }}</div>
                                        @endif
                                    </div>

                                    <div class="mb-3 row mt-4">
                                        <div class="col-sm-6">
                                            <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log In</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <p>©
                            <script>
                                document.write(new Date().getFullYear())
                            </script> Eat clean.
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
