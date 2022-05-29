<?php

namespace App\Http\Controllers\Supervisor;

use App\Models\User;
use App\Models\Students;
use App\Models\Supervisor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StudentListController extends Controller
{
    public function index()
    {
        $students = Students::with('Supervisor')->where('supervisor_id', '=', Auth::user()->id)->orderBy('Nama')->filter()->Paginate(15);
        $filterStudentsbyNegeri = Students::groupBy('Negeri')->pluck('Negeri')->prepend('All States', '');
        return view('supervisor.studentlist.index', compact('students', 'filterStudentsbyNegeri'));
    }
}
