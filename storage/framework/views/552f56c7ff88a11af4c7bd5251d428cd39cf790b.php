<?php $__env->startSection('content'); ?> 
    <div class="col-1-1 heading_tital">
        <h1 class="left"><?php echo e(trans('menu.report-template')); ?></h1>
        <div class="right">
            <div class="itemSearch">
                <?php echo e(Form::open(array('route'=>'template.index','method'=>'get'))); ?>

                <?php echo e(Form::text('search',request()->get('search'),['placeholder'=>'Search By Title'])); ?>

                <?php echo e(Form::submit('Search')); ?>

                <?php echo e(Form::close()); ?>

              </div>
        </div>
    </div>     
    <!--- Top Tabs Navigation Start -->
    <div class="row">
    	<div class="col-md-12">
        	<div class="pull-left">
                <ul class="top-tabs scripts" id="tabs">
                    <li class="active bg-script" data-tab="my-templates" style="width:160px;"><?php echo e(trans('lang.my-templates')); ?></li>
                    <li class="bg-suitcase" data-tab="archived"><?php echo e(trans('lang.archived')); ?></li>
                    <li class="bg-hart" data-tab="favorites"><?php echo e(trans('lang.favorites')); ?></li>
                </ul>
            </div>
            <div class="pull-right">
            	<a class="btn btn-primary btn-icon fa-plus hiddenmob" href="<?php echo e(URL::to('myaccount/report-template/add')); ?>"><?php echo e(trans('lang.create-new-template')); ?></a>
            </div>
        </div>
    </div>
    <!--- Top Tabs Navigation Over -->
    
    <div class="row mrgtp20">
    	<?php $shownoRecord	=	true;?>
    	<?php foreach($templates as $template): ?>
        <?php
			
			$tab		=	"my-templates";
			$userId		=	auth()->user()->id;	
			$isAuthor	=	$template->user_id == $userId;
			
			if($isAuthor && $template->status == 0) $tab	=	'archived';
			if($isAuthor && $template->status > 0) $tab	=	'my-templates';
			if(!$isAuthor) $tab	=	'favorites';
			
			if($tab == 'my-templates') $shownoRecord	=	false;
			$class	=	($isAuthor && $template->draft == 1) ? "posted" : "";
		 ?>
            <div class="item-box pul0 mrgbt20 " data-tab="<?php echo e($tab); ?>" id="template<?php echo e($template->id); ?>">
            	<div class="col-1-1 xpul15 pultop15 mrgbt10">
                <div class="col-1-24" style="position:relative;">
                    <span class="ul-checkbox fa fa-square-o"></span>
                    <div class="task-div">
                        <ul class="task-ul" data-id="<?php echo e($template->id); ?>">
                       	 <?php if($isAuthor): ?>
                            <li data-task="unarchived" <?php echo e(($tab == 'archived') ? "style=display:block" : "style=display:none"); ?> >
                                <?php echo e(trans('lang.unarchived')); ?>

                            </li>
                            <li data-task="archived" <?php echo e(($tab != 'archived') ? "style=display:block" : "style=display:none"); ?> >
                                <?php echo e(trans('lang.archive')); ?>

                            </li>
                            <li data-task="delete">
                                <?php echo e(trans('lang.delete')); ?>

                            </li>
                         <?php else: ?>
                            <li data-task="delete">
                                <?php echo e(trans('lang.remove-favorites')); ?>

                            </li>
                         <?php endif; ?>
                        </ul>
                    </div>
                </div>
                <div class="col-23-24">
                    <div class="col-3-6">
                        <h3 class="item-head script">
                            <a href="<?php echo e(($isAuthor) ? URL::route('template.edit',['id'=>$template->id]) : $template->link); ?>">
                                <?php echo e(str_limit($template->title,40)); ?>

                            </a>
                        </h3>   
                        <span><?php echo e(date('F d, Y',strtotime($template->created_at))); ?> </span>                   
                    </div>
                    <div class="col-3-6 item-right-main script">  
                    	<div class="item-template-form">
                        <?php 
							$form	=	checkForOther($template->form);
							$genre	=	checkForOther($template->genre);
							$subgenre	=	checkForOther($template->subgenre);
						 ?>
                        	<?php if(!empty($form)): ?><h4><?php echo e($form); ?></h4><?php endif; ?>
                            
                            <?php if($genre || $subgenre): ?>
                                <span>
                                    <?php echo e($genre); ?>

                                    <?php echo e((!empty($genre) && !empty($subgenre)) ? "-" : ""); ?>

                                    <?php echo e($subgenre); ?>

                                </span>
                            <?php endif; ?>                           
                        </div>                      
                    </div>
                    <div class="clearfix"></div>
                </div>
                </div>
                <div class="h-line ymrg10">
                	
                </div>
                <div class="col-1-1 pulbotm2">
                	<?php if($isAuthor): ?>
                	<div class="col-1-4 pul5">
                    	<a href="javascript:void(0)" class="btn btn-icon <?php echo e(($template->status == 1) ? "bg-user-times" : "fa-user"); ?>" id="postUnpostTempalte" <?php if($template->status == 1): ?> onclick="UnpostTempalte(<?php echo e($template->id); ?>)"> Unpost <?php echo e(trans('lang.template')); ?> <?php else: ?> onclick="PostTempalte(<?php echo e($template->id); ?>)"> Post <?php echo e(trans('lang.template')); ?> <?php endif; ?> </a>
                    </div>
                    <?php endif; ?>
                    <div class="col-1-4 pul5">
                    	<a href="<?php echo e($template->link); ?>" target="_blank" class="btn btn-icon bg-template">View Template</a>
                    </div>
                    <div class="col-1-4 pul5">
                    	<a href="javascript:void(0)" data-id="<?php echo e($template->id); ?>" class="btn btn-icon bg-msg send-template">Send Template</a>
                    </div>
                    <div class="col-1-4 pul5">
                    	<a href="javascript:void(0)" class="btn btn-icon bg-track template-tracking" data-id="#templateShare<?php echo e($template->id); ?>">Track Template</a>
                    </div>
                </div>
            </div>
            <?php $__env->startPush('shretemplate'); ?>
            	<?php $template->load('sharelist.receiver.profile');?>
                
            	<div class="col-1-1 slideAnimate" id="templateShare<?php echo e($template->id); ?>">
                	<div class="col-1-1 BorderBox">
                    	<div class="col-1-1  bgBlue">
                            <h5 class="headonBlue"><?php echo e($template->title); ?></h5>
                        </div>
                        <div class="col-1-1 CustomScrollbar" style="max-height:450px">
                        <?php if(count($template->sharelist)): ?>
                          <?php foreach($template->sharelist as $list): ?>
                              <div class="col-1-1 xpul10 ypul7	">
                               <p class="tip-description mrg0"><?php echo e(str_limit($list->receiver->profile->full_name)); ?></p>
                               <span class="date"><?php echo e(date('F j, Y',strtotime($list->created_at))); ?></span>
                              </div>
                              <div class="h-line"></div>
                          <?php endforeach; ?>
                        <?php else: ?>
                              <div class="col-1-1 pul5">
                               <p class="tip-description mrg0">No Record Found</p>
                              </div>
                        <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php $__env->stopPush(); ?>
        <?php endforeach; ?>
    </div>
    <div style="display: <?php echo e(($shownoRecord) ? 'block' : 'none'); ?>;" class="item-box no-records"> No records found</div>
    
    
    <?php echo view('message.message')->with(['contact'=>true,'email'=>true,'MSGtemplates'=>false,'redirect_url'=>'template-share']); ?>

    

<?php echo $__env->yieldPushContent('shretemplate'); ?>


<?php $__env->startPush('css'); ?>
	<style>
		.task-div{
			width:185px;
		}
		div[data-tab='favorites'],
		div[data-tab='archived']{
			display:none;
		}
	</style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>
	<?php echo Html::script('public/js/specified/template-index.js'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.myaccount', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>