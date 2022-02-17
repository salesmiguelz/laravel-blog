<div class="dashboard-container container" style="margin-top: 50px">
    <table class="table text-center table-dashboard">
        <thead>
            <tr>
            
            <th scope="col" >Name</th>
            <th scope="col">Admin</th>
            <th scope="col">Number of posts</th>

            @canany(['update', 'delete'], App\Models\User::class)
                <th scope="col">Actions</th>
            @endcanany
            </tr>
        </thead>
        <tbody>

            @foreach($users as $user)
            <tr>  
            <td>{{$user->name}}</td>
            <td>
                @if($user->isAdmin)
                    Yes
                @else 
                    No
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
                <a onclick="return confirm('Are you sure?') || event.stopImmediatePropagation();" wire:click="deleteUser('{{$user->id}}')" class="btn btn-danger">
                    <i class="bi bi-trash"></i>
                </a>
            @endcan
            </tr>

            @endforeach
        </tbody>
        </table>
</div>
