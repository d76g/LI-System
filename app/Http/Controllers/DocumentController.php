<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function viewDoc()
    {
        return view('documents.document');
    }
}
