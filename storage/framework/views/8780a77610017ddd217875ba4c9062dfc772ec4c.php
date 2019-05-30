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

	<?php echo Html::style('public/css/bootstrap.min.css'); ?>    
    <?php echo Html::style("public/css/fonts.css"); ?>

    <?php echo Html::style('public/css/font-awesome.css'); ?>

    <?php echo Html::style('public/css/main.css'); ?>

    <?php echo Html::style("public/css/template.css"); ?>

    <?php echo Html::style('public/css/style.css'); ?>

    <?php echo Html::style("public/css/profileform.css"); ?>

    <?php echo Html::style("public/css/responsive.css"); ?>

    <?php echo Html::style("public/css/grid.css"); ?>

    
    

	<?php echo $__env->yieldPushContent('css'); ?>
	
    <?php echo Html::script('public/js/jquery-1.10.2.min.js?v=2.1.5'); ?>

    <?php echo Html::script('public/js/menu.js'); ?>

    <?php echo Html::script('public/js/comman.js'); ?>

    
    
    <?php echo $__env->yieldPushContent('script'); ?>
    
    <?php //Code for Plugins Css and Jquery; ?>
    <?php //Fancybox; ?>
    <?php echo Html::script('public/plugins/fancybox/jquery.fancybox.pack.js'); ?>

    
    <?php echo Html::style('public/plugins/fancybox/jquery.fancybox.css'); ?>

    
    <!--- mCustomScrollbar -->
    <?php echo Html::script('public/plugins/customScroll/jquery.mCustomScrollbar.concat.min.js'); ?>

    
    <?php echo Html::style('public/plugins/customScroll/jquery.mCustomScrollbar.css'); ?>

    
    <?php /* Bootstrap DatePicker */ ?>
    <?php echo Html::script('public/plugins/datepicker/bootstrap-datepicker.js'); ?>

    <?php echo Html::style('public/plugins/datepicker/datepicker.css'); ?>

    
    
    <script type="text/javascript"> 
	(function($){
		$(window).load(function(){
			$(".CustomScrollbar").mCustomScrollbar();			
		});		
		$(document).ready(function(e) {
            $('.datepicker').datepicker({format:'mm/dd/yyyy'});
        });
	})(jQuery)
	var BASEURL	=	'<?php echo e(url('/')); ?>', TOKEN = '<?php echo e(csrf_token()); ?>';
	</script>
  
</head>
<body>
<!--[if lt IE 7]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<!-- Menu -->


<!-- dash Content -->
    <div id="dash-content" class="dash-inner-content"> 
       	
        <div class="col-md-2 padding_none" id="menu-container">
            <?php echo $__env->make('includes.myaccount.menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>                
        </div>
          
        <div class="col-md-10 padding_none col-sm-12">
        
            <div class="container-fluid top-header sticky dash-header"> 
               	<div class="navbar-toggle pull-left visible-sm-block visible-xs-block" id="mobile-menu">                
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </div>
                
                <?php echo $__env->make('includes.myaccount.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                 
            
            </div>  
            <div class="clearfix"></div>    
        	<?php if(count($errors) > 0 || session('success') || session()->has( 'warnings' )): ?>
            <div class="container-fluid mrgtp10">    
            	
                <?php if(count($errors) > 0): ?>
                    <div class="alert alert-danger">
                        <ol>
                            <?php foreach($errors->all() as $error): ?>
                                <li><?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ol>
                    </div>
                <?php endif; ?>
                
                <?php if(session('success')): ?>
                    <div class="alert alert-success">
                        <ol>
                                <li><?php echo session('success'); ?></li>
                        </ol>
                    </div>
                <?php endif; ?>
                
                <?php if(session('warnings')): ?>
                	<?php if(is_array(session('warnings'))): ?>
                    <div class="alert alert-warning">
                        <ol>
                        	<?php foreach(session('warnings') as $warning): ?>
                                <li><?php echo $warning; ?></li>
                            <?php endforeach; ?>
                        </ol>
                    </div>
                    <?php else: ?>
                    	<div class="alert alert-warning">
                            <ol>
                                    <li><?php echo session('warnings'); ?></li>
                            </ol>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
                
            	<div class="clearfix"></div>         
            </div>
            <div class="clearfix"></div>    
            <?php endif; ?>
        	            
        
            <div class="right_cntnt">    
            	
                <?php echo $__env->yieldContent('content'); ?>
                
            	<div class="clearfix"></div>         
            </div>
        
        	<div class="clearfix"></div>
        </div>
    </div>
<!-- dash Content -->

<?php echo $__env->make('includes.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

</body>
</html>
