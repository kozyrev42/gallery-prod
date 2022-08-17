<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ListService
{
    public function all()
    {
        $data = DB::table('list')->select('*')->get();   /* запращиваем все данные */
        // $myImages = $data->pluck('image')->all();  /* из всех данных выбираем только поле 'image' */
        /* ->all() - на выходе простой ассациотивный массив данных из поля 'image' */
        /* $myImages = $plucked->all(); */   /* на выходе простой ассациотивный массив данных из поля 'image' */
        $myList = $data->all();  /* на выходе простой ассациотивный массив всех данных */

        return $myList;
    }

    // запись в базу Задачи
    public function add($task)
    {
        $format = '%Y-%m-%d %H:%M:%S';
        $strf = strftime($format);

        //dd($strf);exit;
        // запись в базу задачи
        DB::table('list')->insert(
            ['task' => $task,
            'created_at' => $strf,
            'updated_at' => $strf]
        );
    }

    public function taskDeleteModel($id)
    {
        // удаление из базы записи            
        DB::table('list')->where('id', $id)->delete();
    }

    public function taskByID($id)
    {
        // получение данных записи
        $data = DB::table('list')
                         ->select('*')
                         ->where('id', $id)
                         ->first();     /* возвращантся одна запись */
        // получение изображения
        $returnTask = $data;

        return $returnTask;
    }

    public function taskEditUpdateModel($id, $newTask)
    {
        // получение данных из формы
        //dd($newTask); exit;

        // запись в базу новой записи
        DB::table('list')
                ->where('id', $id)
                ->update(['task' => $newTask]);
    }

//     public function dataID($id)
//     {
//         // получение данных записи
//         $data = DB::table('images')
//                          ->select('*')
//                          ->where('id', $id)
//                          ->first();     /* возвращантся одна запись */
        
//         return $data;
//     }

//     public function updateModel($id, $request)
//     {
//         // запрос в базу за старой картинкой
//         $data = DB::table('images')->select('*')->where('id', $id)->first();     /* возвращантся одна запись */
        
//         // удаление картинки с серевера
//         Storage::delete($data->image);
    
//         // загрузка новой картинки
//         $image = $request->file('image');            /* получаем экземпляр UploadedFile */
//         $nameImage = $image->store('uploads');     /* метод возвратит путь: папка/имя.расшир */
    
//         // запись в базу новой картинки
//         DB::table('images')
//                 ->where('id', $id)
//                 ->update(['image' => $nameImage]);
//     }

//     public function deleteModel($id)
//     {
//         // получение данных записи
//         $data = DB::table('images')
//                     ->select('*')
//                     ->where('id', $id)
//                     ->first();     /* возвращантся одна запись */
    
//         // удаление картинки с серевера
//         Storage::delete($data->image);
    
//         // удаление из базы            
//         DB::table('images')->where('id', $id)->delete();
//     }
// 
}