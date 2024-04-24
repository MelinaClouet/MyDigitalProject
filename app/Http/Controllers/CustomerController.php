<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{

    public function getCustomers(Request $request){
        $customer= Customer::where('id', $request->id)->first();
        return $customer;
    }

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
        if($customer->status == 0){
            return redirect('/');
        }
    }

    public function deleteUser($id){
        $customer = Customer::find($id);
        $customer->delete();
        return response()->json(['success' => 'Le client a été supprimé avec succès!']);
    }

    public function login(Request $request){
        $customer = Customer::where('email', $request->email)->first();
        if($customer && Hash::check($request->password, $customer->password)){
            session()->put('me', $customer);
            if($customer->status==1){
                return redirect('/admin');
            }
            return redirect('/');
        }
        return redirect('/login');
    }

    public function logout(){
        session()->forget('me');
        return redirect('/');
    }

}
