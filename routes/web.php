<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageAdController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfileAdController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\DirController;
use App\Http\Controllers\PageDirController;


Route::get('/', function () {
    return view('landing');
});
Route::view('/role', 'role')->name('role');

Route::resource('user', UserController::class)
// ->except([
//     'edit', 'update',
// ])
->names([
    'store' => 'user.store',
]);

Route::resource('dir', DirController::class)
->names([
    'index' => 'dir.index',
    'store' => 'dir.store',
    'create' => 'dir.create',
]);

Auth::routes();

//  Route::get('/profile', function() {
//      return view('profile');
//  })
//  ->middleware('auth')
//  ->middleware('user');

Route::resource('/profile-alumno/user', ProfileController::class)
->only([
    'index', 'edit', 'update'
])
->names([
    'index' => 'profile.index',
    'edit' => 'profile.edit',
    'update' => 'profile.update'
    ])
->middleware('auth')
->middleware('user');

Route::resource('/profile-profesor/user', ProfileAdController::class)
->only([
    'index', 'edit', 'update'
])
->names([
    'index'  => 'profilead.index',
    'edit'   => 'profilead.edit',
    'update' => 'profilead.update'
        ])
->middleware('auth')
->middleware('admin');

Route::resource('home', PageController::class)
->names([
    'index' => 'homeuser.index'
    ])
->middleware('auth')
->middleware('user');

Route::resource('/home-profesor/post', PageAdController::class)
->names([
    'index' => 'home.index',
    'create' => 'home.create',
    'edit' => 'home.edit',
    'destroy' => 'home.destroy',
    'store' => 'home.store',
    'update' => 'home.update',
    ])
->middleware('auth')
->middleware('admin');

// PRUEBA ADMINISTRACION

// Route::get('home-administration', function(){
//     return view('home-admin');
// })
// ->middleware('auth')
// ->middleware('dire');

// Route::resource('/home-administration/post', PageDirController::class)
// ->names([
//     'index' => 'homedir.index',
// ])
// ->middleware('auth')
// ->middleware('administration');

//

Route::resource('/chat', ChatController::class);
// ->middleware('auth')
// ->middleware('user');



// Route::get('chat/user', function () {
//     return view('chat-user');
// });

// Route::get('/home/profesor', function () {
//     return view('home-admin');
// });

// Route::resource('/posts', PostController::class)
// ->middleware('auth')
// ->except('show');

// Route::get('blog/{post}', [PageController::class, 'post'])->name('post');

// Route::view('user', 'user')->name('user');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    
    # VISTAS DE PRUEBA #

    # VISTA TAREAS ALUMNOS #
Route::get('posts/user', function () {
    return view('posts-user');
});

Route::get('post/user', function () {
    return view('post-user');
});

Route::get('pending/user', function () {
    return view('pending-user');
});

Route::get('completed/user', function () {
    return view('completed-user');
});

    # VISTA CALIFICACIONES ALUMNOS #
Route::get('calificaciones/user', function () {
    return view('calificaciones-user');
});

Route::get('historial/user', function () {
    return view('historial-user');
});

    # VISTA TAREAS PROFESORES #
Route::get('posts/admin', function () {
    return view('posts-admin');
});

Route::get('post/admin', function () {
    return view('post-admin');
});

Route::get('create/admin', function () {
    return view('create-admin');
});

Route::get('received/admin', function () {
    return view('received-admin');
});

Route::get('evaluation/admin', function () {
    return view('evaluation-admin');
});

    # VISTA CALIFICACIONES PROFESORES #
Route::get('calificaciones/admin', function () {
    return view('calificaciones-admin');
});

Route::get('calificaciones/create/admin', function () {
    return view('create-calif-admin');
});


