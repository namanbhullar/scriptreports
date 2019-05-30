<?php $layout	= (auth()->check())  ?  'layouts.myaccount' : 'layouts.guest'; ?>
	

<?php $__env->startSection('content'); ?>
<?php 
	$profile = $user->profile;
	$submission = $user->submission;
	$submission->load('rfdoc');
	$readers	=	$submission->reader()->where('status',1)->get();
	
	$isSelf	=	auth()->check() && auth()->user()->id == $user->id;
?>
	<div class="item-box pul20 profile">
    	<div class="col-1-8 user-thumbline">
			
            <?php echo $profile->image; ?>

        </div>        
        <div class="col-11-16 xpul10">
        	<div class="col-1-1">
            	<div class="col-1-1">
                	<div class="<?php if($isSelf): ?>col-6-8 <?php else: ?> col-1-1 <?php endif; ?>">
                    	<h1 class="item-head <?php echo (strlen($profile->company_name) > 20) ? 'hasTooltip" title="'.$profile->company_name.'"' : '"'; ?>>
                            <?php echo str_limit($user->profile->company_name,20); ?>                	
                        </h1>
                    </div>
                    <?php if($isSelf): ?>
                    	<div class="col-1-4">
                    		<a class="col-1-1 btn btn-icon btn-white fa-edit" href="<?php echo e(url('myaccount/script-manager/submission-guidelines')); ?>"><?php echo e(trans('lang.edit-submission')); ?></a>
                    	</div>
                    <?php endif; ?>                    
                </div>
                
                <?php if(!empty($profile->company_name)): ?>
                <h3 class="item-sub-head left <?php echo (strlen($profile->full_name) > 20) ? 'hasTooltip" title="'.$profile->full_name.'"' : '"'; ?>>
                	<?php echo str_limit($profile->full_name,20); ?>

                </h3>
                <?php endif; ?>
                
                <?php if(!empty($profile->full_name) && !empty($profile->title)): ?>
                <h3 class="item-sub-head left">&nbsp;|&nbsp;</h3>
                <?php endif; ?>
                
                <?php if(!empty($profile->title)): ?>
                <h3 class="item-sub-head left <?php echo (strlen($profile->title) > 20) ? 'hasTooltip" title="'.$profile->title.'"' : '"'; ?>>
                	<?php echo e(str_limit($profile->title)); ?>

                </h3>
                <?php endif; ?>
                
                <div class="col-1-1 mrgtp10">
                	<ul class="profile-social-link">
                    	<?php if(!empty($profile->website)): ?>
                        	<li class="bg-glob"><a class="hasTooltip" title="Go to Website" href="<?php echo e(ext_link($profile->website)); ?>"></a></li> 
                        <?php endif; ?>
                        
                        <?php if(!empty($profile->facebook)): ?>
                        	<li class="bg-facebook"><a class="hasTooltip" title="View On Facebook" href="<?php echo e(ext_link($profile->facebook)); ?>"></a></li>
                        <?php endif; ?>
                        
                        <?php if(!empty($profile->imdb)): ?>
                        	<li class="bg-imdb"><a class="hasTooltip" title="View On IMBD" href="<?php echo e(ext_link($profile->imdb)); ?>"></a></li>
                        <?php endif; ?>       
                                         
                        <?php if(!empty($profile->twitter)): ?>
                       		<li class="bg-twiter"><a class="hasTooltip" title="View On Twitter" href="<?php echo e(ext_link($profile->twitter)); ?>"></a></li>
                        <?php endif; ?>
                        
                        <?php if(!empty($profile->linkedin)): ?>
                        	<li class="bg-linkdin"><a class="hasTooltip" title="View On Linkedin" href="<?php echo e(ext_link($profile->linkedin)); ?>"></a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="col-3-16 item-right-main right">
        <div class="item-right-item  bg-info mrgbt5 relative" id="contact-info" >
        	<?php echo e(trans('lang.contact')); ?>

         	<div id="ueer-contact-info" class="slideAnimate">
            <?php echo e(Html::image('public/images/icons/grey_right.png','Gray Right',['class'=>'right-info-image'])); ?>

            <?php if(!is_null($profile->address)): ?>
            	<?php echo e($profile->company_name); ?><br/>
                <?php 
                if(!empty($profile->address->street))	echo $profile->address->street."<br/>";				
				if(!empty($profile->address->city))		echo $profile->address->city.",&nbsp&nbsp;";
				if(!empty($profile->address->state))	echo $profile->address->state."&nbsp;&nbsp";
				if(!empty($profile->address->zip))	echo $profile->address->zip."<br />";
				if(!empty($profile->address->phone))	echo $profile->address->phone."<br />";
				if(!empty($profile->address->country))	echo $profile->address->country;
				
			?>
            <?php else: ?>
            	<?php echo e(trans('lang.no-info')); ?>

            <?php endif; ?>
            </div>  
        </div>
        
         <?php if(auth()->check() && auth()->user()->id != $user->id): ?>   
               <?php  $checkfav	=	auth()->user()->favorites()->where('item_type','user')->where('item_id',$user->id)->count(); ?>
                <?php if(!$checkfav): ?>
                	<div class="item-right-item  bg-favorite mrgbt5" id="user-favorite" ><?php echo e(trans('lang.favorites')); ?></div>
                <?php else: ?>
                	<div class="item-right-item disabled  relative bg-favorite mrgbt5" id="user-favorite" ><?php echo e(trans('lang.favorites')); ?> <i class="fa fa-check absolute t9 r10"></i></div>
                <?php endif; ?>
         <?php elseif(auth()->check() && auth()->user()->id == $user->id): ?>                           
              	<div class="item-right-item  bg-favorite mrgbt5" onclick="javascript:FlashMessage('You Can\'t add yourself to favorites')">
                	<?php echo e(trans('lang.favorites')); ?>

                </div>
         <?php else: ?>
              	<div class="item-right-item  bg-favorite mrgbt5" onclick="FlashMessage('Please Login First')">
                	<?php echo e(trans('lang.favorites')); ?>

                </div>
         <?php endif; ?>
            
            <?php $templates	=	 $user->templates()->where('status',1)->get(); ?>
            <div class="relative btn btn-primary btn-icon bg-template-wh" id="all-template">
            	<?php echo e(trans('lang.evaluation-templates')); ?>

                
                <div class="col-1-1 slideAnimate BorderBox" id="template-show">
                	<div class="col-1-1">
                    	<div class="col-1-1  bgBlue">
                            <h5 class="headonBlue"><?php echo e(trans('lang.evaluation-templates')); ?></h5>
                        </div>
                        <div class="col-1-1 CustomScrollbar" style="max-height:275px">
                        <?php if(count($templates)): ?>
                        <?php $count= 1 ?>
                        	<ul>
                              <?php foreach($templates as $template): ?>
                              
                                    <li>
                                        <a href="<?php echo e($template->link); ?>" target="_blank">
                                            <?php echo e($count); ?>.&nbsp;<?php echo e($template->title); ?>

                                        </a>
                                    </li>
                                    <div class="h-line"></div>
                                    <?php $count++; ?>
                              <?php endforeach; ?>                          
                          	</ul>
                        <?php else: ?>
                              <div class="col-1-1 pul5">
                               <p class="tip-description mrg0"><?php echo e(trans('lang.no-template')); ?></p>
                              </div>
                        <?php endif; ?>
                        </div>
                    </div>
                </div>                
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="col-1-1 ymrg20"> 
       
      <div class="col-5-7">
      	<?php if(!is_null($submission->accept_submissions) && $submission->accept_submissions  == 0): ?>
        	<div class="col-1-1 item-box mrgbt20">
            	<h4><?php echo e(trans('lang.no-submission-accept')); ?></h4>
            </div>
        <?php else: ?>
          <div class="col-1-1 item-box mrgbt20">
                <div class="covrage_stamp left"></div>
                <div class="col-7-10 right">
                    <?php if(!empty($submission->description)): ?>
                        <?php echo $submission->description; ?>

                    <?php else: ?>
                        <h4 style="color:#6DBCDB;"><?php echo e(trans('lang.no-desc')); ?></h4>
                    <?php endif; ?>
                </div>
          </div>
        <?php endif; ?>
            <br/>
            <br/>
           
            <?php if(!$readers->isEmpty()): ?>
             <div class="col-1-1">
            	<h4 class="BlueRadialHead mrgbt10"><?php echo trans('lang.approved-readers'); ?></h4>
            </div>
            	<?php foreach($readers as $reader): ?>
                <?php 
					$reader->load('user.profile');
					$member	=	$reader->user->profile;
					$extrafld 	= 	(!empty($member->extra_fields)) ? $member->extra_fields : array();
				 ?>
                <div class="item-box row mrgbt20 pul15">
                    	<div class="left">
                            <div class="col-1-1 thumbnail small70">
                                <a href="<?php echo e($reader->user->link); ?>">
                                    <?php if($member->profile_img): ?> 
                                        <?php echo e(Html::image("public/uploads/profiles/users/$member->user_id/$member->profile_img", "Profile Avtar")); ?>

                                    <?php else: ?>
                                         <?php echo e(Html::image("public/images/no-image.png", "Profile Avtar")); ?>

                                    <?php endif; ?>
                                </a>
                            </div>                        	
                        </div>
                        
                        <div class="col-5-8 pullft10">
                        	<h3 class="item-head blue member-directory">
                                <a href="<?php echo e($reader->user->link); ?>">
                                    <?php echo e(str_limit($member->full_name,45)); ?>

                                </a>
                               
                                <?php if(in_array('WGA Member',$extrafld)): ?> <small><?php echo e(trans("form.wga_member")); ?></small> <?php endif; ?>
                               
                            </h3>
                            <div class="item-desc col-1-1 ">
                                        <?php echo e(str_limit(strip_tags($member->brief_boi),100)); ?>

                            </div>
                            <div class="clearfix"></div>
                        </div>
                        
                        
                        
                        <div class="col-3-11 right item-right-main pullft15">
                        	<div class="item-right-item mrgbt5 bg-profile"><a href="<?php echo e($reader->user->link); ?>" target="_blank"><?php echo e(trans('lang.view-profile')); ?></a></div>
                            
                            <?php if(auth()->check()): ?>    
                                <?php if(auth()->user()->id == $member->user_id): ?>      
                                    <div class="item-right-item bg-chat " onclick="FlashMessage('You Can\'t send message to youself')">
                                        <?php echo e(trans('lang.send-message')); ?>

                                    </div>
                                <?php else: ?>
                                    
                                    <div class="item-right-item bg-chat send-message" data-id="<?php echo e($member->user_id); ?>">
                                        <?php echo e(trans('lang.send-message')); ?>

                                    </div>
                                <?php endif; ?>
                            <?php else: ?>                                
                                <div class="item-right-item  bg-chat mrgbt5" onclick="FlashMessage('Please Login First')">
                                	<?php echo e(trans('lang.send-message')); ?>

                                </div>
                            <?php endif; ?>
                            
                            <div class="clearfix"></div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                <?php endforeach; ?>           
            <?php endif; ?>
            <div class="clearfix"></div>
        </div>
        
        <div class="col-2-8 pullft20 right">
        
        <?php if($submission->treatment || $submission->coverage || $submission->character_break || !is_null($submission->add_docs) || $submission->release_form || $submission->script || $submission->logline || $submission->synopsis): ?>
            <div class="col-1-1 BorderBox mrgbt20">
                <div class="col-1-1  bgBlue">
                    <h5 class="headonBlue">Requirements</h5>
                </div>
                
                <div class="col-1-1 pul15 submission-req">  
                    <?php if(!is_null($submission->rfdoc)): ?>
                        <div class="col-1-1 pul3 text-center">                                
                             <a href="<?php echo e($submission->rfdoc->dlink); ?>" target="_blank"> Release Form&nbsp;&nbsp;<i class="fa fa-download"></i> </a>
                         </div>
                    <?php endif; ?> 
                                    
                     <?php if($submission->script): ?>
                     <div class="col-1-1 pul3">
                     	<div class="left mrgrt10">
                            <i class="fa fa-check"></i>
                         </div>
                         <div class="left"><?php echo e(trans('lang.script')); ?></div>
                     </div>
                     <?php endif; ?>
                     
                     <?php if($submission->logline): ?>
                     <div class="col-1-1 pul3">
                     	<div class="left mrgrt10">
                            <i class="fa fa-check"></i>
                         </div>
                         <div class="left"><?php echo e(trans('lang.logline')); ?></div>
                     </div>
                     <?php endif; ?>
                     
                     <?php if($submission->synopsis): ?>
                     <div class="col-1-1 pul3">
                     	<div class="left mrgrt10">
                            <i class="fa fa-check"></i>
                         </div>
                         <div class="left"><?php echo e(trans('lang.synopsis')); ?></div>
                     </div>                           
                    <?php endif; ?> 
                    
                    <?php if($submission->character_break): ?>
                     <div class="col-1-1 pul3">
                     	<div class="left mrgrt10">
                            <i class="fa fa-check"></i>
                         </div>
                         <div class="left"><?php echo e(trans('lang.character-list')); ?></div>
                     </div>
                    <?php endif; ?>
                    <?php if($submission->coverage): ?>
                      <div class="col-1-1 pul3">
                     	<div class="left mrgrt10">
                            <i class="fa fa-check"></i>
                         </div>
                         <div class="left"><?php echo e(trans('lang.coverage-report')); ?></div>
                     </div>
                    <?php endif; ?>
                    <?php if($submission->treatment): ?>
                    <div class="col-1-1 pul3">
                     	<div class="left mrgrt10">
                            <i class="fa fa-check"></i>
                         </div>
                         <div class="left"><?php echo e(trans('lang.treatment')); ?></div>
                     </div>
                   <?php endif; ?>
                   <?php $additional	=	(!is_null($submission->add_docs)) ? unserialize($submission->add_docs) : array() ; ?>
                   <?php foreach( $additional as $key=>$other): ?>
                   	<div class="col-1-1 pul3">
                     	<div class="left mrgrt10">
                            <i class="fa fa-check"></i>
                         </div>
                         <div class="left"><?php echo e($key); ?></div>
                     </div>
                   <?php endforeach; ?>                   
                </div>
                <div class="clearfix"></div>
            </div>
        <?php endif; ?>
        </div>        
        <div class="clearfix"></div>
    </div>
    
    
    <?php if(auth()->check()): ?>
    <?php echo view('message.message')->with(['contact'=>false,'email'=>false]); ?>

    <?php endif; ?>
    
    <?php $__env->startPush('script'); ?>
    
    <?php if(!auth()->check() || auth()->user()->id == $user->id): ?>
    	<?php echo Html::script('public/js/message.js'); ?>

    <?php endif; ?>    
    
    <script>
        $(document).ready(function(e) {
			$("#contact-info").hover(function(){
				$("#ueer-contact-info").addClass('show');
			},
			function(){
				$("#ueer-contact-info").removeClass('show');
			})
			
			
			$("#all-template").ShowUpClick({div:"#template-show"});
			   
		$("#template-btn").ToggaleFunction({
			div:'.profile-template',
			heigthDiv:'.profile-template-list'
			});
			
		<?php if(auth()->check() && auth()->user()->id != $user->id): ?>
		$("#user-favorite").favorite({id:<?php echo e($user->id); ?>,type:'user'});
		<?php endif; ?>
		
		<?php if(auth()->check()): ?>
			$(".send-message").each(function (index,ele){
				var id	=	$(this).data('id');
				$(this).PopUp({
				
				boxDivId:'send-message',
				 beforeOpen:function(ele){	
				   var form	=	document.getElementById("mesaage-sending-form");
				  form.member.value	=	ele.data('id');
			   },
			   }); 
			   
			});
			
			$(".user-favorite").each(function(index,ele){
				$(this).favorite({type:'user',id:$(this).data('id')});
			});
		<?php endif; ?>
      });
	
		
    
    </script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make($layout, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>