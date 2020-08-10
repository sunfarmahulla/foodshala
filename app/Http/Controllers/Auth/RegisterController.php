<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Address;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed', 'regex:/^[a-zA-Z0-9!@#$%^&*]{6,16}$/'],
            'food_type'=>['required'],
            'mobile' => ['required', 'min:10', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'unique:users'],
            'name_of_restaurent'=>['string', 'max:500']
            
        ],['mobile.unique'=>'mobile no. is already in use']);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {   
        $address1 = $data['address1'];
        $address2 = $data['address2'];
        $city = $data['city'];
        $state = $data['state'];
        $country = $data['country'];
        $zip = $data['zip'];

        $addressM = Address::where('city', $city)->where('zip', $zip)->where('country', $country)->where('state', $state)->where('address1', $address1)->where('address2', $address2)->first();
        if (empty($addressM)) {
            $addressM = new Address();
            $addressM->address1 = $address1;
            $addressM->address2 = $address2;
            $addressM->country = $country;
            $addressM->state = $state;
            $addressM->city = $city;
            $addressM->zip = $zip;
            if ($addressM->save() == false) {
                return Redirect::back()->with('error', 'Failed to save address');
            }
        }
        return User::create([
            'address_id' => $addressM->id,
            'first_name' => $data['first_name'],
            'middle_name' => $data['middle_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'mobile' =>$data['mobile'],
            'password' => Hash::make($data['password']),
            'food_type' =>$data['food_type'],
            'user_type'=>$data['user_type'],
            'name_of_restaurent'=>$data['name_of_restaurent']
            
        ]);
    }
}
