@extends('layout.app')
@section('title', 'Naturals Employee Login') {{-- Set the title for the page --}}
@section('content') {{-- Start the content section --}}
<div class="container">
    <h1>Employee Login</h1>
    @if(session('error'))
        <div class="alert alert-danger mt-3">
            {{ session('error') }}
        </div>  
    @endif
    <form action="{{ route('login.process') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group mb-3">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>
@endsection