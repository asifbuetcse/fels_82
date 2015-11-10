@extends('master')
@section('title', 'Page Title')
@section('content')
<?php $i = 0 ?>
<div class = "panel panel-primary">
   <div class = "panel-heading">
      <h1 class = "panel-title">Panel</h1>
   </div>

   <div class = "panel-body">
      @foreach( $categories as $category )
<?php $i = $i+1 ?>
@if($i%2==0)
<div class="row">
    <div class="col-sm-6 box" ></div>
    <div class="col-sm-6 form">
        {!! Form::open(['action' => 'LessonStartController@index']) !!}
        <h3><?php echo $category->category_name?></h3>
        @foreach( $questions as $question )
        @if($question->category_id==$category->id)
        <p><?php echo $question->english_word?></p>
        @endif
        @endforeach
        {!!  Form::submit('Start Lesson')  !!}
        {!! Form::close() !!}
    </div>
</div>
@endif
@if($i%2==1)
<div class="row">
    <div class="col-sm-6 form">
        {!! Form::open(['action' => 'LessonStartController@index']) !!}
        <h3><?php echo $category->category_name?></h3>
        @foreach( $questions as $question )
        @if($question->category_id==$category->id)
        <p><?php echo $question->english_word?></p>
        @endif
        @endforeach
        {!!  Form::submit('Start Lesson')  !!}
        {!! Form::close() !!}
    </div>
    <div class="col-sm-6 box" ></div>
</div>
@endif
@endforeach
</div>
</div>
@endsection
