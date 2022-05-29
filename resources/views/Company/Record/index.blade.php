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
                     @include('company.partials.index')
                @endif
                
                <form class="row g-3 pt-3" action="{{URL::to('company/create')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('GET')
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
                    <div class="my-2 ml-2">
                        @include('company.partials.filter')
                    </div>
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
                        @php
                            $i = 1;
                        @endphp
                        @if (count($company) > 0)
                            @foreach($company as $row)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->eco_sector }}</td>
                                <td>{{ $row->sector }}</td>
                                <td>{{ $row->email }}</td>
                                <td>{{'+60'.$row->phone_number }}</td>
                                <td>
                                    <div class="d-grid gap-1 d-md-flex justify-content-md">
                                        <a href="company/{{$row->id}}/edit"><button type="button" class="btn btn-success" alt="Edit"><i class="fa fa-pencil-square" aria-hidden="true"></i>
                                            Edit</button></a>
                                        <form action="{{ route('company.destroy', $row -> id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <a onclick="return confirm('Are you sure to Delete this record?')"><button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true" ></i> Delete</button></a>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        @else
                            <p class="h3 text-danger text-center m-3">No Record found</p>
                            <p class="text-center fw-light"><i class="fa fa-plus" aria-hidden="true"></i> Add new Company record</p>
                        @endif
                    </tbody>
                  </table>
                <div class="my-2 px-4">
                    {{$company->appends(request()->only('id'))->links()}}
                </div>
            </div>
            
        </div>
        <div class="container mt-5">
            <div class="pb-2">
                <h1>Company Review</h1>
                <h5>Review by Students and Supervisors</h5>
            </div>
            <div class="row">
                @if (count($company) > 0)
                
                    @foreach ($company as $data)
                        <div class="col-md-4 mt-1 mb-3">
                            <div class="card p-3">
                                <div class="d-flex flex-row mb-3"><img src="{{Storage::URL($data->image_path)}}" width="70" alt="Company Image">
                                    <div class="d-flex flex-column ml-2"><span>{{ $data->name }}</span>
                                        <span class="text-black-50">{{ $data->eco_sector }}</span>
                                        <span></span>
                                        {{-- <span class="text-black-50">
                                            
                                                @foreach ($data->rating as $rate)
                                                    {{$rate->rating}}
                                                @endforeach
                                        </span> --}}
                                    </div>
                                </div>

                                <h6>{{'Email: ' . $data->email}}</h6>

                                <div class="d-flex justify-content-between install mt-3">
                                    <span>{{'Contact Number: ' .'+60'.$data->phone_number }}</span>
                                    <span class="text-primary"><a href="{{route('comment.show',$data->id)}}">View&nbsp;<i class="fa fa-angle-right"></i></a></span></div>
                            </div>
                        </div>
                    @endforeach
                        {{$company->appends(request()->only('id'))->links()}}
                    @else
                        <p class="h5 text-danger text-center m-3">No Record found</p>
                @endif
            </div>
        </div>
</x-app-layout>
