<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AddMenu;
use Auth;
use Redirect;
use Storage;

class MenuController extends Controller
{
    public function viewFood(Request $request,$id){
        $data=AddMenu::where('id', '=',$id)->first();
        return view('viewFood',['data'=>$data]);
    }

    public function add(Request $request){
        $name_of_restaurent= Auth::user()->name_of_restaurent;
        $title = $request->input('title');
        $food_type = $request->input('food_type');
        $location = $request->input('location');
        $image = $request->file('image');
        $about = $request->input('about');
        $actual_price = $request->input('actual_price');
        $discount_price = $request->input('discount_price');

        request()->validate([
            'title'=>['required', 'string', 'max:150'],
            'food_type'=>['required'],
            'location'=>['required'],
            

        ],[]);
        $originalName=$image->getClientOriginalName();
        $originalFileName=explode('.', $originalName)[0];
        $input['imagename'] =time().$originalFileName.'.'.$image->getClientOriginalExtension();
        $file_name=$input['imagename'];
        $dir = 'public/';
        $path = 'images/';
        Storage::disk('local')->putFileAs($dir.$path, ($image),$file_name);
        $data = new AddMenu();
        $data->user_id=Auth::user()->id;
        $data->restaurent_name=$name_of_restaurent;
        $data->food_title=$title;
        $data->food_type=$food_type;
        $data->location=$location;
        $data->food_discription=$about;
        $data->image=$file_name;
        $data->actual_price=$actual_price;
        $data->discount_price=$discount_price;
        if($data->save()){
            return Redirect::back()->with('success', 'successfully added item');
        }else{
            return Redirect::back()->with('error', 'Error in adding item');
        }

    }
    Public function list(Request $request){
        $data=AddMenu::where('user_id',Auth::user()->id)->paginate(9);
        return view('restaurent/menuList',['data'=>$data]);
    }
    public function getEdit($id){
        $data=AddMenu::where('id',$id)->first();
        return view('restaurent/editMenu',['data'=>$data]);
    }

    public function edit(Request $request, $id){
        $menu=AddMenu::where('id',$id)->first();
        $name_of_restaurent= Auth::user()->name_of_restaurent;
        $title = $request->input('title');
        $food_type = $request->input('food_type');
        $location = $request->input('location');
        $image = $request->file('image');
        $about = $request->input('about');
        $actual_price = $request->input('actual_price');
        $discount_price = $request->input('discount_price');

        request()->validate([
            'title'=>['required', 'string', 'max:150'],
            'food_type'=>['required'],
            'location'=>['required'],
        ],[]);
        if(!empty($image)){
            $originalName=$image->getClientOriginalName();
            $originalFileName=explode('.', $originalName)[0];
            $input['imagename'] =time().$originalFileName.'.'.$image->getClientOriginalExtension();
            $file_name=$input['imagename'];
            $dir = 'public/';
            $path = 'images/';
            Storage::disk('local')->putFileAs($dir.$path, ($image),$file_name);
        }
        $data = AddMenu::findorfail($id);
        $data->user_id=Auth::user()->id;
        $data->restaurent_name=$name_of_restaurent;
        $data->food_title=$title;
        $data->food_type=$food_type;
        $data->location=$location;
        $data->food_discription=$about;
        if(isset($file_name)){
            $data->image=$file_name;
        }else{
            $data->image=$menu->image;
        }
        $data->actual_price=$actual_price;
        $data->discount_price=$discount_price;
        if($data->save()){
            return Redirect::back()->with('success', 'successfully updated item');
        }else{
            return Redirect::back()->with('error', 'Error in updating item');
        }
    }

    public function delete($id){
        $menu=AddMenu::where('id',$id)->first();
        $data=AddMenu::where('id',$id)->delete();
        if($data==true){
            unlink(storage_path('app/public/images/'.$menu->image));
            return Redirect::back()->with('success', 'successfully deleted item');

        }else{
            return Redirect::back()->with('error', 'error deleting item');

        }

    }
}
