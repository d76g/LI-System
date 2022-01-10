<?php

use app\Models\User;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExcelController;
use League\CommonMark\Node\Block\Document;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\SupervisorController;
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


Route::get('/', function () {
    return view('welcome');
});

Route::resource('supervisor', SupervisorsController::class);


// // Supervisor Data
// Route::get('/supervisor/record', [SupervisorController::class, 'viewData'])->name('svData');
// // ADD Supervisor Data
// Route::post('/supervisor/addRecord', [SupervisorController::class, 'addData'])->name('addSvData');


//Company Data
Route::get('/company/record', [CompanyController::class, 'viewData'])->name('CompanyData');
//Add Company
Route::post('/company/addrecord', [CompanyController::class, 'addCompany'])->name('addCompanyData');
//Remove Company
Route::get('company/delete',  [CompanyController::class, 'deleteCompRecord'])->name('deleteCompanyData');

Route::get('dashboard', [ExcelController::class, 'index']);
Route::post('student/import',  [ExcelController::class, 'importData'])->name('uploadData');
Route::get('dashboard',  [ExcelController::class, 'exportData'])->name('exportData');
Route::get('student/delete',  [ExcelController::class, 'deleteRecord'])->name('deleteData');

//Document Page
Route::get('/document', [DocumentController::class, 'viewdoc'])->name('docPage');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $students = DB::table('students')->skip(0)->take(PHP_INT_MAX)->get();
    $location = DB::table('students')
        ->select(DB::raw('count(students.Negeri) as NumberOfStudents, Negeri'))
        ->groupBy('Negeri')
        ->orderByDesc('NumberOfStudents')
        ->get();
    return view('dashboard', compact('students', 'location'));
})->name('dashboard');

Route::get('/allocate/{Negeri}', [ExcelController::class, 'viewAllocation'])->name('StudentAllocation');
