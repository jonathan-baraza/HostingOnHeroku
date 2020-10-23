<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function home()
    {
    	$posts=Post::orderBy('created_at','DESC')->paginate(5);
    	return view('posts/home',compact('posts'));
    }

    public function postByUser($id)
    {
    	$user=User::find($id);
    	$posts=Post::orderBy('created_at','DESC')->where('user_id',$id)->paginate(5);
    	return view('posts/post-by-user',compact('user','posts'));
    }

    public function addPost()
    {
    	return view('posts/add-post');
    }

    public function submitPost()
    {
    	$data=request()->validate([
    		'title'=>'required',
    		'body'=>'required',
    	]);

    	auth()->user()->posts()->create([
    		'title'=>$data['title'],
    		'body'=>$data['body'],
    	]);

    	return redirect('/home')->with('post_added','You have successfully submitted your post!');
    }

    public function editPost($id)
    {
    	$post=Post::find($id);
    	return view('posts/edit-post',compact('post'));
    	
    }
    public function updatePost()
    {
    	$id=request('id');
    	$post=Post::find($id);
    	$data=request()->validate([
    		'title'=>'required',
    		'body'=>'required',
    	]);
    	$post->update([
    		'title'=>$data['title'],
    		'body'=>$data['body'],
    	]);

    	return back()->with('post_updated','You have successfully updated your post');
    }

    public function confirmDeletePost($id)
    {
    	$post=Post::find($id);
    	if(auth()->user()->id==$post->user_id)
    	{
    		return view('posts/delete-post',compact('post'));
    	}
    	else
    	{
    		return "<h1 style='color:red'>Error! This action is not authorized!</h1>";
    	}
    	
    }
    public function deletePost($id)
    {
    	$post=Post::find($id);
    	$post->delete();
    	return redirect('/home')->with('post_deleted','You have successfully deleted your post!');
    }
}
