<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;



class UserController extends Controller 
{

public function index()
{


}


public function create(Request $request)
{
    $validator = Validator::make($request->all(), [
      'name' => 'required|string',
      'email' => 'required|email|max:64',
      'password' => 'required|string|min:8',
    ]);
  
       if($validator->fails()){
            return response(['message' => 'Validation errors', 'errors' =>  $validator->errors(), 'status' => false], 422);
        }

    $input = $request->all();
        $input['password'] = Hash::make($input['password']);
  
  /**Creating new user**/
        $user = User::create($input);
  
   /**Take note of this: Your user authentication access token is generated here **/
        $data['token'] =  $user->createToken('Equip')->accessToken;
        $data['user_data'] = $user;
  
          return response(['data' => $data, 'message' => 'Account created successfully!', 'status' => true]);

}
  
//   public function store(Request $request)




}