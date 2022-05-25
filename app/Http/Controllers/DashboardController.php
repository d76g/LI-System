<?php

namespace App\Http\Controllers;

use App\Models\Students;
use App\Models\Supervisor;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $students = Students::with('supervisor')->skip(0)->take(PHP_INT_MAX)->orderBy('Nama')->Paginate(15);
        $location = Students::select('Negeri')
            ->groupBy('Negeri')
            ->get();
        $supvervisor = Supervisor::with('student')->get();
        return view('dashboard', compact('students', 'location', 'supvervisor'));
    }
}
