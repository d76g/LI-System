<x-app-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Meetings Page
        </h2>
    </x-slot>
    <div class="container-md  pt-3 " style="margin-top: 2rem">
        <h3>Make a meeting</h3>
        <div class="container-md pt-4 bg-light text-dark rounded" >
            @if (session('success'))
                @include('supervisor.meeting.partials.success')
            @endif
            
            <form class="row g-3 pt-3" action="{{route('supervisors.meeting.store')}}" method="POST">
                @csrf
                <div class="col-md-6">
                    <label class="form-label">Meeting Title</label>
                    <input name="title" type="text" class="form-control" id="svname" placeholder="Meeting For...">

                    @error('title')
                        <span class="text-dark">{{'*'.$message}}</span>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label class="form-label">Meeting Time</label>
                    <input name="time" type="datetime-local" class="form-control" id="svemail">
                    @error('time')
                        <span class="text-dark">{{'*'.$message}}</span>
                    @enderror
                </div>
                <div class="col-3 custom-control-inline pt-4">
                    <div class="custom-control custom-radio ">
                        <input type="radio" id="customRadioInline1" name="type" class="custom-control-input" value="Online">
                        <label class="form-label" for="customRadioInline1">Online</label>
                      </div>
                      <div class="custom-control custom-radio">
                        <input type="radio" id="customRadioInline2" name="type" value="Company Visit" class="custom-control-input">
                        <label class="custom-control-label" for="customRadioInline2">Company Visit</label>
                    </div>
                    @error('type')
                        <span class="text-dark">{{'*'.$message}}</span>
                    @enderror
                </div> 
                <div class="col-6">
                    <label  class="form-label">Meeting Link</label>
                    <input  name="link" type="url" class="form-control" id="inputAddress" placeholder="Zoom or Google Meet">
                    @error('link')
                        <span class="text-dark">{{'*'.$message}}</span>
                    @enderror
                </div>
                <div class="col-6">
                    <label class="form-label " for="inputState">Choose Student</label>
                    <select class="form-control py-2" name="student">
                      <option>Choose...</option>
                      @foreach ($student as $item)
                      <option class="h-10" value="{{$item->id}}">{{$item->name}}</option>
                      @endforeach
                    </select>
                    @error('student')
                        <span class="text-dark">{{'*'.$message}}</span>
                    @enderror
                </div>
                {{-- @foreach ($companySV as $sv)
                <input type="hidden" id="companySVId" name="companySVId" value="{{$sv->id}}">
                @endforeach --}}
                <div class="col-4" style="margin-bottom: 2rem">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Add Meeting</button>
                </div>
            </form>
        </div>
    </div>
    {{-- SV Info Card --}}
    <hr class="animate__animated animate__fadeInLeft mt-2" style="width: 50%; margin: auto;">
    <div class="container rounded my-2 ">
        
        <div class="row mb-3 py-2 justify-content-start ">
            <h4 class="animate__animated animate__bounce"><i class="fas fa-handshake mr-1"></i>Meetings</h4>
            <p class="animate__animated animate__bounce text-muted">Faculty Supervisor meetings schedule with your Company Supervisor</p>
            @foreach ($meeting as $meet)
            <div class="card animate__animated animate__bounceIn my-2 mx-2 border-0" style="width: 24rem; background: linear-gradient(90deg, rgba(238,198,216,1) 7%, rgba(233,239,246,1) 100%);">
                <div class="card-body">
                    <div class="d-flex flex-row justify-content-between">
                        <h5 class="card-title">{{$meet->title}}</h5>
                        <form action="{{route('supervisors.meeting.destroy',$meet->id)}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="card-link text-danger" onclick="return confirm('Are You Sure?');"><i class="fa fa-trash" aria-hidden="true"></i></button> 
                        </form>
                    </div>
                        <h6 class="card-subtitle mb-2 text-muted"><i class="fas fa-calendar-day mr-1"></i>{{$meet->time}}</h6>
                        <h6 class="card-subtitle mb-2 text-muted"><i class="fa-solid fa-location-dot mr-1"></i>{{$meet->type}}</h6>
                        <a class="text-dark text-decoration-none" href="{{$meet->link}}"><h6 class="card-subtitle mb-2 text-muted"><i class="fa-solid fa-link mr-1"></i>{{$meet->link ?? 'Meeting Offline'}}</h6></a>
                        <h6 class="card-subtitle mb-2 text-muted"><i class="fas fa-address-card mr-1"></i>{{$meet->Supervisor->name}}</h6>
                        <hr>
                        <h6 class="card-subtitle mb-2 text-muted"><i class="fas fa-user-graduate mr-1"></i>{{$meet->student->name}}</h6>
                        <h6 class="card-subtitle mb-2 text-muted"><i class="fas fa-user-tie mr-1"></i>{{$meet->companysupervisor->name}}</h6>
                        <h6 class="card-subtitle mb-2 text-muted"><i class="fas fa-building mr-1"></i>{{$meet->companysupervisor->company}}</h6>
                        <h6 class="card-subtitle mb-2 text-muted"><i class="fas fa-clock mr-1"></i>Created at {{$meet->created_at}}</h6>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
