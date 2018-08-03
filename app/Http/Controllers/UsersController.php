<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UserEditFormRequest;

class UsersController extends Controller
{
    public function edit($id)
    {
    	$user = User::find($id);
		return view('layout.edit', compact('user'));
    }
    public function update($id, UserEditFormRequest $request)
    {
    	dd('123');
    	$user = User::find($id);
		$user->username = $request->get('username');
		$user->name = $request->get('name');
		$user->email = $request->get('email');
		$password = $request->get('password');
		$user->birthday = $request->get('birthday');
		$user->address = $request->get('address');
		$user->phone = $request->get('phone');
		$user->created_at = date('Y-m-d');
		if($password != "")
		{
			$user->password = Hash::make($password);
		}
		$user->save();
		$user->syncRoles($request->get('role'));

		return redirect(action('UsersController@edit', $user->id))->with('status', '
		The user has been updated!');
    }
}
