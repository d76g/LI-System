<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
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
    //Add a new rating
    public function store(Request $request)
    {
        request()->validate([
            'rating' => 'required',
        ]);
        // To check if a user dosen't have a rating
        if (!Rating::where('User_id', auth()->user()->id)->exists()) {
            $newRating = new Rating();
            $newRating->User_id = auth()->user()->id;
            $newRating->Company_id = request('Company_id');
            $newRating->Rating = request('rating');
            $newRating->save();
            return back();
        } else {
            // To Update rating
            Rating::where('User_id', auth()->user()->id)->update(
                [
                    'Rating' => request('rating'),
                    'User_id' => auth()->user()->id,
                    'Company_id' => request('Company_id')
                ]
            );
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
        //
    }
}
