<x-app-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Internship Companies Records
        </h2>
    </x-slot>
        <div class="container mt-5">
            <div class="pb-5">
                <h1>Company Review</h1>
                <h5>Reviews by Students and Supervisors</h5>
                
            </div>
            <div class="row">
                <div class="my-1 ml-2">
                    @include('company.partials.filter')
                </div>
                @if (count($company) > 0)
    
                @foreach ($company as $data)
                <div class="col-md-4 mt-1 mb-3 animate__animated animate__fadeInUp">
                    <div class="card p-3">
                        <div class="d-flex flex-row mb-3"><img src="{{Storage::URL($data->image_path)}}" width="70" alt="Company Image">
                            <div class="d-flex flex-column ml-2"><span>{{ $data->name }}</span>
                                <span class="text-black-50">{{ $data->sector }}</span>
                                <span class="text-black-50">{{ $data->eco_sector }}</span>
                                <span></span>
                            </div>
                        </div>

                        <h6>{{'Email: ' . $data->email}}</h6>
                        <span>{{'Contact Number: ' .'+60'.$data->phone_number }}</span>
                        <div class="d-flex justify-content-between install mt-3">
                            <span>
                                <i class="fa fa-star mr-1"></i>{{round($data->ratings,1)}}
                                <i class="fa fa-comment pl-3 mr-1"></i>{{$data->comments}}
                            </span>
                            <span class="text-primary">
                                <a href="{{route('comment.show',$data->id)}}">View
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </span></div>
                    </div>
                </div>
                @endforeach
                    @else
                        <p class="h5 text-danger text-center m-3">No Record found</p>
                @endif
            </div>
        </div>
        
</x-app-layout>
