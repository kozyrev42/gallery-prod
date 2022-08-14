{{-- указавается базовый шаблон, в который подключим код из этого файла, по средствам @extends('layout') --}}
@extends('layout')  {{-- говорим, что мы являемся часть layout.blade.php --}}

{{-- создаётся секция, которая будет вставлятся в нужное место --}}
@section('content')
<div class="container">
    <h1 align="center">Моя Галерея</h1>
    <div class="row">
        @foreach ($imagesInView as $image)
            <div class="col-md-3 gallery-items">
                <div>
                    <img src="/{{$image->image}}" class="img-thumbnail" alt="">
                </div>
                <a href="/show/{{$image->id}}" class="btn btn-info my-button">Просмотр</a>
                <a href="/edit/{{$image->id}}" class="btn btn-warning my-button">Редактировать</a>
                <a href="/delete/{{$image->id}}" class="btn btn-danger my-button">Удалить</a>
            </div>
        @endforeach

    </div>
</div>


@endsection