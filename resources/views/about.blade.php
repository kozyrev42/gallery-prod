{{-- указавается базовый шаблон, который подгрузиться сюда, и вставим в него секцию --}}
@extends('layout') 

{{-- создаётся секция, которая будет вставлятся в нужное место --}}
@section('content')
    <h1>'content' для страницы About </h1>

    <form action="testpost" method="POST">
        {{-- $errors - глобальная переменная, содержит ошибки --}}
        {{-- {{$errors->first('title')}}  --}}    {{-- выводим ошибку --}}


        {{-- вывод всех ошибок --}}
        @foreach ($errors->all() as $error)
            {{$error}} <br>
        @endforeach


        <div class="form-control">
            <input type="text" name="title" value="{{old('title')}}"> <br>  {{-- old() - встроенная функция --}}
            <input type="text" name="title2" value="{{old('title2')}}">
            {{ csrf_field() }}  
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
    </form>



    {{-- получаем данные из контроллера --}}
    {{--@foreach ($postsInAbout as $post)
        <div>
            <h3>{{$post->title}}</h3>--}}   {{-- выводим данные из поля "title" --}}
            {{-- <p>
                {{$post->text}} --}}         {{-- выводим данные из поля "text" --}}   
            {{-- </p>
            <hr>
        </div>
    @endforeach
    {{ $postsInAbout->links() }} --}}        {{-- вывод ссылок на слудующие страницы пришедших элементов --}}
@endsection
