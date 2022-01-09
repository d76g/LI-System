<x-app-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Faculty Supervisors Record
        </h2>
    </x-slot>
        <div class="container-md  pt-3 " style="margin-top: 2rem">
            <h2>Edit Supervisor Record</h2>
            <div class="container-md pt-4 bg-primary text-white rounded" >
                @if (session('success'))
                    @include('supervisor.partials.index')
                @endif
                
                <form class="row g-3 pt-3" action="{{URL::to('supervisor/edit', $svData ->staff_id)}}" method="GET">
                    @csrf
                    @method('PUT')
                    <div class="col-md-8">
                        <label for="inputEmail4" class="form-label">Full Name</label>
                        <input name="name" type="text" class="form-control" id="svname" value="{{$svData->name}}">

                        @error('name')
                            <span class="text-light">{{'*'.$message}}</span>
                        @enderror
                    </div>
                    <div class="col-4">
                        <label for="inputAddress" class="form-label">Staff ID</label>
                        <input name="staff_id" type="text" class="form-control" id="svid" value="{{$svData->staff_id}}">
                        @error('staff_id')
                            <span class="text-light">{{'*'.$message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Email</label>
                        <input name="Email" type="email" class="form-control" id="svemail" value="{{$svData->email}}">
                        @error('Email')
                            <span class="text-light">{{'*'.$message}}</span>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="inputAddress" class="form-label">Office Phone Number</label>
                        <input  name="phone" type="text" class="form-control" id="inputAddress" value="{{$svData->office_phone_number}}">
                    </div>
                    <div class="col-4" style="margin-bottom: 2rem">
                        <button type="submit" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Update Record</button>
                      </div>
                </form>
                
            </div>
        </div>
</x-app-layout>
