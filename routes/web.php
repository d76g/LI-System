<?php

use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\DashboardImgController;
use app\Models\User;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExcelController;
use League\CommonMark\Node\Block\Document;
use App\Http\Controllers\DocumentsController;
use App\Http\Controllers\MultiPicController;
use App\Http\Controllers\SupervisorsController;

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

// Auth Company Controller
Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => 'role:student', 'prefix' => 'student', 'as' => 'student.'], function () {
        Route::resource(name: 'company', controller: \App\Http\Controllers\Student\CompanyController::class);
        Route::resource(name: 'home', controller: \App\Http\Controllers\Student\HomeController::class);
        Route::resource(name: 'docs', controller: \App\Http\Controllers\Student\DocumentController::class);
    });
    Route::group(['middleware' => 'role:supervisor', 'prefix' => 'supervisors', 'as' => 'supervisors.'], function () {
        Route::resource(name: 'company', controller: \App\Http\Controllers\Supervisor\CompanyController::class);
        Route::resource(name: 'home', controller: \App\Http\Controllers\Supervisor\HomeController::class);
    });
    Route::group(['middleware' => 'role:admin', 'prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::resource(name: 'company', controller: \App\Http\Controllers\CompaniesController::class);
    });
});

//Upload Excel File
Route::group(['middleware' => 'auth', 'role:admin'], function () {
    Route::get('dashboard', [ExcelController::class, 'index']);
    Route::post('student/import',  [ExcelController::class, 'importData'])->name('uploadData');
    Route::get('student/export',  [ExcelController::class, 'exportData'])->name('exportData');
    Route::get('student/delete',  [ExcelController::class, 'deleteRecord'])->name('deleteData');
});

Route::middleware(['auth:sanctum', 'verified', 'role:admin'])->get('/dashboard', function () {
    $students = DB::table('students')->skip(0)->take(PHP_INT_MAX)->orderBy('Nama')->Paginate(15);
    $location = DB::table('students')
        ->select(DB::raw('count(Negeri) as NumberOfStudents, Negeri'))
        ->groupBy('Negeri')
        ->orderByDesc('NumberOfStudents')
        ->get();
    return view('dashboard', compact('students', 'location'));
})->name('dashboard');

Route::get('/allocate/{Negeri}', [ExcelController::class, 'viewAllocation'])->name('StudentAllocation');
Route::get('/', [DashboardImgController::class, 'index'])->name('images');
