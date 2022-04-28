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
                    <div class="card">
                        <div class="card-header bgsize-primary-4 white card-header">
                                
                                <h4 class="card-title" style="padding-top: 10px">Student List Table in - {{$states}}</h4>
                <form class="row g-3 pt-3" action="" method="POST" enctype="multipart/form-data">
                @csrf
                @method('GET')
                            <select class="form-select" name="svName" aria-label="Default select example">
                                <option selected>Select a supervisor</option>
                                    @foreach ($superviros as $sv)
                                        <option value="{{$sv->id}}">{{$sv -> name}}</option>
                                    @endforeach 
                            </select>   
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
                                        <th>Penyelia_Fakulti</th>
                                        <th>Program</th>
                                        <th>Status</th>
                                    </thead>
                                    

                                    <tbody>

                                    @if(!empty($negeri) && $negeri->count())
                                            @php
                                            $rowNumber = 1;
                                            @endphp
                                        @foreach($negeri as $row)
                                        
                                            <tr>
                                                
                                                <td> <input class="form-check-input check" type="checkbox" value="" id="CheckedRow" name="studentRecord"></td>
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
                                                <td>{{ $row->Penyelia_Fakulti_id }}</td>
                                                <td>{{ $row->Program }}</td>
                                                <td>{{ $row->Status }}</td>
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
                            <button type="submit" class="m-2 btn btn-primary">Assign Supervisor</button>
                        </div>
                    </form>
                </div>
                </div>
                </div>
        </div>
    </div>
    <script>

    document.getElementById('checkAllRows').onclick = function() {
        var checkboxes = document.querySelectorAll('input[type="checkbox"]');
            for (var checkbox of checkboxes) {
             checkbox.checked = this.checked;
            }
        }
    </script>
    </body>
</x-app-layout>
