@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb mb-4">
        <div class="pull-left">
            <h2> Show Ad</h2>
        </div>
        
    </div>
</div>


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {{ $ad->title }}
        </div>
        <div class="form-group">
            <strong>AdType:</strong>
            {{ $ad->adType }}
        </div>
        <div class="form-group">
            <strong>ContentType:</strong>
            {{ $ad->contentType }}
        </div>
        <div class="form-group">  
            <strong>ContentType:</strong>
            {{ $ad->contentType }}
        </div>


        <div class="form-group">
       
            @if($ad->status)
            <strong>Status</strong>
            <h3>Active</h3>
            @else
            <strong>Status</strong>
            <h3>Inactive</h3>
            @endif
        </div>



        <div class="form-group">
            
            <strong>User Name:</strong>
            {{ $ad->user->name }}
        </div>
    </div>
    
</div>
@endsection
