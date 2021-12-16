@extends('layouts.app')
@section('title', $course->name)

@section('content')

    <h1>En esta pagina podras editar un cursos</h1>



    <form action="{{route('courses.update', $course)}}" method="post">

        @csrf
        @method('put')
        <label>
            Nombre:
            <br>
            <input type="text" name="name" value="{{old('name', $course->name)}}">
        </label>
        @error('name')
            <br>
            <small>*{{$message}}</small>
            <br>

        @enderror
        <br>
        <label>
            Descripcion: <br>
            <input type="text" name="description" value="{{old('description', $course->description)}}">

        </label>
        @error('description')
        <br>
        <small>*{{$message}}</small>
        <br>

    @enderror
    <br>
    <label>
        date_start
        <br>
        <input type="date" name="date_start" value="{{old('date_start', $course->date_start)}}">

    </label>
    @error('date_start')
    <br>
    <small>*{{$message}}</small>
    <br>

@enderror

<br>
    <label>
        date_end
        <br>
        <input type="date" name="date_end" value="{{old('date_end',$course->date_end)}}">

    </label>
    @error('date_end')
    <br>
    <small>*{{$message}}</small>
    <br>
    @enderror

    <br>
        <label>
            Active: <br>
            <input type="text" name="active" value="{{old('active', $course->active)}}">

        </label>
        @error('active')
        <br>
        <small>*{{$message}}</small>
        <br>

    @enderror


        <br>
        <button type="submit">Actualizar formulario</button>

    </form>



@endsection
