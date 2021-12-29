<?php

namespace App\Http\Controllers;

use App\Models\company;
use Illuminate\Http\Request;
use Carbon\Carbon;
use finfo;
use Illuminate\Support\Facades\Redirect;

class CompanyController extends Controller
{
    public function viewData()
    {
        $company = company::all();
        return view('company.Record.index', compact('company'));
    }

    public function addCompany(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:companies|max:255',
            'eco_sector' => 'required',
            'sector' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048',
        ]);

        $newImageName = time() . '-' . $request->name . '.' . $request->image->extension();

        $request->image->move(public_path('images'), $newImageName);


        company::insert([
            'name' => $request->name,
            'eco_sector' => $request->eco_sector,
            'sector' => $request->sector,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'image_path' => $newImageName,
            'created_at' => Carbon::now()

        ]);

        return Redirect()->back()->with('success', 'Company Record Added Successfully');
    }
}
