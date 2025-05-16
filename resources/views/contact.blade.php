@extends('layout.app')
@section('title', 'Contact Us') 
@section('content') 
<div class="container">
    <h1>Contact Us</h1>
     @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>  
    @endif
    @if($errors->any())
        <div class="alert alert-danger mt-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>  
    @endif
    <form action="{{ route('contact.submit') }}" method="POST">
        @csrf
        <div class="form-group  mb-3">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required> 
        </div>      
        <div class="form-group mb-3">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email')}}" required>  
        </div>  
        <div class="form-group mb-3">
            <label for="message">Message</label>
            <textarea class="form-control" id="message" name="message" rows="5" required>
                {{ old('message') }}
            </textarea>
        </div>      
        <button type="submit" class="btn btn-primary">Send Message</button>
    </form>
   
</div>
@endsection