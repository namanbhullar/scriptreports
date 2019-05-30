;
 <?php $__env->startPush('css'); ?>
    	<?php echo Html::style("public/css/front/style.css"); ?>

        <?php echo Html::style("public/css/style.css"); ?>

        <?php echo Html::style("public/css/template.css"); ?>

        <?php echo Html::style("public/css/bootstrap.min.css"); ?>

        <?php echo Html::style("public/css/fonts.css"); ?>

        <?php echo Html::style("public/css/profileform.css"); ?>

        <?php echo Html::style("public/old/style.css"); ?>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <?php $__env->stopPush(); ?>
    
    
<?php $__env->startSection('content'); ?>
 
<div class="col-md-8 col-md-offset-2 ymrg55 ypul50 xpul100 text-center Box" >
	<h1 class="Box pul20"><i class="fa fa-times-circle"></i>&nbsp;&nbsp;<?php echo e(trans('errors.error')); ?></h1>
    <div class='alert alert-danger col-1-1'>
    	<h4><?php echo e(trans('errors.404')); ?></h4>
     </div>
 </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>