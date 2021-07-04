<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function signin(Request $request)
    {
        $validate = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8'
        ]);

        if($validate)
        {
            $credentials = $request->only('email', 'password');

            if(Auth::attempt($credentials))
            {
                $request->session()->regenerate();
                return redirect('/home');
            } else {
                $user = User::where('email', $request->email)->first();
                if(!$user)
                {
                    return redirect()->back()->withErrors([
                        'email' => "This email doesn't exist."
                    ]);
                } else {
                    return redirect()->back()->withErrors([
                        'password' => "Your password is not correct."
                    ]);
                }
            }

        }

    }

    public function register()
    {
        return view('auth.register');
    }

    public function signup(Request $request)
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
                $credentials = $request->only('email', 'password');

                if(Auth::attempt($credentials))
                {
                    $request->session()->regenerate();
                    return redirect('/home');
                }
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

    protected function guard()
    {
        return Auth::guard();
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect('/');
    }


}
