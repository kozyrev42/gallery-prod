@extends('layout') {{-- указавается базовый шаблон, который подгрузиться сюда, и вставим в него секцию --}}

{{-- создаётся секция, которая будет вставлятся в нужное место --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <h3>Заменить картинку</h3>
                <img src="/{{$imagesInView->image}}" alt="" class="img-thumbnail">

                <form action="/update/{{$imagesInView->id}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-control">
                        <input type="file" name="image">
                    </div>
                    <button type="submit" class="btn btn-warning">Заменить</button>
                </form>
            </div>
        </div>
    </div>
@endsection