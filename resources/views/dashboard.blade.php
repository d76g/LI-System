<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Welcome .. <b>{{Auth::user()->name}}</b>
            <b style="float: right;">Total users 
                <span class="badge bg-danger">{{ count($users) }}</span>
            </b>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <table class="table table-hover table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">No.Matrik</th>
                        {{-- <th scope="col">No.KP</th> --}}
                        <th scope="col">Nama</th>
                      </tr>
                    </thead>
                    @php($i = 1);
                    @foreach ( $users as $user )
                    <tbody>
                        <tr>
                          <th scope="row">{{$i++}}</th>
                          <td>{{$user->No_Matrik}}</td>
                          {{-- <td>{{$user->No_KP}}</td> --}}
                          <td>{{$user->Nama}}</td>
                    @endforeach
                    
                  </table>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <table class="table table-hover table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">Post Code</th>
                        <th scope="col">City</th>
                        {{-- <th scope="col">No.KP</th> --}}
                        <th scope="col">State</th>
                      </tr>
                    </thead>
                    @foreach ( $location as $locations )
                    <tbody>
                        <tr>
                          <th scope="row">{{$locations->Poskod}}</th>
                          <td>{{$locations->Bandar}}</td>
                          {{-- <td>{{$user->No_KP}}</td> --}}
                          <td>{{$locations->Negeri}}</td>
                    @endforeach
                    
                  </table>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <table class="table table-hover table-bordered">
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
                          <td>{{$states->NumberOfStudents}}</td>
                    @endforeach
                  </table>
            </div>
        </div>
    </div>
</x-app-layout>
