<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AddMenu;

class WelcomeController extends Controller
{
    public function getFood(Request $request){
        $data= AddMenu::paginate(6);
        return view('welcome',['data'=>$data]);
    }
}
