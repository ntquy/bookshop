<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UserEditFormRequest;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function edit($id)
    {
        $user = User::find($id);

        return view('layout.edit', compact('user') );
    }
    public function update(UserEditFormRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $arr = $request->all();
        if($arr['password'] != '')
        {
            $arr['password'] = Hash::make($arr['password']);
        }
        $user->update($arr);

        return redirect(route('edit', $user->id))->with('status', trans('messages.notify_update') );
    }
}
