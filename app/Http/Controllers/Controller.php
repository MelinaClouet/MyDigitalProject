<?php

namespace App\Http\Controllers;

use App\Models\Customer;

abstract class Controller
{
    public function addCustomer(Request $request){
        $customer= new Customer();
        $customer->firstName = $request->firstName;
        $customer->lastName = $request->lastName;
        $customer->email = $request->email;
        $customer->password = Hash($request->password);
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->city = $request->city;
        $customer->postal_code = $request->postal_code;
        $customer->save();

    }
}
