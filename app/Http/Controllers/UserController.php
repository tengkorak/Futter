<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function show (User $pemain)
    {

         //dd($pemain);
        // return view('users',[
        //     'users' => $pemain
        // ]); Test view one user

        return view('users.show', ['pemain' => $pemain]);
    }
}
