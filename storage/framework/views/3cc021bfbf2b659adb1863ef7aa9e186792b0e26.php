<?php $__env->startSection('content'); ?>    
    	<h1 class="heading_tital">Invite Friends</h1>
        <div class="row mrgbt10">
    	<div class="col-11-12">
        	<ul class="top-tabs" id="tabs">
            	<li class="active no-icon" data-tab="sent">Sent</li>
                <li class="no-icon" data-tab="accept">Accepted</li>
            </ul>
        </div>
        <div class="col-1-12">
        	<div class="btn btn-primary right btn-icon fa-plus">
            	<a href="<?php echo e(URL::to('myaccount/invite-friends/add')); ?>">Invite Friends</a>
            </div>
        </div>
    </div>
    
    <?php 	$show_norecords	=	true;
			$isSended		=	false;
			$isAccepted	=	false; 
			
			$invites	=	auth()->user()->invites()->get();
			
	?>
    
    <?php foreach($invites	as $ref): ?>
    <?php
	
		if($ref->accepted){
			echo view('invite-friends.member')->with(['invite'=>$ref]);
		}else{
			echo view('invite-friends.guests')->with(['invite'=>$ref]);
			$show_norecords	= false;
		}
    ?>
			
            
    <?php endforeach; ?>
   
     <div class="item-box no-records row" <?php echo e(($show_norecords) ?  "style=display:block" : "style=display:none"); ?>>
        	<p><?php echo e(trans('lang.no-record')); ?></p>
        </div>
    </div>
    
   <?php echo view('message.message')->with(['contact'=>false,'email'=>false]); ?>

   
   
    <?php $__env->startPush('css'); ?>
    	
    	<style>
			div[data-tab="accept"]{
				display:none;
			}
        </style>
    <?php $__env->stopPush(); ?>
    
    <?php $__env->startPush('script'); ?>
    	<?php echo Html::Script('public/js/specified/invites.js'); ?>

    	<script type="text/javascript">
			$(document).ready(function(e) {
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
            });
        </script>
    <?php $__env->stopPush(); ?>
     
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.myaccount', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>