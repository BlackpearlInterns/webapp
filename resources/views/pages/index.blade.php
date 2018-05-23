@extends('layouts.app')

@section('content')
        <div class="jumbotron">
            <h1 class="display-3">Welcome to Sprint!</h1>
            <p class="lead">This is a Web Application Project of the Blackpearl Interns.</p>
            <hr class="my-4">
            <p>Enter your credentials to login or sign up for one.</p>
            <p class="lead">
            <a class="btn btn-primary btn-lg" href="/webapp/public/login" role="button">Login</a>
            <a class="btn btn-success btn-lg" href="/webapp/public/register" role="button">Register</a>
            </p>
        </div>
        <h1></h1>
        <p></p>
@endsection