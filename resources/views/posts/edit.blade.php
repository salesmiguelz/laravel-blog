<x-main>
    <x-navbar/>
    
   @if($errors->any())
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>
            {!! implode('<br/>', $errors->all('<span>:message</span>')) !!}
        </strong>
    </div>
  @endif

    <div class="posts-create-container container">
        <form method="post" action="{{route('posts.update', $post->id)}}" enctype="multipart/form-data">
            @csrf

            @method('put')
            <div class="form-group">
              <label for="img">Post image</label>
              <input type="file" class="form-control" id="img" name="img">
              <img src="{{asset('storage/' . $post->img)}}" alt="" style="width: 300px">
            </div>

            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" class="form-control" id="title" placeholder="Type the post title here" name="title" required value="{{$post->title}}">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control" id="description" placeholder="Type the post description here" name="description" required value="{{$post->description}}"">
              </div>

              <div class="form-group">
                <label for="body">Body</label>
                <input type="text" class="form-control" id="body" placeholder="Type the post title here" name="body" required value="{{$post->body}}">
              </div>

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
</x-main>

