<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
//use Illuminate\Routing\Controller;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Modules\User\Entities\User;
use Modules\User\Http\Requests\UpdateRequest;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:web', ['except' => ['logout']]);
    }

    public function index()
    {
        $users = User::latest()->paginate(5);

        return view('user::dashboard',compact('users'));
    }

    public function create()
    {
        return view('user::create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        return view('user::show');
    }

    public function showProfile($id)
    {
        $user = User::find($id);

        return view('user::users.profile', compact('user'));
    }

    public function edit($id)
    {
        return view('user::edit');
    }

    public function editProfile($id)
    {
        $user = User::find($id);

        return view('user::users.editProfile', compact('user'));
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function updateProfile($id, Request $request)
    {

        $this->validate($request, [
            'name' => 'required|max:20|min:5',
            'username' => 'required|max:20|min:5',
            'email' => 'nullable|email',
            'password' => 'nullable|max:20|min:5',
            'confirm_password' => 'nullable|max:20|min:5|same:password',
        ]);

        $input = $request->all();
        $user = User::find($id);

        if (empty($input['password'])) {
            $input = Arr::except($input, array('password'));
        } else {
            if (empty($input['confirm_password'])) {
                return redirect()->route('users_.edit.profile',$id)->withErrors('Confirm password')->withInput();
            }
        }

        $user->update($input);

        return redirect()->route('users_.show.profile',compact('user'))->with('message', 'User Profile updated successfully');
    }

    public function destroy($id)
    {
        //
    }
}
