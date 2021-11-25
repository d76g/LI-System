<?php

use Illuminate\Support\Facades\Route;
use app\Models\User;
use Illuminate\Support\Facades\DB;


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
    return view('welcome');
});
Route::get('/students-state', function () {
    return view('students-state');
})->name('studentsState');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $users = DB::table('students')->skip(1)->take(PHP_INT_MAX)->get();
    $location = DB::table('location')->skip(1)->take(PHP_INT_MAX)->get();
    $state = DB::table('location')
        ->select(DB::raw('count(Negeri) as NumberOfStudents, Negeri'))
        // ->where('Negeri', '<>', 1)
        ->groupBy('Negeri')
        ->orderByDesc('NumberOfStudents')
        ->get();
    return view('dashboard', compact('users'), compact('location', 'state'));
})->name('dashboard');
