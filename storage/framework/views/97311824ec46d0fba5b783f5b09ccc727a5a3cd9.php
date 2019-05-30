<?php $__env->startSection('content'); ?>    
    <?php $__env->startPush('css'); ?>
    	<?php echo Html::style("public/css/front/style.css"); ?>

        <?php echo e(Html::style("public/css/template.css")); ?>

        <?php echo Html::style("public/css/fonts.css"); ?>

        <?php echo Html::style("public/css/profileform.css"); ?>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <?php $__env->stopPush(); ?>

        <?php if(count($errors) > 0): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach($errors->all() as $error): ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
        
        <?php if(session('success')): ?>
            <div class="alert success">
                <ul>
                        <li><?php echo e(session('success')); ?></li>
                </ul>
            </div>
        <?php endif; ?>

<div id="logincontainer" class="ymrg100 col-4-11">
    <div class='pul20'>     
          <h1 class="pullft20"><i class='fa fa-lock'></i> <?php echo e(trans('lang.submission-login')); ?>  </h1>
        <?php echo e(Form::open(['route'=>'submission.login','method'=>'post'])); ?>

        <div class='mrg5 pul5'>
            <?php echo e(Form::label('password', trans('lang.page-prtotected'))); ?>

            <?php echo e(Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control',required])); ?>

        </div>
        <div class='mrg5 pul5'>
            <?php echo e(Form::submit('Login', ['class' => 'btn btn-primary'])); ?>

        </div>
     
        <?php echo e(Form::close()); ?>

     
    </div>
 </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>