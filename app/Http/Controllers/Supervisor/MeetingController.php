<?php

namespace App\Http\Controllers\Supervisor;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Meeting;
use App\Models\Students;
use Illuminate\Http\Request;
use App\Models\CompanySupervisor;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = CompanySupervisor::with('student')->get();
        $meeting = Meeting::with('CompanySupervisor', 'Supervisor')->get();
        // dd($student);
        return view('supervisor.meeting.index', compact('student', 'meeting'));
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
    public function store(Request $request)
    {
        request()->validate([
            'title' => 'required|min:3',
            'time' => 'required',
            'type' => 'required',
            'link' => 'nullable|url',
            'student' => 'required',
        ]);
        // dd($request);

        $newMeeting = new Meeting();
        $newMeeting->Supervisor_id = auth()->user()->id;
        $newMeeting->title = request('title');
        $newMeeting->time = request('time');
        $newMeeting->type = request('type');
        $newMeeting->link = request('link');
        $newMeeting->Student_id = request('student');
        $companySV = CompanySupervisor::with('Student')->where('Student_id', '=', request('student'))->value('id');
        $newMeeting->CompanySupervisor_id = $companySV;
        $newMeeting->save();

        return Redirect()->back()->with('success', 'Meeting Created');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $svData = Meeting::find($id);
        $svData->delete();
        return Redirect()->back()->with('success', 'Meeting Record Deleted Successfully');
    }
}
