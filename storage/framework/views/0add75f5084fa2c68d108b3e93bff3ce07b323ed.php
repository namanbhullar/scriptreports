<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
	<title> <?php echo e(isset($title) ? $title : 'ScriptReports'); ?></title>
    <?php echo Html::script('public/js/jquery-1.10.2.min.js?v=2.1.5'); ?>

    <?php echo Html::script("public/js/comman.js"); ?>

    <?php echo Html::script('public/plugins/fancybox/jquery.fancybox.pack.js'); ?>

    <?php echo Html::style("public/css/fonts.css"); ?>

    <?php echo Html::style("public/css/responsive.css"); ?>

    
    <?php echo Html::style('public/plugins/fancybox/jquery.fancybox.css'); ?>

    
    <script type="text/javascript">
		var BASEURL='<?php echo e(URL::to('/')); ?>', TOKEN= '<?php echo e(csrf_token()); ?>';
	</script>
    
	<?php echo $__env->yieldPushContent('scripts'); ?>
    <?php echo $__env->yieldPushContent('css'); ?>
</head>
<body>
	<div align="center" id="warrper">
        <?php echo $__env->make('includes.front.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->yieldContent('content'); ?>
        <?php echo $__env->make('includes.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
</body>
</html>
