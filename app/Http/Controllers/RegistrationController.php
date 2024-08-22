<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegistrationController extends Controller
{
    public function index()
    {
        return view('auth.registration');
    }

    public function registrationAuth(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'first_name' => 'required',
            'last_name' => 'required',
            'password' => 'required'
        ]);
        
        $this->createUser($request->all());
        $user_id = $this->getUserId($request->email);

        return redirect()->route('dashboard', ['user_id' => $user_id]);
    }

    private function createUser($user_info_array)
    {
        return User::create([
            'email' => $user_info_array['email'],
            'name' => $user_info_array['first_name'] . ' ' . $user_info_array['last_name'],
            'password' => Hash::make($user_info_array['password'])
        ]);
    }

    private function getUserId($email)
    {
        return User::select('id')->where('email', $email)->first();
    }
}