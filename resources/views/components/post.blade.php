<div class="post-card">
    <div class="container-fluid">
        <div class="img-container">
            <img src="https://images.unsplash.com/photo-1542831371-29b0f74f9713?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTN8fGhhY2t8ZW58MHx8MHx8&w=1000&q=80" alt="post image">
        </div>

        <div class="text-container">
            <h1 class="post-title">{{$title}}</h1>
            <p class="post-description">{{$description}}</p>

            <p>{{$body}}</p>

            <div class="post-actions-container">
                <div class="read-more-container">
                    <a href="">
                        Read More
                        <i class="bi bi-arrow-bar-right"></i>
                    </a>
                </div>
                

                @if(Auth::user()->id == $userId)
                <div class="delete-post-container">
                    <form action="{{route('posts.destroy', $id)}}" method="POST">
                        @csrf
                        
                        @method('DELETE')
                        <button class="btn btn-danger"type="submit">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                </div>

                @endif
            </div>
        </div>
       
    </div>
</div>