<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BlogPosts;

class PostController extends Controller
{
    
    public function store(Request $request)
    {
		// Validating Data
         $validatedData = $request->validate([
			'title' => 'required|unique:blog_posts|max:50',
			'contents' => 'required|max:255',
			'user_id' => 'required'
		]);

        $post = new BlogPosts;
        $post->title = $request->title;
		$post->contents = $request->contents;
		$post->user_id = $request->user_id;
        $post->save();
		
		$posts = BlogPosts::all();
		// return Redirect::to('post/create', ['posts' => $posts]);
		return view('post.create', ['posts' => $posts]);
    }
	
	public function create()
	{
		$posts = BlogPosts::all();
		return view('post.create', ['posts' => $posts]);
	}
}
