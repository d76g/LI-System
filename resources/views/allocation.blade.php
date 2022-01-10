<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Welcome .. <b>{{Auth::user()->name}}</b>
        </h2>
    </x-slot>
    <div class="py-12">
        
        <div class="container">

            <div class="row justify-content-left">

                <div class="col-md-12">

                    <br/>
                    {{-- Student List Table --}}
                    <div class="card">
                        <div class="card-header bgsize-primary-4 white card-header">
                                
                                <h4 class="card-title" style="padding-top: 10px">Student List Table in - {{$states}}</h4>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Select a supervisor</option>
                                    @foreach ($superviros as $sv)
                                        <option value="{{$sv->id}}">{{$sv -> name}}</option>
                                    @endforeach
                                    
                                </select>   
                        </div>
                            
                        <div class="card-body">


                            <div class=" card-content table-responsive">

                                <table id="student_t" class="table table-hover table-bordered" style="width:100%">

                                    <thead>
                                    
                                    <th>Matrik Number</th>
                                    <th>ID Number</th>
                                    <th>Name</th>
                                    <th>Poskod</th>
                                    <th>Bandar</th>
                                    </thead>
                                    

                                    <tbody>

                                    @if(!empty($negeri) && $negeri->count())

                                        @foreach($negeri as $row)
                                            <tr>
                                                
                                                <td>{{ $row->No_Matrik }}</td>
                                                <td>{{ $row->No_KP }}</td>
                                                <td>{{ $row->Nama }}</td>
                                                <td>{{ $row->Poskod }}</td>
                                                <td>{{ $row->Bandar }}</td>
                                            </tr>

                                        @endforeach

                                    @else

                                        <tr>

                                            <td colspan="10">There are no data.</td>

                                        </tr>

                                    @endif

                                        
                                    </tbody>
                                    
                                </table>
                                <button type="button" class="btn btn-primary">Assign Supervisor</button>

                            </div>

                        </div>
                </div>
                </div>
                </div>
        </div>
    </div>
</x-app-layout>
