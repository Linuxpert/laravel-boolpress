<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use App\Post;
use App\Category;


class GuestController extends Controller
{
    public function home(){

        $posts= Post::orderBy('created_at', 'desc') -> get();
        $categories = Category::all();

        return view('pages.first', compact('posts', 'categories'));
    }


    public function store(Request $request){

        $data = $request -> validate([
            'title' => 'required|string|max:255',
            'subtitle'=> 'required|string|max:255',
            'author'=> 'required|string|max:255',
            'content'=> 'required|',
            'relase_date'=> 'required|date',
        ]);
        $data['author'] = Auth::user() -> name;

        

        $post = Post::make($data);
        $category= Category::findOrFail($request -> get('category_id'));


        $post -> category() -> associate($category);
        $post -> save();



        return redirect() -> route('home');
    }
}
