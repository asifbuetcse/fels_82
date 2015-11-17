@extends('master')
@section('title', 'Page Title')
@section('content')
    <div class="container">
        <h2>Admin edit field</h2>
        <p>Category information edit:</p>
        {!! Form::open(['route'=>['categories.update', $category->id], 'method'=>'PUT']) !!}
            <div class="form-group">
                {!! Form::label('category_name', 'Category Name') !!}
                    {!! Form::text('category_name', $value = $category->category_name) !!}
            </div>
            {!! Form::submit('Submit') !!}
        {!! Form::close() !!}
    </div>
@endsection