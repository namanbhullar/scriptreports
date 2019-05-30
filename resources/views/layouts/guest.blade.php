<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]--><head>
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
    
<style>
	.right_cntnt {
		margin: 0 auto;
		padding: 30px;
		width: 85%;
	}
	</style>
	
    {!! Html::script('public/js/jquery-1.10.2.min.js?v=2.1.5') !!}
    {!! Html::script('public/js/menu.js') !!}
    {!! Html::script('public/js/comman.js') !!}
    
    
    @stack('script')
    
    <?php //Code for Plugins Css and Jquery; ?>
    <?php //Fancybox; ?>
    {!! Html::script('public/plugins/fancybox/jquery.fancybox.pack.js') !!}
    
    {!! Html::style('public/plugins/fancybox/jquery.fancybox.css') !!}
    
    <!--- mCustomScrollbar -->
    {!! Html::script('public/plugins/customScroll/jquery.mCustomScrollbar.concat.min.js') !!}
    
    {!! Html::style('public/plugins/customScroll/jquery.mCustomScrollbar.css') !!}
    
    {{-- Bootstrap DatePicker --}}
    {!! Html::script('public/plugins/datepicker/bootstrap-datepicker.js') !!}
    {!! Html::style('public/plugins/datepicker/datepicker.css') !!}
    
    
    <script type="text/javascript"> 
	(function($){
		$(window).load(function(){
			$(".CustomScrollbar").mCustomScrollbar();			
		});		
		$(document).ready(function(e) {
            $('.datepicker').datepicker({format:'mm/dd/yyyy'});
        });
	})(jQuery)
	var BASEURL	=	'{{ url('/') }}', TOKEN = '{{ csrf_token() }}';
	</script>
  
</head>
<body>
<!--[if lt IE 7]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<!-- Menu -->


<!-- dash Content -->
    <div id="dash-content" class="dash-inner-content"> 
        <div class="col-md-12 padding_none">
        
            <div class="container-fluid top-header sticky dash-header"> 
               	
                @include('includes.guest.header')
                 
            
            </div>  
            <div class="clearfix"></div>    
              
        	@if (count($errors) > 0 || session('success'))
            <div class="container-fluid mrgtp10">    
            	
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
                    <div class="alert alert-success">
                        <ol>
                                <li>{{ session('success') }}</li>
                        </ol>
                    </div>
                @endif
                
            	<div class="clearfix"></div>         
            </div>
            <div class="clearfix"></div>    
            @endif
        	            
        
            <div class="right_cntnt">    
            	
                @yield('content')
                
            	<div class="clearfix"></div>         
            </div>
        
        	<div class="clearfix"></div>
        </div>
    </div>
<!-- dash Content -->

@include('includes.footer')

</body>
</html>
