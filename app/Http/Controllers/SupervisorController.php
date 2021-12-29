<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Supervisor;
use finfo;
use Illuminate\Support\Facades\Redirect;

class SupervisorController extends Controller
{
    public function viewData()
    {
        $svData = Supervisor::all();
        return view('supervisor.Record.index', compact('svData'));
    }

    public function addData(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:supervisors|max:255',
            'Staff_id' => 'required|unique:supervisors|max:12',
            'Email' => 'required',
        ]);

        Supervisor::insert([
            'staff_id' => $request->Staff_id,
            'name' => $request->name,
            'office_phone_number' => $request->phone,
            'email' => $request->Email,
            'created_at' => Carbon::now()

        ]);

        return Redirect()->back()->with('success', 'Supervisor Record Added Successfully');
    }
}
