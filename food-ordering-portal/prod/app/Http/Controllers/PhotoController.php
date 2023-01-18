<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Dish;
use App\Models\User;
use App\Models\Photo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;



class PhotoController extends Controller
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
    public function create(Request $request)
    {
        $dish_id = $request->dish_id;
        $dish_name = $request->dish_name;
        //dd($dish_id);
        return view('photo.photo_form')->with('dish_id',$dish_id)->with('dish_name',$dish_name);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        {

            $this->validate($request, [
                'photo' => 'required|file'
            ]);

            $user_id = Auth::id();
            $dish_id = $request->dish_id;
            
            $photo_store=request()->file('photo')->store('product_images','public');
            $photo=new Photo();
            $photo->user_name = $request->user_name;
            $photo->dish_id = $request->dish_id;
            $photo->photo = $photo_store;
            $photo->save();
            
            return redirect("/dish/$dish_id");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
