<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function logout()
    {
        Auth::logout();

        $notification = [
            'message' => 'Logout successfully',
            'alertType' => 'success'
        ];

        return Redirect()->route('login')->with($notification);
    }
}
