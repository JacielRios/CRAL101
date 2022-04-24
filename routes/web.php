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
use App\Http\Controllers\HomeworkAdController;
use App\Http\Controllers\HomeworkController;
use App\Http\Controllers\CreateController;
use App\Http\Controllers\CompletedHomController;
use App\Http\Controllers\PendingHomController;
use App\Http\Controllers\HomeworksCalifController;
use App\Http\Controllers\HomeworksEvaController;
use App\Http\Controllers\ListsUserController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\ListsController;
use App\Http\Controllers\ListaController;
use App\Http\Controllers\CommentController;

Auth::routes();

Route::get('/', function () {
    return view('landing');
});
Route::view('role', 'role')->name('role');

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

//  Route::get('/profile', function() {
//      return view('profile');
//  })
//  ->middleware('auth')
//  ->middleware('user');

# VISTA PERFIL DE USUARIO ALUMNOS #
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

# VISTA PERFIL DE USUARIO DOCENTES Y ADMINISTRATIVO #
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
        'index' => 'homeuser.index',
        'create' => 'homeuser.create',
        'edit' => 'homeuser.edit',
        'destroy' => 'homeuser.destroy',
        'store' => 'homeuser.store',
        'update' => 'homeuser.update',
        'show' =>   'homeuser.show',
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
        'show' => 'home.show',
    ])
    ->middleware('auth')
    ->middleware('admin');

Route::POST('comments-admin/{post}', [CommentController::class, 'store'])
->name('comments.store')
->middleware('auth');

Route::POST('comments-homework/{homework}', [CommentController::class, 'homework'])
->name('commentsHomework.store')
->middleware('auth');

# VISTA CHAT #
Route::resource('/chat', ChatController::class);

# VISTA TAREAS ALUMNOS #
Route::resource('/homeworks', HomeworkController::class)
    ->names([
        'index' => 'homeworks.index',
        'create' => 'homeworks.create',
        'show' => 'homeworks.show',
        'edit' => 'homeworks.edit',
        'destroy' => 'homeworks.destroy',
        'store' => 'homeworks.store',
        'update' => 'homeworks.update',
    ])
    ->middleware('auth')
    ->middleware('user');

Route::get('/homework-create/{homework}', [CreateController::class, 'create'])
    ->name('create')
    ->middleware('auth')
    ->middleware('user');

Route::POST('/homework-store', [CreateController::class, 'store'])
    ->name('store.homework')
    ->middleware('auth')
    ->middleware('user');

Route::resource('/completed-homeworks', CompletedHomController::class)
    ->names([
        'index' => 'completed.index',
        'create' => 'completed.create',
        'show' => 'completed.show',
        'edit' => 'completed.edit',
        'destroy' => 'completed.destroy',
        'store' => 'completed.store',
        'update' => 'completed.update',
    ])
    ->middleware('auth')
    ->middleware('user');


Route::get('pending/user', [PendingHomController::class, 'pending'])
    ->name('pending')
    ->middleware('auth')
    ->middleware('user');

# VISTA CALIFICACIONES ALUMNOS #
Route::get('grades-user', [ListsUserController::class, 'lists_user'])
    ->name('grades-user')
    ->middleware('auth')
    ->middleware('user');

Route::get('list-user/{list}', [ListsUserController::class, 'list_user'])
    ->name('list.user')
    ->middleware('auth')
    ->middleware('user');

# VISTA TAREAS PROFESORES #

Route::resource('/homework-profesor/homeworks', HomeworkAdController::class)
    ->names([
        'index' => 'homework.index',
        'create' => 'homework.create',
        'show' => 'homework.show',
        'edit' => 'homework.edit',
        'destroy' => 'homework.destroy',
        'store' => 'homework.store',
        'update' => 'homework.update',
    ])
    ->middleware('auth')
    ->middleware('admin');

Route::get('homeworks-professor/{homework}', [HomeworksCalifController::class, 'index'])
    ->name('index')
    ->middleware('auth')
    ->middleware('admin');

Route::get('homeworks-received/{received}', [HomeworksCalifController::class, 'received'])
    ->name('received')
    ->middleware('auth')
    ->middleware('admin');

Route::resource('homeworks-evaluation/received', HomeworksEvaController::class)
    ->names([
        'update' => 'received.update',
        'edit' => 'received.edit',
    ])
    ->middleware('auth')
    ->middleware('admin');

# VISTA CALIFICACIONES PROFESORES #
Route::resource('calificaciones/admin', ListController::class)
    ->names([
        'index' => 'list.index',
        'create' => 'list.create',
        'show' => 'list.show',
        'edit' => 'list.edit',
        'destroy' => 'list.destroy',
        'store' => 'list.store',
        'update' => 'list.update',
    ])
    ->middleware('auth')
    ->middleware('admin');

Route::resource('lists/admin', ListsController::class)
    ->names([
        'index' => 'lists.index',
        'create' => 'lists.create',
        'show' => 'lists.show',
        'edit' => 'lists.edit',
        'destroy' => 'lists.destroy',
        'store' => 'lists.store',
        'update' => 'lists.update',
    ])
    ->middleware('auth')
    ->middleware('admin');

Route::resource('list/admin', ListaController::class)
    ->names([
        'index' => 'lista.index',
        'create' => 'lista.create',
        'show' => 'lista.show',
        'edit' => 'lista.edit',
        'destroy' => 'lista.destroy',
        'store' => 'lista.store',
        'update' => 'lista.update',
    ])
    ->middleware('auth')
    ->middleware('admin');
