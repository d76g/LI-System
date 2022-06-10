<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Rating;
use App\Models\comment;
use App\Models\company;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Faker\Provider\ar_JO\Company as Ar_JOCompany;
use Illuminate\Support\Facades\Session as Session;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\Comments;

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
    // Add New Comment
    public function store(Request $request)
    {
        request()->validate([
            'comment' => 'required|min:10|max:1000',
        ]);
        // To check if a user doesn't have a comment
        if (!Comment::where('User_id', auth()->user()->id)->exists()) {
            $newComment = new comment();
            $newComment->User_id = auth()->user()->id;
            $newComment->Company_id = request('Company_id');
            $newComment->content = request('comment');
            $newComment->save();
            return back();
        } else {
            return Redirect()->back()->with('success', ' You can comment ONLY one Comment for one Company, delete the comment to comment again.');
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
        $companyComment = Comment::with(['Company', 'User'])
            ->where('Company_id', '=', $id)
            ->latest()
            ->get();
        $userWithComment = comment::with('User')->where('User_id', '=', auth()->user()->id)->first();
        $lastCommentDate = Comment::latest('created_at')
            ->where('Company_id', '=', $id)
            ->first();
        $companyRating = Rating::where('Company_id', '=', $id)->avg('rating');
        $roundedRating = round($companyRating, 1);
        $ratingCount = Rating::where('Company_id', '=', $id)->count('rating');
        $commentCount = comment::where('Company_id', '=', $id)->count('content');
        $userRating = Rating::with('User')
            ->where('User_id', '=', auth()->user()->id)
            ->where('Company_id', '=', $id)
            ->first();
        Session::put('company_url', request()->fullUrl());
        return view(
            'Comments.index',
            compact(
                'companyComment',
                'companyData',
                'lastCommentDate',
                'roundedRating',
                'ratingCount',
                'commentCount',
                'userRating',
                'userWithComment',
            )
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $commentContent = Comment::find($id);
        return view('comments.edit', compact('commentContent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'comment' => 'required|min:10',
        ]);
        comment::find($id)->update([
            'content' => request('comment'),
            'updated_at' => Carbon::now()
        ]);
        return redirect(session('company_url'))->with('status', ' Comment Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (auth()->user()->role_id != 1) {
            $user_id = auth()->user()->id;
            $comment = comment::where('id', $id)
                ->where('User_id', $user_id)
                ->first();

            if (!is_null($comment)) {
                $comment->delete();
                return Redirect()->back()->with('success', ' Comment Deleted Successfully.');
            } else {
                return Redirect()->back()->with('success', ' You can delete your own comment ONLY.');
            }
        } else {
            $deleteComment = comment::find($id);
            $deleteComment->delete();
            return Redirect()->back()->with('success', ' Admin, you deleted a Comment.');
        }
    }
}
