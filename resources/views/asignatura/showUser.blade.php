@extends('layouts.app')

@section('title', 'Muestra asignaturas')

@section('template_title')
    {{ $asignatura->name ?? 'Show Asignatura' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Asignatura</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('asignaturas.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Id Teacher:</strong>
                            {{ $asignatura->id_teacher }}
                        </div>
                        <div class="form-group">
                            <strong>Id Course:</strong>
                            {{ $asignatura->id_course }}
                        </div>
                        <div class="form-group">
                            <strong>Id Shedule:</strong>
                            {{ $asignatura->id_shedule }}
                        </div>
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $asignatura->name }}
                        </div>
                        <div class="form-group">
                            <strong>Color:</strong>
                            {{ $asignatura->color }}
                        </div>
                        <?php
                        if(!$exam){ ?>
                        <div class="form-group">
                            <strong>Name:</strong>
                            <strong>No hay examenes:</strong>
                            <?php } else { ?>
                        <div class="form-group">
                            <strong>Examen:</strong>
                            <strong>Name:</strong>
                            {{$exam->name}}

                            <br>
                            <strong>Examen:</strong>
                            <strong>Mark:</strong>
                            {{ $exam->mark }}

                              </div>
                              <?php }  ?>
                    </div>
                </div>






            </div>
        </div>
    </section>
@endsection
