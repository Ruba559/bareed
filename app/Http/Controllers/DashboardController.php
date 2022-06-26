<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
Use App\Models\User;
use App\Models\UserAccounts;
use Auth;

class DashboardController extends Controller
{
   
    public function index()
    {
        $user =  User::where('id' , auth::user()->id)->first();
        $userAccount =  UserAccounts::where('user_id' , $user->id)->first();
        $pages =  Page::where('user_id' , $user->id)->get();

       return view('dashboard' , ['pages' => $pages , 'userAccount' => $userAccount , 'user' => $user]);
    }


    public function deleteAccount()
    {
          UserAccounts::where('user_id' , auth::user()->id)->delete();
          Page::where('user_id' , auth::user()->id)->delete();

         return redirect('/dashboard');
    }


    public function Logout()
    {
         Auth::logout();

         return redirect('/');
    }
}
