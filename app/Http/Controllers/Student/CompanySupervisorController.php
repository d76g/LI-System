<?php

namespace App\Http\Controllers\Student;

use Carbon\Carbon;
use App\Models\company;
use App\Models\Students;
use Illuminate\Http\Request;
use App\Models\CompanySupervisor;
use App\Http\Controllers\Controller;
use App\Models\Meeting;
use Illuminate\Support\Facades\Auth;

class CompanySupervisorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companysv = CompanySupervisor::where('Student_id', auth()->user()->id)->first();
        $companyName = company::all('id', 'name');
        $studentList = Students::with('Supervisor')
            ->where('nama', '=', Auth::user()->name)
            ->where('Supervisor_id', '!=', NULL)
            ->first();
        $meeting = Meeting::with('CompanySupervisor', 'Supervisor')->where('Student_id', '=', Auth::user()->id)->get();
        return view('Students.CompanySV.index', compact('companysv', 'companyName', 'studentList', 'meeting'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // Add a new Company Supervisor
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'phone' => 'required',
            'company' => 'required',
        ]);
        if (!CompanySupervisor::where('Student_id', auth()->user()->id)->exists()) {
            $newSupervisro = new CompanySupervisor();
            $newSupervisro->Student_id = auth()->user()->id;
            $newSupervisro->name = request('name');
            $newSupervisro->email = request('email');
            $newSupervisro->phone_number = request('phone');
            $newSupervisro->company = request('company');
            $newSupervisro->save();
            return Redirect()->back()->with('success', 'Record Added Successfully');
        } else {
            return Redirect()->back()->with('success', 'You have already Added a supervisor.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $companysv = CompanySupervisor::where('Student_id', auth()->user()->id)->first();
        $companyName = company::all('id', 'name');
        return view('Students.CompanySV.edit', compact('companysv', 'companyName'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'phone' => 'required',
            'company' => 'required',
        ]);
        CompanySupervisor::find($id)->update([
            'company' => $request->company,
            'name' => $request->name,
            'phone_number' => $request->phone,
            'email' => $request->email,
            'updated_at' => Carbon::now()
        ]);
        return Redirect()->route('student.companysv.index')->with('success', 'Record Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteComment = CompanySupervisor::find($id);
        $deleteComment->delete();
        return Redirect()->back()->with('success', ' Record Deleted');
    }
}
