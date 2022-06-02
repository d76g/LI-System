<x-app-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Internship Companies Comment and Reviews
        </h2>
    </x-slot>
            <div class="container mt-5 mb-5">
            <div class="d-flex justify-content-center row">
                
            <div class="d-flex flex-column col-md-12 col-sm-6">
                <div class="mb-2 animate__animated  animate__fadeInLeft">
                    @include('Comments.partials.goBack')
                </div>
                <div class="d-flex flex-row col-md-12 align-items-center text-left comment-top p-2 bg-white border-bottom px-4 rounded animate__animated animate__fadeIn z-0" style="height: 180px">
                    <div class="profile-image col-1 pr-4">
                        <img class="rounded-circle" src="{{Storage::URL($companyData->image_path)}}" width="100" alt="Company Image">
                    </div>

                    <div class="d-flex col ">
                        <div class="col-md-8 col-sm-4 align-items-center align-content-center">
                            <div class="d-flex flex-row">
                                <h3 class="my-2">{{$companyData->name}}</h3>
                            <span class="ml-4 my-2 text-secondary">{{$companyData->sector}}</span>
                            </div>
                            
                            <span class="bdge mr-1">Number of Comments</span>
                            <span class="mr-2 text-secondary">{{$commentCount}}</span>
                            <span class="mr-2 dot"></span>

                            @if ( @isset($lastCommentDate) )
                            <span> Last comment on <span class="text-secondary"> {{$lastCommentDate->created_at->format('F j, Y')}}</span></span>
                            @else
                                <span class="text-secondary">Be the first to comment</span>
                            @endif
                        </div>
                        <div class="col-6 col-md-8 bg-primary bg-gradient rounded text-white my-3 d-flex flex-column align-items-center animate__animated animate__fadeIn" style="width: 250px">
                            <p class="m-0 pt-2">Rating Overview</p>
                            <div class="d-flex flex-row">
                                <p class="mb-0 p-0" >{{$roundedRating}}</p>
                                <p class="mb-0 ml-1" style="font-size: 12px;">/ 5</p>
                            </div>
                            <p class="mb-0 ml-1" style="font-size: 14px;"> from {{$ratingCount}} ratings</p>
                            @can('studentView')
                            <span class="m-0 p-0">
                                @include('company.partials.rating')
                            </span>
                            @isset($userRating)
                            <span class="m-0 p-0">
                                <p class="mb-1 ml-1 animate__animated animate__fadeIn animate__slower" style="font-size: 14px;">You Rated {{$companyData->name}} a {{$userRating->rating}} Stars.</p> 
                            </span> 
                            @endempty
                            
                            @endcan
                        </div>
                    </div>
                    
                </div>
                
                <div class="bg-white mt-4 mb-4 p-3 px-2 rounded animate__animated animate__fadeIn">
                    
                @empty($userWithComment)
                <form action="{{route('comment.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if (session('success'))
                            @include('comments.partials.index')
                    @endif
                    <div class="alert alert-warning rounded d-flex justify-content-center align-items-center pb-1">
                        <p> <i class="fa-solid fa-circle-exclamation"></i> Note: this comment section will be hidden once you post a comment ...</p>
                    </div>
                    <div class="d-flex flex-row add-comment-section py-2 px-4">
                        <img class="img-fluid img-responsive rounded-circle mr-2" src="{{Auth::user()->profile_photo_url}}" width="38" alt="Avatar">
                        <input type="text" class="form-control mr-3" name="comment" placeholder="Write a comment about this company (One Comment ONLY)">
                        <input type="hidden" name="Company_id" id="post_id" value="{{ $companyData->id }}" />
                        
                        <button class="btn btn-primary" type="submit">Comment</button>
                    </div>
                    @error('comment')
                            <span class="d-flex flex-row text-danger py-2 px-4">{{'*'.$message}}</span>
                    @enderror
                    <hr>
                    </form>
                @endempty
                    @foreach ($companyComment as $comment)
                        <div class="px-4 py-2">
                            <div class="d-flex flex-row align-items-center">
                                <img class="img-fluid img-responsive rounded-circle mr-2" src="{{$comment->User->profile_photo_url}}" width="38" alt="Avatar">
                                <h5 class="mr-2 text-secondary">{{$comment->User->name}}</h5>
                                <span class="dot mb-1"></span>
                                @if ($comment->updated_at == NULL)
                                <span class="mb-1 ml-2">{{$comment->created_at->format('F j, Y, g:i a')}}</span>
                                @else
                                <span class="mb-1 ml-2">{{$comment->updated_at->format('F j, Y, g:i a')}}</span>
                                @endif
                                @include('comments.partials.dropdown')
                            </div>
                            <div class="comment-text-sm rounded mt-2 ml-4 p-3" style="background-color:rgb(243 244 246);">
                                <span>{{$comment->content}}</span>
                            </div>
                            <hr>
                        </div>
                        @endforeach
                    </div>
                    
        </div>
        </div>
</x-app-layout>