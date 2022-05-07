@can('admin')
    <div class="dropdown">
        <button class="btn dropdown-toggle float-end " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="bi bi-three-dots-vertical"></i>
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a href="{{$comment->id}}/edit"><button type="button" class="btn">Edit</button></a>
                        <form action="{{ route('comment.destroy', $comment->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <a class="dropdown-item" onclick="return confirm('Are you sure to Delete this record?')"><button type="submit">Delete</button></a>
                        </form>
        </div>
        </div>
@elseif(Auth::user()->id === $comment->user->id)
        <div class="dropdown">
        <button class="btn dropdown-toggle float-end " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="bi bi-three-dots-vertical"></i>
        </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a href="{{$comment->id}}/edit"><button type="button" class="btn">Edit</button></a>
                <form action="{{ route('comment.destroy', $comment->id) }}" method="POST">
            @method('DELETE')
            @csrf
            <a class="dropdown-item" onclick="return confirm('Are you sure to Delete this record?')"><button type="submit">Delete</button></a>
            </form>
            </div>
            </div>
@endif