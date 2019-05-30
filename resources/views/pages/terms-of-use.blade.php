@extends('layouts.front')
@section('content')
    @push('css')
    	{!! Html::style("public/css/front/style.css") !!}
    @endpush

<div id="content-box">
    <div class="terms-policy" >
        <h1 class="top-heading"> {{ trans("front.scriptreader-Enterprises") }} </h1>
        <h2 class="top-heading">{!! trans("front.PRIVACY_POLICY.TopHeading") !!}</h2>
        
        <h3> {{ trans("front.TOU.1_head") }} </h3>
		<p> {{ trans("front.TOU.1_text") }} </p>
        
        <h3> {{ trans("front.TOU.2_head") }} </h3>
		<p> {{ trans("front.TOU.2_text") }} </p>
        
        <h3> {{ trans("front.TOU.3_head") }} </h3>
		<p> {{ trans("front.TOU.3_text") }} </p>
        
        <h3> {{ trans("front.TOU.4_head") }} </h3>
		<p> {{ trans("front.TOU.4_text") }} </p>
        
        <h3> {{ trans("front.TOU.5_head") }} </h3>
		<p> {{ trans("front.TOU.5_text") }} </p>
        
        <h3> {{ trans("front.TOU.6_head") }} </h3>
		<p> {{ trans("front.TOU.6_text") }} </p>
        
        <h3> {{ trans("front.TOU.7_head") }} </h3>
		<p> {{ trans("front.TOU.7_text") }} </p>
        
        <h3> {{ trans("front.TOU.8_head") }} </h3>
		<p> {{ trans("front.TOU.8_text") }} </p>
        
        <h3> {{ trans("front.TOU.9_head") }} </h3>
		<p> {{ trans("front.TOU.9_text") }} </p>
        
        <h3> {{ trans("front.TOU.10_head") }} </h3>
		<p> {{ trans("front.TOU.10_text") }} </p>
        
        <h3> {{ trans("front.TOU.11_head") }} </h3>
		<p> {{ trans("front.TOU.11_text") }} </p>
        
        <h3> {{ trans("front.TOU.12_head") }} </h3>
		<p> {{ trans("front.TOU.12_text") }} </p>
        
        <h3> {{ trans("front.TOU.13_head") }} </h3>
		<p> {{ trans("front.TOU.13_text") }} </p>
        
        <h3> {{ trans("front.TOU.14_head") }} </h3>
		<p> {{ trans("front.TOU.14_text") }} </p>
        
        <h3> {{ trans("front.TOU.15_head") }} </h3>
		<p> {{ trans("front.TOU.15_text") }} </p>
        
        <h3> {{ trans("front.TOU.16_head") }} </h3>
		<p> {{ trans("front.TOU.16_text") }} </p>
        
        <h3> {{ trans("front.TOU.17_head") }} </h3>
		<p> {{ trans("front.TOU.17_text") }} </p>
        
        <h3> {{ trans("front.TOU.18_head") }} </h3>
		<p> {{ trans("front.TOU.18_text") }} </p>
        
        <h3> {{ trans("front.TOU.19_head") }} </h3>
		<p> {{ trans("front.TOU.19_text") }} </p>

    </div>
</div>
<div class="clear"></div>
@stop