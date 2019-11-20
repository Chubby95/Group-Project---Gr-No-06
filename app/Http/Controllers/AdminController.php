<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserRoles;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class AdminController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }

    public function home()
    {
        return view('admin.dashboard', ['pageSlug' => 'admin']);
    }

    public function index(User $model)
    {
        return view('admin.user.index', ['pageSlug' => 'admin.users', 'users' => $model->paginate(15)]);
    }


    /**
     * Show the form for creating a new user
     *
     * @return \Illuminate\View\View
     */
    public function create(UserRoles $model)
    {
        return view('admin.user.create', ['pageSlug' => 'admin.users', 'roles' => $model->get()]);
    }

    /**
     * Store a newly created user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request, User $model)
    {
        $user = $model->create($request->merge(['password' => Hash::make($request->get('password'))])->all());
        $user->roles()->attach($request->get('role'));
        event(new Registered($user));
        return redirect()->route('user.index')->withStatus(__('User successfully created.'));
    }

    /**
     * Show the form for editing the specified user
     *
     * @param  \App\User  $user
     * @return \Illuminate\View\View
     */
    public function edit(User $user, UserRoles $model)
    {

        return view('admin.user.edit', compact('user'), ['pageSlug' => 'admin.users', 'roles' => $model->get()]);
    }

    /**
     * Update the specified user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request, User  $user)
    {
        $hasPassword = $request->get('password');
        $user->update(
            $request->merge(['password' => Hash::make($request->get('password'))])
                ->except(
                    [$hasPassword ? '' : 'password']
                )
        );

        $user->roles()->where('user_id',$user->get('id'))->delete();

        $user->roles()->attach($request->get('role'));

        return redirect()->route('user.index')->withStatus(__('User successfully updated.'));
    }

    /**
     * Remove the specified user from storage
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User  $user)
    {
        if ($user->id == 1) {
            return abort(403);
        }

        $user->delete();

        return redirect()->route('user.index')->withStatus(__('User successfully deleted.'));
    }
}
