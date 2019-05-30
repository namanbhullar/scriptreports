<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>ScriptReports</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

	{!! Html::style('public/css/bootstrap.min.css') !!}    
    {!! Html::style("public/css/fonts.css") !!}
    {!! Html::style('public/css/font-awesome.css') !!}
    {!! Html::style('public/css/main.css') !!}
    {!! Html::style("public/css/template.css") !!}
    {!! Html::style('public/css/style.css') !!}
    {!! Html::style("public/css/profileform.css") !!}
    {!! Html::style("public/css/responsive.css") !!}

	@stack('css')
	
    {!! Html::script('public/js/jquery-1.10.2.min.js?v=2.1.5') !!}
    
    
    @stack('script')
    
    <?php //Code for Plugins Css and Jquery; ?>
    <?php //Fancybox; ?>
       
    <script type="text/javascript"> var BASEURL	=	'{{ URL::to('/') }}' , TOKEN = '{{ csrf_token() }}';</script>
  
</head>
<body>

@yield('content')

</body>
</html>
