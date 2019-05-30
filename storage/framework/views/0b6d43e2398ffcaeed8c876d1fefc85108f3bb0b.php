<?php $__env->startSection('content'); ?>
<?php
	$documetns	=	auth()->user()->documents()->where('status','>',-1)->get();
 ?>


<h1 class="heading_tital"><?php echo e(trans('menu.script-manager.my-documents')); ?></h1>
    <div class="row mrgbt10">
    	<div class="col-11-12">
        	<ul class="top-tabs" id="tabs">
            	<li class="active bg-script " data-tab="scripts"><?php echo e(trans('lang.script')); ?></li>
                <li class="no-icon" data-tab="story"><?php echo e(trans('lang.story')); ?></li>
                <li class="no-icon" data-tab="coverage"><?php echo e(trans('lang.coverage')); ?></li>
                <li class="no-icon" data-tab="legal"><?php echo e(ucfirst(trans('lang.legal'))); ?></li>
                <li class="no-icon" data-tab="other"><?php echo e(trans('lang.other')); ?></li>
            </ul>
        </div>
        <div class="col-1-12">
        	<div class="btn btn-primary right btn-icon fa-plus">
            	<a href="<?php echo e(URL::to('myaccount/script-manager/my-documents/add')); ?>">Add New Document</a>
            </div>
        </div>
    </div>
    <div class="col-1-1">
    <?php  $show_norecords	=	true; ?>
    <?php foreach( $documetns as $dox): ?>
    <?php
    			$tempcls	=	str_replace(" ",'_',strtolower($dox->type));
				switch($tempcls){
					case 'scripts':
					case 'script':
					$tab	=	'scripts';
					$show_norecords	=	false;
					break;
					
					case 'coverage':
					case	'script_coverage';
					$tab	=	'coverage';
					break;
					
					case 'story':
					$tab	=	'story';
					break;
					
					case 'legal':
					$tab	=	'legal';
					break;
					
					default :
					$tab	=	'other';
					break;
				}
	?>
    
    	<div class="col-1-1 item-box pul10 mrgbt10" data-tab="<?php echo e($tab); ?>" id="dox<?php echo e($dox->id); ?>">
        	<div class="col-1-24">
            	<span class="ul-checkbox fa fa-square-o"></span>
                <div class="task-div">
                    <ul class="task-ul" data-id="<?php echo e($dox->id); ?>">
                    	<?php /*?><li data-task="scripts" {{ ($tab != 'scripts') ? "style=display:block" : "style=display:none" }}>
                        	{{ trans('lang.mark-as') }} {{ trans_choice('lang.script',1) }}
                        </li>
                        <li data-task="coverage" {{ ($tab != 'coverage') ? "style=display:block" : "style=display:none" }}>
                        	{{ trans('lang.mark-as') }} {{ trans('lang.coverage') }}
                        </li>
                        <li data-task="legal" {{ ($tab != 'legal') ? "style=display:block" : "style=display:none" }}>
                        	{{ trans('lang.mark-as') }} {{ trans('lang.legal') }}
                        </li>
                        <li data-task="other" {{ ($tab != 'other') ? "style=display:block" : "style=display:none" }}>
                        	{{ trans('lang.mark-as') }} {{ trans('lang.other') }}
                        </li><?php */?>
                        <li data-task="download">
                        	<a href="<?php echo e($dox->dlink); ?>" >
                            <?php echo e(trans('lang.download')); ?>

                            </a>
                        </li>
                        <li data-task="delete">
                            <?php echo e(trans('lang.delete')); ?>

                        </li>
                    </ul>
                </div>                
            </div>
            <div class="col-8-24">
            	 <h4 class="item-head">
                 	<a href="<?php echo e(URL::to("myaccount/script-manager/my-documents/$dox->id/edit")); ?>" ><?php echo e(str_limit($dox->title,40)); ?></a>
                     <?php if(!empty($dox->draft)): ?> <small>DRAFT <?php echo e($dox->draft); ?></small>	<?php endif; ?>
                 </h4>
                 <div class="item-detail">
                 	<span class="date" ><?php echo e(date('F j, Y',strtotime($dox->created_at))); ?></span>
                 </div>
            </div>            
            <div class="col-10-24">            	 
                 <div class="item-mid-desc">
                 	<?php echo e(str_limit($dox->description, 80)); ?>

                 </div>
            </div>
            <div class="col-2-24 right">
            	<div class="item-right-info">
                    <?php if($dox->file_name != null): ?>
                    <a href="<?php echo URL::to("/public/uploads/profiles/users/".auth()->user()->id."/mydocuments/".$dox->id."/".$dox->file_name); ?> "  target="_new">
                        <?php $ext	=	end(explode('.',$dox->file_name)); ?>
                            <?php if(strtolower($ext)=='pdf'){ ?>
                                <i class="fa fa-file-pdf-o xpul8 ypul10" ></i>
                            <?php }elseif(strtolower($ext)=='docx' || strtolower($ext)=='doc'){ ?>
                                    <i class="fa fa-file-word-o xpul8 ypul10"></i>
                                    
                             <?php }elseif(strtolower($ext)=='xls' || strtolower($ext)=='xlsx'){ ?>
                                    <i class="fa fa-file-excel-o xpul8 ypul10"></i>       
                            <?php }else{ ?>
                                    <i class="fa fa-file xpul8 ypul10"></i>
                            <?php } ?>
                   </a>
                  <?php endif; ?>
                </div>
            </div>
            
            <div class="clearfix"></div>
        </div>
    	
    <?php endforeach; ?>
    <div class="item-box no-records row" <?php echo e(($show_norecords) ?  "style=display:block" : "style=display:none"); ?>>
        	<p><?php echo e(trans('lang.no-record')); ?></p>
        </div>
    </div>
   <?php echo csrf_field(); ?> 

<?php $__env->startPush('script'); ?>
	<?php echo Html::script("public/js/specified/documents.js"); ?>

   
<?php $__env->stopPush(); ?>

<?php $__env->startPush('css'); ?>
	<style type="text/css" >
		div[data-tab="scripts"]{ display:block }
		div[data-tab="coverage"],
		div[data-tab="story"],
		div[data-tab="legal"],
		div[data-tab="other"],
		div#select-doc
		{ display:none }
		
	</style>
<?php $__env->stopPush(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.myaccount', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>