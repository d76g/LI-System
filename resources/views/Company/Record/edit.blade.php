<x-app-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Internship Companies Records
        </h2>
    </x-slot>
        <div class="container-md  pt-3 " style="margin-top: 2rem">
            <h2>Edit Company</h2>
            <div class="container-md pt-4 bg-info bg-gradient text-white rounded" >
                @if (session('success'))
                     @include('company.partials.index')
                @endif
                
                <form class="row g-3 pt-3" action="{{route('company.update',$companyData->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Company Name</label>
                        <input name="name" type="text" class="form-control" value="{{$companyData->name}}">

                        @error('name')
                            <span class="text-light">{{'*'.$message}}</span>
                        @enderror
                    </div>
                    <div class="col-3">
                        <label for="inputAddress" class="form-label">Economic Sector</label>
                        <input name="eco_sector" type="text" class="form-control" value="{{$companyData->eco_sector}}">
                        @error('eco_sector')
                            <span class="text-light">{{'*'.$message}}</span>
                        @enderror
                    </div>
                    <div class="col-3">
                        <label for="inputSector" class="form-label">Sector</label>
                        <input  name="sector" type="text" class="form-control" id="inputAddress" value="{{$companyData->sector}}">
                        @error('sector')
                            <span class="text-light">{{'*'.$message}}</span>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="inputPassword4" class="form-label">Email</label>
                        <input name="email" type="email" class="form-control" id="svemail" value="{{$companyData->email}}">
                        @error('email')
                            <span class="text-light">{{'*'.$message}}</span>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="inputAddress" class="form-label">Office Phone Number</label>
                        <input  name="phone_number" type="text" class="form-control" id="inputAddress" value="{{$companyData->phone_number}}">
                        @error('phone_number')
                            <span class="text-light">{{'*'.$message}}</span>
                        @enderror
                    </div>
                    <div class=" col-6 input-group ">
                        <label for="inputAddress" class="form-label">Company Image</label>
                        <div class="input-group mb-3">
                            <input name="image" type="file" class="form-control" id="inputGroupFile02" value="{{$companyData->image_path}}">
                            <label  class="input-group-text" for="inputGroupFile02">Upload</label>
                        </div>
                        <figure class="figure">
                            <img class="figure-img img-fluid rounded" src="{{Storage::URL($companyData->image_path)}}" width="180" alt="Company Image">
                            <figcaption class="figure-caption text-left text-white">Current Image</figcaption>
                        </figure>
                        
                        @error('image')
                            <span class="text-light">{{'*'.$message}}</span>
                        @enderror
                    </div>
                    
                    <div class="col-3" style="margin-bottom: 1rem">
                        <button type="submit" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Update Record</button>
                        <a href="{{URL::to('company')}}"><button class="btn btn-danger float-right"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Go Back</button></a>
                    </div>
                </form>
            </div>
        </div>
</x-app-layout>