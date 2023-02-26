<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function login(Request $request) {
        
        $input = $request->all();

        $validator = Validator::make($input, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if($validator->fails()){
            return response()->json(['error' => $validator->errors()]);
        }

        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        $customer = Customers::where('email',$request->email)->first();
        if ($customer) {
            $token =  $customer->createToken('CustomerApp')->accessToken;
            return response()->json(['token' => $token, 'name'=> $customer->name], 200);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }

    public function detail(){ // Can't access without passing Bearer access_token
        $user = Auth::user();
        return response()->json(['user' => $user], 200);
    }
}
