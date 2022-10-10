<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;

session_start();
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

Route::get('/', function () {    
    if(isset($_SESSION['username'])){
        return redirect('/dashboard');
    }
    return view('Landing');
});

Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', function(){
    $_SESSION['username'] = null;
    return redirect('/');
});

Route::get('/dashboard', [DashboardController::class, 'index']);
Route::post('/api', [KondisiController::class, 'store']);
Route::get('/api', [KondisiController::class, 'view']);

Route::post('/addSchedule', [JadwalPakanController::class, 'store']);
Route::post('/deleteSchedule', [JadwalPakanController::class, 'destroy']);
