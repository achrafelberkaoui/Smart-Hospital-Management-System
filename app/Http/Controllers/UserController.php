<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('service')->paginate(10);
        return view('users.index', compact('users'));
    }

    public function edit(User $user)
    {
        $services = Service::all();
        return view('users.edit', compact('user', 'services'));
    }
    public function update(Request $request, User $user)
    {
        $data = $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'role' => 'required|in:admin,doctor,infirmier,reception,user',
        'service' => 'required'
        ]);
        $user->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'role' => $data['role'],
            'service_id' => $data['service'],
        ]);
        
        return redirect()->route('users.index')->with('success', 'User updated successfully');

    }
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted');
    }
}
