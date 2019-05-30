<?php $__env->startSection('content'); ?>
<?php 
	$incount	=	auth()->user()->MessageReceivedByMe()->where('r_status',1)->count() ;
	$outcount	=	auth()->user()->MessageSendedByMe()->where('s_status',1)->count() ;
 ?>
	<h1 class="heading_tital"><?php echo e(trans('menu.message')); ?></h1>
    <div class="row">
    	<div class="col-md-9">
        	<ul class="top-tabs message" id="tabs">
            	<li class="active messages" data-tab="messages">
                <?php echo e(trans('lang.messages')); ?>

                	<?php if($incount): ?>
                    	<span id="in-unread" class="un-read"><?php echo e($incount); ?></span>
                    <?php endif; ?>    
                </li>
                <li class="bg-star" data-tab="starred"><?php echo e(trans('lang.starred')); ?></li>
                <li class="bg-suitcase" data-tab="archived"><?php echo e(trans('lang.archive')); ?></li>
                <li class="sent" data-tab="sent">
                	<?php echo e(trans('lang.sent')); ?>

                	<?php if($outcount): ?>
                    	<span id="out-unread" class="un-read"><?php echo e($outcount); ?></span>
                    <?php endif; ?>     
                </li>
            </ul>
        </div>
        <div class="col-md-3">
        	<div class="btn btn-primary right">
            	<a id="send-message-btn">
            	<?php echo e(trans('lang.send-new-message')); ?>

                </a>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="row mrgtp20">
    <?php $count= 1 ; $show_norecords	=	true;?>
    
    	<?php foreach($messages as $inbox): ?>
        <?php
			$userId	=	auth()->user()->id;
			$sender	=	$userId == $inbox->sender_id;
			
			$msgUser	=	($sender) ? $inbox->receiver : $inbox->sender;
			
			if(is_null($msgUser) ) continue;
			if(($sender && $inbox->s_status == -1) || (!$sender && $inbox->r_status == -1)) continue;
			
			$class	=	[];
			
			if(($sender && $inbox->s_status == 1) || (!$sender && $inbox->r_status == 1 ))	$class[]	= 'bglightSky';
			else																			$class[]	 = 'read';
			
			if(($sender && $inbox->s_favorite==1) || (!$sender && $inbox->r_favorite==1))	$class[] 	= 'starred';			
			
			if($sender && $inbox->s_archived != 1)											$class[] = 'sent';
			
			if(!$sender && $inbox->r_archived != 1 )										$class[] = 'messages';
			
			if(($sender && $inbox->s_archived == 1) || (!$sender && $inbox->r_archived == 1))$class[] = 'archived';
			
			if(in_array('messages',$class)) $show_norecords	=	false;
			
			//dump($inbox);
		?>
            <div class="item-box mrgbt20 <?php echo e(implode(' ',$class)); ?>" data-tab="<?php echo e($tab); ?>" id="inbox<?php echo e($inbox->id); ?>">
                <div class="col-1-24" style="position:relative;">
                	<div class="col-1-1">
                    	<span class="ul-checkbox fa fa-square-o"></span>
                        <div class="task-div">
                            <ul class="task-ul" data-id="<?php echo e($inbox->id); ?>">
                                <li data-task="unread" <?php echo e((!in_array('bglightSky',$class)) ?"style=display:block" : "style=display:none"); ?> >
                                    <?php echo e(trans('lang.mark-as')); ?> <?php echo e(trans('lang.unread')); ?>

                                </li>
                                <li data-task="read" <?php echo e((!in_array('read',$class)) ? "style=display:block"  : "style=display:none"); ?> >
                                    <?php echo e(trans('lang.mark-as')); ?> <?php echo e(trans('lang.read')); ?>

                                </li>
                                <li data-task="unarchived" <?php echo e((in_array('archived',$class)) ? "style=display:block" : "style=display:none"); ?> >
                                    <?php echo e(trans('lang.unarchived')); ?>

                                </li>
                                <li data-task="archived" <?php echo e((!in_array('archived',$class)) ? "style=display:block" : "style=display:none"); ?> >
                                    <?php echo e(trans('lang.archive')); ?>

                                </li>
                                <li data-task="delete">
                                    <?php echo e(trans('lang.delete')); ?>

                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-1-1">
                    	<span class="span-starred fa <?php echo e((in_array('starred',$class)) ? "fa-star act" : "fa-star-o"); ?>" data-id="<?php echo e($inbox->id); ?>"></span>
                    </div>
                    <div class="clearfix"></div>                    
                </div>
                <div class="col-23-24">
                    <div class="col-2-3">
                    	<div class="col-2-14 inbox-thumnail">
                        	<?php $thumbnail	= $msgUser->profile->profile_img; ?>
                           <?php if($thumbnail): ?>
                                <?php echo e(Html::image("public/uploads/profiles/users/$msgUser->id/$thumbnail")); ?>

                            <?php else: ?>
                                <?php echo e(Html::image("public/images/no-image.png")); ?>

                            <?php endif; ?>	    
                        </div>
                    	<div class="col-7-14">
                        	<h3 class="item-head">
                                <a href="<?php echo e(URL::to('/myaccount/message/'.$inbox->id.'/view')); ?>">
                                    <?php echo e(str_limit($msgUser->profile->full_name,20)); ?>

                                </a>                            
                            </h3>
                            <div class="item-detail">                        	
                                <span class="date"><?php echo date('F j, Y',strtotime($inbox->created_at)); ?></span>
                            </div>
                        </div>
                        <div class="col-5-14">
                        	<b><?php echo e($inbox->subject); ?></b>
                        </div>                        
                        <div class="clearfix"></div>
                    </div>
                    
                    <div class="col-1-3">
                    	<?php echo str_limit(strip_tags($inbox->inboxdetail[0]->message)); ?>

                    </div>          
                    <div class="clearfix"></div>
                </div>
            </div>
        <?php endforeach; ?>
        
        <div class="item-box no-records row" <?php echo e(($show_norecords) ?  "style=display:block" : "style=display:none"); ?>>
        	<p><?php echo e(trans('lang.no-record')); ?></p>
        </div>
    </div>    
    
    <?php echo view('message.message')->with(['permission'=>false,'email'=>false]); ?>

    
<?php $__env->startPush('script'); ?>
	<?php echo Html::script('public/js/specified/inbox.js'); ?>

    <script>
		$(document).ready(function(e) {
           $("#send-message").sendMessagePopUp(); 
        });
	
	</script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('css'); ?>
	<style type="text/css">
		.item-box.sent,.item-box.archived{ display:none; }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.myaccount', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>