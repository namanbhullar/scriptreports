<?php $__env->startSection('content'); ?>


        <div class="col-1-1 heading_tital">
            <h1 class="left">Script Reports</h1>
            <div class="right">
            	<div class="itemSearch">
                    <?php echo e(Form::open(array('route'=>'report.index','method'=>'get'))); ?>

                    <?php echo e(Form::text('search_script',request()->get('search_script'),['placeholder'=>'Search By Title'])); ?>

                    <?php echo e(Form::submit('Search')); ?>

                    <?php echo e(Form::close()); ?>

                  </div>
            </div>
        </div>        
     <div class="row mrgbt15">
    	<div class="col-md-12">
        	<div class="pull-left">
                <ul id="tabs" class="top-tabs">
                    <li data-tab="completed" class="active no-icon"><?php echo e(trans('lang.completed')); ?></li>
                    <li style="" data-tab="progress" class="no-icon"><?php echo e(trans('lang.in-progress')); ?></li>
                    <li data-tab="archived" class="no-icon"><?php echo e(trans('lang.archived')); ?></li>
                </ul>
            </div>
            <div class="pull-right">
            <?php $options	=	[
									'sort-by'=>trans("lang.sort-by"),
									'all'=>trans("lang.all"),
									'reader'=>trans("lang.write_by_me"),
									'client'=>trans("lang.sent_to_me")
								]; ?>
            <?php echo Form::select('form',$options,'sort-by',['style'=>'width:110px;','class'=>'pul5 mrglft10' ,'onchange'=>'SortByFun(this.value)']); ?>

            
            	<a href="javascript:void(0)" id="ReportCompareBtn" class="btn btn-primary btn-icon fa-files-o mrglft10 hiddenmob"><?php echo e(trans('lang.report-compare')); ?></a>
            </div>
        </div>
    </div>
        <?php  
		$ShowNoRecords = true;
		if(!$reports->isEmpty()) : 
		
			
		?>
        <?php foreach($reports as $report) : ?>
        
			<?php
				$report->load('owner.profile','user.profile','template');
				$isRAuthor	=	$report->user_id == auth()->user()->id;
				$isTAuthor	=	$report->template->user_id	==	auth()->user()->id;
				
				
				
				$owner	=	(!is_null($report->owner)) ? $report->owner : $report->user;
                
                if($report->status==0)
                    $class	=	'archived';
				else
					$class	=	($report->status==1) ? 'progress' : 'completed';
					
				if($report->status == 2) $ShowNoRecords = false;
				
				$userType	=	($report->user_id == $report->owner_id) ? 'reader' : 'client';				
             ?>            
        <div id="reports<?php echo e($report->id); ?>" data-tab="<?php echo e($class); ?>" class="reports item-box mrgbt20 <?php echo e($userType); ?> pul0 <?php echo e(($report->is_seen == 0 ) ? "bglightSky" : ""); ?>">
            <div class="col-1-1 pul15">
                <div class="col-1-24" style="position:relative;">
                    <span class="ul-checkbox fa fa-square-o"></span>
                    <div class="task-div">
                        <ul class="task-ul" data-id="<?php echo e($report->id); ?>">
                            <li>
                                <a href="<?php echo e($report->dlink); ?>" target="_new"><i class="fa fa-download"></i>&nbsp;&nbsp;Download</a>
                            </li>
                            <?php /*?><li data-task="my-docs">
                                <i class="fa fa-plus">&nbsp;&nbsp;</i>My Docs
                            </li><?php */?>
                            <li data-task="unarchived" <?php echo e(($class == 'archived') ? "style=display:block" : "style=display:none"); ?> >
                                <i class="fa fa-suitcase"></i>&nbsp;&nbsp;<?php echo e(trans('lang.unarchived')); ?>

                            </li>
                            <li data-task="archived" <?php echo e(($class != 'archived') ? "style=display:block" : "style=display:none"); ?> >
                               <i class="fa fa-suitcase"></i>&nbsp;&nbsp; <?php echo e(trans('lang.archive')); ?>

                            </li>
                            <li data-task="delete">
                                <i class="fa fa-trash"></i>&nbsp;&nbsp;<?php echo e(trans('lang.delete')); ?>

                            </li>
                            <?php if($report->status==2): ?>
                            <li data-task="mydocs">
                                <i class="fa fa-plus"></i>&nbsp;&nbsp;<?php echo e(trans('lang.my-docs')); ?>

                            </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
                <div class="left mrgrt20">
                    <div class="inbox-thumnail ">     
                        <?php if($report->type==2): ?>
                            <div class="reportcomare-icon">
                                <i class="fa fa-files-o" style="font-size: 70px"></i>
                            </div>
                        <?php else: ?>
                        	<?php echo $userType=='reader' ? $report->template->user->profile->image : $owner->profile->image; ?>

                        <?php endif; ?> 
                    </div>
                </div>
                <div class="col-8-24">
                     <h4 class="item-head">
                     	<?php if($report->type == 2): ?>
                            <a href="<?php echo e($report->link); ?>" >
                                <?php echo e(str_limit($report->title,20)); ?>

                            </a>
                        <?php else: ?>
                        	<a href="<?php echo $userType=='reader' ? $report->template->user->link : $owner->link; ?>"
                            	class="col-1-1 <?php echo (strlen($owner->profile->full_name) > 20) ? "hasTooltip\" title=\"$owner->profile->full_name\"" : "\""; ?>

                             >
                            	<?php echo e($userType=='reader' ? $report->template->user->profile->full_name : $owner->profile->full_name); ?>

                            </a>                        	
                        <?php endif; ?>
                     </h4>
                     <div class="item-detail">
                        <span class="date" ><?php echo e(date('F j, Y',strtotime($report->created_at))); ?></span>
                     </div>
                </div>            
                <div class="col-7-24">
                     <div class="item-detail">
                        <?php if($report->type==1): ?>
                            	<?php /* <a href="javascript:void(0)"
                            		class="col-1-1 <?php echo (strlen($report->title) > 20) ? "hasTooltip\" title=\"$report->title\"" : "\""; ?>

                                    <?php echo e(str_limit($report->title, 20)); ?>

                                </a>  >*/ ?> 
                                
                                <span class="col-1-1 <?php echo (strlen($report->title) > 20) ? "hasTooltip\" title=\"$report->title\"" : "\""; ?>>
                                 <?php echo e(str_limit($report->title, 20)); ?>

                                 </span>
                        <?php endif; ?>
                        <span class="date">
                            <?php if(!empty($report->draft)): ?>
                                &nbsp;&nbsp;<?php echo e("Draft : ".$report->draft); ?>

                            <?php endif; ?>
                        </span>
                     </div>
                </div>
                <div class="col-5-24">
                	<div class="item-detail">
                        <?php /* <a href="<?php echo e($report->template->link); ?>"
                        class="col-1-1 <?php echo (strlen($report->template->title) > 20) ? "hasTooltip\" title=\"".$report->template->title."\"" : "\""; ?>

                         >
                            <?php echo str_limit($report->template->title, 20); ?>

                        </a> */ ?>
                        
                        <span class="col-1-1 <?php echo (strlen($report->template->title) > 20) ? "hasTooltip\" title=\"".$report->template->title."\"" : "\""; ?>>
                                 <?php echo str_limit($report->template->title, 20); ?>

                                 </span>  
                        <span class="date">
                            <?php if(!empty($report->template->draft)): ?>
                                &nbsp;&nbsp;<?php echo e("Draft : ".$report->template->draft); ?>

                            <?php endif; ?>
                        </span>
                    </div>
                </div>
            </div>
            
	        <div class="h-line" ></div>
            
            <div class="col-1-1 xpul15 ypul5">
            	<?php $class=	($report->type == 1 && $report->owner_id == $report->user_id) ? "col-1-4" : "col-1-3"; ?>
            	<div class="<?php echo e($class); ?> text-center" >
                	<?php if($report->type == 1 && $report->owner_id == $report->user_id): ?>
                        	<a class="btn btn-icon bg-chat send-report-back" data-again="<?php echo e(($report->status==2) ? "yes" : "no"); ?>" data-id="<?php echo e($report->id); ?>">Send Report Back</a>
                    <?php else: ?>
                    	<a class="btn btn-icon bg-chat report-share" data-id="<?php echo e($report->id); ?>">Share Report</a>
                    <?php endif; ?>
                </div>
                <?php if($report->type	== 1 && $report->owner_id == auth()->user()->id): ?>
                	<div class="<?php echo e($class); ?> text-center" >
                        <a class="btn btn-icon fa-pencil" href="<?php echo e(URL::route('report.edit',[ 'id'=>$report->id])); ?>" target="_blank"><?php echo e(trans('lang.edit-report')); ?></a>
                    </div>
                <?php endif; ?>
                <div class="<?php echo e($class); ?> text-center" >
                	<?php if($report->type == 2): ?>
                		<a class="btn btn-icon bg-eye" href="<?php echo e($report->pdflink); ?>" target="_blank">View PDF Report</a>
                    <?php else: ?>
                    	<a class="btn btn-icon bg-eye" href="<?php echo e($report->link); ?>" target="_blank">View PDF Report</a>
                    <?php endif; ?>    
                </div>
                <div class="<?php echo e($class); ?> text-center" >
                	<a class="btn btn-icon fa-edit"  onclick="showPrivateNotes(<?php echo e($report->id); ?>)">Private Notes</a>
                </div>
            </div>
    	    <div class="clearfix"></div>
        </div>
        <?php endforeach; ?>
        
        
        <?php echo e(Form::hidden('_model','ScriptReport', ['id' => 'model'])); ?>   	   	
        <?php echo e(Form::hidden('task','', ['id' => 'task'])); ?>   	   		
        <?php echo e(Form::close()); ?>

        <?php endif; ?>
        
        <div style="display:<?php echo ($ShowNoRecords) ? "block" : "none";?>" class="item-box no-records"> <h4><?php echo trans('lang.no-record'); ?></h4></div>
 
 
      <div style="display:none">
    	<!-- Add custom quetions   -->
    	<div id="private-notes" class="col-1-1">
      		<h3 class="blue-head mrg0">Private Notes</h3>
            <?php echo e(Form::open(array('url' =>URL::to('myaccount/set-pv-notes'),'id'=>'privateNoteForm'))); ?>

            <div class="col-1-1 pul20 ">
                <div class="col-1-1 margtp15">
                    <?php echo e(Form::textarea('pvnotes',null,array('class' => 'text textArea it', 'placeholder' => 'Type Your Private Note',required,'rows'=>'3'))); ?>

                </div>
                <div class="col-1-1 ymrg5">
                    <?php echo e(Form::button('Save Notes',array('class'=>'btn btn-icon btn-primary fa-save right','id'=>'SaveNoteBtn'))); ?>

                </div>
            </div>
            <?php echo e(Form::hidden('report_id',"")); ?>

            <?php echo e(Form::close()); ?>

       </div>
       <!-- Add custom quetions   -->
       
       <!-- Compare Reports-->
    	<div id="CompareReports" class="col-1-1">
      		<h3 class="blue-head mrg0">Report Compare</h3>
            <?php echo e(Form::open(array('route' => 'report.compare','id'=>'CompareReportsForm'))); ?>

            <div class="col-1-1 pul20 ">
                <div class="col-1-1 mrgtp10">
                     <?php echo e(Form::label('title','Report Title',array('class'=>'it mrgbt5 required'))); ?>

                      <?php echo e(Form::text('title',"",array('class'=>'text textInput it '))); ?>

                </div>
                <div class="col-1-1 mrgtp15">
                     <?php echo e(Form::label('date','Date',array('class'=>'it mrgbt5 required'))); ?>

                      <?php echo e(Form::text('date',date('m/d/Y'),array('class'=>'text textInput it datepicker','readonly'))); ?>

                </div>
                <div class="col-1-1 mrgtp15">
                	<?php $favTemplates[0]	=	"Select Template"; ksort($favTemplates); ?>
                	<?php echo e(Form::label('template','Select Template',array('class'=>'it mrgbt5 required'))); ?>

                    <?php echo e(Form::select('template',$favTemplates,'',array('class'=>'it text mrgbt5','required'))); ?>

                </div>
                <div class="col-1-1 mrgtp15" style="position:relative;">
                	<?php $myScripts[0]	=	"Select Script"; ksort($myScripts); ?>
                	<?php echo e(Form::label('template','Select Script',array('class'=>'it mrgbt5 required'))); ?> <small style="position:absolute; left:110px;">Script must be stored in "My Docs"</small>
                    <?php echo e(Form::select('script',$myScripts,'',array('class'=>'it text mrgbt5','onchange'=>'javascript:$("#script_status").val("select");'))); ?>

                </div>                
                <div class="col-1-1 xpul15 mrgtp15" id="reportForComapre">
                	
                </div>
                <div class="col-1-1 mrgbt5 mrgtp20">
                    <?php echo e(Form::submit('Compare',array('class'=>'btn btn-primary right','id'=>'SaveReportBtn'))); ?>

                </div>
                <div class="clearfix"></div>
            </div>
            <?php echo e(Form::hidden('report_id',"")); ?>

            <?php echo e(Form::close()); ?>

       </div>
       <!-- Compare Reports-->
       
     </div>
      
    
 <?php echo view('message.message')->with(['contact'=>true,
 									'email'=>false,
                                    'MSGtemplates'=>ture,
                                    'MSGscripts'=>true,
                                    'report'=>true,
                                    'redirect_url'=>'report-share']); ?>

   
<?php $__env->startPush('css'); ?>
    <style>
		.reports[data-tab="progress"],
		.reports[data-tab="archived"]{
			display:none;
		}
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>
	<?php echo Html::script('public/old/common.js'); ?>

    <?php echo Html::script('public/old/ajax.js'); ?>

    <?php echo Html::script('public/js/specified/report.js'); ?>

<?php $__env->stopPush(); ?>
      
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.myaccount', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>