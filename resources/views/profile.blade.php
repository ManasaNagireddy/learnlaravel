@extends('layout.app')
@section('title', 'My Profile')
@section('content')
<h4>Profile</h4>
<p>Welcome, {{ $user->name }}!</p>  
<p>Your email is {{ $user->email }}.</p>
<p>Your phone number is {{ $user->phone }}.</p>
<p>Your address is {{ $user->address }}.</p>
@endsection