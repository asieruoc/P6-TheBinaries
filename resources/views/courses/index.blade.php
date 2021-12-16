@extends('layouts.app')
@section('title', 'Indice Cursos')
@section('content')


<h1>Bienvenido a la página principal de cursos</h1>
<a href="{{route('courses.create')}}">Crear Curso</a>
<ul>
    @foreach ($courses as $course)
    <li>
        <a href="{{route('courses.show', $course)}}">{{$course->name}}</a>
    </li>

    @endforeach
</ul>
{{$courses->links()}}

@endsection
