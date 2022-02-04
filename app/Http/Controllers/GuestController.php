<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class GuestController extends Controller
{
    public function home(){

        $posts= Post::all();
        return view('pages.first', compact('posts'));
    }

    public function store(Request $request){

        $data = $request -> validate([
            'title' => 'required|string|max:255',
            'subtitle'=> 'required|string|max:255',
            'author'=> 'required|string|max:255',
            'content'=> 'required|',
            'relase_date'=> 'required|date',
        ]);

        $post = Post::create($data);

        return redirect() -> route('home');
    }
}
