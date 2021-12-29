<x-app-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Internship Companies Records
        </h2>
    </x-slot>
        <div class="container-md  pt-3 " style="margin-top: 2rem">
            <h2>Add Company</h2>
            <div class="container-md pt-4 bg-info bg-gradient text-white rounded" >
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
                
                <form class="row g-3 pt-3" action="{{route('addCompanyData')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Company Name</label>
                        <input name="name" type="text" class="form-control" id="svname" placeholder="Company Name">

                        @error('name')
                            <span class="text-light">{{'*'.$message}}</span>
                        @enderror
                    </div>
                    <div class="col-3">
                        <label for="inputAddress" class="form-label">Economic Sector</label>
                        <input name="eco_sector" type="text" class="form-control" id="svid" placeholder="Eco Sector">
                        @error('eco_sector')
                            <span class="text-light">{{'*'.$message}}</span>
                        @enderror
                    </div>
                    <div class="col-3">
                        <label for="inputSector" class="form-label">Sector</label>
                        <input  name="sector" type="text" class="form-control" id="inputAddress" placeholder="Technology Sector">
                        @error('sector')
                            <span class="text-light">{{'*'.$message}}</span>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="inputPassword4" class="form-label">Email</label>
                        <input name="email" type="email" class="form-control" id="svemail" placeholder="example@mail.my">
                        @error('email')
                            <span class="text-light">{{'*'.$message}}</span>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="inputAddress" class="form-label">Office Phone Number</label>
                        <input  name="phone_number" type="text" class="form-control" id="inputAddress" placeholder="+60">
                        @error('phone_number')
                            <span class="text-light">{{'*'.$message}}</span>
                        @enderror
                    </div>
                    <div class=" col-6 input-group ">
                        <label for="inputAddress" class="form-label">Company Image</label>
                        <div class="input-group mb-3">
                            <input name="image" type="file" class="form-control" id="inputGroupFile02">
                            <label  class="input-group-text" for="inputGroupFile02">Upload</label>
                        </div>
                        @error('image')
                            <span class="text-light">{{'*'.$message}}</span>
                        @enderror
                    </div>
                    
                    <div class="col-3" style="margin-bottom: 2rem">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Add Company</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="container-lg" style="margin-top: 3rem">
            <div class="svrecord card">
                <div>
                    <h2 class="card-header">Company Records</h2>
                </div>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Company Name</th>
                        <th scope="col">Eco Sector</th>
                        <th scope="col">Sector</th>
                        <th scope="col">Email</th>
                        <th scope="col">Office Number</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($company as $row)
                        <tr>
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->eco_sector }}</td>
                            <td>{{ $row->sector }}</td>
                            <td>{{ $row->email }}</td>
                            <td>{{'+60'.$row->phone_number }}</td>
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
        <div class="container mt-5">
            <div class="pb-5">
                <h1>Company Review</h1>
                <h5>Review by Students and Supervisors</h5>
            </div>
            <div class="row">
                @foreach ($company as $data)
                    
                
                <div class="col-md-4">
                    <div class="card p-3">
                        <div class="d-flex flex-row mb-3"><img src="{{url('/images/'. $data->image_path)}}" width="70" alt="Company Image">
                            <div class="d-flex flex-column ml-2"><span>{{ $data->name }}</span><span class="text-black-50">{{ $data->eco_sector }}</span><span class="ratings"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span></div>
                        </div>
                        <h6>{{'Email: ' . $data->email}}</h6>
                        <div class="d-flex justify-content-between install mt-3"><span>{{'Contact Number: ' .'+60'.$data->phone_number }}</span><span class="text-primary">View&nbsp;<i class="fa fa-angle-right"></i></span></div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        
</x-app-layout>
