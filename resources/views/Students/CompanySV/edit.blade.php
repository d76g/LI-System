<x-app-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Company Supervisors Record
        </h2>
    </x-slot>
        <div class="container-md  pt-3 " style="margin-top: 2rem">
            <h2>Edit Supervisor Record</h2>
            <div class="container-md pt-4 bg-info text-white rounded" >
                @if (session('success'))
                    @include('students.CompanySv.partials.success')
                @endif
                
                <form class="row g-3 pt-3" action="{{route('student.companysv.update',$companysv->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="col-md-6">
                        <label class="form-label">Full Name</label>
                        <input name="name" type="text" class="form-control" id="svname" value="{{$companysv->name}}">

                        @error('name')
                            <span class="text-light">{{'*'.$message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Email</label>
                        <input name="email" type="email" class="form-control" id="svemail" value="{{$companysv->email}}">
                        @error('email')
                            <span class="text-light">{{'*'.$message}}</span>
                        @enderror
                    </div>
                    <div class="col-4">
                        <label  class="form-label">Phone Number</label>
                        <input  name="phone" type="text" class="form-control" id="inputAddress" value="{{$companysv->phone_number}}">
                    </div>
                    <div class="col-8">
                        <label class="form-label " for="inputState">Choose Company*</label>
                        <select class="form-control py-2" name="company">
                          <option selected>{{$companysv->company}}</option>
                          @foreach ($companyName as $item)
                          <option class="h-10">{{$item->name}}</option>
                          @endforeach
                        </select>
                        @error('company')
                            <span class="text-light">{{'*'.$message}}</span>
                        @enderror
                    </div>
                    <div class="col-4" style="margin-bottom: 2rem">
                        <button type="submit" class="btn btn-success"> Update !</button>
                    </div>
                </form>
            </div>
        </div>
</x-app-layout>
