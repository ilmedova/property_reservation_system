{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('Dashboard') }}</div>--}}

{{--                <div class="card-body">--}}
{{--                    @if (session('status'))--}}
{{--                        <div class="alert alert-success" role="alert">--}}
{{--                            {{ session('status') }}--}}
{{--                        </div>--}}
{{--                    @endif--}}

{{--                    {{ __('You are logged in!') }}--}}
{{--                    {{__('Go to ')}} <a href="/dashboard">app</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--@endsection--}}
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('style/css/client-ui.css') }}">
</head>
<body>

<div class="section">
    <div class="moving-image"></div>

    <h1><a class="link-to-portfolio hover-target" href="/property" style="top: 50%; left: 45%; color: #fff; width: fit-content">Start exploring</a></h1>
</div>

<!-- Page cursor
================================================== -->

<div class='cursor' id="cursor"></div>
<div class='cursor2' id="cursor2"></div>
<div class='cursor3' id="cursor3"></div>


<a href="https://ilmedovamahri.dev" class="link-to-portfolio hover-target" target="_blank" style="top: 20px; right: 20px; background-image: url('https://images.emojiterra.com/twitter/v14.0/1024px/1f913.png')"></a>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="{{ asset('js/home.js') }}"></script>

</body>
</html>

