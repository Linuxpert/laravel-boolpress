@extends('layouts.main-layout')
@section('content')
    
    <h1>{{ Auth::user() -> name}}</h1>
    <a  class="btn btn-secondary" href="{{route('logout')}}">LOGOUT</a>

    <h1>Update Post</h1>
    <form action="#" method="POST">
    
        @method("POST")
        @csrf
    
        <label for="title">Title:</label>
        <input type="text" name="title" placeholder="title" value="{{$post -> title}}"> <br>
        <label for="title">Subtitle:</label>
        <input type="text" name="subtitle" placeholder="subtitle" value="{{$post -> subtitle}}"> <br>
        <label for="content">Content:</label>
        <input type="text" name="content" placeholder="content" value="{{$post -> content}}"> <br>
        <label for="title">Releade Date:</label>
        <input type="date" name="relase_date" placeholder="Releade Date"> <br>
        <select name="category_id">
            @foreach ($categories as $category)
                <option value="{{$category -> id}}"
                
                    @if ($category -> id == $post -> category -> id)
                        selected
                    @endif

                >{{$category -> name}}</option>
            @endforeach
        </select>
        <h4>Tags</h4>
        @foreach ($tags as $tag)
            <input type="checkbox" name="tags[]" value="{{$tag -> id}}"

                @foreach ($post -> tags as $postTag)
                    @if ($tag -> id == $postTag -> id)
                        checked
                    @endif
                @endforeach
            > {{$tag -> name}} <br>
        @endforeach
    
        <input type="submit" value="CREATE"> <br>

        <a class="btn btn-secondary" href="{{route('home')}}">Back home</a>

    </form>
@endsection