<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function list()
    {
        $users = User::all();

        return view('pages.users.user')->with([
            'users' => $users
        ]);
    }

    public function edit()
    {
        return view('pages.users.edit');
    }

    public function save(Request $request)
    {
        $validate = $request->validate([
            'firstname' => 'required|string|min:3',
            'lastname' => 'required|string|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed'
        ]);
        if($validate)
        {
            $data = $request->all();
            if($this->create($data))
            {
                return redirect('/users/list');
            }
        }
    }

    public function create(array $data)
    {
        return User::create([
            'firstname'=> $data['firstname'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);
    }

    public function delete(Request $request)
    {
        $user_id = $request->user_id;

        User::where('id', $user_id)->delete();

        return response()->json([
            'msg' => 'deleted'
        ]);
    }
}
