<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>AdminLTE 3 | Dashboard 3</title>

        <!-- Google Font: Source Sans Pro -->
        <link
            rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"
        />
        <!-- Font Awesome Icons -->
        <link
            rel="stylesheet"
            href="{{ asset('backend/plugins/fontawesome-free/css/all.min.css') }}"
        />
        <!-- IonIcons -->
        <!-- Theme style -->
        <link
            rel="stylesheet"
            href="{{ asset('backend/dist/css/adminlte.min.css') }}"
        />
    </head>
    <body class="login-page" style="min-height: 496.781px">
        <div class="login-box">
            <div class="login-logo">
                <a href="{{ route('home') }}"><b>DEVELOPEX</b>BD</a>
            </div>

            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Sign in to start your session</p>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="m-0 p-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="input-group mb-3">
                            <input
                                type="text"
                                name="phone"
                                class="form-control"
                                placeholder="Phone"
                            />
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-phone"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input
                                type="password"
                                name="password"
                                class="form-control"
                                placeholder="Password"
                            />
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="icheck-primary">
                                    <input type="checkbox" name="remember" id="remember" />
                                    <label for="remember"> Remember Me </label>
                                </div>
                            </div>

                            <div class="col-12">
                                <button
                                    type="submit"
                                    class="btn btn-primary btn-block"
                                >
                                    Sign In
                                </button>
                            </div>
                        </div>
                    </form>
                    <br>
                    <p class="mb-1">
                        <a href="#">I forgot my password</a>
                    </p>
                </div>
            </div>
        </div>
    </body>
</html>
