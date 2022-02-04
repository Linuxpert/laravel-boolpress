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
    <ul>
        @foreach ($posts as $post)
            <li>
                <b>
                    <p>titolo: {{$post -> title}} - sottotitolo:{{$post -> subtitle}}:</p>
                    <p>{{$post -> content}}</p>
                    <p>utente: {{$post -> author}} - data:{{$post -> relase_date}}</p>
                </b>
            </li>
        @endforeach
    </ul>

    <h1>
        Crea un nuovo film
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

    <form action="{{route('store')}}" method="post">
    
        @method("post")
        @csrf
        
        <label for="title">Title:</label>
        <input type="text" name="title" placeholder="title"> <br>
        <label for="title">Subtitle:</label>
        <input type="text" name="subtitle" placeholder="subtitle"> <br>
        <label for="content">Content:</label>
        <input type="text" name="content" placeholder="content"> <br>
        <label for="author">Author:</label>
        <input type="text" name="author" placeholder="author"> <br>
        <label for="title">Releade Date:</label>
        <input type="date" name="relase_date" placeholder="Releade Date"> <br>
        <input type="submit" value="CREATE">


    </form>
    @endguest

    

    
@endsection