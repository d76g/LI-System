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

        // $newImageName = time() . '-' . $request->name . '.' . $request->image->extension();

        // $request->image->move(public_path('images'), $newImageName);

        // $companyImage = $request->file('image');

        // $ImageName = time() . '-' . $request->name . '.' . $request->image->getClientOriginalExtension();
        // $up_location = 'images/company/';
        // $newImage = $up_location . $ImageName;
        // $companyImage->move($up_location, $ImageName);

        // $newImage = $request->file('images/Company')->store('images');
        // $newImage = Storage::putFile('image', $request->file('images'));
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
        $newImage = $request->file('image');
        if ($newImage) {
            $oldImageName = $request->old_image;
            Storage::delete($oldImageName);

            company::find($id)->update([
                'name' => $request->name,
                'eco_sector' => $request->eco_sector,
                'sector' => $request->sector,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'image_path' => $request->Input::file('image'),
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
        Storage::delete($oldImageName);

        $companyData = company::find($id);
        $companyData->delete();
        return Redirect()->back()->with('success', 'Company Record Deleted Successfully');
    }
}