@extends('layouts.front');
 @push('css')
    	{!! Html::style("public/css/front/style.css") !!}
        {!! Html::style("public/css/style.css") !!}
        {!! Html::style("public/css/template.css") !!}
        {!! Html::style("public/css/bootstrap.min.css") !!}
        {!! Html::style("public/css/fonts.css") !!}
        {!! Html::style("public/css/profileform.css") !!}
        {!! Html::style("public/old/style.css") !!}
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    @endpush
    
    
@section('content')
 
<div class="col-md-8 col-md-offset-2 ymrg55 ypul50 xpul100 text-center Box" >
	<h1 class="Box pul20"><i class="fa fa-times-circle"></i>&nbsp;&nbsp;{{ trans('errors.error') }}</h1>
    <div class='alert alert-danger col-1-1'>
    	<h4>{{ trans('errors.file-not-found',['file'=>$heading]) }}</h4>        
     </div>
     <div class='alert alert-danger col-1-1'>
    	<h5>{{ $message }}</h5>        
     </div>
 </div>
@stop