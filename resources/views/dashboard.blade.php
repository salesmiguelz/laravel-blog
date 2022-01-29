<x-main>
    <x-navbar/>
    <div class="dashboard-container container" style="margin-top: 50px">
        <table class="table table-light text-center">
            <thead>
              <tr>

                <th scope="col">Nome</th>
                <th scope="col">Admin</th>
                <th scope="col">Quantidade de posts</th>
                <th scope="col">Ações</th>

              </tr>
            </thead>
            <tbody>

              @foreach($users as $user)
              <tr>  
                <td>{{$user->name}}</td>
                <td>
                    @if($user->isAdmin)
                        Sim
                    @else 
                        Não
                    @endif
                </td>

                <td>
                    {{$user->posts()->count()}}
                </td>

                <td class="users-action-container">
                  <a class="btn btn-success" href="{{route('users.edit', $user->id)}}">
                    <i class="bi bi-pencil"></i>
                  </a>

                  <form action="{{route('users.destroy', $user->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger"type="submit">
                        <i class="bi bi-trash"></i>
                    </button>
                  </form> 
                </td>
              </tr>

             @endforeach
            </tbody>
          </table>
    </div>
</x-main>
