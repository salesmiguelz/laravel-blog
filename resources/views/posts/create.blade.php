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
        <form method="POST" action="{{route('posts.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="img">Post image</label>
              <input type="file" class="form-control" id="img" name="img" required>
            </div>

            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" class="form-control" id="title" placeholder="Type the post title here" name="title" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control" id="description" placeholder="Type the post description here" name="description" required>
              </div>

              <div class="form-group">
                <label for="body">Body</label>
                <textarea class="form-control" id="body" placeholder="Type the post body here" name="body" required></textarea>
              </div>

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
</x-main>

