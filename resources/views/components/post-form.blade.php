@if($errors->any())
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>
            {!! implode('<br/>', $errors->all('<span>:message</span>')) !!}
        </strong>
    </div>
@endif
<div class="post-form-container container">
    <form method="POST" action="{{route('posts.'. $method, $post->id)}}" enctype="multipart/form-data" class="post-form">
        @csrf
        @if($method == 'update')
          @method('put')
        @endif
        <div class="form-group">
          <label for="img">Post image</label>
          <input type="file" class="form-control" id="img" name="img" value="{{old(asset('storage/' . $post->img))}}" @if(Route::is('posts.create')) required @endif>
        </div>

        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" class="form-control" id="title" placeholder="Type the post title here" name="title" value="{{old('title', $post->title)}}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" id="description" placeholder="Type the post description here" name="description" value="{{old('description', $post->description)}}" required>
          </div>

          <div class="form-group">
            <label for="body">Body</label>
            <textarea class="form-control" id="body" placeholder="Type the post body here" name="body" required>{{old('body', $post->body)}}</textarea>
          </div>

          <div class="form-group">
            <label for="categories">Categories</label>
            <select class="form-select" name="categories[]" id="categories" multiple>
              @foreach($categories as $category)
              <option value="{{$category->id}}">{{$category->name}}</option>
              @endforeach
            </select>
          </div>

        <button type="submit" class="btn btn-light">
          @if($method == 'store')
          Create
          @else
          Update
          @endif
        </button>
      </form>
</div>

