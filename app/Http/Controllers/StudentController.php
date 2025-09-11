<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\User;

class StudentController extends Controller
{
    public function index()
    {
        $users= User::with('Department')->get();

        return view('users.index', compact('users'));
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }

}
