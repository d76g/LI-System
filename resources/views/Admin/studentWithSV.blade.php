
<body>
    <div class="card mt-4">
        <div class="card-header bgsize-primary-4 gray card-header">                   
            <h4 class="card-title" style="padding-top: 10px">Allocated Students</h4>

        <div class="card-body">
            <div class=" card-content table-responsive">

                <table id="student_t" class="table table-hover table-bordered text-nowrap" style="width:100%">

                    <thead>
                        
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

                    @if(!empty($allocatedStudents) && $allocatedStudents->count())
                            @php
                            $rowNumber = 1;
                            @endphp
                        @foreach($allocatedStudents as $row)
                            <tr>
                                
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

                        <tr>

                            <td colspan="10">There are no data.</td>

                        </tr>

                    @endif
        
                    </tbody>
                    
                </table>
            </div>
        </div>
    </div>
</div>    
</body>
