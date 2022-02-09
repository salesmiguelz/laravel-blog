@if($errors->any())
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>
            {!! implode('<br/>', $errors->all('<span>:message</span>')) !!}
        </strong>
    </div>
@endif  
<div class="category-form-container container">
    <form method="POST" action="@if($method == "store") {{route('categories.store')}} @else {{route('categories.update', $category->id)}} @endif" enctype="multipart/form-data" class="category-form">
        @csrf
        @if($method == 'update')
          @method('put')
        @endif
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" id="name" placeholder="Type the category name here" name="name" value="{{old('name', $category->name)}}" required>
        </div>

        <div class="form-group">
          <label for="color">Color</label>
          <input type="color" class="form-control" id="color" name="color" value="{{old('name', $category->color)}}" required>
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

