<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'role:admin']);
    }
    public function index()
    {
        $company = company::all();
        return view('Company.Record.index', compact('company'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:companies|max:255',
            'eco_sector' => 'required',
            'sector' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048',
        ]);
        company::insert([
            'name' => $request->name,
            'eco_sector' => $request->eco_sector,
            'sector' => $request->sector,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'image_path' => $request->file('image')->store('images', 'public'),
            'created_at' => Carbon::now()

        ]);

        return Redirect()->back()->with('success', 'Company Record Added Successfully');
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
        $companyData = company::find($id);
        return view('company.Record.edit')->with('companyData', $companyData);
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
        $validated = $request->validate([
            'name' => 'required|max:255',
            'eco_sector' => 'required',
            'sector' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'image' => 'mimes:jpg,png,jpeg|max:5048',
        ]);

        if ($request->hasFile('image')) {
            $Image = company::find($id);
            $oldImageName = $Image->image_path;
            Storage::disk('public')->delete($oldImageName);
            $newImage = $request->file('image')->store('images', 'public');
            company::find($id)->update([
                'name' => $request->name,
                'eco_sector' => $request->eco_sector,
                'sector' => $request->sector,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'image_path' => $newImage,
                'updated_at' => Carbon::now(),
            ]);

            return Redirect()->route('company.index')->with('success', 'Company Record Updated Successfully');
        } else {
            company::find($id)->update([
                'name' => $request->name,
                'eco_sector' => $request->eco_sector,
                'sector' => $request->sector,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'updated_at' => Carbon::now(),
            ]);
            return Redirect()->route('company.index')->with('success', 'Company Record Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Image = company::find($id);
        $oldImageName = $Image->image_path;
        Storage::disk('public')->delete($oldImageName);

        $companyData = company::find($id);
        $companyData->delete();
        return Redirect()->back()->with('success', 'Company Record Deleted Successfully');
    }
}
