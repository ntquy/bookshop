<?php

namespace App\Http\Controllers;

use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        $customers = array();

        $employees = array();

        foreach ($users as $user) {
            if ($user->role == 0) {
                array_push($customers, $user);
            } else {
                array_push($employees, $user);
            }
        }

        return view('admin.user.show', compact('customers', 'employees') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_session = session('user', null);

        if ($user_session->role == 2) {
            return view('admin.user.add');
        } else {
            return redirect()->route( 'dashboard' );
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $user = new User();

        $user->name = $data['name'];

        $user->username = $data['username'];

        $user->password = Hash::make($data['password']);

        $user->email = $data['email'];

        $user->phone = $data['phone'];

        $user->address = $data['address'];

        $birthday = date_create($data['birthday']);

        $user->birthday = date_format($birthday, 'Y-m-d');

        $user->role = $data['role'];

        $user->save();

        echo json_encode([
            'error' => 0,
            'birthday' => $user->birthday
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user_session = session('user', null);

        if ($user_session->role == 2) {
            $user = User::where('id', $id)->first();

            return view('admin.user.edit', compact('user') );
        } else {
            return redirect()->route( 'dashboard' );
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        unset($data['_method']);

        unset($data['_token']);

        $birthday = date_create( $data['birthday'] );

        $data['birthday'] = date_format($birthday, 'Y-m-d');

        User::where('id', $id)->update($data);

        return json_encode([
            'error' => 0,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id', $id)->delete();

        return json_encode([
            'error' => 0,
        ]);
    }

    public function editProfile($id)
    {
        $user = User::where('id', $id)->first();

        return view('admin.user.edit_profile', compact('user') );
    }

    public function updateProfile(Request $request, $id)
    {
        $data = $request->all();

        unset($data['_method']);

        unset($data['_token']);

        $birthday = date_create( $data['birthday'] );

        $data['birthday'] = date_format($birthday, 'Y-m-d');

        User::where('id', $id)->update($data);

        return json_encode([
            'error' => 0,
        ]);
    }

    public function passwordChange(Request $request, $id)
    {
        $data = $request->all();

        $user = User::where('id', $id)->first();

        if(Hash::check($data['current_password'], $user->password) )
        {
            $user->password = Hash::make($data['new_password']);;
            $user->save();
            echo json_encode([
                'error' => 0
            ]);
            return;
        }
        else
        {
            echo json_encode([
                'error' => 1,
                'error_msg' => trans('common.password_not_match')
            ]);
            return;
        }
    }
}
