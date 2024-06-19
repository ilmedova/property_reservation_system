@extends('template.auth')
@section('title', 'Dashboard')
@section('content')
    <link href="{{ asset('style/css/stylelogin.css') }}" rel="stylesheet">
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="glassmorphism card-signin my-5">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <h5 class="card-title text-center">Sistem Informasi Perusahaan</h5>
                            </div>
                        </div>
                        <form class="form-signin" action="http://localhost:81/sip/pelamar/fungsi_daftar" method="post">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-label-group">
                                        <input type="email" id="email" name="email" class="form-control" placeholder="Email"
                                            value="" required autofocus>
                                        <label for="email">Email</label>
                                    </div>
                                    <div class="form-label-group">
                                        <input type="password" id="password" name="password" autocomplete="new-password"
                                            class="form-control" placeholder="Password" value="" required>
                                        <label for="password">Password</label>
                                    </div>
                                    <div class="form-label-group">
                                        <input type="password" id="password_konfirmasi" name="password_konfirmasi"
                                            class="form-control" placeholder="Repead Password" value="" required>
                                        <label for="password_konfirmasi">Konfirmasi password</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 d-flex justify-content-center">
                                    <button class="btn btn-lg btn-primary text-white btn-block text-uppercase"
                                        type="submit">Daftar</button>
                                </div>
                            </div>
                            <hr class="my-4">
                            <p class="text-center">Sudah memiliki akun? <a href="/login">masuk</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
