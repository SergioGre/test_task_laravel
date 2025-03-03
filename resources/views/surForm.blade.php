


@extends('layouts.app')

@section('content')

    <div class="panel">
        <h1>{{ $surveTitle }}</h1> 
    </div>

    <div class="panel">
        <h2>{{ $surveDesc }}</h2> 
    </div>

    <form action="{{ route('survey.store') }}" method="POST">
        <input class="Qpanel" type="number" min="0" name="userName" placeholder="Введите ID пользователя" class="panel">
        @csrf
        @foreach($QueArry as $el)
            <div class="Qpanel" id="{{$el->id}}">
                <h2>{{ $el->question_text }}</h2>
            </div>
            <textarea class="Qpanel" name="answers[{{ $el->id }}]" cols="30" rows="10"></textarea>
            <br><br>
        @endforeach
        <button type="submit">Отправить ответы</button>
    </form>

    <script>
        document.querySelector('input[type="number"]').addEventListener('input', function(e) {
  e.target.value = e.target.value.replace(/\D+/g, "");  
});

    </script>
@endsection