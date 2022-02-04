<x-main>
    <x-navbar/>
    <div class="dashboard-container container" style="margin-top: 50px">
        <table class="table text-center table-dashboard">
            <thead>
              <tr>

                <th scope="col">Nome</th>
                <th scope="col">Admin</th>
                <th scope="col">Quantidade de posts</th>

                @canany(['update', 'delete'], App\Models\User::class)
                  <th scope="col">Ações</th>
                @endcanany
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

                @can('update', App\Models\User::class)
                <td class="users-action-container">
                  <a class="btn btn-success" href="{{route('users.edit', $user->id)}}">
                    <i class="bi bi-pencil"></i>
                  </a>
                @endcan

                @can('delete', App\Models\User::class)
                  <form action="{{route('users.destroy', $user->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger"type="submit">
                        <i class="bi bi-trash"></i>
                    </button>
                  </form> 
                </td>
                @endcan
              </tr>

             @endforeach
            </tbody>
          </table>
    </div>
</x-main>
