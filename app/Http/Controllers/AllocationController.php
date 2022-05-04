<?php

namespace App\Http\Controllers;

use App\Models\Allocation;
use App\Models\Students;
use App\Models\Supervisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use NunoMaduro\Collision\Adapters\Phpunit\State;
use Carbon\Carbon;


class AllocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
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
    public function store(Request $request)
    {
        $request->validate([
            'svName' => 'required',
            'ids' => 'required'
        ]);



        foreach ($request->input('ids') as $student) {
            $sv = Students::find($student);
            $sv->supervisor_id = request('svName');
            $sv->save();
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Allocation  $allocation
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Allocation  $allocation
     * @return \Illuminate\Http\Response
     */
    public function edit(Allocation $allocation, Request $request)
    {
        //    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Allocation  $allocation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'ids' => 'required'
        ]);

        foreach ($request->input('ids') as $student) {
            $sv = Students::find($student);
            $sv->supervisor_id = NULL;
            $sv->save();
        }
        return back();
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
