<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{

    //fonction pour récupérer un client à partir de son id
    public function getCustomers(Request $request){
        $customer= Customer::where('id', $request->id)->first();
        return $customer;
    }

    //fonction pour ajouter un client
    public function addCustomer(Request $request){
        $customer= new Customer();
        $customer->firstName = $request->firstName;
        $customer->lastName = $request->lastName;
        $customer->email = $request->email;
        $customer->password = md5($request->password);
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->city = $request->city;
        $customer->postal_code = $request->postalCode;
        $customer->save();
        if($customer->status == 0){
            return redirect('/');
        }
    }

    //fonction pour mettre à jours un client
    public function updateCustomer(Request $request){
        $customer = Customer::find($request->id);
        $customer->firstName = $request->firstName;
        $customer->lastName = $request->lastName;
        $customer->email = $request->email;
        $customer->password = Hash::make($request->password);
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->city = $request->city;
        $customer->postal_code = $request->postalCode;
        $customer->save();
        return redirect('/admin/users');
    }

    //fonction pour supprimer un client à patir de son id
    public function deleteUser($id){
        $customer = Customer::find($id);
        $customer->delete();
        return redirect('/admin/users');
    }

    //fonction pour se connecter et mettre en session le client
    public function login(Request $request){
        $customer = Customer::where('email', $request->email)->first();

        if($customer && $customer->password==md5($request->password)){
            session()->put('me', $customer);
            if($customer->isAdmin==1){
                return redirect('/admin/services');
            }
            return redirect('/');
        }
        return redirect('/login');
    }

    //fonction pour se déconnecter
    public function logout(){
        session()->forget('me');
        return redirect('/');
    }


    //fonction pour activer un compte client à partir de son id
    public function activeAccount($id){
        $customer = Customer::find($id);
        $customer->status = 1;
        $customer->save();
        return redirect('/admin/users');

    }

}
