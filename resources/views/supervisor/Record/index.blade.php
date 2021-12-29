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
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                      <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                    </symbol>
                  </svg>
                <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:" aria-label="Close"><use xlink:href="#check-circle-fill"/></svg>
                    <div>
                      <strong>{{session('success')}}</strong>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  </div>
                @endif
                
                <form class="row g-3 pt-3" action="{{route('addSvData')}}" method="POST">
                    @csrf
                    <div class="col-md-8">
                        <label for="inputEmail4" class="form-label">Full Name</label>
                        <input name="name" type="text" class="form-control" id="svname" placeholder="Full Name">

                        @error('name')
                            <span class="text-light">{{'*'.$message}}</span>
                        @enderror
                    </div>
                    <div class="col-4">
                        <label for="inputAddress" class="form-label">Staff ID</label>
                        <input name="Staff_id" type="text" class="form-control" id="svid" placeholder="Staff ID">
                        @error('Staff_id')
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
                        @php
                            $x= 0;
                        @endphp
                        @foreach($svData as $row)
                        <tr>
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->staff_id }}</td>
                            <td>{{ $row->email }}</td>
                            <td>{{'+60'.$row->office_phone_number }}</td>
                            <td>
                                <button type="button" class="btn btn-success" alt="Edit"><i class="fa fa-pencil-square" aria-hidden="true"></i>
                                    Edit</button>
                                <button type="button" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
</x-app-layout>
