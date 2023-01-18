<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dish;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $this->validate($request, [
            'quantity' => 'required|numeric|min:1',
            'dish_id' => 'required',
            ]);

        $order = new Order();
        $order->user_id = Auth::id();
        //$order->user_id = $request->input('user_id');
        $order->dish_id = $request->input('dish_id');
        $order->quantity = $request->input('quantity');
        $order->save();

        $dish_id = $request->input('dish_id');
        $dish = Dish::where('id', '=', $dish_id)->first();
        $user_id = Auth::id();
        //$user_id = $request->input('user_id');
        $user = User::where('id', '=', $user_id)->first();
        $quantity = $request->input('quantity');
        //dd($dish);
        //return 'Thank you for your order!';
        return view('order.customer_order')->with('order', $order)->with('dish', $dish)->with('user', $user)->with('quantity', $quantity);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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

    public function purchase()  //view purchase form
    {
        $dishes = Dish::all();
        //dd($dishes);
        return view('dishes.purchase_form')->with('dishes', $dishes);
    }

    public function placeOrder(Request $request)  //place order to purchase a dish
    {
        // $dishes = Dish::all();
        // //dd($dishes);

        // $order = new Order();
        // $order->user_id = $request->input('user_id');
        // //$order->dish_id = $request-> Dish::where('dish_name','=', input('dish_name'));
        // $order->dish_id = $request->input('dish_id');
        // //$dish_id = Dish::where('dish_name', '=', 'dish_name')->get();
        // $order->quantity = $request->input('quantity');
        // $order->save();

        // $order->id;


        // return redirect("order/{id}");
    }

}
