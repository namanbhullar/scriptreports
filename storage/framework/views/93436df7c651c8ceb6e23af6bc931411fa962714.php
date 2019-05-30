<?php $__env->startSection('content'); ?>

<style type="text/css">
	#system-message{
		margin-top:10px;	
	}
</style>
<div id="loginbox">
    <div class='' style="float:none;">
     
        <h1><i class='fa fa-lock'></i> Admin Login</h1>
     
        <?php echo e(Form::open(['role' => 'form'])); ?>

     
        <div class='form-group'>
            <?php echo e(Form::label('username', 'Username')); ?>

            <?php echo e(Form::text('username', null, ['placeholder' => 'Username', 'class' => 'form-control'])); ?>

        </div>
     
        <div class='form-group'>
            <?php echo e(Form::label('password', 'Password')); ?>

            <?php echo e(Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control'])); ?>

        </div>
     
        <div class='form-group'>
            <?php echo e(Form::submit('Login', ['class' => 'btn btn-primary'])); ?>

        </div>
     
        <?php echo e(Form::close()); ?>

     
    </div>
 </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>