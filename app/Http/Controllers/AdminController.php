<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function showIndex(){
        return view('admin.index');
    }

    public function showUsers(){
        $users = User::orderBy('id', 'DESC')->paginate(8);

        return view('admin.users.index', compact('users'));
    }

    public function showUserEdit($id){
        $user = User::whereId($id)->firstorfail();

        return view('admin.users.edit', compact('user'));

    }

    public function userUpdate(Request $request, $id)
    {
        $user = User::where('id', $id)->firstOrFail();

        abort_unless($user->is_admin, 403);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        return redirect()->back();

    }

    public function userDelete($id)
    {
        $user = User::where('id', $id)->firstOrFail();

        $user->delete();

        return redirect()->back();
    }
}
