<?php $__env->startSection('content'); ?>
<?php $user	=	auth()->user(); ?>
<h1 class="heading_tital">Invite Friends</h1>
    <?php echo e(Form::open(array('route' => 'invite.save'))); ?>

    	<div class="col-2-3">
            <div class="col-1-1 mrgbt15">
            	<?php echo e(Form::label('link','Your referral link',['class'=>' textInput mrgbt5 it'])); ?>

		        <?php echo e(Form::text('link',URL::to('/myaccount/subscribes/4/'.$user->invition_token), ['class'=>'text textInput it','readonly'=>'readonly','required'])); ?>

            </div>
            
            <div class="col-1-1 mrgbt15">
            	<?php echo e(Form::label('ProfilLink','Your profile link',['class'=>' textInput mrgbt5 it'])); ?>

        		<?php echo e(Form::text('ProfilLink',auth()->user()->link, ['class'=>'text textInput it','readonly'=>'readonly','required'])); ?>

            </div>
            
            <div class="col-1-1 mrgbt15">	
            	<?php echo e(Form::label('email','Emails (Please put comma after or between email addresses)',['class'=>' textInput it'])); ?>

                <input type="text" name="tag[]" value="" class="tag" id="email_verified"/>
                <div class="hint-wrapper"></div>
            </div>
            
            <div class="col-1-1 mrgbt15">	
            	<?php echo e(Form::label('subject','Subject',['class'=>' textInput it'])); ?>

        		<?php echo e(Form::text('subject','', ['class'=>'text textInput it','required'])); ?>

            </div>
            
            <div class="col-1-1 mrgbt30">	
                <?php echo e(Form::label('message','Message',['class'=>' textInput it'])); ?>

                <?php echo e(Form::textArea('message','', ['class'=>'text textInput it','required'])); ?>	
            </div>
            
            <?php echo e(Form::submit('SEND',['class'=>'btn btn-primary right','id'=>'submit', 'data-submit'=>'true'])); ?>

        </div>
    <?php echo e(Form::close()); ?>

    
    
<?php $__env->startPush('script'); ?>
    <?php echo e(Html::script('public/js/jquery.autoGrowInput.js')); ?> 
    <?php echo e(Html::script('public/js/jquery.tagedit.js')); ?> 
    
    <script type="text/javascript">
	$(function() {
		
		// Fullexample
		$('input.tag').tagedit({
			//autocompleteURL: BASEURL+'/myaccount/invite-friends/autocomplete',
          
		});
		
		$(document).ready(function(){
			$("#IndexForm").submit(function(){ 
				if($('input[name="tag[]"]').length<=1){
					alert('Please enter at least one email address');
					return false;
				}else{
					return true;
				}
			})
			
		});
		
	});
function RemoveEmailDiv(){
$(".hint-wrapper").removeClass('show');	
}

var userId = <?php echo e(auth()->user()->id); ?>;
	</script>
    
    
<?php $__env->stopPush(); ?>

<?php $__env->startPush('css'); ?>
	<?php echo e(HTML::style('public/css/jquery.tagedit.css')); ?>

<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.myaccount', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>