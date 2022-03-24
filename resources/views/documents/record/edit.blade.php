<x-app-layout>
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" /> --}}
          <!-- Page Content -->
          <style>
              html {
                  scroll-behavior: smooth;
              }
          </style>
  <div class="container">
      <!-- Page Heading -->
      <div class="container-md  pt-3 " style="margin-top: 2rem">
        <div class="d-flex justify-content-right ">
            <a href="{{URL::to('documents')}}" class="pt-2 mr-2 link-dark" style="text-decoration-line: none"><i class="fa fa-arrow-circle-left fa-xl" aria-hidden="true"></i></a>
            <h2>Edit Document </h2>
        </div>
        
        <div class="container-md pt-4 bg-info bg-gradient text-white rounded" >
            @if (session('success'))
                 @include('documents.partials.index')
            @endif
            
            <form class="row g-3 pt-3" action="{{route('documents.update',$docData->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="md-3">
                    <label class="form-label">Title</label>
                    <input name="title" type="text" class="form-control" value="{{$docData->title}}">
  
                    @error('title')
                        <span class="text-light">{{'*'.$message}}</span>
                    @enderror
                
                <div class="md-3">
                    <label class="form-label">Description</label>
                    <textarea name="content" class="form-control" id="doc_desc" rows="3">{{$docData->content}}</textarea>
                    @error('content')
                        <span class="text-light">{{'*'.$message}}</span>
                    @enderror
                </div>
                <div class="col-6 input-group ">
                    <label class="form-label">Upload Doc</label>
                    <div class="input-group mb-6">
                        <input name="document" type="file" class="form-control" value="{{$docData->document_path}}">
                        <label  class="input-group-text">Upload</label>
                    </div>
                    @error('document_path')
                        <span class="text-light">{{'*'.$message}}</span>
                    @enderror
                </div>
                
                <div class="col-3 mt-2" style="margin-bottom: 2rem">
                    <button type="submit" class="btn btn-primary float-right"><i class="fa fa-upload" aria-hidden="true"></i> Update </button>
                    <a href="#docView"><button onclick="viewDoc(); return false;" class="btn btn-secondary float-right"><i class="fa fa-eye" aria-hidden="true"></i> View Doc</button></a>
                    <p class="mt-2">Note: View Doc : only PDF File Type.</p>
                </div>
                
            </form>
        </div>
    </div>

        <div id="docView" class="pt-3 pb-5" style="display: none">
            <div class="container-md p-3 d-flex justify-content-center bg-dark rounded">
                <embed src="{{Storage::URL($docData->document_path)}}" width="800px" height="700px" />
            </div>
        </div>
    
    {{-- Script to hide and View Form --}}
  <script src="{{URL::asset('js/hideAndView.js')}}" type="text/javascript"></script
</x-app-layout>