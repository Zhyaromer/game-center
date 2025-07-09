<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserValidation;
use App\Http\Requests\UpdateUserValidation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.form');
    }

    public function store(StoreUserValidation $request)
    {
        User::create($request->validated());
        return redirect(route('admin.users.index', absolute: false));
    }

    public function show(string $id)
    {
        $data = User::with('user')->findOrFail($id);
        return view('admin.users.show', compact('data'));
    }

    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.form', compact('user'));
    }

    public function update(UpdateUserValidation $request, string $id)
    {
        if ($request->password) {
            $user = User::findOrFail($id);
            $user->update($request->validated());
        }

        $user = User::findOrFail($id);
        $user->update(Arr::except($request->validated(), 'password'));

        return redirect()->route('admin.users.index')->with('message', 'User updated successfully');
    }

    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.users.index')->with('message', 'User deleted successfully');
    }
}
