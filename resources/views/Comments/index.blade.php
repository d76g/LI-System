<x-app-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Internship Companies Comment and Reviews
        </h2>
    </x-slot>
            <div class="container mt-5 mb-5">
            <div class="d-flex justify-content-center row">
                
            <div class="d-flex flex-column col-md-12">
                
                @include('Comments.partials.goBack')
                <div class="d-flex flex-row align-items-center text-left comment-top p-2 bg-white border-bottom px-4" style="height: 150px">
                    <div class="profile-image"><img class="rounded-circle" src="{{Storage::URL($companyData->image_path)}}" width="100" alt="Company Image">
                    </div>

                    <div class="d-flex flex-column ml-3">
                        <div class="d-flex flex-row">
                            <h3>{{$companyData->name}}</h3><span class="ml-2 text-secondary">{{$companyData->sector}}</span>
                        </div>
                            
                        <div class="d-flex flex-row align-items-center align-content-center post-title"><span class="bdge mr-1">video</span><span class="mr-2 comments">13 comments&nbsp;</span><span class="mr-2 dot"></span>

                            @if ( @isset($lastCommentDate) )
                            <span> Last comment on <span class="text-secondary"> {{$lastCommentDate->created_at->format('F j, Y')}}</span></span>
                            @else
                                <span class="text-secondary">No Comments at the time</span>
                            @endif
                        </div>
                    </div>
                </div>
                
                <div class="bg-white pt-4 px-4">
                @if (count($companyComment) < 0)
                
                    <div class="d-flex flex-row add-comment-section mt-4 mb-4">
                        <img class="img-fluid img-responsive rounded-circle mr-2" src="{{Auth::user()->profile_photo_url}}" width="38" alt="Avatar">
                        <input type="text" class="form-control mr-3" placeholder="Add comment">
                            <button class="btn btn-primary" type="button">Comment</button>
                    </div>

                    <div class="d-flex justify-content-center row bg-primary text-white rounded">
                        <p class="h4 text-light text-center m-3">No Comments Yet</p>
                        <p class="text-center fw-light"><i class="fa fa-comment" aria-hidden="true"></i> Be the first to comment</p>
                    </div>
                </div>
                @else

                    <form action="{{route('comment.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if (session('success'))
                            @include('comments.partials.index')
                    @endif
                    <div class="d-flex flex-row add-comment-section mt-4 mb-4">
                        <img class="img-fluid img-responsive rounded-circle mr-2" src="{{Auth::user()->profile_photo_url}}" width="38" alt="Avatar">
                        <input type="text" class="form-control mr-3" name="comment" placeholder="Add comment">
                        <input type="hidden" name="Company_id" id="post_id" value="{{ $companyData->id }}" />
                        <button class="btn btn-primary" type="submit">Comment</button>
                    </div>
                    <hr>
                    </form>

                    @foreach ($companyComment as $comment)
                        <div
                            class="commented-section mt-4">
                            <div class="d-flex flex-row align-items-center commented-user">
                                <img class="img-fluid img-responsive rounded-circle mr-2" src="{{$comment->User->profile_photo_url}}" width="38" alt="Avatar">
                                <h5 class="mr-2 text-secondary">{{$comment->User->name}}</h5>
                                <span class="mb-1 ml-2"> by {{$comment->user->role->role}}</span>
                                <span class="dot mb-1"></span>
                                <span class="mb-1 ml-2">{{$comment->created_at->format('F j, Y, g:i a')}}</span>
                                
                            </div>
                            <div class="comment-text-sm rounded mt-2 ml-4 p-3" style="background-color:rgb(243 244 246);">
                                <span>{{$comment->content}}</span>
                            </div>
                            <hr>
                        </div>
                        @endforeach
                    </div>
                    
                @endif
        </div>
        </div>
</x-app-layout>