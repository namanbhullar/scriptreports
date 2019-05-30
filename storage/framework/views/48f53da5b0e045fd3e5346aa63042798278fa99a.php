<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<!-- include css files !-->
<?php echo e(Html::style('public/admin/css/style.css')); ?>

<?php echo e(Html::style('public/css/datepicker.css')); ?>


<link rel='stylesheet' href='//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css'>
<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

<!-- include js files !-->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">
		var ADMINURL = '<?php echo e(url('/admin')); ?>';	

</script>
<?php echo e(Html::script('public/admin/js/common.js')); ?>

<?php echo e(Html::script('public/plugins/datepicker/bootstrap-datepicker.js')); ?>

<?php echo e(Html::style('public/plugins/datepicker/datepicker.css')); ?>


<script type="text/javascript">
	$(document).ready(function(){
		
		    $('.datepicker').datepicker()
	})
</script>

<title>ScriptReader Online - Admin : <?php echo $__env->yieldPushContent('title'); ?></title>
</head>
<body>
	<div id="layout">
    	<?php echo $__env->make('admin.includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div id="content">
        	<?php if($ToolbarTitle['titletext']): ?>
                <div id="toolbar-box">
                    <div class="conten-m">
                    	<?php if($toolbaricons): ?>
                            <div id="toolbar-iconlist">
                                <?php echo $toolbaricons; ?>

                            </div>
                       <?php endif; ?>  
                        <div class="page-title <?php echo e($ToolbarTitle['toolbarclass']); ?>">
                            <h2 class="header-title "><?php echo e($ToolbarTitle['titletext']); ?> : <?php echo e($title); ?></h2>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            
            <?php if($submenus): ?>
                <div id="submenu-box">
                	 <div class="conten-m">
                        <ul>
                        	<?php 
							$activelink	=	Route::getCurrentRoute()->getPath();
							$currentR	=	end(explode('/',$activelink)); 
							?>
                            <?php foreach($submenus as $submenu): ?>
                            	<?php
									if(preg_match('/'.$currentR.'/', $submenu['route']))
										$class = 'active';
									else
										$class = 'in-active';	
								?>
                                <li class="<?php echo e($class); ?>"><a href="<?php echo e($submenu['route']); ?>"><?php echo e($submenu['title']); ?></a></li>
                            <?php endforeach; ?> 
                        </ul>
                        <div class="clear"></div>  	
                    </div>
                </div>
            <?php endif; ?>
            
            <div id="system-message">
                <?php if($errors->has()): ?>
                    <?php foreach($errors->all() as $error): ?>
                        <div class='bg-danger alert'><?php echo $error; ?></div>
                    <?php endforeach; ?>
                <?php endif; ?>
                
                 <?php if(Session::has('success')): ?>
                    <div class="alert-box success">
                        <?php echo Session::get('success'); ?>

                    </div>
                <?php endif; ?>
            </div>
            <div id="container">
            		<div class="conten-m">
                    	<?php echo $__env->yieldContent('content'); ?>
                        <div class="clear"></div> 
                    </div>
            </div>
  			<div class="clr"></div>
		</div>
        <?php echo $__env->make('admin.includes.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
</body>
</html>
