@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <h1>Добро пожаловать в систему опросов</h1>
        <p class="lead">Выберите действие ниже:</p>
        
        <a href="{{url('survey/create')}}" target="_blank"><button>Создать опрос</button></a>
        <a href="{{url('/survey/load')}}" target="_blank"><button>Пройти опрос/посмотреть список</button></a>
        <a href="{{url('/survey/response')}}" target="_blank"><button>Результаты опросов</button></a>

    </div>
@endsection