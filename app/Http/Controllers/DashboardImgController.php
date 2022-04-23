<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MultiPictures;

class DashboardImgController extends Controller
{
    public function index()
    {
        $images = MultiPictures::orderBy('id', 'desc')->paginate(6);
        return view('welcome.welcome', compact('images'));
    }
}
