<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function addCustomer(Request $request){
        $customer= new Customer();
        $customer->firstName = $request->firstName;
        $customer->lastName = $request->lastName;
        $customer->email = $request->email;
        $customer->password = Hash::make($request->password);
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->city = $request->city;
        $customer->postal_code = $request->postalCode;
        $customer->save();

        return redirect('/');

    }

    public function login(Request $request){
        $customer = Customer::where('email', $request->email)->first();
        if($customer && Hash::check($request->password, $customer->password)){
            session()->put('me', $customer);
            return redirect('/');
        }
        return redirect('/login');
    }
}
