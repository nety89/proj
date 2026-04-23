<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return 'Тестовое сообщение';
});


Route::get('/dir/test', function () {
    return 'Сообщение из папки dir';
});


Route::get('/user/{name}', function ($name) {
    return "Привет, {$name}";
});


Route::get('/user/{surname}/{name}', function ($surname, $name) {
    return "Пользователь: {$name} {$surname}";
});

Route::get('/city/{city?}', function ($city = 'omsk') {
    return "Город: {$city}";
});

Route::get('/user/{id}', function ($id) {
    return "ID пользователя: {$id}";
})->where('id', '[0-9]+');

Route::get('/user/{id}/{name}', function ($id, $name) {
    return "ID: {$id}, Имя: {$name}";
})->where([
    'id' => '[0-9]+',
    'name' => '[a-z]{3,}'
]);

Route::get('/posts/{date}', function ($date) {
    return "Посты за дату: {$date}";
})->where('date', '[0-9]{4}-[0-9]{2}-[0-9]{2}');

Route::get('/{year}/{month}/{day}', function ($year, $month, $day) {
    return "Дата: {$year}-{$month}-{$day}";
})->where([
    'year' => '[0-9]{4}',
    'month' => '[0-9]{2}',
    'day' => '[0-9]{2}'
]);

Route::get('/users/{order}', function ($order) {
    return "Сортировка по: {$order}";
})->whereIn('order', ['name', 'surname', 'age']);


Route::get('/city/{name}', function ($name) {
    return "Город: {$name}";
})->where('name', '[a-zA-Zа-яА-Я]+');


Route::get('/user/all', function () {
    return 'all';
});

Route::get('/user/{id}', function ($id) {
    return 'id';
})->where('id', '[0-9]+');


Route::get('/user/all', function () {
    return 'all';
});

Route::get('/user', function () {
    return 'user';
});

Route::get('/user/{id?}', function ($id = null) {
    return 'id';
});


Route::get('/user/{id}', function ($id) {
    return 'id (число)';
})->where('id', '[0-9]+');

Route::get('/user/{slug}', function ($slug) {
    return 'id (slug)';
})->where('slug', '[a-z0-9_-]+');

Route::prefix('/admin')->group(function () {
    Route::get('/users', function () {
        return 'all';
    });
    
    Route::get('/user/{id}', function ($id) {
        return $id;
    });
});

Route::get('/user/profile', function () {
    return 'profile';
})->name('user.profile');