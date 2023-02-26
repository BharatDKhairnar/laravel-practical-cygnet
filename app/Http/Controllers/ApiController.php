<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ApiController extends Controller
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

        if (Auth::attempt($data)) {
            $token =  Auth::user()->createToken('MyApp')->accessToken;
            return response()->json(['token' => $token, 'name'=>auth()->user()->name], 200);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }
    /**
     * Display a listing of the users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $user = User::where('user_type','user')->get();
        return response()->json($user);
    }

    /**
     * Display a detail of the users.
     *
     * @return \Illuminate\Http\Response
     */
    public function detail(Request $request){

        $user = Auth::user();
        return response()->json($user);
    }
}
