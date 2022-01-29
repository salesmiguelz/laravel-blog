<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function edit(User $user){
        return view('users.edit', compact('user'));
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

        return redirect()->route("dashboard");
    }

    public function destroy(User $user){
        $user->delete();
        return redirect()->route("dashboard");
    }
}
