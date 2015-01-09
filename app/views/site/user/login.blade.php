@extends('site.layouts.default')
{{-- Web site Title --}}
@section('title')
{{{ 'User Account | Kowrie Accommodations' }}}
@stop

{{-- Content --}}
@section('content')
<div class="content-inner">

    {{ Form::open(array('url' => 'user/login')) }}
    <h1 id="page-title" class="page__title title">User account</h1>
    @if (Session::has('flash_message'))
    <p style="padding:5px" class="bg-success text-success">{{ Session::get('flash_message') }}</p>
    @endif
    @if (Session::has('error_message'))
    <p style="padding:5px" class="bg-danger text-danger">{{ Session::get('error_message') }}</p>
    @endif
    <div class="form-item form-type-textfield form-item-name">
        {{ Form::label('email', 'Email') }}
        {{ Form::text('email', null, ['class' => 'form-control', 'required' => 'required'])}}
        <div class="description">Enter your webserver12.com username.</div>
    </div>
    <div class="form-item form-type-password form-item-pass">
        {{ Form::label('password', 'Password') }}
        {{ Form::password('password', array( 'class' => 'form-control', 'required' => 'required'))}}
        <div class="description">Enter the password that accompanies your username.</div>
    </div>

    <div class="login-footer">                                                               
        {{ Form::submit('Log In', ['class' => 'btn btn-lg btn-primary btn-block']) }}            
    </div>
    {{ Form::close() }}
</div>
<div style="clear: both;"></div>

@stop


