@extends('layouts.app')

@section('template_title')
    {{ $exam->name ?? 'Show Exam' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Exam</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('exams.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Class:</strong>
                            {{ $exam->id_class }}
                        </div>
                        <div class="form-group">
                            <strong>Id Student:</strong>
                            {{ $exam->id_student }}
                        </div>
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $exam->name }}
                        </div>
                        <div class="form-group">
                            <strong>Mark:</strong>
                            {{ $exam->mark }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
