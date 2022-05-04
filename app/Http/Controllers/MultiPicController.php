<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\MultiPictures;
use Illuminate\Support\Carbon;

class MultiPicController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validated = $request->validate(
            [
                'images' => 'required|array',
                'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ],
            [
                'images.required' => 'Please choose one or multi Images to upload',
                'images.mimes' => 'Please Upload file with jpg,png,svg,jpeg',
                'images.max' => 'Please Upload file max size of 1000KB',

            ]
        );
        if ($request->hasfile('images')) {

            foreach ($request->file('images') as $images) {

                MultiPictures::create([
                    'images_path' => $images->store('LIimages', 'public'),
                    'created_at' => Carbon::now()
                ]);
            }
            return Redirect()->back()->with('success', 'Images Added Successfully');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
        $File = MultiPictures::find($id);
        $oldImage = $File->images_path;
        Storage::disk('public')->delete($oldImage);

        $image = MultiPictures::find($id);
        $image->delete();
        return Redirect()->back()->with('success', 'Image Deleted Successfully');
    }
}
