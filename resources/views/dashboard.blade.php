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

                  @if ($message = Session::get('success'))




                      <div class="alert alert-success alert-block">




                          <button type="button" class="close" data-dismiss="alert">×</button>




                          <strong>{{ $message }}</strong>




                      </div>

                      <br>

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
                <button type="submit" class="btn btn-danger float-end btn-sm m-2"><i class="fa fa-trash m-1" aria-hidden="true"></i> Delete Records</button>
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
                          </thead>

                          <tbody>

                          @if(!empty($students) && $students->count())

                              @foreach($students as $row)
                                  <tr>
                                      <td>{{ $row->Bil }}</td>
                                      <td>{{ $row->No_Matrik }}</td>
                                      <td>{{ $row->No_KP }}</td>
                                      <td>{{ $row->Nama }}</td>


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

          </div>
          {{-- Location Table --}}
          <div class="card"  style="margin-top:2rem">

            <div class="card-header bgsize-primary-4 white card-header">
              <h4 class="card-title" style="padding-top: 10px">Location List Table</h4>
                  
                
            </div>

            <div class="card-body">


                <div class=" card-content table-responsive">

                    <table id="student_t" class="table table-hover table-bordered" style="width:100%">

                        <thead>

                          <th scope="col">Post Code</th>
                          <th scope="col">City</th>
                          <th scope="col">State</th>

                        </thead>

                        <tbody>

                          @foreach ( $location as $locations )
                          <tbody>
                              <tr>
                                <th scope="row">{{$locations->Poskod}}</th>
                                <td>{{$locations->Bandar}}</td>
                                <td>{{$locations->Negeri}}</td>
                          @endforeach

                        </tbody>
                    </table>
                </div>

            </div>

        </div>
         {{-- Student Location --}}
         <div class="card"  style="margin-top:2rem">

          <div class="card-header bgsize-primary-4 white card-header">
            <h4 class="card-title" style="padding-top: 10px">Student Internship Location</h4>
                
              
          </div>

          <div class="card-body">


              <div class=" card-content table-responsive">

                  <table id="student_t" class="table table-hover table-bordered" style="width:100%">

                      <thead>

                        <tr>
                          <th scope="col">State</th>
                          <th scope="col">Number of Students</th>
                        </tr>

                      </thead>
                        @foreach ( $state as $states)
                    
                        <tbody>
                        <tr>
                          <th scope="row">{{$states->Negeri}}</th>
                          <td><a style="text-decoration: none" href="#">{{$states->NumberOfStudents}}</a></td>
                        @endforeach

                      </tbody>
                  </table>
              </div>
          </div>

      </div>
    </div>
       
    </div>
</x-app-layout>
