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
            <h2>Edit Images </h2>
        </div>
        
        <div class="container-md pt-4 bg-info bg-gradient text-white rounded" >
            @if (session('success'))
                 @include('documents.partials.index')
            @endif
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td colspan="2">Larry the Bird</td>
                    <td>@twitter</td>
                  </tr>
                </tbody>
              </table>
            
        </div>
    </div>
    
</x-app-layout>