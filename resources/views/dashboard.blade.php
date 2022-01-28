<x-main>
    <x-navbar/>
    <div class="dashboard-container container" style="margin-top: 50px">
        <table class="table table-light text-center">
            <thead>
              <tr>

                <th scope="col">Nome</th>
                <th scope="col">Admin</th>
                <th scope="col">Quantidade de posts</th>
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
              </tr>

             @endforeach
            </tbody>
          </table>
    </div>
</x-main>
