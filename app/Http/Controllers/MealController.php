<?php

namespace App\Http\Controllers;

use App\Meal;
use App\Menu;
use Illuminate\Http\Request;

class MealController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('meals', array('meals' => Meal::orderBy('name')->get()));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('meal_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $meal = new Meal();
        $meal->name = $request->name;
		$meal->recept = $request->recept ;
		$meal-> carbohydrates = $request->carbohydrates ;
		$meal->fats = $request->faats ;
		$meal->protein = $request->protein ;
		$meal->calories = $request->calories ;
        $meal->save();
        return redirect('admin')->with('message',__('Meal').' '.$meal->name.' '.__('has been added').'!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('meal', array('meal' => Meal::findOrFail($id)));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('meal_update', array('meal' => Meal::findOrFail($id)));
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
        $meal= Meal::find($id);
		$meal->name = $request->name;
		$meal->recept = $request->recept ;
		$meal-> carbohydrates = $request->carbohydrates ;
		$meal->fats = $request->faats ;
		$meal->protein = $request->protein ;
		$meal->calories = $request->calories ;
        $meal->save();
        return redirect('admin')->with('message',__('Meal').' '.$meal->name.' '.__('has been updated').'!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Menu::where('meal_id',$id)->delete();
		Meal::where('id',$id)->delete();
		return redirect('meal/');
    }
}
