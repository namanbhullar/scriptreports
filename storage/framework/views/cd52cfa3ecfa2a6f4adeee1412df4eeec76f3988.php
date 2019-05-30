<div class="top-left hidden-sm hidden-xs">                
    <ul>
        <li><a href="<?php echo e(url('/directory')); ?>">Directory</a></li>
        <li><a href="<?php echo e(url('/submission-directory')); ?>">Submissions</a></li>
        <li><a href="<?php echo e(url('/contact-us')); ?>">Contact</a></li>
        
        <div class="clearfix"></div>
        
    </ul>
</div>
<div class="dash-top-right">        
    <ul class="right-icon">
        <?php /*- <li class="notificaton" id="notifyBtnPopup">
            <a href="#">
                <?php echo Html::image("public/images/icons/bell.png","bell.png"); ?>

                <?php if(!$notifications->isEmpty() && $notifications->where('is_seen',0)->count()): ?>
	                <span><?php echo e($notifications->where('is_seen',0)->count()); ?></span>
                <?php endif; ?>
            </a>
        </li> */ ?>
        <li class="massage" id="msgBtnPopup">
        
        	<a href="#">
                <?php echo Html::image("public/images/icons/bell.png","bell.png"); ?>

                <?php if(!$message->isEmpty() && $message->where('is_seen',0)->count()): ?>                	
               		<span><?php echo e($message->where('is_seen',0)->count()); ?></span>
                <?php endif; ?>
            </a>
        </li>
        <?php /* <li id="srequestnotification" class="request">
        	<a href="#">
        		<?php echo Html::image("public/images/dash-top-right-icon2.png","dash-top-right-icon2.png"); ?>

        	</a>
            <?php if(!$request->isEmpty() && $request->where('is_seen',0)->count()): ?>
    	        <span><?php echo e($request->where('is_seen',0)->count()); ?></span>
            <?php endif; ?>
        </li> */ ?>
        <li class="profile-box sprofilepop"><a href="#"><?php echo auth()->user()->profile->image; ?></a></li>
        <li class="name sprofilepop"><a href="#"><?php echo auth()->user()->first_name; ?></a></li>
        <li class="logout sprofilepop"><a href="#"><?php echo Html::image("public/images/dash-top-right-logout.png" ,"dash-top-right-logout.png"); ?></a></li>
        
        <div class="clearfix"></div>
    </ul>    
    <?php /* <div class="top-notifications BorderBox slideAnimate" id="srequestnotification-popup">
        <div class="col-1-1">
            <div class="col-1-1  bgBlue">
                <h5 class="headonBlue"><?php echo e(trans('notification.requests')); ?></h5>
            </div>            
    
            <?php if(!$request->isEmpty()): ?>        
                <?php foreach($request as $notification): ?>
                    <div class="col-1-1 pul8 notification <?php echo e((!$notification->is_seen) ? "unread" : ""); ?>">
                        <div class="left">
                            <?php echo e(Html::image("public/images/icons/$notification->icon")); ?>

                        </div>
                        <div class="left mrglft15">
                            <a class="tip-description mrg0" href="<?php echo e($notification->link); ?>"><?php echo e($notification->message); ?></a>
                            <span class="date" style="font-size:12px;display:block"><?php echo e(date('F d, Y',strtotime($notification->created_at))); ?></span>
                        </div>
                    </div>
                    <div class="h-line"></div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-1-1 pul8">                    
                    <div class="left mrglft15">
                    	<p class="tip-description mrg0">No Record Found</p>
                    </div>
                </div>
           	<?php endif; ?>
        </div> 
        <div class="clearfix"></div>
    </div> */ ?>
    
    <div class="top-notifications BorderBox slideAnimate" id="msg-notify-popup">
        <div class="col-1-1">
            <div class="col-1-1  bgBlue">
                <h5 class="headonBlue"><?php echo e(trans('notification.notifications')); ?></h5>
            </div>
             <?php if(!$message->isEmpty()): ?>
             <div class="clearfix"></div>
             <div class="CustomScrollbar" style="max-height:300px">     	
                <?php foreach($message as $notification): ?>
                	
                    <?php if($notification->notification_type==2): ?>
                    	<?php $notification->load('request'); ?>
                        <div class="col-1-1 pul8 notification <?php echo e((!$notification->is_seen) ? "unread" : ""); ?>">
                                
                                <div class="left user-image">
                                    <?php echo $notification->sender->profile->image; ?>

                                </div>
                                    
                                <div class="left mrglft10 <?php echo e(($notification->type == 'invite-friend') ? 'col-md-7' : 'col-md-10'); ?>">
                                    <?php echo $notification->message ;?>
                                    <span class="date" style="font-size:12px;display:block"><?php echo e(date('F d, Y',strtotime($notification->created_at))); ?></span>	
                                </div>
                                <div class="col-md-4">
                                	
                                    <?php if($notification->type == 'invite-friend'): ?>
                                        <?php if($notification->request->request_status == 'pending'): ?>
                                            <button id="declineRequest_<?php echo e($notification->request->id); ?>" class="btn btn-primary right btn-icon xpul40 top-btn">
                                            	Decline
                                            </button>
                                            <button id="acceptRequest_<?php echo e($notification->request->id); ?>" class="btn btn-primary right mrgrt10 btn-icon xpul40 top-btn">
                                            	Accept
                                             </button>
                                            <?php $__env->startPush('scriptFooter'); ?>
                                            	<script type="text/javascript">
													$("#declineRequest_<?php echo e($notification->request->id); ?>").setRequestResult({request_id:'<?php echo e($notification->request->id); ?>',result:'declined',position:'top'});
													$("#acceptRequest_<?php echo e($notification->request->id); ?>").setRequestResult({request_id:'<?php echo e($notification->request->id); ?>',result:'accepted',position:'top'});
												</script>
                                            <?php $__env->stopPush(); ?>
                                        <?php else: ?>
                                            <button class="btn btn-primary disabled right mrgrt10 btn-icon fa-check xpul40">
                                                <?php echo e(ucfirst($notification->request->request_status)); ?>

                                            </button>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="h-line"></div>
                    
                    <?php else: ?>
                        <?php if(!$notification->deleted): ?>
                            <div class="col-1-1 pul8 notification <?php echo e((!$notification->is_seen) ? "unread" : ""); ?>">
                                <div class="left">
                                    <?php echo e(Html::image("public/images/icons/$notification->icon")); ?>

                                </div>
                                <div class="left mrglft15">
                                    <?php if($notification->type=='contect-request-decline'): ?>
                                        <a class="tip-description mrg0" href="#"><?php echo $notification->message ;?></a>
                                    <?php else: ?>
                                        <a class="tip-description mrg0" href="<?php echo e($notification->link); ?>"><?php echo $notification->message ;?></a>
                                    <?php endif; ?>    
                                    <span class="date" style="font-size:12px;display:block"><?php echo e(date('F d, Y',strtotime($notification->created_at))); ?></span>
                                </div>
                            </div>
                            <div class="h-line"></div>
                        <?php endif; ?>
                        
                    <?php endif; ?>      
                    
                <?php endforeach; ?>
              </div>                  
            <?php else: ?>
                <div class="col-1-1 pul8">                    
                    <div class="left mrglft15">
                    	<p class="tip-description mrg0">No Record Found</p>
                    </div>
                </div>
           	<?php endif; ?>
            
            
        </div> 
        <div class="clearfix"></div>
    </div>
    <?php /* 
    <div class="top-notifications BorderBox slideAnimate" id="notification-popup">
        <div class="col-1-1">
            <div class="col-1-1  bgBlue">
                <h5 class="headonBlue"><?php echo e(trans('notification.notifications')); ?></h5>
            </div>
            
           <?php if(!$notifications->isEmpty()): ?>  
                <?php foreach($notifications as $notification): ?>
                    <div class="col-1-1 pul8 notification <?php echo (!$notification->is_seen) ? "unread" : ""; ?>">
                        <div class="left">
                            <?php echo e(Html::image("public/images/icons/$notification->icon")); ?>

                        </div>
                        <div class="left mrglft15">
                            <a class="tip-description mrg0" href="<?php echo e($notification->link); ?>"><?php echo e($notification->message); ?></a>
                            <span class="date" style="font-size:12px;display:block"><?php echo e(date('F d, Y',strtotime($notification->created_at))); ?></span>
                        </div>
                    </div>
                    <div class="h-line"></div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-1-1 pul8">                    
                    <div class="left mrglft15">
                    	<p class="tip-description mrg0">No Record Found</p>
                    </div>
                </div>
           	<?php endif; ?>
        </div> 
        <div class="clearfix"></div>
    </div>
    */ ?>
    
    <div class="top-profile-popup" id="sprofile-popup">
    	<div class="col-1-4">
        	<div class="profile-box">
	            <a href="<?php echo App\Models\User::UserprofileLink(auth()->user()->id); ?>"><?php echo auth()->user()->profile->image; ?></a>
            </div>
        </div>
        <div class="col-3-4">
        	<h4 class="name"><?php echo auth()->user()->profile->full_name; ?></h4>
        	<ul class="prfile-links">
            	<li><a href="<?php echo e(URL::to('myaccount/profile/edit')); ?>">Edit Profile</a></li>
                <li><a href="<?php echo e(URL::to('myaccount/accounts-settings')); ?>">Settings</a></li>
                <li class="logout"><a href="<?php echo e(URL::to('/logout')); ?>">Log Out</a></li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
</div>  

<?php $__env->startPush('scriptFooter'); ?>
<script>
	(function($){
		$(document).ready(function(e) {
			
           <?php /* $("#srequestnotification").notificationPopUp({
					div:'#srequestnotification-popup',
					ids:'<?php echo $request->where('is_seen',0)->pluck('id')->toJson(); ?>',
					count:<?php echo e($request->where('is_seen',0)->count()); ?>

					});			
			*/ ?>
					
			$("#msgBtnPopup").notificationPopUp({
						div:'#msg-notify-popup',
						ids:'<?php echo $message->where('is_seen',0)->pluck('id')->toJson(); ?>',
						count:<?php echo e($message->where('is_seen',0)->count()); ?>

					});			
			<?php /*$("#notifyBtnPopup").notificationPopUp({
						div:'#notification-popup',
						ids:'<?php echo $notifications->where('is_seen',0)->pluck('id')->toJson(); ?>',
						count:<?php echo e($notifications->where('is_seen',0)->count()); ?>

					}); */ ?>
        });
	})(jQuery)
</script>
<?php $__env->stopPush(); ?>