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
        <form method="POST" action="{{route('users.update', $user->id)}}" enctype="multipart/form-data" class="post-form">
            @csrf
            @method('put')
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" name="name" id="name" class="form-control" value="{{old('name', $user->name)}}">
            </div>

            <div class="form-group">
                <label for="name">Admin</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="admin" id="admin1" value="yes">
                    <label class="form-check-label" for="admin1">
                      Yes
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="admin" id="admin2" value="no">
                    <label class="form-check-label" for="admin2">
                      No
                    </label>
                  </div>
              </div>

              <div class="form-group">
                <label for="name">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{old('email', $user->email)}}">
              </div>

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
</x-main>

