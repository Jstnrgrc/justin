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

}
