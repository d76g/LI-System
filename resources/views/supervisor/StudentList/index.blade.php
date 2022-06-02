<x-app-layout>
    <x-slot name="header">
        <link rel="icon" type="image/png" href="{{ asset('lifav.png') }}">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Students List</h2>
    </x-slot>
    <div class="container card mt-4">
        <div class="bg-light my-3 rounded">
            <div class="my-2 px-3 d-flex flex-row col-md-14">
                @include('supervisor.Studentlist.filter')
                <div class="col-md-2 float float-end">
                    <form action="{{route('supervisors.exportData')}}" method="POST">
                        @csrf
                        @method('GET')
                      <button class="btn btn-outline-secondary ml-1 p-2" type="submit" id="button-addon2">
                        <i class="fas fa-file-download"></i>
                      </button>
                    </form>
                </div>
                
            </div>
        <div class="card-body" style="height:50%">
            <div class=" card-content table-responsive">

                <table id="student_t" class="table table-hover text-nowrap" style="width:100%">

                    <thead>
                    <th class="table-secondary">No_Matrik</th>
                    <th class="table-secondary">No_KP</th>
                    <th class="table-secondary">Nama</th>
                    <th class="table-secondary">Tahun_Pengajian</th>
                    <th class="table-secondary">No_Tel_Pelajar</th>
                    <th class="table-secondary">Nama_Syarikat_LI</th>
                    <th class="table-secondary">Sektor</th>
                    <th class="table-secondary">Sektor_Ekonomi</th>
                    <th class="table-secondary">Poskod</th>
                    <th class="table-secondary">Bandar</th>
                    <th class="table-secondary">Negeri</th>
                    <th class="table-secondary">Pegawai</th>
                    <th class="table-secondary">No_Tel_Syarikat</th>
                    <th class="table-secondary">No_Faks_Syarikat</th>
                    <th class="table-secondary">Tarikh_Mula_LI</th>
                    <th class="table-secondary">Program</th>
                    <th class="table-secondary">Status</th>
                  </thead>
                  

                    <tbody>

                    @if(!empty($students) && $students->count())

                        @foreach($students as $row)
                            <tr>
                                <td>{{ $row->No_Matrik }}</td>
                                <td>{{ $row->No_KP }}</td>
                                <td>{{ $row->Nama }}</td>
                                <td>{{ $row->Tahun_Pengajian }}</td>
                                <td>{{ $row->No_Tel_Pelajar }}</td>
                                <td>{{ $row->Nama_Syarikat_LI }}</td>
                                <td>{{ $row->Sektor }}</td>
                                <td>{{ $row->Sektor_Ekonomi }}</td>
                                <td>{{ $row->Poskod }}</td>
                                <td>{{ $row->Bandar }}</td>
                                <td>{{ $row->Negeri }}</td>
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

                            <td colspan="10">There are no data matching the search.</td>

                        </tr>

                    @endif
                    </tbody>
                </table>

            </div>
            <div class="px-2">
              <p>{{$students->links()}}</p>
            </div>
        </div>
    </div>

        {{-- Queried Data Table --}}
    </div>
    </div>
    <script>
        document.getElementById("filter_negeri").addEventListener("change", function () {
        let negeri = this.value || this.options[this.selectedIndex].value;
        window.location.href =
            window.location.href.split("?")[0] + "?negeri=" + negeri;
        });
        document.getElementById("sv-btn-refresh").addEventListener("click", () => {
        select = document.getElementById("filter_negeri")
        select.selectedIndex = 0;
        window.location.href = window.location.href.split("?")[0];
    });
    </script>
</x-app-layout>