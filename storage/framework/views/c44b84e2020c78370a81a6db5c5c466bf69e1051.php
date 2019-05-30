<?php $__env->startSection('content'); ?>
	<h1 class="heading_tital"><?php echo e(trans('menu.profile')); ?></h1>
    <div class="col-1-1">
    	<div class="col-1-2 pulrt10">
        	<div class="co-l-1 Box ypul40 xpul50">
            	<div class="col-1-1 mrgbt15">
                	<div class="col-1-5"><?php echo Html::image("public/images/icons/viewProfile.png",'view profile',['class'=>'right	']); ?></div>
                    <div class="col-3-5 mrglft40"><h2>View Your Profile</h2></div>
                    <div class="clearfix"></div>
                </div>
                <div class="col-1-1">
                	<div class="btn btn-primary right">
                    	<a href="<?php echo e(App\Models\User::UserprofileLink(auth()->user()->id)); ?>">
                        	View Profile
                        </a>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="col-1-2 pullft10">
        	<div class="co-l-1 Box ypul40 xpul50">
            	<div class="col-1-1 mrgbt15">
                	<div class="col-1-5"><?php echo Html::image("public/images/icons/editProfile.png",'Edit profile',['class'=>'right	']); ?></div>
                    <div class="col-3-5 mrglft40"><h2>Edit Your Profile</h2></div>
                    <div class="clearfix"></div>
                </div>
                <div class="col-1-1">
                	<div class="btn btn-primary right">
                    	<a href="<?php echo e(URL::to('/myaccount/profile/edit')); ?>">
                        	Edit Profile
                        </a>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.myaccount', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>