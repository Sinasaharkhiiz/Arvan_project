<?php

use App\Models\User;
use App\Models\Movie;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovieController;

Route::get('/', function () {
    if(Auth::check()){
        $u_data = User::find(Auth::id());
        $movies = $u_data->movies()->paginate(5);
        return view('home' ,['movies'=>$movies]);
    }else{
    $movies='notlogin';
    return view('home',['movies'=> $movies]);
    }
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('logout',[Controller::class, 'show_logout']);
Route::get('/movies',[MovieController::class,'index']);
Route::get('/movie',[MovieController::class, 'show_movie']);

Route::middleware('auth')->group(function () {
    Route::post('/comment/{id}',[MovieController::class, 'add_comment']);
    Route::get('/profile',[HomeController::class, 'show_user_profile']);
    Route::post('rate/{id}',[MovieController::class , 'rate']);
    Route::post('add_playlist',[MovieController::class , 'add_playlist']);
    Route::post('rm_playlist',[MovieController::class , 'rm_playlist']);
    Route::get('/edit_profile',[Controller::class, 'edit_profile']);
    Route::post('/update_user',[Controller::class , 'update_user']);
    Route::post('/update_profile',[Controller::class , 'update_profile']);
    Route::post('/update_user_contact',[Controller::class , 'update_user_contact']);
    Route::post('/delete_comment/{id}',[MovieController::class, 'delete_comment']);
    Route::get('/user_profile',[HomeController::class, 'show_user']);
});

Route::middleware(['roleChecker:super_admin,null,null'])->group(function () {
    Route::get('/adminpanel',[HomeController::class, 'show_admin_panel']);
    Route::get('/edit_user',[Controller::class, 'edit_user']);
    Route::post('/delete_user/{id}',[Controller::class, 'delete_user']);
    Route::get('/users_management',[HomeController::class, 'show_users_management']);
    Route::get('/movies_management',[MovieController::class, 'show_movies_management']);
    Route::post('/delete_movie/{id}',[MovieController::class, 'delete_movie']);

});
Route::middleware(['roleChecker:super_admin,admin,teacher'])->group(function () {
    Route::get('/add_movie',[MovieController::class, 'show_add_movie']);
    Route::post('/add_movie',[MovieController::class, 'store']);
    Route::get('edit_movie' , [MovieController::class , 'edit_movie']);
    Route::post('edit_movie',[MovieController::class , 'edit']);
});
