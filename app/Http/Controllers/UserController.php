<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller{

    public function create(Request $request){
        
        $validation = [
            // defining unique column
            "username" => "required|unique:user,username",
            "password" => ["required", Password::min(8)->letters()->numbers()->mixedCase()],
            "email" => "required|email|unique:user,email",
            "pass_confirm" => "required|same:password"
        ];

        $validate = $request -> validate($validation);

        $user = [
            "username" => $request -> username,
            "password" => Hash::make($request -> password),
            "email" => $request -> email,
        ];
        UserModel::create($user);
        return redirect("/login");

    }
}
