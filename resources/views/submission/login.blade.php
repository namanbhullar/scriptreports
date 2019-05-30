@extends('layouts.front')

@section('content')    
    @push('css')
    	{!! Html::style("public/css/front/style.css") !!}
        {{ Html::style("public/css/template.css") }}
        {!! Html::style("public/css/fonts.css") !!}
        {!! Html::style("public/css/profileform.css") !!}
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    @endpush

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        @if (session('success'))
            <div class="alert success">
                <ul>
                        <li>{{ session('success') }}</li>
                </ul>
            </div>
        @endif

<div id="logincontainer" class="ymrg100 col-4-11">
    <div class='pul20'>     
          <h1 class="pullft20"><i class='fa fa-lock'></i> {{ trans('lang.submission-login') }}  </h1>
        {{ Form::open(['route'=>'submission.login','method'=>'post']) }}
        <div class='mrg5 pul5'>
            {{ Form::label('password', trans('lang.page-prtotected')) }}
            {{ Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control',required]) }}
        </div>
        <div class='mrg5 pul5'>
            {{ Form::submit('Login', ['class' => 'btn btn-primary']) }}
        </div>
     
        {{ Form::close() }}
     
    </div>
 </div>

@stop