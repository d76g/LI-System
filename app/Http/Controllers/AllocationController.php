<?php

namespace App\Http\Controllers;

use App\Models\Allocation;
use App\Models\Students;
use App\Models\Supervisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use NunoMaduro\Collision\Adapters\Phpunit\State;

class AllocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request, $id)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Allocation  $allocation
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Allocation  $allocation
     * @return \Illuminate\Http\Response
     */
    public function edit(Allocation $allocation, Request $request)
    {
        $supvervisorsList = Supervisor::all();
        $Negeri = $request->Negeri;
        $state = Students::where('Negeri', '=', $Negeri)
            ->whereNull('Supervisor_id')
            ->orderBy('Poskod', 'desc')
            ->get();
        return view('admin.allocation', compact('state', 'Negeri', 'supvervisorsList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Allocation  $allocation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Students $stid, Supervisor $svid)
    {
        $request->validate([
            'svName' => 'required',
            'studentRecord' => 'required'
        ]);

        $svID = Supervisor::find($svid);
        dd($svID);


        return Redirect()->route('admin.allocation.show')->with('success', 'Student Record Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Allocation  $allocation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Allocation $allocation)
    {
        //
    }
}
