<?php

use app\Models\User;
use Faker\Guesser\Name;
use App\Models\Supervisor;
use Doctrine\DBAL\Schema\Index;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExcelController;
use League\CommonMark\Node\Block\Document;
use App\Http\Controllers\MultiPicController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\DocumentsController;
use App\Http\Controllers\AllocationController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SupervisorsController;
use App\Http\Controllers\DashboardImgController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\Supervisor\StudentListController;
use App\Models\Students;

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

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/', function () {
    return view('welcome.welcome');
})->name('welcome');

Route::group(
    ['middleware' => 'auth', 'verified', 'role:admin'],
    function () {

        Route::resources([
            'supervisor' => SupervisorsController::class,
            'company' => CompaniesController::class,
            'documents' => DocumentsController::class,
            'MultiPictures' => MultiPicController::class,

        ]);
    }
);
Route::group(['middleware' => 'auth', 'verified'], function () {
    Route::resource('comment', CommentController::class);
    Route::resource('rating', RatingController::class);
});


// Auth Controller
Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => 'role:student', 'prefix' => 'student', 'as' => 'student.'], function () {
        Route::resource(name: 'company', controller: \App\Http\Controllers\Student\CompanyController::class);
        Route::resource(name: 'home', controller: \App\Http\Controllers\Student\HomeController::class);
        Route::resource(name: 'docs', controller: \App\Http\Controllers\Student\DocumentController::class);
        Route::resource(name: 'companysv', controller: \App\Http\Controllers\Student\CompanySupervisorController::class);
    });
    Route::group(['middleware' => 'role:supervisor', 'prefix' => 'supervisors', 'as' => 'supervisors.'], function () {
        Route::resource(name: 'company', controller: \App\Http\Controllers\Supervisor\CompanyController::class);
        Route::resource(name: 'home', controller: \App\Http\Controllers\Supervisor\HomeController::class);
        Route::resource(name: 'meeting', controller: \App\Http\Controllers\Supervisor\MeetingController::class);
        Route::get('/studentlist', [StudentListController::class, 'index'])->name('studentlist');
    });
    Route::group(['middleware' => 'role:admin', 'prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::resource(name: 'company', controller: \App\Http\Controllers\CompaniesController::class);
        Route::resource('allocation', AllocationController::class)->only('store', 'update');
        Route::get('/allocate/{Negeri}', [ExcelController::class, 'viewAllocation'])->name('StudentAllocation');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    });
});

//Upload Excel File
Route::group(['middleware' => 'auth', 'role:admin'], function () {

    Route::post('student/import',  [ExcelController::class, 'importData'])->name('uploadData');
    Route::get('student/export',  [ExcelController::class, 'exportData'])->name('exportData');
    Route::get('student/delete',  [ExcelController::class, 'deleteRecord'])->name('deleteData');
});

Route::get('/', [DashboardImgController::class, 'index'])->name('images');
