<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(5);
        return view('users.index', ['users' => $users]);
    }
    public function store(Request $request)
    {
        $users = new User;
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = $request->password;
        $users->is_admin = $request->is_admin;
        $users->save();
        if ($users) {
            return redirect()->back()->with('User Created Successfully');
        }
        return redirect()->back()->with('Failed to Create User');
    }
    public function update(Request $request, $id)
    {
        $users = User::find($id);
        if (!$users) {
            return back()->with('Error', 'User Not Found');
        }
        $users->update($request->all());
        return back()->with('Success', 'User Updated Successfully');
    }
    public function destroy($id)
    {
        $users = User::find($id);
        if (!$users) {
            return back()->with('Error', 'User Not Found');
        }
        $users->delete();
        return back()->with('Success', 'User Deleted Successfully');
    }
}
