<?php $__env->startSection('content'); ?>                    
    <h1 class="heading_tital"><?php echo e(trans('menu.script-manager')); ?></h1>
    <div class="element col-ft-6" data-href="<?php echo e(URL::to('/myaccount/script-manager/scripts')); ?>">
        <?php echo Html::image("public/images/element_1.png",trans('menu.script-manager.scripts')); ?>

        <h2><?php echo e(trans('menu.script-manager.scripts')); ?></h2>
        <p class="ymrg25"><?php echo trans('scriptmanager.script_desc'); ?></p>
    </div>
    
    <div class="element elementadd col-ft-6" data-href="<?php echo e(url('/myaccount/script-manager/script-add')); ?>">
        <?php echo Html::image("public/images/element_2.png",trans('menu.script-manager.script-add')); ?>

        <h2><?php echo e(trans('menu.script-manager.script-add')); ?></h2>
        <p class="ymrg25"><?php echo trans('scriptmanager.add_script_desc'); ?></p>
        <a class="i-icon">
        	 <?php echo Html::image("public/images/home/port-1.jpg",trans('menu.script-manager.script-add')); ?>

        </a>
    </div>
    <?php /*?><div class="element col-md-3">
        {!! Html::image("public/images/element_3.png",trans('menu.script-manager.request-scripts')) !!}
        <h2>{{ trans('menu.script-manager.request-scripts') }}</h2>
        <p>{!! trans('scriptmanager.request_desc') !!}</p>
    </div><?php */?>
    <?php if(auth()->user()->user_group == 4): ?>
    <div class="element col-ft-6" data-href="<?php echo e(url('myaccount/script-manager/submission-guidelines')); ?>">
        <?php echo Html::image("public/images/element_4.png",trans('menu.script-manager.submission-guidelines') ); ?>

        <h2 class="xpul10"><?php echo e(trans('menu.script-manager.submission-guidelines')); ?></h2>
        <p class="mrgbt15 mrgtp20"><?php echo trans('scriptmanager.submis_desc'); ?></p>
    </div>
    <?php endif; ?>
    <div class="element col-ft-6" data-href="<?php echo e(url('/myaccount/script-manager/my-documents')); ?>">
        <?php echo Html::image("public/images/element_5.png",trans('menu.script-manager.my-documents')); ?>

        <h2><?php echo e(trans('menu.script-manager.my-documents')); ?></h2>
        <p class="ymrg25"><?php echo trans('scriptmanager.my_doc_desc'); ?><br/></p>
    </div>
    <div class="clearfix"></div>
    
    <?php $__env->startPush('script'); ?>
		 <script>
			(function($){
				$(document).ready(function(e) {
					$(".element").click(function(){
						window.location	= $(this).data("href");					
					});
				});
			})(jQuery)
		</script>
    <?php $__env->stopPush(); ?>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.myaccount', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>