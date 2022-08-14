<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;                       // для рабоды с БД
use App\NameModelForFactory;
use App\Services\ListService;

class HomeController extends Controller
{
    private $myList;  // переменная для получения задач

    public function __construct(ListService $listService)
    {
        // в переменную кладём, Экземпляр класса с данными из бд
        $this->myList = $listService;
    }

    public function list(){
        // в переменную кладём, результат вызова метода-класс
        $tasks = $this->myList->all();
        return view('list', ['tasksInView' => $tasks]);   /* передача данных в Вид, в виде будем ловить данные через 'tasksInView' */
    }

    public function about(){
        // рендер страниц about.blade.php
        return view('about');

        // получаем массив из Базы
        $users = [
            [
                "id" => 1,
                "name" => "jon",
                "status" => "active",
                "sex" => "m"
            ],
            [
                "id" => 2,
                "name" => "san",
                "status" => "ban",
                "sex" => "m"
            ],
            [
                "id" => 3,
                "name" => "dash",
                "status" => "ban",
                "sex" => "w"
            ],
            [
                "id" => 4,
                "name" => "kate",
                "status" => "active",
                "sex" => "w"
            ],
        ];

        
        $bannedUsers = [];
        $mUsers = [];

        // обчный способ, получить только забаненных юзеров
        foreach ($users as $user) {
            if($user["status"] == "ban" ) {
                // в массив кладём только забаненых
                $bannedUsers[] = $user;
                // из забаненных, только женщин
                if($user["sex"] == "w") {
                    $mUsers[] = $user;
                }
            }
        }

        // оборачиваем в Экземпляр Класс Collection
        $collectUsers = collect($users);
        //dd($collectUsers);

        // map() - перебирает $collectUsers, и передаёт в колбэк каждый элемент
        // далее с каждым элементом можно поработать
        // используем метод map() для выборки "name"
        // возвращается массив только с именами юзеров
        // по итогу формируется новый массив
        $name = $collectUsers->map(function ($user) {
            return $user['name'];
        });

        // filter() - колбэк возвращает элементы прошедшие по критерию отбора
        // хотим вернуть только элементы, в которых "sex" => "m"
        $sexM = $collectUsers->filter(function ($user) {
            return $user['sex'] == 'm';
        });


        // можно применять цепочки вызовов
        $sexMban = $collectUsers->filter(function ($user) {
            return $user['sex'] == 'm';
        })->filter(function ($user) {
            return $user['status'] == 'ban';
        });

        //dd($sexMban);

        //функция возвращает все записи из таблице в виде Объекта
        //dd(Post::all());    // каждый элемент массива, это экземпляр Класса Post
        

        //dd(Post::first());  // возвращает только первый элемент в виде Объекта


        //dd(Post::find(4));  // возвращает элемент по указанному в аргументе id


        //dd(Post::where('id', 5)->first());  // возвращает элемент по указанному id

        // передаём переменной результат вызова из БД
        // $posts = Post::all();        // вывод всех элементов
        //$posts = Post::paginate(2);     //  пагинация, вывод столько записей, сколько указано в (аргументе)
        //return view('about', ['postsInAbout' => $posts]);


        // запись в БД данных, 1 способ
        // $posts = Post::create([
        //     'title'=>'моя тема',
        //     'text'=>'текст длинный'
        // ]);

        // запись в БД данных, 2 способ
        // $post = new Post; // создаём экземпляр Модели
        // $post->title = 'тема тема тема';
        // $post->text = 'текст текст текст текст';
        // $post->save();

    }
}
