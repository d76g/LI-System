<x-app-layout>
  <link rel="stylesheet" href="{{URL::asset('css/hovereffect.css')}}">
  <body>
  {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" /> --}}
        <!-- Page Content -->
<div class="container">

    <!-- Page Heading -->
    <h1 class="my-4">Internship Documents
      <small>Downloads</small>
    </h1>
    <div class="container-md  pt-3 " style="margin-top: 2rem">
      <h2>Upload Documents <button onclick="viewForm(); return false;" class="btn btn-dark btn-sm"> Upload Docs</button></h2>
      @if (session('success'))
               @include('documents.partials.index')
      @endif
      <div id="viewForm" style="display: none">
      <div class="container-md pt-4 bg-info bg-gradient text-white rounded" >
          
          
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
                  @error('document')
                      <span class="text-light">{{'*'.$message}}</span>
                  @enderror
              </div>
              
              <div class="col-3" style="margin-bottom: 2rem">
                  <button type="submit" class="btn btn-primary"><i class="fa fa-upload" aria-hidden="true"></i> Upload Docs</button>
              </div>
          </form>
      </div>
      <hr>
    </div>
  </div>
    
    <!-- Project One -->
    @if (session('deleteSuccess'))
           @include('documents.partials.index')
    @endif
    @foreach ($documents as $data)
    <hr>
    <div class="row">
        <div class="container">
          <h3 class="float-start">{{$data->title}}</h3>
          <p class=" text-secondary float-end p-2">{{ $data->created_at->format('F j, Y')}}</p>
        </div>
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
    <div class="px-2">
      <p>{{$documents->links()}}</p>
    </div>
<hr>
  </div>
  <!-- /.container -->
  <div class="container">
    <h1 class="my-4">Related Internship Images
      {{-- <button onclick="multiImageForm(); return false;" class="btn btn-dark btn-sm"> Upload Images</button> --}}
      <div class="btn-group">
        <button type="button" class="btn btn-dark btn-sm" onclick="multiImageForm(); return false;">Upload Images</button>
        <button type="button" class="btn btn-dark  btn-sm dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="sr-only">Toggle Dropdown</span>
        </button>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="{{URL::to('MultiPictures/edit')}}">Edit</a>
        </div>
      </div>
    </h1>
      <div id="multiImageForm" style="display: none">
          <div class="container-md pt-4 bg-info bg-gradient text-white rounded" >
              
              
              <form class="row g-3 pt-3" action="{{URL::to('MultiPictures/create')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('GET')
                  <div class="col-6 input-group ">
                      <label class="form-label">Upload Image</label>
                      <div class="input-group mb-1">
                          <input name="images[]" type="file" class="form-control" multiple>
                          <label  class="input-group-text">Upload</label>
                      </div>
                      @error('images')
                          <span class="text-light">{{'*'.$message}}</span>
                      @enderror
                  </div>
                  <div class="col-3" style="margin-bottom: 1rem">
                      <button type="submit" class="btn btn-primary"><i class="fa fa-upload" aria-hidden="true"></i> Upload Images</button>
                  </div>
              </form>
          </div>
      </div>
      <hr>
    <div class="container">
        <div class="row d-flex flex-wrap align-items-center" data-toggle="modal" data-target="#lightbox">
          @if(!empty($multiImages) && $multiImages->count())

            @foreach ($multiImages as $img)
              <div class="col-12 col-md-6 col-lg-3 hovereffect"> 
                
                <img class="img-responsive" src="{{Storage::URL($img->images_path)}}" data-target="#indicators" data-slide-to="0" alt="eLI Image" /> 
                <form action="{{ route('MultiPictures.destroy',$img->id) }}" method="POST">
                  @method('DELETE')
                  @csrf
                    <div class="overlay">
                        <button type="submit" class="btn"><i class="fas fa-trash text-white" aria-hidden="true"></i></button> 
                    </div>
                </form>
              </div> 
            @endforeach
          <div class="px-2">
              <p>{{$multiImages->links()}}</p>
          </div>
          @else
          <div class="card mb-4">
            <div class="card-body text-secondary">
              No Uploaded Images.
            </div>
          </div>
            @endif
        </div>
    </div>
</div>

</x-app-layout>
