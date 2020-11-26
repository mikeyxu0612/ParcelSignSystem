<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel: @yield('title', 'Parcel receipt system') </title>
</head>
<style>
    body{
        background: antiquewhite;
    }
</style>
<body >
<div class="flex-center position-ref full-height">
    <div class="content">
        @include('header')
        @yield('contents')
        @include('footer')
    </div>
</div>
</body>
</html>
