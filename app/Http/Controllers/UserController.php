<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }
    public function edit(User $user){
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user){
        $data = $request->all();

        if($data['admin'] == 'yes'){
            $data['isAdmin'] = true;
        } else{
            $data['isAdmin'] = false;
        }

        unset($data['admin']);
        $user->update($data);

        return redirect()->route("users.index");
    }

    public function destroy(User $user){
        $user->delete();
        return redirect()->route("users.index");
    }
}
