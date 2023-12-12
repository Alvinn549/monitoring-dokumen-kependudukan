<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-5.0.2-dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/my-styles.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <title>Index</title>
</head>

<body>
    @include('sweetalert::alert')

    <div class="container mb-4 login-container">
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <div class="card shadow login-card">
                    <div class="card-body">
                        <div class="row mt-3 justify-content-center">
                            <div class="col-md-2 d-flex justify-content-center">
                                <img src="{{ asset('assets/img/pacitan.png') }}" class="img img-fluid me-2 login-icon"
                                    alt="">
                                <img src="{{ asset('assets/img/pacitan.png') }}" class="img img-fluid ms-2 login-icon"
                                    alt="">
                            </div>
                        </div>
                        <div class="row">
                            <h3 class="text-center login-title mt-3">Monitoring Pelayanan Penerbitan Dokumen
                                Kependudukan
                            </h3>
                        </div>
                        <div class="row justify-content-center mt-4 mb-4">
                            <div class="col-sm-9">
                                <form class="loginform" action="{{ route('login') }}" method="post">
                                    @csrf
                                    <div class="mb-3 ">
                                        <input type="email" name="email"
                                            class="form-control text-center email-box shadow-sm @error('email') is-invalid @enderror"
                                            id="email" placeholder="Email" autofocus value="{{ old('email') }}">
                                        @error('email')
                                            <div class="invalid-feedback text-center">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <input type="password" name="password"
                                            class="form-control text-center password-box shadow-sm @error('password') is-invalid @enderror"
                                            id="password" placeholder="Password">
                                        @error('password')
                                            <div class="invalid-feedback text-center">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="d-flex justify-content-center mt-4">
                                        <button type="submit" class="btn btn-white login-btn">Log In</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('vendor/bootstrap-5.0.2-dist/js/bootstrap/bootstrap.bundle.js') }}"></script>
</body>

</html>
