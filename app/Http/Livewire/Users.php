<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Users extends Component
{
    public function render()
    {
        $users = User::all();
        return view('livewire.users', [
            'users' => $users
        ]);
    }

    public function deleteUser($user_id){
        User::find($user_id)->delete();
    }
}
