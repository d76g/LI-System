<x-app-layout>
    
    <body>
        
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Student-Supervisor Allocation
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="container">
            <div class="row justify-content-left">
                <div class="col-md-12">
                    <br/>

                    {{-- Student List Table --}}
                    <button type="button" class="d-flex flex-column btn btn-danger mb-2 float-left col-md-1">
                        <a href="{{route('admin.dashboard')}}" style="text-decoration-line: none" class="text-white ml-3"><i class="fa-solid fa-arrow-left-long p-1">
                            </i>Back</a>
                    </button>
                    @if (session('success'))
                        @include('admin.partials.success')
                    @endif
                    @if(!empty($state) && $state->count())
                    <div class="card">
                        <div class="card-header bgsize-primary-4 white card-header">
                        <h4 class="card-title" style="padding-top: 10px">Student List Table in {{$Negeri}}</h4>
                <form class="row g-3 pt-3" action="{{route('admin.allocation.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                            <select class="form-select" name="svName" aria-label="Default select example"> 
                                <option value="">Select a supervisor</option>
                                    @foreach ($supvervisorsList as $sv)
                                        <option value="{{$sv->id}}">{{$sv->name}}</option>
                                    @endforeach
                            </select> 
                            @error('svName')
                            <span class="text-danger">{{'*'.$message}}</span>
                            @enderror
                            @error('ids')
                            <span class="text-danger">{{'*'.$message}}</span>
                            @enderror  
                        </div>
                            
                        <div class="card-body">
                            <div class=" card-content table-responsive">

                                <table id="student_t" class="table table-hover table-bordered text-nowrap" style="width:100%">

                                    <thead>
                                        
                                        <th><input id="checkAllRows" type="checkbox" class="form-check-input check" /></th>
                                        <th>#</th>
                                        <th>No_Matrik</th>
                                        <th>No_KP</th>
                                        <th>Nama</th>
                                        <th>Poskod</th>
                                        <th>Bandar</th>
                                        <th>Negeri</th>
                                        <th>Tahun_Pengajian</th>
                                        <th>No_Tel_Pelajar</th>
                                        <th>Nama_Syarikat_LI</th>
                                        <th>Sektor</th>
                                        <th>Sektor_Ekonomi</th>
                                        <th>Pegawai</th>
                                        <th>No_Tel_Syarikat</th>
                                        <th>No_Faks_Syarikat</th>
                                        <th>Tarikh_Mula_LI</th>
                                        <th>Program</th>
                                        <th>Status</th>
                                    </thead>
                                    

                                    <tbody>

                                    
                                            @php
                                            $rowNumber = 1;
                                            @endphp
                                        @foreach($state as $row)
                                        
                                            <tr>
                                                
                                                <td> <input class="form-check-input check" type="checkbox" value="{{$row->id}}" id="CheckedRow" name="ids[]"></td>
                                                <td>{{$rowNumber++}}</td>
                                                <td>{{ $row->No_Matrik }}</td>
                                                <td>{{ $row->No_KP }}</td>
                                                <td>{{ $row->Nama }}</td>
                                                <td>{{ $row->Poskod }}</td>
                                                <td>{{ $row->Bandar }}</td>
                                                <td>{{ $row->Negeri }}</td>
                                                <td>{{ $row->Tahun_Pengajian }}</td>
                                                <td>{{ $row->No_Tel_Pelajar }}</td>
                                                <td>{{ $row->Nama_Syarikat_LI }}</td>
                                                <td>{{ $row->Sektor }}</td>
                                                <td>{{ $row->Sektor_Ekonomi }}</td>
                                                <td>{{ $row->Pegawai }}</td>
                                                <td>{{ $row->No_Tel_Syarikat }}</td>
                                                <td>{{ $row->No_Faks_Syarikat }}</td>
                                                <td>{{ $row->Tarikh_Mula_LI }}</td>
                                                <td>{{ $row->Program }}</td>
                                                <td>{{ $row->Status }}</td>
                                            </tr>

                                        @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                            <button type="submit" name="assign" class="m-2 btn btn-primary" id="AssignSupervisors"
                             value="assigne"><i class="fa-solid fa-person-circle-plus p-1 fa-lg"></i>
                             Assign Supervisor
                            </button>
                            <button type="submit" name="assignAndNotify" value="assignAndNotify" class="m-2 btn btn-info text-light"
                             id="AssignSupervisors"><i class="fas fa-envelope mr-2"></i>
                             Assign & Notify Supervisor
                            </button>
                        </div>
                         
                    </form>
                </div>
                @else
                <div class="card">
                <div class="card-body container mt-1 bgsize-primary-5 d-flex flex-row">
                    <div class=" card-content table-responsive">
                        <p class="h4">All Students are Assigned to Supervisors in {{$Negeri}}</p>
                        <p class="text-secondary">Check the table below</p>
                    </div>
                </div>
                </div>

                @endif
                </div>
                </div>
        </div>
        {{-- Include the View of Allocated students in that State --}}
        <div class="container">
            @include('admin.studentWithSV')
        </div>
    </div>
            {{-- JS code to select all checkboxes --}}
            <script>
            document.getElementById('checkAllRows').onclick = function() {
                var checkboxes = document.querySelectorAll('input[id="CheckedRow"]');
                    for (var checkbox of checkboxes) {
                    checkbox.checked = this.checked;
                    }
                }
            </script>

    </body>
</x-app-layout>
