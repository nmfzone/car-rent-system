<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware(['auth', 'owner']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $request->merge([
            'password' => bcrypt($request->password),
        ]);

        $user = new User($request->all());
        $user = $this->setUserType($user, $request);
        $user->save();

        flash('Pengguna berhasil di simpan.')->success()->important();

        return redirect(route('users.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        if ((auth()->user()->id == $user->id) && ($request->type != $user->type_in_number)) {
            flash('Anda tidak bisa merubah tipe Anda sendiri.')->error()->important();

            return redirect()->back();
        }

        if (is_null($request->password)) {
            $user->fill($request->except('password'));
        } else {
            $request->merge([
                'password' => bcrypt($request->password),
            ]);

            $user->fill($request->all());
        }

        $user = $this->setUserType($user, $request);
        $user->save();

        flash('Pengguna berhasil di perbarui.')->success()->important();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        flash('Pengguna berhasil di hapus.')->success()->important();

        return redirect()->back();
    }

    /**
     * Set the user type with specified value.
     *
     * @param  \App\User  $user
     * @param  mixed  $request
     * @return \App\User
     */
    protected function setUserType(User $user, $request)
    {
        if ($request->type == 1) {
            $user->assign('Owner');
        } elseif ($request->type == 2) {
            $user->assign('Customer');
        } else {
            abort(422);
        }

        return $user;
    }
}
