<x-main>
    <x-navbar/>
    <div class="posts-create-container container">
        <form method="POST" action="{{route('posts.store')}}">
            @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">Title</label>
              <input type="text" class="form-control" id="title" placeholder="Type the post title here" name="title">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Description</label>
                <input type="text" class="form-control" id="description" placeholder="Type the post description here" name="description">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Body</label>
                <input type="text" class="form-control" id="body" placeholder="Type the post title here" name="body">
              </div>

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
</x-main>

