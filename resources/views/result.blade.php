@extends('layouts.app')

@section('content')

<body>
    <div class="panel">
        <h1>Ответы на опросы</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID Респондента</th>
                    <th>Вопрос</th>
                    <th>Ответ</th>
                </tr>
            </thead>
            <tbody>
                @foreach($answers as $answer)
                    <tr>
                        <td>{{ $answer->survey_user_id }}</td>
                        <td>{{ $answer->question ? $answer->question->question_text : 'Вопрос не найден' }}</td>
                        <td>{{ $answer->answer_text }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>

@endsection
