<div class="post-card">
    <div class="container-fluid">
        <div class="img-container">
            <img src={{asset('storage/' . $img)}} alt="post image">
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
                

                @if(Auth::check() && Auth::user()->id == $userId)
                <div class="methods-post-container">
                    <a class="btn btn-success"href="{{route('posts.edit', $id)}}">
                        <i class="bi bi-pencil"></i>
                    </a>
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