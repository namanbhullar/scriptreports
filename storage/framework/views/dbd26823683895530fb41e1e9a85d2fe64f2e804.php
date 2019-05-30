<div class="col-1-1 slideAnimate " id="templateInfo<?php echo e($template->id); ?>">
    <div class="col-1-1 BorderBox">
        <div class="col-1-1  bgBlue">
            <h5 class="headonBlue"><?php echo e(trans('lang.template-info')); ?></h5>
        </div>   
        <div class="col-1-1 pul15 scriptInfoDetail CustomScrollbar">     
        <div class="col-1-1 mrgbt5">
            <div class="col-1-2">
                <b><?php echo e(trans('lang.date-submited')); ?></b>
            </div>
            <div class="col-1-2">
                <?php echo e(date('F j, Y',strtotime($template->created_date))); ?>

            </div>
            <div class="clearfix"></div>
        </div>
        <?php if(!empty($template->created_by)): ?>
            <div class="col-1-1 mrgbt5">
                <div class="col-1-2">
                    <b><?php echo e(trans('lang.created-by')); ?></b>
                </div>
                <div class="col-1-2">
                    <?php echo e($template->created_by); ?>

                </div>
                <div class="clearfix"></div>
            </div>
        <?php endif; ?>
        
        <?php if(!empty($template->lead)): ?>
            <div class="col-1-1 mrgbt5">
                <div class="col-1-2">
                    <b><?php echo e(trans('lang.lead')); ?></b>
                </div>
                <div class="col-1-2">
                    <?php echo e($template->lead); ?>

                </div>
                <div class="clearfix"></div>
            </div>
        <?php endif; ?>
        
       
        
        <?php if(!empty($template->company)): ?>
            <div class="col-1-1 mrgbt5">
                <div class="col-1-2">
                    <b><?php echo e(trans('lang.company')); ?></b>
                </div>
                <div class="col-1-2">
                    <?php echo e($template->company); ?>

                </div>
                <div class="clearfix"></div>
            </div>
        <?php endif; ?>
        
        
        <?php if(!empty($template->budget_from) || !empty($template->budget_to)): ?>
        <div class="col-1-1 mrgbt5">
            <div class="col-1-2">
                <b><?php echo e(trans('lang.budget')); ?></b>
            </div>
            <div class="col-1-2">
                <?php echo e($template->budget_from); ?><?php echo e(budget_type($template->budget_type)); ?>

                <?php if(!empty($template->budget_from) && !empty($template->budget_to)): ?> to  <?php endif; ?>
                <?php echo e($template->budget_to); ?><?php echo e(budget_type($template->budget_type)); ?>

            </div>
            <div class="clearfix"></div>
        </div>
        <?php endif; ?>
        
        <?php if(!empty($template->rating)): ?>
        <div class="col-1-1 mrgbt5">
            <div class="col-1-2">
                <b><?php echo e(trans('lang.rating')); ?></b>
            </div>
            <div class="col-1-2">
                <?php echo e($template->rating); ?>                                
            </div>
            <div class="clearfix"></div>
        </div>
        <?php endif; ?>
        
        <?php if(!empty($template->target_audience)): ?>
        <div class="col-1-1 mrgbt5">
            <div class="col-1-2">
                <b><?php echo e(trans('lang.target-audience')); ?></b>
            </div>
            <div class="col-1-2">
                <?php echo e($template->target_audience); ?>                                
            </div>
            <div class="clearfix"></div>
        </div>
        <?php endif; ?>
        
        <?php if(!empty($template->comparison)): ?>
        <div class="col-1-1 mrgbt5">
            <div class="col-1-2">
                <b><?php echo e(trans('lang.comparisons')); ?></b>
            </div>
            <div class="col-1-2">
                <?php echo e($template->comparison); ?>                                
            </div>
            <div class="clearfix"></div>
        </div>
        <?php endif; ?>
        
        <?php if(!empty($template->viewer_notes)): ?>        
            <div class="col-1-1 mrgbt5">
                <div class="col-1-1">
                    <b>Template info description</b>
                </div>
                <div class="col-1-1">
                    <?php echo $template->viewer_notes; ?>

                </div>
            </div>
        <?php endif; ?>
        </div>
    </div>
</div>