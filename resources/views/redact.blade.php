@extends('layouts.app')

@section('content')

<div>
    <form id="myForm" action="/survey/replace" method="POST" id="testareaForm" class="panel">
        @csrf
        <input type="hidden" name="survey_id" value="{{ $Surid }}">

    <input type="text" name="title" class="panel Qpanel" placeholder="Заголовок" value="{{$title}}">
    <textarea name="description" class="Qpanel" cols="30" rows="10" placeholder="Описание">{{$description}}</textarea>
    <br></br>
    @foreach($QueArry as $el)
    @csrf
    <textarea name="Qtexts[]" rows="4" cols="50" placeholder="Введите текст..." class="Qpanel">{{$el->question_text}}</textarea>
    <input type="hidden" name="quest_id[]" value="{{ $el->id }}">

    @endforeach
    <button type="submit" >Отправить</button>
    </form>

</div>


@endsection