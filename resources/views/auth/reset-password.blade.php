@extends('template.auth')

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
                                <h5 class="card-title text-center">Hotel Information System</h5>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <form onsubmit="return disableButton()" method="POST"
                                    action="{{ route('password.update') }}"
                                    style="display: flex; flex-direction: column; gap: 8px;">
                                    @csrf

                                    <input type="hidden" name="token" value="{{ $token }}">

                                    <div class="form-group row">
                                        <label for="email"
                                            class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                        <div class="col-md-8">
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ $email ?? old('email') }}" required autocomplete="email"
                                                autofocus>

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password"
                                            class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                        <div class="col-md-8">
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror" name="password"
                                                required autocomplete="new-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password-confirm"
                                            class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                        <div class="col-md-8">
                                            <input id="password-confirm" type="password" class="form-control"
                                                name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Reset Password') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function disableButton() {
            $("#loading_submit").removeClass("hide");
            $("#text_submit").addClass("hide");
            $("#btn_submit").attr('disabled', 'disabled');
        }
    </script>
@endsection
