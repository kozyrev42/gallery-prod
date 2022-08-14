<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // пишем к какой таблицы подключение
    protected $table = 'texts';

    // чтобы ларавел, дал доступ для записи в таблицу, необходимо прописать
    public $guarded = []; // разрешение на запись во все поля таблицы
    //public $fillable = ['title', 'text']; // запись только в поле 'title'
}
