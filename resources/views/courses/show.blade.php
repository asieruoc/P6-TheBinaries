@extends('layouts.app')

@section('title', $course->name)


@section('content')
    <h1>Bienvenido al curso: {{$course->name}} </h1>
    <a href="{{route('courses.index')}}">Volver a cursos</a>
    <br>
    <a href="{{route('courses.edit',$course)}}">Editar curso</a>

    <p><strong>Categoria: </strong>{{$course->name}}</p>
    <p><Strong>Descripcion:  </Strong>{{$course->description}}</p>
    <p><Strong>Fecha de Inicio: </Strong>{{$course->date_start}}</p>
    <p><Strong>Fecha de Fin: </Strong>{{$course->date_end}}</p>
    <p><Strong>Activo: </Strong>{{$course->active}}</p>

    <form action="{{route('courses.destroy',$course)}}" method="POST">
        @csrf
        @method('delete')
        <button type="submit">Eliminar</button>
    </form>
@endsection
