<?php

namespace App\Http\Controllers;

use App\Models\Emp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    function login(){
        return view('login');
    }
    function loginPost(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:4',
        ]);
    
        $credentials = [
            'emp_email' => $request->email,
            'password' => $request->password, // Laravel will automatically check emp_password
        ];
        if (Auth::attempt($credentials)) {
            $user = Emp::find(Auth::user()->emp_id);
            $user->emp_last_login = now();
            $user->save();
            return redirect()->route('dashboard')->with('success', 'Login successful');
        }
    
        // Redirect back with error message if login fails
        return back()->withErrors(['error' => 'Invalid email or password']);
    }   
    function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('success', 'Logged out successfully');
    }

    function changePassword(){
        return view('pages.emp.change-password');
    }

    function changepasswordPost(Request $request){
        // Validate input
    $request->validate([
        'old_password' => 'required',
        'new_password' => 'required|min:4',
        'confirm_password' => 'required|same:new_password',
    ]);
//dd("dd");
    // Get the authenticated user
    $user = Emp::find(Auth::user()->emp_id);

    // Check if old password is correct
    if (!Hash::check($request->old_password, $user->emp_password)) {
        return back()->withErrors(['old_password' => 'Old password is incorrect.']);
    }

    // Update new password
    $user->emp_password = Hash::make($request->new_password);
    $user->emp_updated_by = $user->emp_id;
    $user->save();


    return redirect()->route('dashboard')->with('success', 'Password updated successfully.');
    }
}
