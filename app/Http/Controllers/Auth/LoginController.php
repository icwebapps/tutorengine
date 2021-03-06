<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
  public function index()
  {
    if (Auth::user())
    {
      return redirect('/dashboard');
    }
    return view('login');
  }

  public function check_login(Request $request)
  {
    $user_data = [
      'email' => $request->get('email'),
      'password' => $request->get('password')
    ];

    if (Auth::attempt($user_data)) {
      return ["login" => 1];
    }
    else {
      return ["login" => 0, "error" => "Incorrect login details"];
    }
  }

  public function logout()
  {
    Auth::logout();
    return redirect('/');
  }
}
