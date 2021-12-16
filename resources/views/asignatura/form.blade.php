<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('id_teacher') }}
            {{ Form::text('id_teacher', $asignatura->id_teacher, ['class' => 'form-control' . ($errors->has('id_teacher') ? ' is-invalid' : ''), 'placeholder' => 'Id Teacher']) }}
            {!! $errors->first('id_teacher', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_course') }}
            {{ Form::text('id_course', $asignatura->id_course, ['class' => 'form-control' . ($errors->has('id_course') ? ' is-invalid' : ''), 'placeholder' => 'Id Course']) }}
            {!! $errors->first('id_course', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_shedule') }}
            {{ Form::text('id_shedule', $asignatura->id_shedule, ['class' => 'form-control' . ($errors->has('id_shedule') ? ' is-invalid' : ''), 'placeholder' => 'Id Shedule']) }}
            {!! $errors->first('id_shedule', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('name') }}
            {{ Form::text('name', $asignatura->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('color') }}
            {{ Form::text('color', $asignatura->color, ['class' => 'form-control' . ($errors->has('color') ? ' is-invalid' : ''), 'placeholder' => 'Color']) }}
            {!! $errors->first('color', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>