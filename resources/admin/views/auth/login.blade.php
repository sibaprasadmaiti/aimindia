<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        {{-- <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" href="{{ asset('favicon.png')}}" type="image/x-icon" /> --}}
        <title>Login - Aimindia Admin</title>

        <link href="{{asset('assets/css/styles.css')}}" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <form action="{{route('login-user')}}" method="POST">
                                            @if(Session::has('success'))
                                            <div class="alert alert-success">{{Session::get('success')}}</div>
                                            @endif
                                            @if(Session::has('fail'))
                                            <div class="alert alert-danger">{{Session::get('fail')}}</div>
                                            @endif
                                            @csrf
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="email" type="email" @if(Cookie::has('adminuser')) value="{{Cookie::get('adminuser')}}" @endif placeholder="name@example.com" />
                                                <label for="inputEmail">Email address</label>
                                                <span class="text-danger">@error('email') {{$message}} @enderror</span>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="password" type="password" @if(Cookie::has('adminpwd')) value="{{Cookie::get('adminpwd')}}" @endif placeholder="Password" />
                                                <label for="inputPassword">Password</label>
                                                <span class="text-danger">@error('password') {{$message}} @enderror</span>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" name="rememberpassword" type="checkbox" @if(Cookie::has('adminuser')) checked @endif />
                                                <label class="form-check-label" for="inputRememberPassword">Remember Me</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                {{-- <a class="small" href="password.html">Forgot Password?</a> --}}
                                                <button class="btn btn-primary" type="submit">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                    {{-- <div class="card-footer text-center py-3">
                                        <div class="small"><a href="register.html">Need an account? Sign up!</a></div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Aimindia {{ date('Y')}}</div>
                            {{-- <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div> --}}
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('assets/js/scripts.js')}}"></script>
    </body>
</html>
