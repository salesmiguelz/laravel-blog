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
    <div class="category-form-container container">
        <form method="POST" action="{{route('categories.store')}}" enctype="multipart/form-data" class="category-form">
            @csrf
            @if($method == 'update')
              @method('put')
            @endif
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" id="name" placeholder="Type the category name here" name="name" value="{{old('name', $category->title)}}" required>
            </div>
            <button type="submit" class="btn btn-light">Create</button>
          </form>
    </div>
</x-main>

