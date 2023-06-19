<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
      $user= User::create($request->only("nom","prenom","email")+[
        "password"=> Hash::make($request->password)
      ]); 

      return  response( $user, Response::HTTP_CREATED); 
    }

    public function login(LoginRequest $request){
      if(Auth::attempt($request->only("email","password"))){
          $user=Auth::user();
          $token= $user->createToken('admin')->accessToken;
          return [
            'token'=>$token
          ];
      }
      return response([
        'error'=>"Token invalide"
      ],Response::HTTP_UNAUTHORIZED);
    }
}
