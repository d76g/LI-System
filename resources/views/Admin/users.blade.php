<x-app-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
   <link rel="stylesheet" href="{{URL::asset('css/userstable.css')}}">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            System Users 
        </h2>
    </x-slot>
    <div class="container-lg" style="margin-top: 3rem">
        <div class="container">
            <div class="table-wrap">
                @if (session('success'))
                    @include('admin.partials.success')
                @endif
                @include('admin.partials.filter')
                <h1>
                    <span class="badge-info">
                        {{count($users)}}
                    </span>
                    Active Users</h1>
                <table class="table table-borderless table-responsive">
                    <thead>
                        <tr>
                            <th></th>
                            <th class="text-muted fw-600">Email</th>
                            <th class="text-muted fw-600">Name</th>
                            <th class="text-muted fw-600">Role</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            
                       
                        <tr class="align-middle alert" role="alert">
                            <td>
                                <input type="checkbox" id="check">
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="img-container">
                                        <img src="{{$user->profile_photo_url}}" alt="Profile Image">
                                    </div>
                                    <div class="ps-3">
                                        <div class="fw-600 pb-1">{{$user->email}}</div>
                                        <p class="m-0 text-grey fs-09">Created at: {{$user->created_at->format('F j, Y')}}</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="fw-600">{{$user->name}}</div>
                            </td>
                            <td>
                            @if ($user->role->role === 'Admin')
                            <div class="d-inline-flex align-items-center admin">
                                <div class="circle"></div>
                                <div class="ps-2">Admin</div>
                                @if ($user->id == Auth::User()->id)
                                    <div class="ps-2">, You</div>
                                @endif
                            </div>
                            @elseif($user->role->role === 'Student')
                            <div class="d-inline-flex align-items-center student">
                                <div class="circle"></div>
                                <div class="ps-2">Student</div>
                            </div>
                            @else
                            <div class="d-inline-flex align-items-center supervisor">
                                <div class="circle"></div>
                                <div class="ps-2">Supervisor</div>
                            </div>
                            @endif
                                
                            </td>
                            <td>

                                <form action="{{route('admin.users.destroy',$user->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <div class="btn p-0">
                                        <button type="submit" onclick="return confirm('Are you sure to Delete this record?')">
                                            <span class="fas fa-times"></span>
                                        </button>
                                    </div>
                                </form>
                                
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{$users->appends(request()->only('role'))->links()}}
        </div>
        @include('admin.deletedUsers')
    </div>
    <script src="{{asset('js/userFilter.js')}}"></script>
</x-app-layout>
