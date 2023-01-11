@extends('layouts.main')

@section('content')
@if(Session::has('logged'))
<h3 style="color : green;text-align: center;">Already Logged in </h3>
@endif
<form class="login-form" action="" method="post">
    {{@csrf_field()}}

    <label for="email">Email:</label>
    <input type="text" id="email" name="email" placeholder="Enter your email" value="{{ old('email') }}">
    @error('email')
    <p style="color : red">{{$message}}</p>
    @enderror
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" placeholder="Enter your password">
    @error('password')
    <p style="color : red">{{$message}}</p>
    @enderror
    <input type="submit" value="Login">

</form>
@if(Session::has('fail'))
    <h3 style="color : red;text-align: center;">{{Session::get('fail')}}</h3>
@endif
@endsection