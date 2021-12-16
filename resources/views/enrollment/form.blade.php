<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('id_student') }}
            {{ Form::text('id_student', $enrollment->id_student, ['class' => 'form-control' . ($errors->has('id_student') ? ' is-invalid' : ''), 'placeholder' => 'Id Student']) }}
            {!! $errors->first('id_student', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_course') }}
            {{ Form::text('id_course', $enrollment->id_course, ['class' => 'form-control' . ($errors->has('id_course') ? ' is-invalid' : ''), 'placeholder' => 'Id Course']) }}
            {!! $errors->first('id_course', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('status') }}
            {{ Form::text('status', $enrollment->status, ['class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : ''), 'placeholder' => 'Status']) }}
            {!! $errors->first('status', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>