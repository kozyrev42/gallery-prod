<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //dd(111);

        if(true) {
            //abort(404);       //вывод страницы с ошибкой 404 из resources/views/errors/404.blade.php
            //dd('ошибка');     
            // здесь будем писать условия/фильтра, например является ли пользователь админом
            // если все условия пройдены
        };

        return $next($request);
    }
}
