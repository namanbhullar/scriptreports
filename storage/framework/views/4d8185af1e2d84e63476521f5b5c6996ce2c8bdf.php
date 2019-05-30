<?php $__env->startSection('content'); ?>
<?php
	$favorites	=	auth()->user()->favorites()->where('status','>',-1)->get();
//dump($favorites);
 ?>


<h1 class="heading_tital"><?php echo e(trans('menu.favorites')); ?></h1>
    <div class="row mrgbt10">
    	<div class="col-11-12">
        	<ul class="top-tabs scripts" id="tabs">
            	<li class="active" data-tab="member"><?php echo e(trans('lang.members')); ?></li>
                <li class="" data-tab="template"><?php echo e(trans('lang.templates')); ?></li>
                <li class="" data-tab="script"><?php echo e(trans('lang.scripts')); ?></li>
                <li class="" data-tab="archived"><?php echo e(trans('lang.archive')); ?></li>
            </ul>
        </div>
    </div>
    <div class="col-1-1 favorites">
    <?php 
	
		$hide_norecord	=	false; 
		
		foreach($favorites as $favorite)
		{
			switch($favorite->item_type){
				case 'user':
					echo view('favorites.member')->with('favorite',$favorite);
					if($favorite->status) $hide_norecord = true;
				break;
				
				case 'script':
					echo view('favorites.script')->with('favorite',$favorite);;
				break;
				
				case 'template':
					echo view('favorites.template')->with('favorite',$favorite);;
				break;
			}
		}
	?>
   
   
    
    <div class="item-box no-records row" <?php echo e(($hide_norecord) ?  "style=display:none" : "style=display:block"); ?>>
        	<p><?php echo e(trans('lang.no-record')); ?></p>
        </div>
    </div>
   <?php echo csrf_field(); ?> 
   
   <?php echo view('message.message')->with(['contact'=>false,'email'=>false]); ?>


<?php $__env->startPush('script'); ?>
	<?php echo Html::script("public/js/specified/favorites.js"); ?>

    <script>
		var userId = <?php echo e(auth()->user()->id); ?>;
	</script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('css'); ?>
	<style type="text/css" >
		div[data-tab="member"]{ display:block }
		div[data-tab="script"],
		div[data-tab="template"],
		div[data-tab="archived"]
		{ display:none }
		
	</style>
<?php $__env->stopPush(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.myaccount', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>