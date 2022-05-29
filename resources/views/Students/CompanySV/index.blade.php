<x-app-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Supervisors Record
        </h2>
    </x-slot>
    @empty($companysv)
    <div class="container-md  pt-3 " style="margin-top: 2rem">
        <h3>Add Your Company Supervisor Infomation</h3>
        <div class="container-md pt-4 bg-info text-white rounded" >
            @if (session('success'))
                @include('students.CompanySv.partials.success')
            @endif
            
            <form class="row g-3 pt-3" action="{{route('student.companysv.store')}}" method="POST">
                @csrf
                <div class="col-md-6">
                    <label class="form-label">Full Name*</label>
                    <input name="name" type="text" class="form-control" id="svname" placeholder="Full Name">

                    @error('name')
                        <span class="text-light">{{'*'.$message}}</span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label">Email*</label>
                    <input name="email" type="email" class="form-control" id="svemail" placeholder="example@mail">
                    @error('email')
                        <span class="text-light">{{'*'.$message}}</span>
                    @enderror
                </div>
                <div class="col-4">
                    <label  class="form-label">Phone Number</label>
                    <input  name="phone" type="text" class="form-control" id="inputAddress" placeholder="+60">
                    @error('phone')
                        <span class="text-light">{{'*'.$message}}</span>
                    @enderror
                </div>
                <div class="col-8">
                    <label class="form-label " for="inputState">Choose Company*</label>
                    <select class="form-control py-2" name="company">
                      <option>Choose...</option>
                      @foreach ($companyName as $item)
                      <option class="h-10">{{$item->name}}</option>
                      @endforeach
                    </select>
                    <small class="form-text text-muted">
                        Check if the company all ready exists ...
                    </small>
                    @error('company')
                        <span class="text-light">{{'*'.$message}}</span>
                    @enderror
                </div>
                
                <div class="col-4" style="margin-bottom: 2rem">
                    <button type="submit" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Add Supervisor</button>
                </div>
            </form>
        </div>
    </div>
    {{-- SV Info Card --}}
    @else
    <div class="container-md my-4 rounded ">
        
        <div class="py-4">
            <h4 class="animate__animated animate__bounce"><i class="fas fa-building mr-1"></i>Company Supervisor Details</h4>
            <div class="card animate__animated animate__bounceIn" style="width: 24rem;">
                <div class="card-body">
                    @if (session('success'))
                        @include('students.CompanySv.partials.success')
                    @endif
                    <h5 class="card-title">{{$companysv->name}}</h5>
                    <a href="mailto::{{$companysv->email}}" class="text-decoration-none" data-toggle="tooltip" data-placement="top" title="Send Email">
                        <h6 class="card-subtitle mb-2 text-muted"><i class="fas fa-envelope mr-1"></i>{{$companysv->email}}</h6></a>
                    <h6 class="card-subtitle mb-2 text-muted"><i class="fas fa-phone mr-1"></i>{{$companysv->phone_number}}</h6>
                    <h6 class="card-subtitle mb-2 text-muted"><i class="fas fa-building mr-1"></i>{{$companysv->company}}</h6>
                    <div class="d-flex flex-row justify-content-between">
                        <a href="{{route('student.companysv.edit',$companysv->id)}}" class="card-link">Edit</a>
                        <form action="{{route('student.companysv.destroy',$companysv->id)}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="card-link text-danger" onclick="return confirm('Are You Sure?');"><i class="fa fa-trash" aria-hidden="true"></i></button> 
                        </form>
                    </div>
                </div>
              </div>
        </div>
    </div>
    @endempty
    <hr class="animate__animated animate__fadeInLeft" style="width: 50%; margin: auto;">
    <div class="container-md my-4 rounded ">
        
        <div class="py-2">
            <h4 class="animate__animated animate__bounce"><i class="fas fa-address-card mr-1"></i>Faculty Supervisor Details</h4>
            <div class="card animate__animated animate__bounceIn" style="width: 24rem;">
                <div class="card-body">
                    @empty($studentList)
                        <h5 class="card-title">If You do not see your supervisor name, it might be for the following issues</h5>
                        <h6 class="card-subtitle mb-2 text-muted">You name does not match the name provided by UTHM.</h6>
                        <h6 class="card-subtitle mb-2 text-muted">Or, a supervisor is not assigned yet.</h6>
                    @endempty
                    <h5 class="card-title">{{$studentList->Supervisor->name}}</h5>
                    <a href="mailto:{{$studentList->Supervisor->email}}" class="text-decoration-none" data-toggle="tooltip" data-placement="top" title="Send Email">
                    <h6 class="card-subtitle mb-2 text-muted"><i class="fas fa-envelope mr-1"></i>{{$studentList->Supervisor->email}}</h6></a>
                </div>
              </div>
        </div>
    </div>
    <hr class="animate__animated animate__fadeInLeft" style="width: 50%; margin: auto;">
    <div class="container-md my-4 rounded ">
        
        <div class="py-2">
            <h4 class="animate__animated animate__bounce"><i class="fas fa-handshake mr-1"></i>Meetings</h4>
            <p class="animate__animated animate__bounce text-muted">Faculty Supervisor meetings schedule with your Company Supervisor</p>
            @foreach ($meeting as $meet)
            <div class="card animate__animated animate__bounceIn my-2" style="width: 24rem;">
                <div class="card-body">
                        <h5 class="card-title">{{$meet->title}}</h5>
                        <h6 class="card-subtitle mb-2 text-muted"><i class="fas fa-calendar-day mr-1"></i>{{$meet->time}}</h6>
                        <h6 class="card-subtitle mb-2 text-muted"><i class="fa-solid fa-location-dot mr-1"></i>{{$meet->type}}</h6>
                        <a class="text-dark text-decoration-none" href="{{$meet->link}}"><h6 class="card-subtitle mb-2 text-muted"><i class="fa-solid fa-link mr-1"></i>{{$meet->link ?? 'Meeting Offline'}}</h6></a>
                        <h6 class="card-subtitle mb-2 text-muted"><i class="fas fa-address-card mr-1"></i>{{$meet->Supervisor->name}}</h6>
                </div>
            </div>
            @endforeach

            @if (!isset($meeting))
                <h1>Empty</h1>
            @endif

        </div>
    </div>
        

</x-app-layout>
