<?php

namespace App\Http\Controllers;


use App\Models\documents;
use Illuminate\Http\Request;
use App\Models\MultiPictures;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\Storage;
use League\CommonMark\Node\Block\Document;
use PhpOffice\PhpSpreadsheet\Writer\Ods\Content;

class DocumentsController extends Controller
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
        $documents = documents::latest()->paginate(3);
        $multiImages = MultiPictures::orderBy('id', 'desc')->paginate(8);
        return view('documents.record.index', compact('documents', 'multiImages'));
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
                'title' => 'required|max:150',
                'content' => 'required|max:500',
                'document' => 'required|mimes:csv,txt,xlx,xls,pdf,pptx,doc|max:100000',
            ],
            [
                'document.required' => 'Please choose a document to upload',
                'document.mimes' => 'Please Upload file with csv,txt,xlx,xls,pdf,pptx,doc',
                'document.max' => 'Please Upload file max size of 100000KB',

            ]
        );
        documents::insert([
            'title' => $request->title,
            'content' => $request->content,
            'document_path' => $request->file('document')->store('LIdocuments', 'public'),
            'created_at' => Carbon::now()
        ]);
        return Redirect()->back()->with('success', 'Document Added Successfully');
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
        $docData = documents::find($id);
        return view('documents.record.edit')->with('docData', $docData);
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
        $validated = $request->validate(
            [
                'title' => 'required|max:150',
                'content' => 'required|max:300',
                'document' => 'mimes:csv,txt,xlx,xls,pdf,pptx,doc|max:100000',
            ],
            [
                'document.mimes' => 'Please Upload file with csv,txt,xlx,xls,pdf,pptx,doc',
                'document.max' => 'Please Upload file max size of 100000KB',

            ]
        );

        if ($request->hasFile('document')) {

            $File = documents::find($id);
            $oldFileName = $File->document_path;
            Storage::disk('public')->delete($oldFileName);
            $newFile = $request->file('document')->store('LIdocuments', 'public');

            documents::find($id)->update([
                'title' => $request->title,
                'content' => $request->content,
                'document_path' => $newFile,
                'updated_at' => Carbon::now()
            ]);
            return Redirect()->route('documents.index')->with('success', ' Document Details Updated Successfully');
        } else {
            documents::find($id)->update([
                'title' => $request->title,
                'content' => $request->content,
                'updated_at' => Carbon::now(),
            ]);
            return Redirect()->route('documents.index')->with('success', ' Document Details Updated Successfully');
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
        $File = documents::find($id);
        $oldFileName = $File->document_path;
        Storage::disk('public')->delete($oldFileName);

        $deleteFile = documents::find($id);
        $deleteFile->delete();
        return Redirect()->back()->with('deleteSuccess', 'Document Deleted Successfully');
    }
}
