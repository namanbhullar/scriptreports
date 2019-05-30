<?php $__env->startSection('content'); ?>  
    <h1 class="heading_tital">Track Script <?php echo Html::image('public/images/icons/angle-right.png'); ?> <?php echo e($script->title); ?></h1>
    <?php $script->load('share.receiver.profile'); ?>
    <?php if(!$script->share->isEmpty() && $script->share->count() > 1): ?>
    	<?php foreach($script->share as $share): ?>
          <?php if($share->share_to != auth()->user()->id): ?>
            <div class="col-1-1 item-box pul10 mrgbt10">            
                <div class="left mrgrt20">
                    <div class="inbox-thumnail ">
                        <?php echo $share->receiver->profile->image; ?>

                    </div>
                </div>
                <div class="col-8-24">
                     <h4 class="item-head">
                        <a href="<?php echo e($share->receiver->link); ?>" ><?php echo e(str_limit($share->receiver->profile->full_name,40)); ?></a>
                     </h4>
                     <div class="item-detail">
                        <?php echo e(str_limit($share->receiver->profile->company_name,35)); ?>

                     </div>
                     <div class="item-detail">
                        <span class="date" ><?php echo e(date('F j, Y',strtotime($share->created_at))); ?></span>
                     </div>
                </div>            
                <div class="col-4-24 ypul10">
                    <?php if(!empty($share->first_view)): ?>
                     <div class="col-1-1 mrgbt10">
                        <b>First View</b> : <span class="date" ><?php echo e(date('F j, Y',strtotime($share->first_view))); ?></span>
                     </div>
                   <?php endif; ?>    
                   
                   <?php if(!empty($share->last_view)): ?>
                     <div class="col-1-1">
                        <b>Last View</b> : <span class="date" ><?php echo e(date('F j, Y',strtotime($share->last_view))); ?></span>
                     </div>
                   <?php endif; ?>
                     
                </div>
                <div class="col-4-24">
                    <div class="col-1-1 ypul20 text-center">
                        <?php switch($share->feedback_icon){
                                case 'Rejected': 
                                    $url = URL::to('public/images/icons/thumbs-down-blue.png');
                                    $text	= "Pass";	
                                break;
                                
                                case 'Considered': 
                                    $url = URL::to('public/images/icons/question-mark-blue.png');
                                    $text	= "Consider";
                                break;
                                
                                case 'Recommended': 
                                    $url = URL::to('public/images/icons/thumbs-up-blue.png');
                                    $text	= "Recommend";
                                break;
                                
                                case 'Priority': 
                                    $url = URL::to('public/images/icons/star.png');
                                    $text	= "Priority";
                                break;
                                
                                case 'buy': 
                                    $url = URL::to('public/images/icons/dollar-blue.png');
                                    $text	= "Buy";
                                break;
                                
                                case 'recomd-writer': 
                                    $url = URL::to('public/images/icons/recommend-writer.png');
                                    $text	= "Recommend Writer";
                                break; 
                                
                                default:
                                    $url = "";
                                    $text	= "";
                                break;
                            } ?>
                           <?php if(!is_null($url)): ?>
                           		<?php if(!empty($url)): ?>
                                	<?php echo Html::image($url); ?>&nbsp;&nbsp;
                                <?php endif; ?>
                                <?php echo e($text); ?> 
                           <?php endif; ?>
                    </div>
                    
                </div>
                <div class="right pul10"><?php echo e($share->feedback_text); ?></div>
                
                <div class="clearfix"></div>
            </div>          	
          <?php endif; ?>
        <?php endforeach; ?>
    <?php else: ?>
    	<div class="item-box row">
        	<h3><?php echo e(trans('lang.no-record')); ?></h3>
    	</div>
    <?php endif; ?>
    
    

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.myaccount', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>