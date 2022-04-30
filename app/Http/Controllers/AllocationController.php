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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Allocation  $allocation
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $Negeri = $request->Negeri;
        $state = Students::where('Negeri', '=', $Negeri)
            ->whereNull('Supervisor_id')
            ->orderBy('Poskod', 'desc')
            ->get();
        $allocatedStudents = Students::where('Negeri', '=', $Negeri)
            ->with('supervisor')
            ->whereNotNull('Supervisor_id')
            ->orderBy('Poskod', 'desc')
            ->get();
        // dd($allocatedStudents);
        $supvervisorsList = Supervisor::all();
        return view('admin.allocation', compact('state', 'Negeri', 'allocatedStudents', 'supvervisorsList'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Allocation  $allocation
     * @return \Illuminate\Http\Response
     */
    public function edit(Allocation $allocation)
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
    public function update(Request $request, Allocation $allocation)
    {
        //
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
