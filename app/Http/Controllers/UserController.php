<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserResourceWeb;
use App\Http\Resources\UserResourceMobile;
use Symfony\Component\HttpFoundation\Response;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //return User::all();
        return response(UserResourceWeb::collection(User::paginate(35)),Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    { 
       
        return response(new UserResourceMobile($user),Response::HTTP_OK);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $user = user::findOrFail($id);
        $user->update($request->only("nom", "prenom", "email"));
        return response()->json(["data" => [
            "success" => true,
            "user" =>  $user
        ]]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
