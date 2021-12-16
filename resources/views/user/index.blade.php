@extends('layouts.app')
@section('title', 'Indice Cursos')
@section('content')


<h1>Bienvenido a la página principal de Usuarios</h1>
<a href="">Crear Usuario</a>
<ul>
    @foreach ($users as $user)
    <li>
        <a href="{{route('user.show', $user)}}">{{$user->name}}</a>
    </li>

    @endforeach
</ul>
{{$users->links()}}

@endsection
