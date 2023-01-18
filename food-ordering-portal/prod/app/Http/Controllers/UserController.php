<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Dish;
use App\Models\Order;
use Illuminate\Support\Facades\DB;



class UserController extends Controller
{
    function __construct(){
        $this->middleware('auth', ['except'=>['index', 'show']]);//non-logged in user can see only index and show page.
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$users = DB::table('users')->where('type', '=', 'Restaurant')->get();
        $users = User::where('type', '=', 'Restaurant')->get();

        return view('home.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dishes = Dish::where('user_id', '=', $id)->paginate(6);
    
        return view('home.show')->with('dishes', $dishes);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function rest_order()         //show order detail
    {
        $rest_id = Auth::id();
        // $myOrders = DB::table('orders')
        //             ->join('users', 'users.id', '=', 'orders.user_id')
        //             ->join('dishes', 'dishes.id', '=', 'orders.dish_id')
        //             ->where('dishes.user_id', '=', $rest_id)
        //             ->get();
        $myOrders = Order::join('users', 'users.id', '=', 'orders.user_id')
                    ->join('dishes', 'dishes.id', '=', 'orders.dish_id')
                    ->where('dishes.user_id', '=', $rest_id)
                    ->get();
        return view('order.rest_order')->with('myOrders', $myOrders);

    }

    public function approve(Request $request)  //approve users
    {
        $user_id = $request->user_id;
        $users = User::find($user_id);
        $users->approved = $request->approved;
        $users->save();
        return redirect("approvalList");
    }

    public function approvalList()  //view approval list
    {
        // $users = DB::table('users')
        // ->where('type', '=', 'Restaurant')
        // ->where('approved', '=', 'N')
        // ->get();
        $users = User::where('type', '=', 'Restaurant')
                        ->where('approved', '=', 'N')
                        ->get();

        return view('users.approvalList')->with('users', $users);
    }

    public function approveAction($id)  //approval action page
    {
        $user = User::find($id);
        
        return view('users.approveAction')->with('user', $user);
    }
}
