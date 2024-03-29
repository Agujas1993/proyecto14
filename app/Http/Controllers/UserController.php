<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Profession;
use App\User;
use App\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        $title = 'Usuarios';

        return view('users.index')->with(compact('users', 'title')); //compact es para que coja el mismo nombre de variable.
    }

    public function create()
    {
        $professions = Profession::orderBy('title', 'ASC')->get();
        return view('users.create', compact('professions'));
    }

    public function store(CreateUserRequest $request)
    {

      $request->createUser();
        //User::createUser($request->validated()); //Como alternativa a la linea de arriba para no crear un método
        return redirect()->route('users.index');
    }

    public function show(User $user)
    {
        if ($user == null) {
            return response()->view('errors.404', [], 404);
        }

        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(User $user)
    {
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'. $user->id,
            'password' => ''
        ]);

        if ($data['password'] != null){
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);

        return redirect()->route('users.show', $user);
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index');
    }
}
