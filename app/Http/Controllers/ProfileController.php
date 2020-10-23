<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;

class ProfileController extends Controller
{
    public function authors(){
    	$users=User::OrderBy('created_at','DESC')->get();
    	return view('posts/authors',compact('users'));
    }

    public function index($id)
    {
    	$user=User::find($id);
    	if(auth()->user()->id==$user->id)
    	{
    		return view('profiles/index',compact('user'));
    	}
    	else
    	{
    		return "<h1 style='color:red;'>Error! This action is not authorized!</h1>";
    	}
    	
    }

    public function update()
    {
    	$user=User::find(request('id'));


    	$data=request()->validate([
    		'name'=>'required',
    		'username'=>'required',
    		'email'=>'required',
    		'about_me'=>'required',
    		'image'=>'mimes:png,jpg,jpeg',
    	]);

    	$user->update([
    		'name'=>$data['name'],
    		'username'=>$data['username'],
    		'email'=>$data['email'],
    		
    	]);
    	$user->profile->update([
    		'about_me'=>$data['about_me'],
    	]);

    	if(request('image'))
    	{
    		$image=request('image');
    		$imagePath=$image->store('uploads','public');
    		$user->profile->update([
    			'image'=>$imagePath,
    		]);
    	}

    	return redirect('/profile/'.$user->id)->with('updated','You have successfully updated your profile!');


    }
}
