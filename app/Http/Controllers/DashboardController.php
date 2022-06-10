<?php

namespace App\Http\Controllers;

use App\Models\Students;
use App\Models\Supervisor;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // To display students list in the Student's Page
    public function index()
    {
        $students = Students::with('Supervisor')->skip(0)->take(PHP_INT_MAX)->orderBy('Nama')->Paginate(15);
        $location = Students::select('Negeri')
            ->groupBy('Negeri')
            ->get();
        $supvervisor = User::with('student')->get();
        return view('dashboard', compact('students', 'location', 'supvervisor'));
    }
}
