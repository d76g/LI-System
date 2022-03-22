<x-app-layout>
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" /> --}}
          <!-- Page Content -->
  <div class="container">
  
      <!-- Page Heading -->
      <div class="container-md  pt-3 " style="margin-top: 2rem">
        <h2>Edit Document</h2>
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
                <div id="docView" class="col-3">
                    <embed src="{{Storage::URL($docData->document_path)}}" width="800px" height="1000px" />
                </div>
                
                <div class="col-3 mt-2" style="margin-bottom: 2rem">
                    <button type="submit" class="btn btn-primary float-right"><i class="fa fa-upload" aria-hidden="true"></i> Upload Docs</button>
                    <button onclick="viewDoc()" class="btn btn-secondary float-right"><i class="fa fa-eye" aria-hidden="true"></i> View Docs</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        function viewDoc(){
            var x = document.getElementById("docView");
                if (x.style.display === "none") {
                    x.style.display = "block";
                } else {
                    x.style.display = "none";
                }
        }
    </script>
</x-app-layout>