<?php 
	$favorite->load('member.profile');
	$profile	=	$favorite->member->profile;
	
	$arcived	=	(bool) $favorite->status;
?>
<div class="col-1-1 item-box pul10 mrgbt10" data-tab="<?php echo e(($arcived) ? "member" : "archived"); ?>" id="favorite<?php echo e($favorite->id); ?>">
    <div class="col-1-24">
        <span class="ul-checkbox fa fa-square-o"></span>
        <div class="task-div">
            <ul class="task-ul" data-id="<?php echo e($favorite->id); ?>">
                 <li data-task="archived" <?php echo (!$arcived) ? 'style="display:none;"' : ""; ?>>
                    <?php echo e(trans('lang.archive')); ?>

                </li>
                <li data-task="unarchived" <?php echo (!$arcived) ? "" : 'style="display:none;"'; ?>>
                    <?php echo e(trans('lang.unarchived')); ?>

                </li>
                <li data-task="delete">
                    <?php echo e(trans('lang.delete')); ?>

                </li>
            </ul>
        </div>                
    </div>
    <div class="left mrgrt20">
        <div class="inbox-thumnail ">     
	        <?php echo $profile->image; ?>

        </div>
    </div>
    <div class="col-8-24">
         <h4 class="item-head">
           <a href="<?php echo $favorite->member->link; ?>">
            <?php echo e(str_limit($profile->full_name,40)); ?>

           </a>
         </h4>
         <div class="item-detail">
            <span class="date" ><?php echo e(date('F j, Y',strtotime($favorite->created_at))); ?></span>
         </div>
    </div>            
    <div class="col-8-24">
         <div class="item-detail">
            <?php echo e(str_limit($profile->company_name, 80)); ?>

         </div>
    </div>
    <div class="col-4-24 right">
        <div class="item-right-main">        	
        	<?php  if($favorite->iscontact):  ?>            
            	<div class="item-right-item mrgbt5 relative fa-user" onclick="FlashMessage('Already added to contacts')">
                	Add To Contacts
                	 <i class="fa fa-check absolute t9 r7 f14"></i>
                </div>
            <?php else: ?>
            	<div class="item-right-item mrgbt5 fa-user-plus  add-contact"  data-id="<?php echo e($favorite->member->id); ?>">Add To Contacts</div>
            <?php endif; ?>
            <div class="item-right-item bg-chat send-message" data-id="<?php echo e($favorite->member->id); ?>"><?php echo e(trans('lang.send-message')); ?></div>
        </div>
    </div>
    
    <div class="clearfix"></div>
</div>