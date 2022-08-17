{{-- указавается базовый шаблон, в который подключим код из этого файла, по средствам @extends('layout') --}}
@extends('layout')  {{-- говорим, что мы являемся часть layout.blade.php --}}

{{-- создаётся секция, которая будет вставлятся в нужное место --}}
@section('content')
<div class="container">
    <h1>Список дел</h1>

    <h3>Редактирование задачи</h3>

    <form action="/taskeditpost/{{$taskInView->id}}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-control">
            <input type="text" name="newtask" value="{{$taskInView->task}}" style="width:600px;">
        </div>
        <button type="submit" class="btn btn-danger">Редактировать задачу</button>
    </form>

</div>


@endsection