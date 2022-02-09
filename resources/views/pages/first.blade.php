@extends('layouts.main-layout')
@section('content')

    @auth
        <h1>{{ Auth::user() -> name}}</h1>
        <a  class="btn btn-secondary" href="{{route('logout')}}">LOGOUT</a>
    @else
        <h1>If you wanne see my site you have to login/register</h1>
    @endauth
    
    @guest
    <h2>Register</h2>
    <form action="{{ route('register') }}" method="POST">
        @method('POST')
        @csrf

        <label for="name">Name</label>
        <input type="text" name="name"> <br>
        <label for="email">E-mail</label>
        <input type="text" name="email"> <br>
        <label for="password">Password</label>
        <input type="password" name="password"> <br>
        <label for="password_confirmation">Password Confirm</label>
        <input type="password" name="password_confirmation"> <br>
        <br>
        <input type="submit" value="REGISTER">
    </form>

    <br><hr class="bg-white"><br>

    <h2>Login</h2>
    <form action="{{ route('login') }}" method="POST">

        @method('POST')
        @csrf

        <label for="email">E-mail</label>
        <input type="text" name="email"> <br>
        <label for="password">Password</label>
        <input type="password" name="password"> <br>
        <br>
        <input type="submit" value="LOGIN">

    </form>
    @else

    <h1>Lista posts:</h1>
    {{-- <ul>
        @foreach ($posts as $post)
            <li>
                <b>
                    <p>titolo: {{$post -> title}} - sottotitolo:{{$post -> subtitle}}:</p>
                    <p>{{$post -> content}}</p>
                    <p>utente: {{$post -> author}} - data:{{$post -> relase_date}}</p>
                </b>
            </li>
        @endforeach
    </ul> --}}
    <table border="1">
        <tr>
            <th>Title</th>
            <th>Text</th>
            <th>Author</th>
            <th>Category</th>
            {{-- <th>Likes</th> --}}
            <th>Tags</th>
            <th>Data</th>
            <th>Action</th>
        </tr>
        @foreach ($posts as $post)
            <tr>
                <td>{{$post -> title}}</td>
                <td>{{$post -> content}}</td>
                <td>{{$post -> author}}</td>
                <td>{{$post -> category -> name}}</td>
                {{-- <td>{{$post -> likes}}</td> --}}
                <td>
                    @foreach ($post -> tags  as $tag)
                        {{$tag -> name}} <br>
                    @endforeach
                </td>
                <td>{{$post -> created_at}}</td>
                <td>
                    <a class="btn btn-secondary" href="{{route('post.edit', $post -> id)}}">EDIT</a>
                    <a class="btn btn-danger" href="{{route('post.delete', $post -> id)}}">DELETE</a>
                </td>

            </tr>
        @endforeach
    </table>

    <h1>
        Crea un nuovo post
    </h1>

    
    @if ($errors ->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>
                        {{$error}}
                    </li>
                @endforeach
            </ul>

        </div>
    @endif

    <form action="{{route('store')}}" method="POST">
    
        @method("POST")
        @csrf
        
        <label for="title">Title:</label>
        <input type="text" name="title" placeholder="title"> <br>
        <label for="title">Subtitle:</label>
        <input type="text" name="subtitle" placeholder="subtitle"> <br>
        <label for="content">Content:</label>
        <input type="text" name="content" placeholder="content"> <br>
        <label for="title">Releade Date:</label>
        <input type="date" name="relase_date" placeholder="Releade Date"> <br>
        <select name="category_id">
            @foreach ($categories as $category)
                <option value="{{$category -> id}}">{{$category -> name}}</option>
            @endforeach
        </select>
        <h4>Tags</h4>
        @foreach ($tags as $tag)
        <input type="checkbox" name="tags[]" value="{{$tag -> id}}"> {{$tag -> name}} <br>
        @endforeach
        
        <input type="submit" value="CREATE">


    </form>
    @endguest

    

    
@endsection