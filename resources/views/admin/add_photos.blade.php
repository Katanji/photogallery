@extends ('admin.index')

@section ('content')

<h1>Add photo</h1>

<hr>

{!! Form::open(array('route' => 'admin.add_photo', 'data-parsley-validate' => '', 'files' => true)) !!}
    {{ Form::label('name', 'Name:') }}
    {{ Form::text('name', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '32')) }}

    {{ Form::label('featured_image', 'Upload Featured Image(JPEG, PNG, JPG):') }}
    {{ Form::file('featured_image') }}
    
    {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}
{!! Form::close() !!}

@endsection