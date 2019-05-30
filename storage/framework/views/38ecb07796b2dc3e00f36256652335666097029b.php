<?php $layout	= (auth()->check())  ?  'layouts.myaccount' : 'layouts.guest'; ?>
	


<?php $__env->startSection('content'); ?>
<?php $data || $data = array();
		$data['filter'] || $data['filter'] = []; ?>
  
  
  
    <h1 class="heading_tital"><?php echo e(trans('menu.reader-directory')); ?></h1>
    <div class="row mrgtp20">
        <div class="col-17-24">
        	<div class="col-1-1">
                <?php foreach($members as $member): ?>
                	<?php $user	=	App\Models\User::find($member->user_id); ?>
                    <?php  //dump($member) ?>
                    <?php $extrafld	=	($member->extra_fields!='') ? unserialize($member->extra_fields) : array(); ?>
                    
                    <div class="item-box row mrgbt20 pul15">
                    	<div class="col-2-11">
                            <div class="col-1-1 profile-thumnail">
                                <a href="<?php echo e(URL::to('profile/$user->link/view')); ?>">
                                    <?php if($member->profile_img): ?> 
                                        <?php echo e(Html::image("public/uploads/profiles/users/$member->user_id/$member->profile_img", "Profile Avtar")); ?>

                                    <?php else: ?>
                                         <?php echo e(Html::image("public/images/no-image.png", "Profile Avtar")); ?>

                                    <?php endif; ?>
                                </a>
                            </div>                        	
                        </div>
                        
                        <div class="col-6-11 pullft10">
                        	<h3 class="item-head member-directory">
                                <a href="<?php echo e(URL::to("profile/".$user->id."/view")); ?>">
                                    <?php echo e(str_limit($member->full_name,45)); ?>

                                </a>
                               
                                <?php if(is_array($extrafld) && in_array('WGA Member',$extrafld)): ?> <small><?php echo e(trans("form.wga_member")); ?></small> <?php endif; ?>
                               
                            </h3>
                            <div class="item-desc col-1-1 ">
                                        <?php echo e(str_limit(strip_tags($member->brief_boi),210)); ?>

                            </div>
                            <div class="clearfix"></div>
                        </div>
                        
                        
                        
                        <div class="col-3-11 item-right-main pullft15">
                            <div class="item-right-item mrgbt5 bg-profile"><a href="<?php echo e($user->link); ?>" target="_blank"><?php echo e(trans('lang.view-profile')); ?></a></div>
                            <?php if(auth()->check()): ?>    
                                <?php if(auth()->user()->id == $user->id): ?>                            	
                                    <div class="item-right-item  bg-favorite mrgbt5" onclick="FlashMessage('You Can\'t add youself to favorites')" >
                                        <?php echo e(trans('lang.favorites')); ?>

                                    </div>                                
                                    <div class="item-right-item bg-chat " onclick="FlashMessage('You Can\'t send message to youself')">
                                        <?php echo e(trans('lang.send-message')); ?>

                                    </div>
                                <?php else: ?>
									<?php $checkfav	=	auth()->user()->favorites()->where('item_type','user')->where('item_id',$user->id)->count(); ?>
                                    <?php if(!$checkfav): ?>
                                        <div class="item-right-item  bg-favorite mrgbt5 user-favorite" data-id="<?php echo e($user->id); ?>" >
                                            <?php echo e(trans('lang.favorites')); ?>

                                        </div>
                                    <?php else: ?>
                                        <div class="item-right-item  relative bg-favorite mrgbt5 user-favorite" data-id="<?php echo e($user->id); ?>" >
                                            <?php echo e(trans('lang.favorites')); ?>

                                            <i class="fa fa-check absolute t9 r10 f20"></i>
                                        </div>                                        
                                    <?php endif; ?>
                                    <div class="item-right-item bg-chat send-message" data-id="<?php echo e($user->id); ?>">
                                       <?php echo e(trans('lang.send-message')); ?>

                                    </div>
                                <?php endif; ?>
                            <?php else: ?>
                                <div class="item-right-item  bg-favorite mrgbt5" onclick="FlashMessage('Please Login First')" >
                                    <?php echo e(trans('lang.favorites')); ?>

                                </div>
                                <div class="item-right-item  bg-chat mrgbt5" onclick="FlashMessage('Please Login First')">
                                	<?php echo e(trans('lang.send-message')); ?>

                                </div>
                            <?php endif; ?>
                            
                            <div class="clearfix"></div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                <?php endforeach; ?>
                <div class="clearfix"></div>
            </div>
        </div>
        <?php echo e(Form::model($data,['url' => URL::to('reader-directory'),'id'=>'members_form','method'=>'GET'])); ?>

        <div class="col-7-24 pullft40" id="member-filter">
        	<div class="col-1-1 mrgbt25 bgGray xpul15 ypul15 BorderBox">
            	<div class="col-2-9">
                	Show
                </div>
                <div class="col-4-9">
                	<?php  $perpage	=	isset($data['per_page']) ? $data['per_page'] : '9'; ?>
                    <?php echo Form::select('per_page',array(
                                '3' => '3',
                                '6' => '6',
                                '9' => '9',
                                '12' => '12',
                                '15' => '15',
                                '30' => '30',
                                '50' => '50',
                                '100' => '100'
                                ),$perpage,['class'=>'noeffect','onchange'=>'this.form.submit();']	
                            ); ?>

                </div>
                <div class="col-3-9">
                	per page 
                </div>
                
            	<div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
            <div class="col-1-1">
            	<?php echo $members->appends($data)->links(); ?>

            </div>
            <div class="col-1-1 BorderBox" id="member-filter-items">
            	<h4 class="headonBlue"><?php echo e(trans('lang.filter-member-by')); ?></h4>
                <div class="col-1-1 pul10">
                <?php 
					$field	=	array("script_consultant"=>"Script Consultant",
										"script_coverage"=>"Script Coverage",
										"dev_notes"=>"Development Notes",
										"script_writing"=>"Script Writing",
										"ghost_writing"=>"Ghost Writing",
										"rewrite_assis"=>"Rewrite Assistance",
										"instructor"=>"Instructor",
										"wga_member"=>"WGA Member",
										"proffNformat"=>"Proofreading & Formatting",
										"templates"=>"Templates",
										);
				?>
                	<?php foreach($field as $key=>$value): ?>
                	<div class="col-1-1 pullft5 ymrg3">
                    	<div class="left mrgrt15">
                        <?php echo Form::checkbox('filter[]',$value,in_array($value,$data['filter']),array('onclick'=>'this.form.submit()')); ?></div>
                        <div class="left"><?php echo e(trans("form.$key")); ?></div>
                    </div>
                    <?php endforeach; ?>
                                          
                    <div class="col-1-1 ymrg5">
                 	<?php echo Form::text("location",NULL,["placeholder"=>trans('form.location'),"id"=>"location","class"=>"text textInput it"]); ?>

                    </div>
                    <div class="col-1-1 ymrg5">
                        <?php echo Form::text("add_language",NULL,["placeholder"=>trans('form.aditinl-lang'),"id"=>"add_language","class"=>"text textInput it"]); ?>

                    </div>
                    <div class="col-1-1 mrgtp10">
                    	<input type="reset" class="col-1-3 btn btn-primary left" id="clear-member-filter" value="CLEAR" />
                        <input type="submit" class="col-1-3 btn btn-primary right" id="serach-member-filter" value="SEARCH" />                       
                    </div>
                    <div class="clearfix"></div>
                </div>                
            </div>
             <div class="clearfix"></div>
        </div>
        <?php echo e(Form::close()); ?>

        <div class="clearfix"></div>
    </div>
	<?php if(auth()->check()): ?>
    <?php echo view('message.message')->with(['contact'=>false,'email'=>false]); ?>

    <?php endif; ?>
    
<?php $__env->startPush('script'); ?>
    <?php if(!auth()->check()): ?>
        <?php echo Html::script('public/js/message.js'); ?>

    <?php endif; ?> 
	<script>
	(function($){
		$(document).ready(function(e) {
            $('input[type="reset"]').click(function(){
				window.location = '<?php echo e(URL::to('/reader-directory')); ?>';
			});
			
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
		
	})(jQuery)
    </script>
<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>



<?php echo $__env->make($layout, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>