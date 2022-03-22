<x-app-layout>
  {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" /> --}}
        <!-- Page Content -->
<div class="container">

    <!-- Page Heading -->
    <h1 class="my-4">Internship Documents
      <small>Downloads</small>
    </h1>
    <div class="container-md  pt-3 " style="margin-top: 2rem">
      <h2>Upload Documents</h2>
      <div class="container-md pt-4 bg-info bg-gradient text-white rounded" >
          @if (session('success'))
               @include('documents.partials.index')
          @endif
          
          <form class="row g-3 pt-3" action="{{URL::to('documents/create')}}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('GET')
              <div class="md-3">
                  <label class="form-label">Title</label>
                  <input name="title" type="text" class="form-control" placeholder="Title">

                  @error('title')
                      <span class="text-light">{{'*'.$message}}</span>
                  @enderror
              
              <div class="md-3">
                  <label class="form-label">Description</label>
                  <textarea name="content" class="form-control" id="doc_desc" rows="3" placeholder="Description"></textarea>
                  @error('content')
                      <span class="text-light">{{'*'.$message}}</span>
                  @enderror
              </div>
              <div class="col-6 input-group ">
                  <label class="form-label">Upload Doc</label>
                  <div class="input-group mb-6">
                      <input name="document" type="file" class="form-control">
                      <label  class="input-group-text">Upload</label>
                  </div>
                  @error('document_path')
                      <span class="text-light">{{'*'.$message}}</span>
                  @enderror
              </div>
              
              <div class="col-3" style="margin-bottom: 2rem">
                  <button type="submit" class="btn btn-primary"><i class="fa fa-upload" aria-hidden="true"></i> Upload Docs</button>
              </div>
          </form>
      </div>
  </div>
    <hr>
    <!-- Project One -->
    @if (session('deleteSuccess'))
           @include('documents.partials.index')
    @endif
    @foreach ($documents as $data)
    <hr>
    <div class="row">
        <h3>{{$data->title}}</h3>
        <p>{{$data->content}}</p>
        <div class="col">
            <a class="btn btn-primary float-end" href="{{Storage::URL($data->document_path)}}" download="{{$data->title}}"><i class="fa fa-download" aria-hidden="true"></i>
               Download</a>
        </div>
        <div class="d-grid gap-1 d-md-flex justify-content-md">
          <a href="documents/{{$data->id}}/edit"><button type="button" class="btn btn-success" alt="Edit"><i class="fa fa-pencil-square" aria-hidden="true"></i>
              Edit</button></a>
          <form action="{{ route('documents.destroy', $data -> id) }}" method="POST">
                  @method('DELETE')
                  @csrf
                  <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button> 
          </form> 
      </div>      
    </div>
    @endforeach

<hr>
<div class="container">
    <h1 class="my-4">Internship Images
        <small>For Information</small>
      </h1>
      <hr>
    <div class="container">
        <div class="row d-flex flex-wrap align-items-center" data-toggle="modal" data-target="#lightbox">
            <div class="col-12 col-md-6 col-lg-3">
                
            <img src="{{url('/images/eli1.jpg')}}" data-target="#indicators" data-slide-to="0" alt="eLI Image" /> 
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <img src="{{url('/images/eli2.jpg')}}" data-target="#indicators" data-slide-to="1" alt="" />
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <img src="{{url('/images/eli3.jpg')}}" data-target="#indicators" data-slide-to="2"  alt="" />
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <img src="{{url('/images/eli4.jpg')}}" data-target="#indicators" data-slide-to="3" alt="" />
            </div>

        </div>
    </div>
</div>
      <hr>
    
    <!-- Pagination -->
    <ul class="pagination justify-content-center">
      <li class="page-item">
        <a class="page-link" href="#" aria-label="Previous">
          <span aria-hidden="true">&laquo;</span>
          <span class="sr-only">Previous</span>
        </a>
      </li>
      <li class="page-item">
        <a class="page-link" href="#">1</a>
      </li>
      <li class="page-item">
        <a class="page-link" href="#">2</a>
      </li>
      <li class="page-item">
        <a class="page-link" href="#">3</a>
      </li>
      <li class="page-item">
        <a class="page-link" href="#" aria-label="Next">
          <span aria-hidden="true">&raquo;</span>
          <span class="sr-only">Next</span>
        </a>
      </li>
    </ul>

  </div>
  <!-- /.container -->
</x-app-layout>
