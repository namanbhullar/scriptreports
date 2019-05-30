<?php if(!$reports->isEmpty()): ?>
    <?php foreach($reports as $report): ?>
        <div class="col-1-1 mrgbt10">
            <div class="col-1-15">
                <?php echo Form::checkbox('reportchck[]',$report->id); ?>

            </div>
            <div class="left mrgrt10">
                <div class="thumnailsmall">
                    <?php echo $report->owner->profile->image; ?>

                </div>
            </div>
            <div class="col-7-15">
                <div class="col-1-1 report-head">
                    <?php echo str_limit($report->owner->profile->full_name,30); ?>

                </div>
                <div class="col-1-1 report-date"><?php echo e(date('F j, Y',strtotime($report->created_at))); ?></div>
            </div>
            <div class="col-5-15">
                <div class="col-1-1 report-sub-head">                                	
                    <?php echo $report->title; ?>

                </div>
                <div class="col-1-1 report-draft">Draft:<?php echo $report->draft; ?></div>
            </div>
        </div>
    <?php endforeach; ?>
<?php else: ?>
	<div class="Box pul10"><h4>No Reports found for this template. Please try diffrent One.</h4></div>
<?php endif; ?>
