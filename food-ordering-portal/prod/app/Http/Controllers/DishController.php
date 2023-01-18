<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dish;
use App\Models\User;
use App\Models\Fav;
use App\Models\Order;


use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;




class DishController extends Controller
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
        // $dish = Dish::find($id);
        // return view('show')->with('dish', $dish);
        // $users = User::all();
        // return view('dishes.index')->with('users',$users);        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('dishes.create_form');
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
            'name' => 'required|min:3',
            'price' => 'required|numeric|min:1',
            ]);

        $dName = $request->name;
        {
            $findDish = Dish::where(['name' => $dName])->first();
            if($findDish) {
                return $error = ('You already have the same dish.');}
        }

        $dish = new Dish();

        $dish->price = $request->price;
        $dish->description = $request->description;
        $dish->name = $request->name;
        $dish->cuisine = $request->cuisine;
        $dish->promotion = $request->promotion;
        $dish->user_id = Auth::id();
        //$dish->user_id = $request->user_id;

        $dish->save();
        return redirect("dish/$dish->id");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //show dish detail
        $dish = Dish::find($id);
        $photos = Dish::find($id)->photos;
        $promotion = $dish->promotion * 100;
        $discount = $dish->price * (1 - $dish->promotion);
        return view('dishes.show')->with('dish', $dish)->with('photos', $photos)->with('promotion', $promotion)->with('discount', $discount);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dish = Dish::find($id);
        return view('dishes.edit_form')->with('dish', $dish);
    
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
        {
            $this->validate($request, [
                'name'=>'required|min:3',
                'price'=>'required|numeric|min:1'
            ]);

            $dish = Dish::find($id);
            $dish->name = $request->name;            
            $dish->price = $request->price;
            $dish->description = $request->description;            
            $dish->promotion = $request->promotion;
            $dish->save();

            return redirect("dish/$dish->id");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dish = Dish::find($id);
        dd($dish);
        $dish->delete();
        return redirect("dish");
    }

    public function top() //get top 5 list in last 30 days
    {
        $startDate =\Carbon\Carbon::today()->subDays(30);
        $tops = DB::table('orders')
                ->select('dishes.name', DB::raw("count(orders.dish_id) AS number"))
                ->join('dishes', 'orders.dish_id', '=', 'dishes.id')
                ->where('orders.created_at','>=', $startDate)
                ->groupBy('orders.dish_id')
                ->orderByDesc('number')
                ->limit(5)
                ->get();
                  
        return view('dishes.top_list')->with('tops', $tops);
    }

    public function favourite(Request $request) //add to favourite list
    {
        $dish_name = $request->dish_name;
        {
            $findFav = Fav::where(['dish_name' => $dish_name])->first();
            if($findFav) {
                return $error = ('You have added before.');}
        }

        $fav = new Fav();
        $fav->dish_name = $request->dish_name;
        $fav->cuisine = $request->cuisine;
        $fav->user_id = Auth::id();
        $fav->save();

        echo "Added to My Fav.";

    }

    public function favList() //view my favourite list
    {
        $favs = Fav::where(['user_id' => Auth::id()])->get('dish_name');
        $favCuisineCount = Fav::where(['user_id' => Auth::id()])
                    ->groupBy('cuisine')
                    ->limit(1)
                    ->count();
        $favCuisine = Fav::where(['user_id' => Auth::id()])
                    ->groupBy('cuisine')
                    ->limit(1)
                    ->first('cuisine');
        if ($favCuisine) {
            $favCuisine =  $favCuisine -> cuisine;
            $recommendations = Dish::where(['cuisine' => $favCuisine])->get('name');
            //$recommendations = $favs ->unique();
            $recommendations = $favs->merge($recommendations);


                return view('dishes.fav_list')->with('favs', $favs)->with('favCuisineCount', $favCuisineCount)->with('recommendations', $recommendations);
        }
        else{
            return view('dishes.fav_list')->with('favs', $favs)->with('favCuisineCount', $favCuisineCount);
        }
        
    }
}
