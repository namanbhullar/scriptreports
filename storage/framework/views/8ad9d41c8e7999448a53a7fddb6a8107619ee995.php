<?php $layout	= (auth()->check())  ?  'layouts.myaccount' : 'layouts.guest'; ?>
	


<?php $__env->startSection('content'); ?>

<?php
	$profile	=	$user->profile;
	$addskil 		=	(!empty($user->profile->additional_skills)) ? $user->profile->additional_skills : array();
	$ohterskil		=	isset($addskil['other']) ? $addskil['other'] : array();
	
	$extrafldarray 	= 	(!empty($user->profile->extra_fields)) ? $user->profile->extra_fields : array();
	
	$isSelf	=	auth()->check() && auth()->user()->id == $user->id;
	
	//dump($profile);
	
?>
    <div class="item-box pul20 profile">
    	<div class="col-1-8 user-thumbline">
			<?php $thumbnail	= $user->profile->profile_img; ?>
            <?php if($thumbnail): ?>
                <?php echo $user->profile->image; ?>

            <?php else: ?>
                <?php echo noImage(); ?>

            <?php endif; ?>	
        </div>
        <div class="col-11-16 xpul10">
        	<div class="col-1-1">
            	
            	<div class="col-1-1">
                    <div class="<?php echo e(($isSelf) ? "col-5-8" : "col-1-1"); ?>">
                        <h1 class="item-head <?php echo (strlen($profile->company_name) > 20) ? 'hasTooltip" title="'.$profile->company_name.'"' : '"'; ?>>
                            <?php echo $user->profile->company_name; ?>                            
                        </h1>
                    </div>
                    
                    <?php if($isSelf): ?>
                        <div class="col-2-8 right">
                            <div class="mrgbt5"><a class="btn btn-white" href="<?php echo e(URL::route('profile.edit')); ?>">Edit profile</a></div>
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
            <a class="item-right-item bg-check-circle btn ypul0" href="<?php echo e(URL::route('user.submission',['id'=>$user->id])); ?>"><?php echo e(trans('lang.submissions')); ?></a>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
    
    <?php /*- Removed as par Ann Notes in correction file May 25
    <div class="col-1-1 ypul20 relative">
        <?php if(!empty($user->next)): ?>
        <div class="right col-3-20 mrglft15">
        	<a class="col-1-1 btn btn-gray fa-chevron-right btn-icon-right  xpul50" href="<?php echo e(URL::to('/profile/'.$user->next[0].'/view')); ?>"><?php echo e(trans('lang.next')); ?></a>
        </div>
        <?php endif; ?>
        
        <?php if(!empty($user->previous)): ?>
        <div class="right col-3-20"><a class="col-1-1 btn btn-gray fa-chevron-left btn-icon mrgrt15 xpul50 " href="<?php echo e(URL::to('/profile/'.$user->previous[0].'/view')); ?>"><?php echo e(trans('lang.previous')); ?></a></div>
        <?php endif; ?>
        
        <div class="clearfix"></div>
       
    </div>
    -*/ ?>
    
    <!-- About Me -->
    <div class="col-1-1 ymrg20">
    	<h4 class="BlueRadialHead">About</h4>
        <div class="col-1-1 pul8 RadialBoxBottom">
            <div class="col-3-3 xpul20">
           		<?php echo $user->profile->about_me; ?>

			</div>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
    <!-- About Me -->
    
    <!-- Scripts -->
    <?php $profileScripts	=	 $user->profile->WrittingProjects()->get();   ?>
    <?php if(!$profileScripts->isEmpty()): ?>
    <div class="col-1-1 mrgbt20">
	    <h4 class="BlueRadialHead mrgbt10"><?php echo e(strtoupper(Scripts)); ?></h4>
        <div class="col-1-1">
        	<?php foreach($profileScripts as $profileScript): ?>        	
                <div class="col-1-4 pulrt10">
                    <div class="profile-script">
                        <h2><?php echo e($profileScript->title); ?></h2>
                        <h5><?php echo e($profileScript->status); ?></h5>
                        <h3><?php echo (strtolower($profileScript->form[0]) == 'other') ? $profileScript->form[1] : $profileScript->form[0]; ?></h3>
                        <div class="profile-script-info">
                            <span class="gnr">
                            	<?php 
								$genre	=	checkForOther($profileScript->genre);
								$subgenre	=	checkForOther($profileScript->subgenre);
									
									if(!empty($genre))	echo $genre;
									if(!empty($genre) && !empty($subgenre))	echo "&nbsp;/&nbsp;";
									if(!empty($subgenre))	echo $subgenre;
								?>
                            </span>
                            <?php if(!empty($profileScript->pages)): ?>
	                            <span class="page">page <?php echo e($profileScript->pages); ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="col-1-1 profile-script-logline"><?php echo e($profileScript->logline); ?></div>
                        <div class="col-1-1 mrgbt15">
                        	<?php if($profileScript->permissions): ?>
                            	<div class=" col-2-3" style="margin:0 auto; display:block">
                                	<a class="btn btn-primary xpul40 " style="margin:0 auto; display:block" target="_blank" href="<?php echo e($profileScript->scriptFile->link); ?>">
                                		View
                                	</a>
                                </div>
                            <?php elseif(auth()->check()): ?>
	                            <div class="btn btn-primary xpul40 col-2-3" style="margin:0 auto; display:block" id="sendViewRrequest">
                                	Request
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            <?php endforeach; ?>
        	<div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
    <?php endif; ?>
    <!-- Scripts -->
    
	<!-- Featured project-->    
    <?php $profileProjects	=	 $user->profile->FeatureProjects()->get();  ?>
    <?php if(!$profileProjects->isEmpty()): ?>
    <div class="col-1-1">
	    <h4 class="BlueRadialHead mrgbt10"><?php echo e(strtoupper(trans('lang.featured-projects'))); ?></h4>
        <div class="col-1-1">        	
        <?php foreach($profileProjects as $profileProject): ?>
            <div class="col-1-4 pulrt10">
            	<div class="profile-fproject" data-id="#fprojectdesc<?php echo e($profileProject->id); ?>">
                	<?php if(!empty($profileProject->poster)): ?>
                    	<?php echo Html::image("public/uploads/profiles/users/$user->id/projects/$profileProject->id/$profileProject->poster","Project Poster",['class'=>"topBorderRadius"]); ?>

                    <?php else: ?>
                    	<?php echo noImage(); ?>

                    <?php endif; ?>
                    <div class="clearfix"></div>
                    <div class="col-1-1 RadialBoxBottom pul10">
                    	<h2> <?php echo e($profileProject->title); ?></h2>
                        <h5><?php echo checkForOther($profileProject->form); ?></h5>
                    </div>
                    <div class="col-1-1 slideAnimate" id="fprojectdesc<?php echo e($profileProject->id); ?>">
                        <div class="col-1-1 BorderBox">
                            <div class="col-1-1  bgBlue">
                                <h5 class="headonBlue"><?php echo e($profileProject->title); ?></h5>
                            </div>
                            <div class="col-1-1 pul15">
                                <div class="col-1-1 mrgbt5">
                                    <b><?php echo ShortScriptInfo($profileProject); ?></b>
                                </div>
                                <div class="col-1-1 mrgbt5">
                                     <b><?php echo $profileProject->release_date; ?></b>
                                </div>
                                <div class="col-1-1 mrgbt5">
                                     <b><?php echo ($profileProject->minutes) ? $profileProject->minutes."&nbsp;Minutes" : ""; ?></b>
                                </div>
                                <div class="col-1-1 mrgbt5">
                                     <b><?php echo ($profileProject->rating) ? $profileProject->rating."" : ""; ?></b>
                                </div>
                                <div class="col-1-1 pul15 scriptInfoDetail CustomScrollbar">
                                	<?php echo ($profileProject->brief) ? $profileProject->brief : ""; ?>

                                </div>
                                <div class="col-1-1 ymrg5">
                                	<?php if(!is_null($profileProject->scriptFile)): ?>
                                     <a class="btn btn-icon bg-script" href="<?php echo e($profileProject->scriptFile->link); ?>" target="_blank">&nbsp;Script</a>
                                     <?php endif; ?>
                                    <?php if(!empty($profileProject->link)): ?>
                                     <a class="btn btn-icon fa-link" href="<?php echo e(ext_link($profileProject->link)); ?>" target="_blank">&nbsp;More Info</a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        	<div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
    <?php endif; ?>
    <!-- Featured project-->  
    
    
    <!-- Clases-->  
    <?php $Classes	=	 $user->profile->Classes()->get(); ?>
    <?php if(!$Classes->isEmpty()): ?>
    <div class="col-1-1 mrgtp20">
	    <h4 class="BlueRadialHead mrgbt10"><?php echo e(strtoupper(trans('lang.classes'))); ?></h4>
        <div class="col-1-1">        	
        <?php foreach($Classes as $Class): ?>
            <div class="col-1-4 pulrt10">
            	<div class="profile-fproject" data-id="#classes<?php echo e($Class->id); ?>">
                	<?php if(!empty($Class->image)): ?>
                    	<?php echo Html::image("public/uploads/profiles/users/$user->id/classes/$Class->id/$Class->image","Project Poster",['class'=>"topBorderRadius"]); ?>

                    <?php else: ?>
                    	<?php echo noImage(); ?>

                    <?php endif; ?>
                    <div class="clearfix"></div>
                    <div class="col-1-1 RadialBoxBottom pul10">
                    	<h2> <?php echo e($Class->title); ?></h2>
                        <h5><?php echo checkForOther($Class->form); ?></h5>
                    </div>
                    <div class="col-1-1 slideAnimate" id="classes<?php echo e($Class->id); ?>">
                        <div class="col-1-1 BorderBox">
                            <div class="col-1-1  bgBlue">
                                <h5 class="headonBlue"><?php echo e($Class->title); ?></h5>
                            </div>
                            <div class="col-1-1 pul15">
                                <div class="col-1-1 mrgbt5">
                                    <b><?php echo checkForOther($Class->category); ?></b>
                                </div>
                                <div class="col-1-1 mrgbt5">
                                     <b><?php echo $Class->class_dates; ?></b>
                                </div>
                                <div class="col-1-1 mrgbt5">
                                     <b><?php echo ($Class->location); ?></b>
                                </div>
                                
                                <div class="col-1-1 pul15 scriptInfoDetail CustomScrollbar">
                                <div class="col-1-1 mrgbt5">
                                     <h4>At a Glance</h4>
                                     <p class="bullet-point"><?php echo $Class->bullet1; ?></p>
                                     <p class="bullet-point"><?php echo $Class->bullet2; ?></p>
                                     <p class="bullet-point"><?php echo $Class->bullet3; ?></p>
                                </div>
                                	<?php echo ($Class->description) ? $Class->description : ""; ?>

                                </div>
                                <?php if(!empty($Class->link)): ?>
                                <div class="col-1-1 ymrg5">
                                     <a class="btn btn-icon fa-link" href="<?php echo e($Class->link); ?>" target="_blank">&nbsp;More Info</a>
                                </div>
                               	<?php endif; ?>
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        	<div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
    <?php endif; ?>
    <!-- Clases-->  
    
    
    <!--- Contest --->
   	<?php $Contests	=	 $user->profile->Contests()->get(); //dump($Contests); ?>
    <?php if(!$Contests->isEmpty()): ?>
    <div class="col-1-1 mrgtp20">
    	<h4 class="BlueRadialHead mrgbt10"><?php echo e(strtoupper(trans('lang.contest'))); ?></h4>
        <div class="col-1-1">        	
        <?php foreach($Contests as $Contest): ?>
            <div class="col-1-4 pulrt10">
            	<div class="profile-fproject" data-id="#contest<?php echo e($Contest->id); ?>">
                	<?php if(!empty($Contest->image)): ?>
                    	<?php echo Html::image("public/uploads/profiles/users/$user->id/contest/$Contest->id/$Contest->image","Project Poster",['class'=>"topBorderRadius"]); ?>

                    <?php else: ?>
                    	<?php echo noImage(); ?>

                    <?php endif; ?>
                    <div class="clearfix"></div>
                    <div class="col-1-1 RadialBoxBottom pul10">
                    	<h2> <?php echo e($Contest->title); ?></h2>
                        <h5><?php echo checkForOther($Contest->form); ?></h5>
                    </div>
                    <div class="col-1-1 slideAnimate" id="contest<?php echo e($Contest->id); ?>">
                        <div class="col-1-1 BorderBox">
                            <div class="col-1-1  bgBlue">
                                <h5 class="headonBlue"><?php echo e($Contest->title); ?></h5>
                            </div>
                            <div class="col-1-1 pul15">
                            	<?php if(!empty($Contest->date)): ?>
                                <div class="col-1-1 mrgbt5">
                                    <b>Event&nbsp;:</b>&nbsp;<?php echo $Contest->date; ?>

                                </div>
                                <?php endif; ?>
                                
                                <?php if(!empty($Contest->entry_deadline)): ?>
                                <div class="col-1-1 mrgbt5">
                                     <b>Entry Deadline&nbsp;:</b>&nbsp;<?php echo $Contest->entry_deadline; ?>

                                </div>
                                <?php endif; ?>
                                
                                <?php if(!empty($Contest->entry_fee)): ?>
                                <div class="col-1-1 mrgbt5">
                                     <b>Entry Fee:&nbsp;:</b>&nbsp;<?php echo $Contest->entry_fee; ?>

                                </div>
                                <?php endif; ?>
                                <div class="col-1-1 pul15 scriptInfoDetail CustomScrollbar">
                                
                                	<?php echo ($Contest->description) ? $Contest->description : ""; ?>

                                </div>
                                <?php if(!empty($Contest->link)): ?>
                                <div class="col-1-1 ymrg5">
                                     <a class="btn btn-icon fa-link" href="<?php echo e($Contest->link); ?>" target="_blank">&nbsp;More Info</a>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        	<div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
    <?php endif; ?>
    <!--- Contest --->
    
    <div class="clearfix"></div>
	
    <?php if(auth()->check() && auth()->user()->id != $user->id): ?>
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
			
			$(".profile-fproject").each(function(index, element) {
			var $this = $(this);
			var top	=	function(){ $div.css({
							'top':( $this.offset().top - $div.height() - $(window).scrollTop()),
						}) }
			
			var $div	=	$($(this).data('id'));
			
			$div.css({
						'position':'fixed',
						'width':'400',
						'background-color':'#ffffff',
						'top':( $this.offset().top - $div.height() - $(window).scrollTop()),
					});
					
			$(window).scroll(function(){
				top();
			})
					
           $(this).hover(function(){					
					$div.addClass('show');					
			   	},function(){
					$div.removeClass('show');
				}
			); 
        })
		
           $("#send-message").sendMessagePopUp({
			   'clicker':'message-send',
			   beforeOpen:function(){
				   var form	=	document.getElementById("mesaage-sending-form");
				   
				   form.member.value	=	<?php echo e($user->id); ?>;
			   },
			   }); 
			   
		$("#template-btn").ToggaleFunction({
			div:'.profile-template',
			heigthDiv:'.profile-template-list'
			});
			
		<?php if(auth()->check() && auth()->user()->id != $user->id): ?>
		$("#user-favorite").favorite({id:<?php echo e($user->id); ?>,type:'user'});
		<?php endif; ?>
      });
	
		
    
    </script>
    <?php $__env->stopPush(); ?>
 	<style>
		.profile-template{
			background-color: #d9d9d9;
			border-radius: 5px;
			color: #233649;
			display: none;
			position: absolute;
			top: -77px;
			width: 285px;
		}
		.profile-template li{
			width:100%;border-radius: 5px;
		}
		.profile-template li a{
			display:block;
			border-radius: 5px;
			cursor: pointer;
			font-family: Raleway;
			font-size: 14px;
			font-weight: 600;
			line-height: 19px;
			margin-bottom: 5px;
			padding: 7px;
			width: 100%;
			z-index: 505;
		}
		.profile-template li a:hover,
		.profile-template li:hover a,
		.profile-template li:hover{
			 background-color: #6dbcdb;
			   color: #fff;
		}
		
		
	</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make($layout, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>