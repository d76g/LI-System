<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // To display users information in the Admin Panel
    public function index()
    {
        $users = User::with('role')->filter()->latest()->paginate(25);
        $filterUserbyRole = User::with('Role')->orderBy('role_id', 'asc')->groupBy('role_id')->get('role_id');
        $deletedUsers = User::with('Role')->onlyTrashed()->filter()->get();
        return view('admin.users', compact('users', 'deletedUsers', 'filterUserbyRole'));
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
    // To restore disabled Users.
    public function update(Request $request, $id)
    {
        $restoreUser = User::onlyTrashed()->where('id', '=', $id)->first();
        $restoreUser->restore();
        return Redirect()->back()->with('success', 'User Record Restored Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // To disable Users and Delete.
    public function destroy($id)
    {
        $userDelete = User::find($id);
        $userDelete->delete();
        return Redirect()->back()->with('success', 'User Record Deleted Successfully');
    }
}
