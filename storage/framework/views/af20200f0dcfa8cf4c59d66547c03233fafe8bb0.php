<div class="col-1-1 slideAnimate " id="scrriptInfo<?php echo e($id); ?>">
    <div class="col-1-1 BorderBox">
        <div class="col-1-1  bgBlue">
            <h5 class="headonBlue"><?php echo e(trans('lang.script-info')); ?></h5>
        </div>   
        <div class="col-1-1 pul15 scriptInfoDetail CustomScrollbar">     
        <div class="col-1-1 mrgbt5">
            <div class="col-1-2">
                <b><?php echo e(trans('lang.date-submited')); ?></b>
            </div>
            <div class="col-1-2">
                <?php echo e(date('F j, Y',strtotime($script->created_date))); ?>

            </div>
            <div class="clearfix"></div>
        </div>
        <?php if(!empty($script->submitted_by)): ?>
            <div class="col-1-1 mrgbt5">
                <div class="col-1-2">
                    <b><?php echo e(trans('lang.submitted-by')); ?></b>
                </div>
                <div class="col-1-2">
                    <?php echo e($script->submitted_by); ?>

                </div>
                <div class="clearfix"></div>
            </div>
        <?php endif; ?>
        
        <?php if(!empty($script->draft_date)): ?>
            <div class="col-1-1  mrgbt5">
                <div class="col-1-2">
                    <b><?php echo e(trans('lang.draft-date')); ?></b>
                </div>
                <div class="col-1-2">
                    <?php echo e(date('F j, Y',strtotime($script->draft_date))); ?>

                </div>
                <div class="clearfix"></div>
            </div>
        <?php endif; ?>
        
        <?php if(!empty($script->pages)): ?>
            <div class="col-1-1 mrgbt5">
                <div class="col-1-2">
                    <b><?php echo e(trans('lang.pages')); ?></b>
                </div>
                <div class="col-1-2">
                    <?php echo e($script->pages); ?>

                </div>
                <div class="clearfix"></div>
            </div>
        <?php endif; ?>
        
        <?php if(!empty($script->location)): ?>
            <div class="col-1-1  mrgbt5">
                <div class="col-1-2">
                    <b><?php echo e(trans('lang.location')); ?></b>
                </div>
                <div class="col-1-2">
                    <?php echo e($script->location); ?>

                </div>
                <div class="clearfix"></div>
            </div>
        <?php endif; ?>
        
        <?php if(!empty($script->setting)): ?>
            <div class="col-1-1 mrgbt5">
                <div class="col-1-2">
                    <b><?php echo e(trans('lang.settings')); ?></b>
                </div>
                <div class="col-1-2">
                    <?php echo e($script->setting); ?>

                </div>
                <div class="clearfix"></div>
            </div>
        <?php endif; ?>
        
        <?php if(!empty($script->period)): ?>
            <div class="col-1-1 mrgbt5">
                <div class="col-1-2">
                    <b><?php echo e(trans('lang.period')); ?></b>
                </div>
                <div class="col-1-2">
                    <?php echo e($script->period); ?>

                </div>
                <div class="clearfix"></div>
            </div>
        <?php endif; ?>
        
        <?php if(!empty($script->budget_from) || !empty($script->budget_to)): ?>
        <div class="col-1-1 mrgbt5">
            <div class="col-1-2">
                <b><?php echo e(trans('lang.budget')); ?></b>
            </div>
            <div class="col-1-2">
                <?php echo e($script->budget_from); ?><?php echo e(budget_type($script->budget_type)); ?>

                <?php if(!empty($script->budget_from) && !empty($script->budget_to)): ?> to  <?php endif; ?>
                <?php echo e($script->budget_to); ?><?php echo e(budget_type($script->budget_type)); ?>

            </div>
            <div class="clearfix"></div>
        </div>
        <?php endif; ?>
        
        <?php if(!empty($script->rating)): ?>
        <div class="col-1-1 mrgbt5">
            <div class="col-1-2">
                <b><?php echo e(trans('lang.rating')); ?></b>
            </div>
            <div class="col-1-2">
                <?php echo e($script->rating); ?>                                
            </div>
            <div class="clearfix"></div>
        </div>
        <?php endif; ?>
        
        <?php if(!empty($script->target_audience)): ?>
        <div class="col-1-1 mrgbt5">
            <div class="col-1-2">
                <b><?php echo e(trans('lang.target-audience')); ?></b>
            </div>
            <div class="col-1-2">
                <?php echo e($script->target_audience); ?>                                
            </div>
            <div class="clearfix"></div>
        </div>
        <?php endif; ?>
        
        <?php if(!empty($script->comparisons)): ?>
        <div class="col-1-1 mrgbt5">
            <div class="col-1-2">
                <b><?php echo e(trans('lang.comparisons')); ?></b>
            </div>
            <div class="col-1-2">
                <?php echo e($script->comparisons); ?>                                
            </div>
            <div class="clearfix"></div>
        </div>
        <?php endif; ?>
        
        <?php if(is_array($script->script_info)): ?>
         <?php foreach($script->script_info as $info): ?>
            <div class="col-1-1 mrgbt5">
                <div class="col-1-2">
                    <b><?php echo e($info[name]); ?></b>
                </div>
                <div class="col-1-2">
                    <?php echo e($info[title]); ?>

                </div>
            </div>
         <?php endforeach; ?>
        <?php endif; ?>
        </div>
    </div>
</div>