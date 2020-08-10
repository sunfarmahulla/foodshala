<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AddMenu;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data=AddMenu::paginate(6);
        return view('home',['data'=>$data]);
    }
    public function search(Request $request){
        $name=$request->input('name');
        $food_type = $request->input('food_type');
        $data=AddMenu::where('food_title', 'like', '%' . $name. '%')->orwhere('food_type','like', '%' . $food_type. '%')->paginate(10);
        return view('welcome',['data'=>$data]);
    }
    
    
}
