<x-app-layout>
  {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" /> --}}
        <!-- Page Content -->
<div class="container">

    <!-- Page Heading -->
    <h1 class="my-4">Internship Documents
      <small>Downloads</small>
    </h1>
    <hr>
    <!-- Project One -->
    <div class="row">
      
        <h3>Notice of Online Supervision</h3>
        <p>A notice for online supervision, you have to download it and send it to the coordinator via email.</p>
        <div class="col">
            <a class="btn btn-primary float-end" href="../../../public/documents/Notice of Online Supervision for Sem 1 20212022.pdf" download="Notice of Online Supervision.pdf"><i class="fa fa-download" aria-hidden="true"></i>
               Download</a>
        </div>      
    </div>
    <!-- /.row -->

    <hr>
<!-- Project One -->
<div class="row">
    
      <h3>Internship Application Form</h3>
      <p>Fill this for to apply to any company listed in the eLI System</p>
        <div class="col">
            <a class="btn btn-primary float-end" href="../../../public/documents/Notice of Online Supervision for Sem 1 20212022.pdf" download="Notice of Online Supervision.pdf"><i class="fa fa-download" aria-hidden="true"></i>
               Download</a>
        </div>    
  </div>
  <!-- /.row -->

  <hr>
  <!-- Project One -->
  <div class="row">
    
      <h3>CV Format</h3>
      <p>Download this document and fill it with you personal CV</p>
        <div class="col">
            <a class="btn btn-primary float-end" href="../../../public/documents/Notice of Online Supervision for Sem 1 20212022.pdf" download="Notice of Online Supervision.pdf"><i class="fa fa-download" aria-hidden="true"></i>
               Download</a>
        </div>
  </div>
  <!-- /.row -->

  <hr>
   <!-- Project One -->
   <div class="row">
    
    <h3>Supervisor Assessment Form</h3>
    <p>Supervisors should download this form to make assessment for students.</p>
    <div class="col">
        <a class="btn btn-primary float-end" href="../../../public/documents/Notice of Online Supervision for Sem 1 20212022.pdf" download="Notice of Online Supervision.pdf"><i class="fa fa-download" aria-hidden="true"></i>
           Download</a>
    </div>  
</div>
<!-- /.row -->

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
