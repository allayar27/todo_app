<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserFormRequest;
use App\Jobs\UserSignUpJob;
use App\Mail\UserSignUpMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;


class UserController extends Controller
{

    public function index(Request $request): View
    {
        if ($request->has('search')) {
            $users = User::search($request->search)
                ->paginate(6);
        } else {
            $users = User::paginate(2);
        }
        
        $users = User::paginate(2);
        return view('users.index', compact('users'));
        
    }


    public function create(): View
    {
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserFormRequest $request)
    {
        $data = [
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => $request['password']
        ];

        $validate = $request->validated();
        $validate['password'] = bcrypt($validate['password']);
        
        $user = User::create($validate);

        if (!empty($request->roles)) {
            $user->assignRole($request->roles);
        }
        
        dispatch(new UserSignUpJob($user, $data))->onQueue('email');

        return redirect(route('users.index'));
    }


    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::query()->findOrFail($id);
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
