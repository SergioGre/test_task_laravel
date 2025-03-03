@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <div>
        <form id="myForm" action="/survey" method="POST" id="testareaForm" class="panel">
            
            @csrf
            
            
            <input type="text" name="title" class="panel Qpanel" placeholder="Заголовок">
            <textarea name="description" class="Qpanel" cols="30" rows="10" placeholder="Описание"></textarea>
            <br><br>
            <div id="textareaContainer">
                <div class="textarea-container">
                    <textarea name="Qtexts[]" rows="4" cols="50" placeholder="Введите текст..." class="Qpanel"></textarea>
                </div>
            </div>
            <button type="button" id="addTextarea">Добавить вопрос</button>
             <button type="submit" >Отправить</button>
            <br><br>
            
        </form>
    </div>
    <script>
        document.getElementById('addTextarea').addEventListener('click', function() {
        const container = document.getElementById('textareaContainer');
        const newTextarea = document.createElement('div');
        newTextarea.className = 'textarea-container';
        newTextarea.innerHTML = '<textarea name="Qtexts[]" rows="4" cols="50" placeholder="Введите текст..." class="Qpanel" ></textarea>';
        container.appendChild(newTextarea);
    });
         
    </script>
@endsection