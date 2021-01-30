@extends('layouts.app')
@section('content')
{!! Form::open(array('route' => 'adds.store','method'=>'POST')) !!}
<div class="row">
<div class="form-group">
            <strong>Title:</strong>
            {!! Form::text('Title',null, array('placeholder' => 'Name','class' => 'form-control')) !!}
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
    {!! Form::label('Type',null, ['class' => 'control-label']) !!}
    {!! Form::select('Type', $Type ?? '', array('class' => 'form-control')) !!}
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
    {!! Form::label('Content Type',null, ['class' => 'control-label']) !!}
    {!! Form::select('ContentType', $ContentType, array('class' => 'form-control')) !!}
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
{!! Form::label('Status',null, ['class' => 'control-label']) !!}
{!! Form::label('Active',null, ['class' => 'control-label']) !!}
{{ Form::radio('status', '1' , true) }}
{!! Form::label('InActive',null, ['class' => 'control-label']) !!}
  {{ Form::radio('status', '0' , false) }}
  </div>
  </div>



<select class="form-control" id="user" name="user_id">
                            <option value="">--Select--</option>
                            @foreach ($users as $key=> $user)
                               <option value="{{ $user->id }}">{{ $user->name }}</option>
                           @endforeach
                           </select>
                           <div class="col-xs-12 col-sm-12 col-md-12">
       


{!! Form::submit('Create New Task', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}
</div>
@endsection