@extends('layout') {{-- указавается базовый шаблон, который подгрузиться сюда, и вставим в него секцию --}}

@section('content')
    <div class="contant">
        <div class="row">
            <div class="col-md-7 gallery-image">
                <img src="/{{$imagesInView}}" alt="" class="img-thumbnail ">
            </div>
        </div>
    </div>
@endsection