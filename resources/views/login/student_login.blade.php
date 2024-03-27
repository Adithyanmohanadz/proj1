<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/spellbee/logo.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('img/spellbee/logo.png') }}">
    <title>
        Bee
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('css/m-d-g-l.css?v=3.1.0') }}" rel="stylesheet" />
</head>
<body class="bg-gray-200">
    <!-- Navbar -->
    <nav
        class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3 navbar-transparent mt-4">
        <div class="container">
            <a class="w-50 navbar-brand font-weight-bolder ms-lg-0 ms-3 text-white" href=" ">
                <img class="w-30" src="{{ asset('img/spellbee/logo_web2.png') }}" alt="">
            </a>
        </div>
    </nav>
    <!-- End Navbar -->
    <main class="main-content  mt-0">
        <div class="page-header align-items-start min-height-300 m-3 border-radius-xl"
            style="background-image: url('https://images.unsplash.com/photo-1491466424936-e304919aada7?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1949&q=80');">
            <span class="mask bg-gradient-dark opacity-6"></span>
        </div>
        <div class="container mb-4">
            <div class="row mt-lg-n12 mt-md-n12 mt-n12 justify-content-center">
                <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                    <div class="card mt-8">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1 text-center py-4">
                                <h4 class="font-weight-bolder text-white mt-1">Log In</h4>
                                <p class="mb-1 text-sm text-white">Enter your email and password to Log In</p>
                            </div>
                        </div>
                        @if (session()->has('error'))
                            <div class="text-center text-danger">{{ session('error') }}</div>
                        @endif
                        <div class="card-body">
                            <form class="text-start" action="{{ route('student.student_login_section') }}" method="POST">
                                @csrf
                                <div class="input-group input-group-static mb-4">
                                    <label>Username</label>
                                    <input type="text" class="form-control" name="username" placeholder="@email.com"
                                        value="{{ old('username') }}">
                                </div>
                                <span class="text-danger">
                                    @error('username')
                                        <p>{{ $message }}</p>
                                    @enderror
                                </span>
                                <div class="input-group input-group-static mb-4">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control"
                                        placeholder="•••••••••••••">
                                </div>
                                <span class="text-danger">
                                    @error('password')
                                        <p>{{ $message }}</p>
                                    @enderror
                                </span>
                                <div class="text-center">
                                    {{-- <a href="{{ route('admin_dashboard') }}"> <button type="button" class="btn bg-gradient-success w-100 mt-3 mb-0">Sign in</button> </a> --}}
                                    <button type="submit" class="btn bg-gradient-success w-100 mt-3 mb-0">Sign
                                        in</button>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer text-center pt-0 px-lg-2 px-1">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer position-absolute bottom-2 py-2 w-100">
            <div class="container">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-12 col-md-6 my-auto">
                        <div class="copyright text-center text-sm  text-lg-start">
                            ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </main>

    <script src="{{ asset('js/core/popper.min.js') }}"></script>
    <script src="{{ asset('js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>

    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <script src="{{ asset('js/m-d-g-l.min.js?v=3.0.6') }}"></script>
</body>


</html>
