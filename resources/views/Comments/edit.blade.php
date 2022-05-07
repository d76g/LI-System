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
                </div>

                    <form action="{{route('comment.update',$commentContent->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                        <div
                            class="commented-section mt-4">
                            <h4>Edit Comment</h4>
                            <div class="comment-text-sm rounded mt-2 ml-4 p-3" style="background-color:rgb(243 244 246);">
                                <label for="comment" class="form-label">Your Comment</label>
                                <input name="comment" type="text" class="form-control" value="{{$commentContent->content}}">
                                <button type="submit" class="btn btn-success mt-3">Update</button>

                            </div>
                            <hr>
                        </div>
                    </form>
                    
            </div>
                    
        </div>
</x-app-layout>