<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class CreatesNewUser extends Controller
{
    public function register(Request $req)
    {
        $req->validate([
            'email'=>'required',
            'password'=>'required',
            'name'=>'required'
        ]);
    	$signupdata=new User;
    	// $signupdata->token=$req->_token;
    	$signupdata->name=$req->name;
    	$signupdata->email=$req->email;
    	$signupdata->password=bcrypt($req->password);
    	$result=$signupdata->save();
    	if($result)
    	{
    		return['result'=>'Registered Successfully'];
    	}
    	else
    	{
    		return['result'=>'Please try again'];	
    	}
    }
}
