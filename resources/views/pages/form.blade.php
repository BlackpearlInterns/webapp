@extends('layouts.app')

@section('content')
        <h1>Form</h1>
        <p>This page will display the form that passes data to a Google Spreadsheet</p>
        {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST']) !!}
           <div class="form-group">
               {{Form::label('title', 'Title')}}
               {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
           </div>
        {!! Form::close() !!}
        @endsection