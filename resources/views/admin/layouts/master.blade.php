<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<!-- include css files !-->
{{ Html::style('public/admin/css/style.css') }}
{{ Html::style('public/css/datepicker.css') }}

<link rel='stylesheet' href='//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css'>
<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

<!-- include js files !-->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">
		var ADMINURL = '{{ url('/admin') }}';	

</script>
{{ Html::script('public/admin/js/common.js') }}
{{ Html::script('public/plugins/datepicker/bootstrap-datepicker.js') }}
{{ Html::style('public/plugins/datepicker/datepicker.css') }}

<script type="text/javascript">
	$(document).ready(function(){
		
		    $('.datepicker').datepicker()
	})
</script>

<title>ScriptReader Online - Admin : @stack('title')</title>
</head>
<body>
	<div id="layout">
    	@include('admin.includes.header')
        <div id="content">
        	@if($ToolbarTitle['titletext'])
                <div id="toolbar-box">
                    <div class="conten-m">
                    	@if($toolbaricons)
                            <div id="toolbar-iconlist">
                                {!! $toolbaricons !!}
                            </div>
                       @endif  
                        <div class="page-title {{$ToolbarTitle['toolbarclass']}}">
                            <h2 class="header-title ">{{$ToolbarTitle['titletext']}} : {{$title}}</h2>
                        </div>
                    </div>
                </div>
            @endif
            
            @if($submenus)
                <div id="submenu-box">
                	 <div class="conten-m">
                        <ul>
                        	<?php 
							$activelink	=	Route::getCurrentRoute()->getPath();
							$currentR	=	end(explode('/',$activelink)); 
							?>
                            @foreach($submenus as $submenu)
                            	<?php
									if(preg_match('/'.$currentR.'/', $submenu['route']))
										$class = 'active';
									else
										$class = 'in-active';	
								?>
                                <li class="{{$class}}"><a href="{{$submenu['route']}}">{{$submenu['title']}}</a></li>
                            @endforeach 
                        </ul>
                        <div class="clear"></div>  	
                    </div>
                </div>
            @endif
            
            <div id="system-message">
                @if ($errors->has())
                    @foreach ($errors->all() as $error)
                        <div class='bg-danger alert'>{!! $error !!}</div>
                    @endforeach
                @endif
                
                 @if(Session::has('success'))
                    <div class="alert-box success">
                        {!! Session::get('success') !!}
                    </div>
                @endif
            </div>
            <div id="container">
            		<div class="conten-m">
                    	@yield('content')
                        <div class="clear"></div> 
                    </div>
            </div>
  			<div class="clr"></div>
		</div>
        @include('admin.includes.footer')
    </div>
</body>
</html>
