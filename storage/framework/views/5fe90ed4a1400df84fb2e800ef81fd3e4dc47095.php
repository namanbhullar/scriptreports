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


	<?php echo $__env->yieldPushContent('css'); ?>
	
    <?php echo Html::script('public/js/jquery-1.10.2.min.js?v=2.1.5'); ?>

    
    
    <?php echo $__env->yieldPushContent('script'); ?>
    
    <?php //Code for Plugins Css and Jquery; ?>
    <?php //Fancybox; ?>
       
    <script type="text/javascript"> var BASEURL	=	'<?php echo e(URL::to('/')); ?>' , TOKEN = '<?php echo e(csrf_token()); ?>';</script>
  
</head>
<body>

<?php echo $__env->yieldContent('content'); ?>

</body>
</html>
