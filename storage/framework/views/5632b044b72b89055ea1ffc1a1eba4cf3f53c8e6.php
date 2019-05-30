<?php $__env->startSection('content'); ?>
    <?php $__env->startPush('css'); ?>
    	<?php echo Html::style("public/css/front/style.css"); ?>

        <?php echo Html::style("public/css/template.css"); ?>

        <?php echo Html::style("public/css/fonts.css"); ?>

        <?php echo Html::style("public/css/profileform.css"); ?>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <?php $__env->stopPush(); ?>
    
<?php if(count($errors) > 0): ?>
    <div class="alert alert-danger">
    	<ol>
            <?php foreach($errors->all() as $error): ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; ?>
        </ol>
    </div>
<?php endif; ?>

<?php if(session('success')): ?>
    <div class="alert success">
    	<ol>
                <li><?php echo e(session('success')); ?></li>
        </ol>
    </div>
<?php endif; ?>
 
<div id="logincontainer" class="ymrg100 col-4-11">
    <div class='pul20'>     
        <h1 class="pullft20"><i class='fa fa-lock'></i><?php if(isset($verify)): ?> <?php echo e($verify); ?> <?php else: ?> <?php echo e(trans('form.USER_LOGIN')); ?> <?php endif; ?> </h1>     
        <?php echo e(Form::open(['role' => 'form'])); ?>

     		<input type="text" name="fake_username" style="position:absolute;top:-1000px;"/>
        	<input type="password" name="fake_pass" style="position:absolute;top:-1000px;"/>
        <div class='mrg5 pul5'>
            <?php echo e(Form::label('username',  trans('form.EMAIL_LABEL'))); ?>

            <?php echo e(Form::text('username', null, ['placeholder' => trans('form.EMAIL_PLACEHOLDER'), 'class' => 'form-control',required])); ?>

        </div>
     
        <div class='mrg5 pul5'>
            <?php echo e(Form::label('password', trans('form.PASSWORD_LABEL'))); ?>

            <?php echo e(Form::password('password', ['placeholder' => trans('form.PASSWORD_PLACEHOLDER') , 'class' => 'form-control',required])); ?>

        </div>
     
        <div class='mrg5 pul5'>
            <?php echo e(Form::submit('Login', ['class' => 'btn btn-primary'])); ?> <a href="<?php echo e(url('/password/reset')); ?>" style="float:right" class='btn btn-primary'> <?php echo e(trans('form.forget_pass')); ?></a>
        </div>
     
        <?php echo e(Form::close()); ?>

     
    </div>
 </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>