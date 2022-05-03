<?php

namespace App\Http\Controllers;

use App\Models\comment;
use App\Models\company;
use App\Models\User;
use Faker\Provider\ar_JO\Company as Ar_JOCompany;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['store', 'show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        request()->validate([
            'comment' => 'required',
        ]);

        if (!Comment::where('User_id', auth()->user()->id)->exists()) {
            $newComment = new comment();
            $newComment->User_id = auth()->user()->id;
            $newComment->Company_id = request('Company_id');
            $newComment->content = request('comment');
            $newComment->save();
            return back();
        } else {
            return Redirect()->back()->with('success', ' You can comment ONLY one Comment');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $companyData = company::find($id);
        $companyComment = Comment::with('Company', 'User')
            ->where('Company_id', '=', $id)
            ->orderBy('created_at', 'desc')
            ->get();

        $lastCommentDate = Comment::latest('created_at')
            ->where('Company_id', '=', $id)
            ->first();

        return view('Comments.index', compact('companyComment', 'companyData', 'lastCommentDate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(comment $comment)
    {
        //
    }
}
