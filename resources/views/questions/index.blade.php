@extends('master')
@section('title', 'Page Title')
@section('content')
<div class="row">
    <div class="col-md-3">
    </div>
    <div class="col-md-2">
        <div class="dropdown">
            {!! Form::open(['action' => 'QuestionsController@index','method' => 'get']) !!}
                {!! Form::select('category_id', $categories, 1, array('class' => 'form-control')) !!}
                {!! Form::select('learned_value', [config('custom.all_questions') => 'All Questions', config('custom.learned') => 'Learned', config('custom.not_learned') => 'Not learned'], config('custom.all_questions')) !!}
                {!! Form::submit('Filter') !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>
<div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Words</th>
                <th>Meanings</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($questions as $question)
                <tr>
                    <td>{{ $question->english_word }}
                    </td>
                    @foreach ($question->answers()->correct()->get() as $answer)
                        <td>{{ $answer->bengali_meaning }}</td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection