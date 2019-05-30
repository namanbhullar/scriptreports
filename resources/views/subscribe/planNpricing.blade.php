@extends('layouts.front')

@section('content')
    @push('css')
    	{!! Html::style("public/css/front/style.css") !!}
        {!! Html::style("public/css/style.css") !!}
        {!! Html::style("public/css/template.css") !!}
        {!! Html::style("public/css/fonts.css") !!}
        {!! Html::style("public/css/bootstrap.min.css") !!}
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    @endpush
   
    
@if (count($errors) > 0)
    <div class="alert alert-danger">
    	<ol>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ol>
    </div>
@endif

@if (session('success'))
    <div class="alert success">
    	<ol>
                <li>{{ session('success') }}</li>
        </ol>
    </div>
@endif
<div class="page-heading">
 	<h2 class="heading">ScriptReports Pricing</h2>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <td></td>
                            <th class="text-center">{{ trans("lang.guest") }}</th>
                            <th class="text-center">{{ trans("lang.basic-plan") }}</th>                    
                            <th class="text-center">{{ trans("lang.pro-plan") }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><span aria-hidden="true" class="glyphicon glyphicon-check"></span> Custom Evaluation Templates</td>
                            <td class="text-success text-center"><span aria-hidden="true" class="glyphicon glyphicon-ok"></span> Supported</td>
                            <td class="text-success text-center"><span aria-hidden="true" class="glyphicon glyphicon-ok"></span> Supported</td>
                            <td class="text-success text-center"><span aria-hidden="true" class="glyphicon glyphicon-ok"></span> Supported</td>
                        </tr>
                        <tr>
                            <td><span aria-hidden="true" class="glyphicon glyphicon-check"></span> PDF Report Creation</td>
                            <td class="text-success text-center"><span aria-hidden="true" class="glyphicon glyphicon-ok"></span> Supported</td>
                            <td class="text-success text-center"><span aria-hidden="true" class="glyphicon glyphicon-ok"></span> Supported</td>
                            <td class="text-success text-center"><span aria-hidden="true" class="glyphicon glyphicon-ok"></span> Supported</td>
                        </tr>
                        <tr>
                            <td><span aria-hidden="true" class="glyphicon glyphicon-check"></span> Profile Page w/ Own URL </td>
                            <td class="text-success text-center"><span aria-hidden="true" class="glyphicon glyphicon-ok"></span> Supported</td>
                            <td class="text-success text-center"><span aria-hidden="true" class="glyphicon glyphicon-ok"></span> Supported</td>
                            <td class="text-success text-center"><span aria-hidden="true" class="glyphicon glyphicon-ok"></span> Supported</td>
                        </tr>
                        <tr>
                            <td><span aria-hidden="true" class="glyphicon glyphicon-check"></span> Job Leads </td>
                            <td class="text-danger text-center"><span aria-hidden="true" class="glyphicon glyphicon-remove"></span> Not Supported</td>
                            <td class="text-success text-center"><span aria-hidden="true" class="glyphicon glyphicon-ok"></span> Supported</td>
                            <td class="text-success text-center"><span aria-hidden="true" class="glyphicon glyphicon-ok"></span> Supported</td>
                        </tr>
                        <tr>
                            <td><span aria-hidden="true" class="glyphicon glyphicon-check"></span> Reader/Writer Directory Listing </td>
                            <td class="text-danger text-center"><span aria-hidden="true" class="glyphicon glyphicon-remove"></span> Not Supported</td>
                            <td class="text-success text-center"><span aria-hidden="true" class="glyphicon glyphicon-ok"></span> Supported</td>
                            <td class="text-success text-center"><span aria-hidden="true" class="glyphicon glyphicon-ok"></span> Supported</td>
                        </tr>
                        <tr>
                            <td><span aria-hidden="true" class="glyphicon glyphicon-check"></span> Private Message Box </td>
                            <td class="text-danger text-center"><span aria-hidden="true" class="glyphicon glyphicon-remove"></span> Not Supported</td>
                            <td class="text-danger text-center"><span aria-hidden="true" class="glyphicon glyphicon-remove"></span> Not Supported</td>
                            <td class="text-success text-center"><span aria-hidden="true" class="glyphicon glyphicon-ok"></span> Supported</td>
                        </tr>
                        <tr>
                            <td><span aria-hidden="true" class="glyphicon glyphicon-check"></span> Post Jobs </td>
                            <td class="text-danger text-center"><span aria-hidden="true" class="glyphicon glyphicon-remove"></span> Not Supported</td>
                            <td class="text-danger text-center"><span aria-hidden="true" class="glyphicon glyphicon-remove"></span> Not Supported</td>
                            <td class="text-success text-center"><span aria-hidden="true" class="glyphicon glyphicon-ok"></span> Supported</td>
                        </tr>
                        <tr>
                            <td><span aria-hidden="true" class="glyphicon glyphicon-check"></span> Branded Invoices </td>
                            <td class="text-danger text-center"><span aria-hidden="true" class="glyphicon glyphicon-remove"></span> Not Supported</td>
                            <td class="text-danger text-center"><span aria-hidden="true" class="glyphicon glyphicon-remove"></span> Not Supported</td>
                            <td class="text-success text-center"><span aria-hidden="true" class="glyphicon glyphicon-ok"></span> Supported</td>
                        </tr>
                        <tr>
                            <td><span aria-hidden="true" class="glyphicon glyphicon-check"></span> Paypal & Credit Card Integration </td>
                            <td class="text-danger text-center"><span aria-hidden="true" class="glyphicon glyphicon-remove"></span> Not Supported</td>
                            <td class="text-danger text-center"><span aria-hidden="true" class="glyphicon glyphicon-remove"></span> Not Supported</td>
                            <td class="text-success text-center"><span aria-hidden="true" class="glyphicon glyphicon-ok"></span> Supported</td>
                        </tr>
                        <tr>
                            <td><span aria-hidden="true" class="glyphicon glyphicon-check"></span> Safe Pay Escrow Protection </td>
                            <td class="text-danger text-center"><span aria-hidden="true" class="glyphicon glyphicon-remove"></span> Not Supported</td>
                            <td class="text-danger text-center"><span aria-hidden="true" class="glyphicon glyphicon-remove"></span> Not Supported</td>
                            <td class="text-success text-center"><span aria-hidden="true" class="glyphicon glyphicon-ok"></span> Supported</td>
                        </tr>
                        <tr>
                            <td><h4><span class="label label-primary "> Select Your Plan </span></h4></td>
                            <td class="text-danger text-center"><h4><a href="{{ url('/subscribes/1') }}"><span  class="label label-warning">Guest</span></a></h4> </td>
                            <td class="text-danger text-center"><h4><a href="{{ url('/subscribes/2') }}"><span class="label label-info">Basic $19.95 per year</span></a></h4></td>
                            <td class="text-success text-center"><h4><a href="{{ url('/subscribes/4') }}"><span class="label label-success">Pro $9.95 per month</span></a></h4></td>
                        </tr>
                    </tbody>                    
                </table>
            </div>
        </div>
    </div>
</div>
    
@stop