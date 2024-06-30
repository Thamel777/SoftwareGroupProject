<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function index(){

        return view('customers.index');
    }

    public function customerdashboard(){

        return view('customers.customer_dashboard');
    }

    public function profile()
    {
        $user = Auth::user();
        return view('customers.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $user->email = $request->input('email');
        if ($request->input('password')) {
            $user->password = bcrypt($request->input('password'));
        }
        $user->save();

        return redirect()->route('customer.profile')->with('success', 'Profile updated successfully!');
    }
}
