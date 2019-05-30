<?php $__env->startSection('content'); ?>
	<h3 class="blue-head mrg0 "><?php echo e(trans('lang.member-directory')); ?></h3>
    <div class="col-1-1 pul20">
    	<?php if(count($readers)): ?>
            <?php foreach($readers as $reader): ?>
                <div class="col-1-1 item-box pul10 mrgbt10" id="item<?php echo e($reader->user_id); ?>">
                    <div class="left mrgrt20">
                        <div class="inbox-thumnail iframe-member-dir">
                            <?php if($reader->profile_img): ?> 
                                <?php echo e(Html::image("public/uploads/profiles/users/$reader->user_id/$reader->profile_img", "Profile Avtar")); ?>

                            <?php else: ?>
                                 <?php echo e(Html::image("public/images/no-image.png", "Profile Avtar")); ?>

                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-7-14">         
                       <?php $extrafld	=	(!empty($reader->extra_fields)) ? $reader->extra_fields : array(); ?>
                        <?php if($reader->user_group==4): ?>   
                            <h3 class="item-head"> <?php echo e($reader->company_name); ?> </h3>
                            <h4 class="item-sub-head">
                                <?php echo str_limit($reader->full_name,30); ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo str_limit($reader->title,25); ?>

                            </h4>
                        <?php else: ?>
                            <h3 class="item-head">
                                <?php echo str_limit($reader->full_name,45); ?>

                             <?php /*    <?php if(in_array('WGA Member',$extrafld)): ?> 
                                    <small> <?php echo e(trans('lang.wga-member')); ?> </small>
                                <?php endif; ?>   */ ?>
                            </h3>
                        <?php endif; ?>
                    </div>
                    <div class="col-5-14 right">
                    <?php if(auth()->user()->id != $reader->user_id): ?>										
                    <?php		$send_request	=	App\Models\RequestsAll::where('sender_id','=',auth()->user()->id)
                                                        ->where('receiver_id','=',$reader->user_id)
                                                        ->where('request_type','=','AddProfile')
                                                        ->orderBy('id', 'desc')->first();
                            if(!is_null($send_request)){							
                                isset($send_request->request_status) || $send_request->request_status	=	NULL;
                        ?>
                                <?php if($send_request->request_status=='decline'): ?>                    
                                    <a class="btn btn-primary right mrgtp20" onclick="FlashMessage('Your Request has been Decline. You cannot sent another Request.',false)">Request Sent</a>                    
                                <?php elseif($send_request->request_status=='pending'): ?>							
                                    <a class="btn btn-primary right mrgtp20" onclick="FlashMessage('Request already sent. You cannot sent another Request.',false)">Request Pending</a>								
                                <?php elseif($send_request->request_status=='accept'): ?>							
                                    <a class="btn btn-primary right mrgtp20" onclick="FlashMessage('<?php echo e($user->profile->full_name); ?> is already in your submission profile.',true)">Request Accepted</a>							
                                <?php else: ?>							
                                    <a class="btn btn-primary right mrgtp20" chang="true" onclick="SentAddProfileRequest(this,<?php echo e($reader->user_id); ?>)">Add to Profile</a>
                                <?php endif; ?>
                            <?php }else{?>
                                    <a class="btn btn-primary right mrgtp20" chang="true" onclick="SentAddProfileRequest(this,<?php echo e($reader->user_id); ?>)">Add to Profile</a>                    	
                            <?php } ?>
                    <?php endif; ?>
                        <div class="right">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
        	<div class="col-1-1 item-box pul10 mrgbt10">
            	<h4><?php echo e(trans('lang.no-user-in-contact')); ?></h4>
                <h5 class="mrgtp10"><?php echo e(trans('lang.no-user-in-contact-msg')); ?></h5>
            </div>
        <?php endif; ?>
        
        <?php echo csrf_field(); ?>

        <div class="clearfix"></div>
    </div>
    
<?php $__env->startPush('script'); ?>

	<script type="text/javascript">
	function SentAddProfileRequest(ele,id){
		var $item	=	$("#item" + id),
		$aLink		=	$(ele);
		$.ajax({
			method:'post',
			headers:{'X-CSRF-TOKEN':TOKEN},
			url:BASEURL + '/myaccount/script-manager/submission-guidelines/add-request',
			data:'id=' + id,
			beforeSend:function(){
				$item.addClass("loadinganimation").addClass("animating"); 
			},
			complete:function(){
				$item.removeClass('loadinganimation').removeClass('animating');
			},
			error:function(){ parent.FlashMessage('Fail To Send Request. Please Try Again Letter',false)},
			success:function(data){
				
				if(data.status == 'ok')
				{
					$aLink.attr('onclick',"parent.FlashMessage('Request already sent, cannot send another request',false)").html("Request Pending");
					parent.FlashMessage(data.msg,true);
				}
				else
				{
					parent.FlashMessage(data.msg,false);
				}
			}
		})
		
		
	}
    </script>    
<?php $__env->stopPush(); ?>
	
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.iframe', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>