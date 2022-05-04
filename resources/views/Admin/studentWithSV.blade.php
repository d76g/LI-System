
<body>
    <div class="card mt-4">
        <div class="card-header bgsize-primary-4 gray card-header"> 
            
            
                 

                @if(!empty($allocatedStudents) && $allocatedStudents->count())
                
                    <form class="row g-3 pt-3" action="{{route('admin.allocation.update',[$allocatedStudents->first()->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="container mt-3 bgsize-primary-5 d-flex flex-row">
                        <h4 class="pl-3" style="padding-top: 10px">Allocated Students</h4>
                        <button type="submit" class="btn btn-danger m-2" id="AssignSupervisors"><i class="fa-solid fa-person-circle-minus p-1 fa-lg"></i>Remove</button>
                    </div>                  
             <div class="card-body">
                    <div class=" card-content table-responsive">
                        <p>* Select students to remove the supervisor by checking the checkboxes</p>
                        <table id="student_t" class="table table-hover table-bordered text-nowrap" style="width:100%">

                            <thead>
                                <th><input id="checkAllAssignedRows" type="checkbox" class="form-check-input check" /></th>
                                <th>#</th>
                                <th>No_Matrik</th>
                                <th>No_KP</th>
                                <th>Nama</th>
                                <th>Poskod</th>
                                <th>Bandar</th>
                                <th>Negeri</th>
                                <th>Faculty SV</th>
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
                                @foreach($allocatedStudents as $row)
                                    <tr>
                                        <td> <input class="form-check-input check" type="checkbox" value="{{$row->id}}" id="assingedCheckedRow" name="ids[]"></td>
                                        <td>{{$rowNumber++}}</td>
                                        <td>{{ $row->No_Matrik }}</td>
                                        <td>{{ $row->No_KP }}</td>
                                        <td>{{ $row->Nama }}</td>
                                        <td>{{ $row->Poskod }}</td>
                                        <td>{{ $row->Bandar }}</td>
                                        <td>{{ $row->Negeri }}</td>
                                        <td>{{ $row->supervisor->name }}</td>
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

                        @else
                        <div class="card-body container mt-3 bgsize-primary-5 d-flex flex-row">
                            <div class=" card-content table-responsive">
                                <p class="h4">No Allocated Students</p>
                                <p class="text-secondary">Assign using the above form ..</p>
                            </div>
                        </div>
                        @endif
        
                    </tbody>
                    
                </table>
            </div>
        </div>
        </form>
    </div>
</div>  
    <script>
    document.getElementById('checkAllAssignedRows').onclick = function() {
                var checkboxes = document.querySelectorAll('input[id="assingedCheckedRow"]');
                    for (var checkbox of checkboxes) {
                    checkbox.checked = this.checked;
                    }
                }
    </script>  
</body>
