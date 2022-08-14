<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Services\ImagesService;

class ImagesController extends Controller
{
    private $myImages;
    public function __construct(ImagesService $imagesService)
    {
        // в переменную кладём, Экземпляр класса
        $this->myImages = $imagesService;
    }

    public function index(){
        // в переменную кладём, результат вызова метода-класс
        $images = $this->myImages->all();
        /* return view('list', ['imagesInView' => $images]); */
        return view('welcome', ['imagesInView' => $images]);   /* передача данных в Вид, в виде будем ловить данные через 'imagesInView' */
    }

    // загрузка картинки на сервер и в базу
    public function store(Request $request) {
        /* dd($request->all()); */                   /* посмотреть все методы Экземпляра */
        /* dd($request->file('image')); */           /* доступ к Экземпляру UploadedFile */
        /* dd(get_class_methods($image)); */       /* просмотр всех методов Экземпляра */

        // получаем картинку обёрнутую в экземпляр UploadedFile
        $image = $request->file('image');          
        
        // вызов метода, для загрузки картинки на сервер и в базу
        $this->myImages->add($image);

        return redirect('/');
    }

    public function show($id) {
        // получение изображения по id
        $myImages = $this->myImages->imageID($id);

        return view('show', ['imagesInView' => $myImages]);
    }

    public function edit ($id) {
        // получение данных по id
        $data = $this->myImages->dataID($id);

        return view('edit', ['imagesInView' => $data]);
    }

    public function update(Request $request, $id) {
        // метод заменяет картинку
        $this->myImages->updateModel($id, $request);

        return redirect('/');
    }

    public function delete ($id) {
        // метод удаляет картинку
        $this->myImages->deleteModel($id);
    
        return redirect('/');
    }

    public function create(){
        return view('create');
    }

    // пробная функция для получения данных через класс Request
    public function testRequest(Request $request){
        // запрос: http://localhost/test?id=5

        //  получаем все параметры из запроса
        //dd($request->all());    // "id" => "5"

        // получаем значение конкретного поля из запроса
        //dd($request->id);    // 5
        
        //dd($request->get('id')); // тоже самое что и "$request->id"

        // only([ 'id', 'name']) - получить только определённые поля из запроса.
        // except([ 'id', 'name']) - получить из запроса все поля кроме id и name.
        // has('id') - проверяет есть ли поле id в запросе. Возвращает true или false.
        
    }

    public function testPost(Request $request)
    {
        //dd($request->all());

        //dd($request->title); // 123
        
        // правило валидации, если не пройдено, возвращает на страницу
        $this->validate($request, [
            'title' => 'required',      // обязательно к заполнению
            'title2' => 'required'     // обязательно к заполнению
        ]);     
        // если валидация не пройдена, код прекращает выполняться в это скрипте

    }
}