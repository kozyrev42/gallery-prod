{{-- указавается базовый шаблон, в который подключим код из этого файла, по средствам @extends('layout') --}}
@extends('layout')  {{-- говорим, что мы являемся часть layout.blade.php --}}

{{-- создаётся секция, которая будет вставлятся в нужное место --}}
@section('content')
<div class="container">
    <h1>Список дел</h1>

    <h3>Добавить задачу</h3>

    <form action="/addtask" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-control">
            <input type="text" name="task">
        </div>
        <button type="submit" class="btn btn-success">Добавить задачу</button>
    </form>

    <div class="row">
        @foreach ($tasksInView as $task)
            <div class="col-md-3 gallery-items">
                <h5>{{$task->task}}</h5>
                <a href="/taskedit/{{$task->id}}" class="btn btn-info my-button">Редактировать</a>
                <a href="/taskdelete/{{$task->id}}" class="btn btn-danger my-button">Удалить</a>
            </div>
        @endforeach

    </div>
</div>


@endsection