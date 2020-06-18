<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\Meal;
use App\User;
use Illuminate\Support\Facades\Auth;
class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $id = Auth::id(); 
        $menus=Menu::where('user_id','=',$id)->get();
		return view('menus',['user_id'=>$id,'menus'=>$menus]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
	 public function listt(){
	 	return view('menu_list', array('menus' => Menu::orderBy('date')->get()));
	 }
    public function create()
    {
        return view('menu_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $menu = new Menu();
		
		$menu->meal_id = $request->meal;
		$menu->user_id = $request->user;
		$menu->date = $request->date;
        $menu->save();
        return redirect('admin')->with('message',__('Menu').' '.' '.__('has been added').'!');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         return view('menucur', array('menu' => Menu::findOrFail($id)));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('menu_update');
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
        $menu = Menu::find($id);
		$menu->user_id = $request->user;
		$menu->date = $request->date;
        $menu->save();
        return redirect('admin')->with('message',__('Menu').' '.' '.__('has been updated').'!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Menu::where('id',$id)->delete();
		return redirect('menu_list/');
    }
}