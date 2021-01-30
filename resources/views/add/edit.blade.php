@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb mb-4">
        <div class="pull-left">
            <h2>Edit Ad</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('adds.index') }}"> Back</a>
        </div>
    </div>
</div>


@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif


{!! Form::model($ad, ['method' => 'PATCH','route' => ['adds.update', $ad->id]]) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Title:</strong>
            {!! Form::text('Title', $ad->title, array('placeholder' => 'Name','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Content Type:</strong>
            {!! Form::select('contentType', [0=>'image',1=>'video'],$ad->contentType, array('class' => 'form-control')) !!}
        </div>
    </div>

    

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>AdType:</strong>
            {!! Form::select('adType',[0=>'bannerAdd',1=>'InterstitialAdd',2=>'rewardedAdd'], $ad->adType, ['class' => 'form-control', 'required' => 'required']); !!}       
        </div>
    </div>



    


    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Status:</strong>
            {!! Form::label('Status',null, ['class' => 'control-label']) !!}
            {!! Form::label('Active',null, ['class' => 'control-label']) !!}
            {{ Form::radio('status', '1' , true) }}
            {!! Form::label('InActive',null, ['class' => 'control-label']) !!}
            {{ Form::radio('status', '0' , false) }}
        </div>
    </div>


    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>User:</strong>
            <select class="form-control" name="user" required="required">
                
                @foreach($user as $user_index)
                    <option value="{{ $user_index->id }}" @if($ad->user_id == $user_index->id) selected="selected" @endif>{{ $user_index->name}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
{!! Form::close() !!}


@endsection
