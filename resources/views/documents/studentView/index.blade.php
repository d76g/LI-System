<x-app-layout>
    <body>
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" /> --}}
          <!-- Page Content -->
  <div class="container">
  
      <!-- Page Heading -->
      <h1 class="my-4">Internship Documents
        <small>Downloads</small>
      </h1>
      <!-- Project One -->
      @foreach ($documents as $data)
      <hr>
      <div class="row">
          <div class="container">
            <h3 class="float-start">{{$data->title}}</h3>
            <p class=" text-secondary float-end p-2">{{ $data->created_at->diffForHumans()}}</p>
          </div>
          <p>{{$data->content}}</p>
          <div class="col">
            <a class="btn btn-primary float-end" href="{{Storage::URL($data->document_path)}}" download="{{$data->title}}"><i class="fa fa-download" aria-hidden="true"></i>
                 Download</a>
                 <a href="#docView"><button onclick="viewDoc(); return false;" class="btn btn-secondary float-right"><i class="fa fa-eye" aria-hidden="true"></i> View Doc</button></a>
          </div>     
      </div>
        <div id="docView" class="pt-3 pb-5" style="display: none">
        <div class="container-md p-3 d-flex justify-content-center bg-dark rounded">
            <embed src="{{Storage::URL($data->document_path)}}" width="800px" height="700px" />
        </div>
        <div id="docView" class="pt-3 pb-5" style="display: none">
          <div class="container-md p-3 d-flex justify-content-center bg-dark rounded">
              <embed src="{{Storage::URL($data->document_path)}}" width="800px" height="700px" />
          </div>
      </div>
        </div>
      @endforeach
      
      <div class="px-2">
        <p>{{$documents->links()}}</p>
      </div>
    </div>
    {{-- Script to hide and View Form --}}
    <script src="{{URL::asset('js/hideAndView.js')}}" type="text/javascript"></script>
  </x-app-layout>
  