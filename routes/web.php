<?php


use App\Models\Test;
use Illuminate\Http\Request;
use App\Http\Controllers\User;
use App\Models\User as ModelsUser;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Paragraph;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::middleware(['preventgoingback'])->group(function(){    
    Route::get('/account/{username}',[User::class,'show'])->middleware('auth')->name('account');
            
    Route::get('/leaderboard',[User::class,'showrank'])->middleware('auth');
    
    Route::get('/logout',[User::class,'logout'])->middleware('auth');
});
Route::get('/',[Paragraph::class,'dictionary']);

Route::get('/login',[User::class,'showauth'])->name('login');

Route::post('/authenticate',[User::class,'authenticate']);

Route::post('/register',[User::class,'register']);

Route::get('/result',[Paragraph::class,'showresult']);
    
Route::post('/calcresult',[Paragraph::class,'calcresult']);

Route::get('/about',[Paragraph::class,'about']);





