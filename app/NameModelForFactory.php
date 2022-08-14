<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NameModelForFactory extends Model
{
    //  экземпляр класс, под капотом имеет доступ ко всем полям таблицы
    // к ним можно обращатся как: 
    // $nameModelForFactory = new NameModelForFactory;
    // $nameModelForFactory -> id

    // пишем к какой таблицы подключение
    protected $table = 'texts';
}
