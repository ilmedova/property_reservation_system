@extends('template.auth')
@section('title', 'Login')
@section('content')
    <style>
        #btn_submit {
            width: 100%;
            transition: all 0.5s ease-in-out;
        }

        #btn_submit.isLoading {
            width: 50px;
            border-radius: 100vw;
        }

        .hide {
            display: none;
        }

    </style>
    <link href="{{ asset('style/css/stylelogin.css') }}" rel="stylesheet">
    <div class="container">
        <div class="row vertical-center">
            <div class="col-lg-5 col-md-8 col-sm-12  mx-auto" style="z-index: 1">
                <div class="glassmorphism card-signin my-5">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <h5 class="card-title text-center">Hotel Reservation System</h5>
                            </div>
                        </div>
                        <form onsubmit="return disableButton()" class="form-signin" action="/postLogin" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-label-group">
                                        <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                            placeholder="Email" value="admin@example.com" required autofocus>
                                        <label for="email">Email</label>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-label-group">
                                        <input type="password" id="password" name="password" autocomplete="new-password"
                                            class="form-control @error('password') is-invalid @enderror" placeholder="Password" value="admin"
                                            required>
                                        <label for="password">Password</label>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="w-100 d-flex justify-content-center">
                                        <button id="btn_submit" class="btn btn-lg btn-primary text-white fw-bold p-2"
                                            type="submit" style="border-radius: 2rem;">
                                            <div id="loading_submit" class="spinner-border hide" role="status"
                                                style="width: 15px; height: 15px">
                                            </div>
                                            <div id="text_submit">
                                                Login
                                            </div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4">
                            <p class="text-center">Forgot Password? <a href="/forgot-password">go here</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function disableButton() {
            $("#loading_submit").removeClass("hide");
            $("#text_submit").addClass("hide");
            $("#btn_submit").addClass("isLoading").attr('disabled', 'disabled');
        }
    </script>
@endsection
