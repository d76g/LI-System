<x-app-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Faculty Supervisors Record
        </h2>
    </x-slot>
        <div class="container-md  pt-3 " style="margin-top: 2rem">
            <h2>Add Supervisor Record</h2>
            <div class="container-md pt-4 bg-primary text-white rounded" >
                @if (session('success'))
                    @include('supervisor.partials.index')
                @endif
                
                <form class="row g-3 pt-3" action="{{URL::to('supervisor/create')}}" method="POST">
                    @csrf
                    @method('GET')
                    <div class="col-md-8">
                        <label for="inputEmail4" class="form-label">Full Name</label>
                        <input name="name" type="text" class="form-control" id="svname" placeholder="Full Name">

                        @error('name')
                            <span class="text-light">{{'*'.$message}}</span>
                        @enderror
                    </div>
                    <div class="col-4">
                        <label for="inputAddress" class="form-label">Staff ID</label>
                        <input name="staff_id" type="text" class="form-control" id="svid" placeholder="Staff ID">
                        @error('staff_id')
                            <span class="text-light">{{'*'.$message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Email</label>
                        <input name="Email" type="email" class="form-control" id="svemail" placeholder="example@uthm.edu">
                        @error('Email')
                            <span class="text-light">{{'*'.$message}}</span>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="inputAddress" class="form-label">Office Phone Number</label>
                        <input  name="phone" type="text" class="form-control" id="inputAddress" placeholder="+60">
                    </div>
                    <div class="col-4" style="margin-bottom: 2rem">
                        <button type="submit" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Add Supervisor</button>
                      </div>
                </form>
            </div>
        </div>

        <div class="container-lg" style="margin-top: 3rem">
            <div class="svrecord card">
                <div>
                    <h2 class="card-header">Supervisors Records</h2>
                </div>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Staff ID</th>
                        <th scope="col">Email</th>
                        <th scope="col">Office Number</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        {{-- @php
                            $x= 1;
                        @endphp --}}
                        @if (count($svData) > 0)
                            @foreach($svData as $row)
                            <tr>
                                <td>{{$svData->firstItem()+$loop->index}}</td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->staff_id }}</td>
                                <td>{{ $row->email }}</td>
                                <td>{{'+60'.$row->office_phone_number }}</td>
                                <td>
                                    <a href="{{URL::to('supervisor/edit')}}"><button type="button" class="btn btn-success" alt="Edit"><i class="fa fa-pencil-square" aria-hidden="true"></i>
                                        Edit</button></a>
                                    <a href=""> <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button></a>
                                    {{-- <form action="" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <input type="submit" value="Delete" class="fa fa-trash btn btn-danger">
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
                                    </form> --}}
                                </td>
                            </tr>
                            @endforeach
                        @else
                            <p class="h3 text-danger text-center m-3">No Record found</p>
                            <p class="text-center fw-light"><i class="fa fa-plus" aria-hidden="true"></i> Add new supervisor record</p>
                        @endif
                       
                    </tbody>

                  </table>
                  <div class="px-5">
                    <p>{{$svData->onEachSide(5)->links()}}</p>
                  </div>
                  
            </div>
            
        </div>
</x-app-layout>
