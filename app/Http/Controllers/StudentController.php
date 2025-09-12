<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\User;
use App\Models\Department;

class StudentController extends Controller
{
    public function index()
    {
        $users= User::with('Department')->get();

        return view('users.index', compact('users'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $departments = Department::all();
        return view('users.edit', compact('user', 'departments'));
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }

    public function updateFromEdit(Request $request, $id)
    {
         // Find the user
        $user = User::findOrFail($id);

        // Validate the incoming request
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'ext_name' => 'nullable|string|max:50',
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'required|in:admin,user',
            'department_id' => 'nullable|exists:departments,id',
            'stat' => 'required|boolean',
        ]);

        // Update the user with validated data
        $user->update($validated);

        // Redirect back with a success message
        return redirect()->route('users.edit', $id)->with('success', 'User updated successfully.');
        }
}
