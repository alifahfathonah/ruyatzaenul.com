<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Models\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected $redirectTo = '/dashboard';
    protected $username = "username";

    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'username' => 'required',
            'password' => 'required|min:6|confirmed',
            'level' => 'required',
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'password' => bcrypt($data['password']),
            'level' => $data['level'],
        ]);
    }

    // --- Overriding default logout code [DFA]
    public function logout()
    {
       Auth::logout();
       return redirect('/login');
    }
    // --- End of overriding default logout code [DFA]

    // --- Overriding /register route to disable it [DFA]
    public function showRegistrationForm()
    {
        return redirect('login');
    }

    public function register()
    {

    }
    // --- End of overriding /register route to disable it [DFA]
}
