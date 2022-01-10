<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Welcome .. <b>{{Auth::user()->name}}</b>
            <b style="float: right;">Total Students 
                <span class="badge bg-danger">{{ count($students) }}</span>
            </b>
        </h2>
    </x-slot>
    <div class="py-12">
        
<div class="container">

  <div class="row justify-content-centre" style="margin-top: 4%">

      <div class="col-md-8">

          <div class="card">

              <div class="card-header bgsize-primary-4 white card-header">

                  <h4 class="card-title" style="padding-top: 10px">Import Excel Data</h4>

              </div>

              <div class="card-body">

                @if (session('success'))
                    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                        </symbol>
                        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </symbol>
                    </svg>
                    
                    <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:" aria-label="Close"><use xlink:href="#check-circle-fill"/></svg>
                        <div>
                        <strong id="sessionSuccess">{{session('success')}}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                  {{-- @else
                    <div class="alert alert-warning d-flex align-items-center alert-dismissible fade show" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:" aria-label="Close"><use xlink:href="#check-circle-fill"/></svg>
                        <div>
                        <strong id="sessionSuccess">{{session('fail')}}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div> --}}
                @endif

                  <form action="{{route("uploadData")}}" method="POST" enctype="multipart/form-data">
                     
                      @csrf
                      
                      <fieldset>

                          <label>Select File to Upload  <small class="warning text-muted">{{__('Please upload only Excel (.csv , .xlsx or .xls) files')}}</small></label>

                          <div class="input-group">

                              <input type="file" required class="form-control" name="uploaded_file" id="uploaded_file">

                              @if ($errors->has('uploaded_file'))

                                  <p class="text-right mb-0">

                                      <small class="danger text-muted" id="file-error">{{ $errors->first('uploaded_file') }}</small>

                                  </p>

                              @endif

                              <div class="input-group-append" id="button-addon2">

                                  <button class="btn btn-primary square" type="submit"><i class="ft-upload mr-1"></i><i class="fa fa-database" aria-hidden="true"></i>
                                    Upload</button>

                              </div>
                          </div>

                      </fieldset>

                  </form>

              </div>

          </div>

      </div>

  </div>




  <div class="row justify-content-left">

      <div class="col-md-12">

          <br />
          {{-- Student List Table --}}
          <div class="card">
            <div class="card-header bgsize-primary-4 white card-header">
                <a href="{{route("deleteData")}}" onclick="delConfi()"><button type="submit"  class="btn btn-danger float-end btn-sm m-2"><i class="fa fa-trash m-1" aria-hidden="true"></i> Delete Records</button></a>
                <h4 class="card-title" style="padding-top: 10px">Student List Table</h4>
                    
                  
              </div>

              <div class="card-body">


                  <div class=" card-content table-responsive">

                      <table id="student_t" class="table table-hover table-bordered" style="width:100%">

                          <thead>
                          <th>Bil</th>
                          <th>Matrik Number</th>
                          <th>ID Number</th>
                          <th>Name</th>
                          <th>Poskod</th>
                          <th>Bandar</th>
                          <th>Negeri</th>
                        </thead>
                        

                          <tbody>

                          @if(!empty($students) && $students->count())

                              @foreach($students as $row)
                                  <tr>
                                      <td>{{ $row->id }}</td>
                                      <td>{{ $row->No_Matrik }}</td>
                                      <td>{{ $row->No_KP }}</td>
                                      <td>{{ $row->Nama }}</td>
                                      <td>{{ $row->Poskod }}</td>
                                      <td>{{ $row->Bandar }}</td>
                                      <td>{{ $row->Negeri }}</td>


                                  </tr>

                              @endforeach

                          @else

                              <tr>

                                  <td colspan="10">There are no data.</td>

                              </tr>

                          @endif


                          </tbody>
                      </table>

                  </div>

              </div>
              <div class="card-body">
                <div class="card-header bgsize-primary-4 white card-header">
                    <h4 class="card-title" style="padding-top: 10px">Location</h4>
                    <p>Students are queried based on the State they take internship at.</p>
                  </div>
                <div class=" card-content table-responsive">
  
                    <table id="student_t" class="table table-hover table-bordered" style="width:100%">
  
                        <thead>
  
                          <tr>
                            <th scope="col">State</th>
                            <th scope="col">Number of Students
                                <p class="fw-light fs-6">Select State to assign a Supervisor.</p>
                            </th>
                          </tr>
  
                        </thead>
                          @foreach ( $location as $states)
                      
                          <tbody>
                          <tr>
                            <th scope="row">{{$states->Negeri}}</th>
                            <td><a style="text-decoration: none" href="{{url('allocate/'.$states->Negeri)}}">{{$states->NumberOfStudents}}</a></td>
                          @endforeach
  
                        </tbody>
                    </table>
                </div>
            </div>
          </div>
         {{-- Student Location --}}
          

      </div>
    </div>
       {{-- <script>
           function delConfi() {
                let message = "Are sure you want to delete?";
                if (confirm(message) == false) {
                    message = session('fail');
                } else {
                    message = session('success');
                    document.getElementById("sessionSuccess").innerHTML = message;
                }
            }
       </script> --}}
    </div>
</x-app-layout>
