<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
	<title> {{ $title or 'ScriptReports' }}</title>
    {!! Html::script('public/js/jquery-1.10.2.min.js?v=2.1.5') !!}
    {!! Html::script("public/js/comman.js") !!}
    {!! Html::script('public/plugins/fancybox/jquery.fancybox.pack.js') !!}
    {!! Html::style("public/css/fonts.css") !!}
    {!! Html::style("public/css/responsive.css") !!}
    
    {!! Html::style('public/plugins/fancybox/jquery.fancybox.css') !!}
    
    <script type="text/javascript">
		var BASEURL='{{ URL::to('/') }}', TOKEN= '{{ csrf_token() }}';
	</script>
    
	@stack('scripts')
    @stack('css')
</head>
<body>
	<div align="center" id="warrper">
        @include('includes.front.header')
        @yield('content')
        @include('includes.footer')
    </div>
</body>
</html>
