<?php $__env->startSection('content'); ?>
	<h3 class="blue-head mrg0 mrgbt20"><?php echo e(trans('menu.script-manager.my-documents')); ?></h3>
    <div class="row mrgbt10 xpul20">
    	<div class="col-11-12">
        	<ul class="top-tabs scripts" id="tabs">
            	<li class="active bg-script" data-tab="scripts"><?php echo e(trans('lang.script')); ?></li>
                <li class="" data-tab="coverage"><?php echo e(trans('lang.coverage')); ?></li>
                <li class="" data-tab="legal"><?php echo e(trans('lang.legal')); ?></li>
                <li class="" data-tab="other"><?php echo e(trans('lang.other')); ?></li>
            </ul>
        </div>
        <div class="col-1-12">
        	<div class="btn btn-primary right" id="select-doc">
            	Insert Selected <span>0</span>
            </div>
        </div>
    </div>
    <div class="col-1-1 xpul20" style="overflow:scroll; height:380px;">
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
    
    	<div class="col-1-1 item-box row pul10 mrgbt10" data-tab="<?php echo e($tab); ?>" id="dox<?php echo e($dox->id); ?>">
        	<div class="col-1-24">
            	<span class="ul-checkbox fa fa-square-o" data-id="<?php echo e($dox->id); ?>"></span>
            </div>
            <div class="col-23-24">
            	 <h4 class="item-head script">
                 	<?php echo e(str_limit($dox->title,40)); ?>

                 </h4>
            </div>
            <div class="clearfix"></div>
        </div>
    	
    <?php endforeach; ?>
    <div class="item-box no-records row" <?php echo e(($show_norecords) ?  "style=display:block" : "style=display:none"); ?>>
        	<p><?php echo e(trans('lang.no-record')); ?></p>
        </div>
    </div>
    
    
 <script>
 	var DcoTitle	=	[];
	var DocLink		=	[];
	<?php foreach($documetns as $doc): ?>
		DcoTitle[<?php echo e($doc->id); ?>]	=	'<?php echo e(str_limit($doc->title,20)); ?>';
		DocLink[<?php echo e($doc->id); ?>]	=	'<?php echo e($doc->link); ?>';
	<?php endforeach; ?>
 </script>   
<?php $__env->startPush('script'); ?>
	<?php echo Html::script("public/js/specified/documents.js"); ?>

	<?php echo Html::script("public/js/iframe/documents/$jscript"); ?>

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
<?php echo $__env->make('layouts.iframe', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>