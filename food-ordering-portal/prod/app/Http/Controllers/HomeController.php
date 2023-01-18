<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Dish;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function index()  //different dashboard for different users
    {
        $type=Auth::user()->type;

        if($type=='Restaurant')
        {   
            $user = Auth::id();
            $dishes = Dish::where('user_id', '=', $user)->paginate(6);
            return view('restaurant')->with('dishes',$dishes);       
        }
        if($type=='Customer')
        {
            $dishes = Dish::paginate(6);
            return view('customer')->with('dishes',$dishes);    
        }
        if($type=='Administrator')
        {
            $dishes = Dish::paginate(6);
            return view('admin')->with('dishes',$dishes);    
        }
        else
        {
            return view('home.index');
        }
    }
}

// public function index()
// {
//     $users = User::where('type', '=', 'Restaurant')->get();
//     $users = User::paginate(3);
//     return view('index')->with('users', $users);    }