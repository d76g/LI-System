<?php

namespace App\Http\Controllers;

use App\Models\Supervisor;
use Carbon\Carbon;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Request;


class SupervisorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $svData = Supervisor::latest()->paginate(5);
        return view('supervisor.Record.index')->with('svData', $svData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:supervisors|max:255',
            'staff_id' => 'required|unique:supervisors|max:12',
            'Email' => 'required',
        ]);

        Supervisor::insert([
            'staff_id' => $request->staff_id,
            'name' => $request->name,
            'office_phone_number' => $request->phone,
            'email' => $request->Email,
            'created_at' => Carbon::now()

        ]);

        return Redirect()->back()->with('success', 'Supervisor Record Added Successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $svData = Supervisor::find($id);
        return view('supervisor.Record.edit')->with('svData', $svData);
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
        $svData = Supervisor::find($id);
        $svData->delete();
        return Redirect()->back()->with('success', 'Supervisor Record Deleted Successfully');
    }
}
