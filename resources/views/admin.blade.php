<!DOCTYPE html>
<html>
<head>
    @vite(['resources/js/app.js'])
</head>
<body>
    @extends('layout.app')
    @section('content')
    <div id="app" data-user='@json($user)'>
        <app-component ></app-component>
    </div>
    @endsection
</body>
</html>
