<x-main>
    <x-navbar/>
    <div class="dashboard-container container" style="margin-top: 50px">
      <table class="table text-center table-dashboard">
        <thead >
          <tr>
            <th scope="col" class="text-center align-middle">Name</th>
            <th scope="col "  class="text-center align-middle">Number of posts linked to</th>
            <th scope="col"  class="text-center align-middle">Actions</th>
            <th scope="col"  class="text-center align-middle">
              <a class="btn btn-primary" href="{{route('categories.create')}}">
                <i class="bi bi-plus fa-lg" ></i>
              </a>
            </th>
          </tr>
        </thead>
        <tbody>
          @foreach($categories as $category)
          <tr>
              <td>{{$category->name}}</td>
              <td>0</td>
              <td class="categories-action-container">
                

                <a class="btn btn-success" href="{{route('categories.edit', $category->id)}}">
                  <i class="bi bi-pencil"></i>
                </a>

                <form action="{{route('categories.destroy', $category->id)}}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger"type="submit">
                      <i class="bi bi-trash"></i>
                  </button>
                </form> 
              </td>
              <td>
                
              </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
</x-main>
