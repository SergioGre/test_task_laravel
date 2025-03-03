@extends('layouts.app')

@section('content')

@foreach($pollsArry as $el)
<div class="panel">
    <div>
        
        <h2>{{$el->title}}</h2>
        <h3>{{$el->id}}</h3>
        <a href="{{url('survey/Questions/' . $el->id)}}" target="_blank"><button>Открыть</button></a>
        <a href="{{url('survey/' . $el->id)}}" target="_blank"><button>Редактировать</button></a>
        
        <form action="{{ route('surveys.destroy', $el->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit">Удалить</button>
        </form>
    </div>
</div>
@endforeach

@endsection