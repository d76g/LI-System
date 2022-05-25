<?php

namespace App\Http\Controllers\Supervisor;

use App\Models\Students;
use App\Models\Supervisor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentListController extends Controller
{
    public function index()
    {
        $students = Students::with('supervisor')->filter()->skip(0)->take(PHP_INT_MAX)->orderBy('Nama')->Paginate(15);
        $filterStudentsbySV = Supervisor::orderBy('name')->pluck('name', 'id')->prepend('All Supervisors', '');
        return view('supervisor.studentlist.index', compact('students', 'filterStudentsbySV'));
    }
}
