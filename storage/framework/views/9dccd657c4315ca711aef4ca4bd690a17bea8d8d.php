<?php $__env->startSection('content'); ?>
<?php 
	$profile	=	auth()->user()->profile; 
	
	//dump(auth()->user()->plan);
	
	//$profile->load('FeatureProjects');
	//$profile->load('Classes');
	//$profile->load('Contests');
	//$profile->load('WrittingProjects');
	
	//dd(auth()->user());
	//dd( $profile->address);
	
	$isProUser	=	auth()->user()->plan->id > 2 ? true : false	;
?>
<?php /*?>{!! dump($profile) !!}<?php */?>
	<h1 class="heading_tital">
        <?php if($profile->isnew): ?>
            <?php echo e(trans('lang.create-profile')); ?>

            <?php $profile->update(['isnew',0]); ?>
        <?php else: ?>
            <?php echo e(trans('lang.edit-profile')); ?>

        <?php endif; ?>
	</h1>
    
    <?php echo Form::open(["url"=>route('profile.update'),"files"=>true]); ?>

    
    <div class="col-2-3">
    	<div class="col-1-1">
        	<div class="col-3-10">
            	<div class="profile-edit-image" id="edit-profile-image">
             		   	<?php echo $profile->image; ?>

                </div>
            </div>
            <div class="col-3-5 mrgtp20">
            	<div class="col-1-1 mrglft20 relative">
                    <b>(jpeg, png, jpg file only)</b><br/>
                    <b>(image size 150x150)</b>
                    
                </div>
                <div class="col-1-5 mrglft20 mrgtp20 relative">
                    <div class="col-1-1 pul10 filebutton-label">Browse...</div>
                    <?php if($isProUser): ?>
                    	<span style="color:#F00; position:absolute; font-size:40px; padding-top:10px; right:-20px; line-height:30px;">*</span>
                    <?php endif; ?>
                    <input type="file" name="profile_imgage" class="filebutton" id="proflepic">
                </div>
            </div>            
        </div>
        
        <div class="col-1-1 ymrg15">
            <?php echo e(Form::label('full_name',trans('lang.full_name'),['class'=>'it mrgbt5'])); ?>

            <?php echo e(Form::text('full_name',$profile->full_name,array('class'=>'text textInput it','placeholder'=>trans('lang.full_name')))); ?>

        </div>
        
        <div class="col-1-1 mrgbt15">
            <?php echo e(Form::label('company_name',trans('lang.company'),['class'=>'it mrgbt5'])); ?>

            <?php echo e(Form::text('company_name',$profile->company_name,array('class'=>'text textInput it','placeholder'=>trans('lang.company')))); ?>

        </div>
        
        <div class="col-1-1 mrgbt15">
            <?php echo e(Form::label('title',trans('lang.position'),['class'=>'it mrgbt5'])); ?>

            <?php echo e(Form::text('title',$profile->title,array('class'=>'text textInput it','placeholder'=>trans('lang.position')))); ?>

        </div>
        
        <div class="col-1-1 mrgbt15">
        	<?php $address = $profile->address; ?>
            <?php echo e(Form::label('title',trans('lang.address'),['class'=>'it mrgbt5'])); ?>

             <?php echo e(Form::text('address[street]',$address->street,array('class' => 'text textInput it', 'placeholder' => 'Street Address'))); ?>

            <?php echo e(Form::text('address[city]',$address->city,array('class' => 'text textInput it mrgtp5', 'placeholder' => 'City'))); ?>

            <?php echo e(Form::text('address[state]',$address->state,array('class' => 'text textInput it mrgtp5', 'placeholder' => 'State'))); ?>

            <?php echo e(Form::text('address[zip]',$address->zip,array('class' => 'text textInput it mrgtp5', 'placeholder' => 'Zip'))); ?>

            <?php echo e(Form::text('address[phone]',$address->phone,array('class' => 'text textInput it mrgtp5', 'placeholder' => 'Phone'))); ?>

            <?php echo e(Form::text('address[country]',$address->country,array('class' => 'text textInput it mrgtp5', 'placeholder' => 'Country'))); ?>

        </div>
        
        <div class="col-1-1 ymrg30">
        	<label class="it mrgbt5" for="brief_boi" style="position:relative">
            <?php echo e(trans('lang.brief-desc')); ?><small>&nbsp;&nbsp;(For main directory)</small>
            <?php if($isProUser): ?>
                    	<span style="color:#F00; font-size:40px; position:absolute; top:16px; margin-left:20px; line-height:10px;">*</span>
                    <?php endif; ?>
            </label>
            <small class="small_label"></small>
            <div class="clearfix"></div>
            <?php echo e(Form::textarea('brief_boi',trim($profile->brief_boi),array('class' => 'text textArea it', 'placeholder' => 'Height skills(50 words  or less) for main directory.','id'=>'brief_boi'))); ?>

        </div>
        
        <div class="col-1-1 mrgbt30">
        	<label class="it mrgbt5" for="about_me"><?php echo e(trans('lang.about')); ?><small>&nbsp;&nbsp;(Full Resume For Profile Page)</small></label>
            <small class="small_label"></small>
            <div class="clearfix"></div>
            <?php echo e(Form::textarea('about_me',$profile->about_me,array('class' => 'text textArea it', 'placeholder' => 'About Me (For Profile Page)','id'=>'about_me'))); ?>

        </div>
        
        
        
        <!--- Check Boxes Starts From Here -->
        <div class="col-1-1">
        	<h5>Select all that apply</h5>
        </div>
        <?php
			 $extra	=	is_array($profile->extra_fields) ?  $profile->extra_fields : [] ; 
			 
			 $fields	=	[
								"agent"=>"Agent",	
								"contest-administrator"=>"Contest Administrator",
								"director"=>"Director",
								"distributor"=>"Distributor",
								"financier"=>"Financier",
								//"instructor"=>"Instructor",
								"manager"=>"Manager",
								"producer"=>"Producer",
								"publisher"=>"Publisher",
								"showrunner"=>"Showrunner",
								
			 				];
		?>
        
        <?php foreach($fields as $key=>$field): ?>
        	<div class="col-1-1 mrgtp10 Box pul10">
                <div class="left">                        
                    <?php echo e(Form::checkbox('extra_fields[]',$field,in_array($field,$extra))); ?>

                </div>
                <div class="left mrglft15">
                    <?php echo e(Form::label('extra_fields[]',trans("lang.$key"),['class'=>'it checkbox'])); ?>

                </div>
                <div class="clearfix"></div>    
            </div>	
        <?php endforeach; ?>
        
        <!--- Check Boxes Ends From Here -->
             	
        <div class="clearfix"></div>
    </div>
    
    <div class="clearfix"></div>
    <div class="h-line ymrg20"></div>
        <!-- Optional Info Starts form Here --->
        
    <div class="col-2-3">
    	<div class="col-1-1 mrgtp30">
        	<h3><?php echo e(trans('lang.links')); ?>&nbsp;&nbsp;<small>(<?php echo e(trans('lang.select-all-that-apply')); ?>)</small></h3>
        </div>
                
        <div class="col-1-1 ymrg15">
            <?php echo e(Form::label('website',trans('lang.website'),['class'=>'it mrgbt5'])); ?>

            <?php echo e(Form::text('website',$profile->website,array('class'=>'text textInput it','placeholder'=>trans('lang.website')))); ?>

        </div>
        
        <div class="col-1-1 mrgbt15">
            <?php echo e(Form::label('facebook',trans('lang.facebook'),['class'=>'it mrgbt5'])); ?>

            <?php echo e(Form::text('facebook',$profile->facebook,array('class'=>'text textInput it','placeholder'=>trans('lang.facebook')))); ?>

        </div>
        
        <div class="col-1-1 mrgbt15">
            <?php echo e(Form::label('twitter',trans('lang.twitter'),['class'=>'it mrgbt5'])); ?>

            <?php echo e(Form::text('twitter',$profile->twitter,array('class'=>'text textInput it','placeholder'=>trans('lang.twitter')))); ?>

        </div>
        
        <div class="col-1-1 mrgbt15">
            <?php echo e(Form::label('imbd',trans('lang.imbd'),['class'=>'it mrgbt5'])); ?>

            <?php echo e(Form::text('imbd',$profile->imbd,array('class'=>'text textInput it','placeholder'=>trans('lang.imbd')))); ?>

        </div>
        
        <div class="col-1-1 mrgbt15">
            <?php echo e(Form::label('linkedin',trans('lang.linkedin'),['class'=>'it mrgbt5'])); ?>

            <?php echo e(Form::text('linkedin',$profile->twitter,array('class'=>'text textInput it','placeholder'=>trans('lang.linkedin')))); ?>

        </div>
        
    </div>
	    <!-- Optional Info Ends form Here --->
    
    <div class="clearfix"></div>
    <div class="h-line ymrg20"></div>
    
     <!-- Script Feature Profject Starts From here -->
    <div class="col-2-3">
    	<div class="col-1-1 ymrg20">
        	<h3><?php echo e(trans('lang.fetaure-projects')); ?></h3>
        </div>
        <?php 
			$FeaturedProjets	=	$profile->FeatureProjects()->get();
			$Projectcount		=	1;
		 ?>
        <div class="col-1-1" id="profile-project-part">
        <?php 
				if(!$FeaturedProjets->isEmpty()):
					foreach($FeaturedProjets as $FeaturedProjet):
						echo '<div class="col-1-1 pul15 Box relative mrgbt20" id="profileProject'.$Projectcount.'">';
						 echo view('profile.addProject')->with(['project'=>$FeaturedProjet,'count'=>$Projectcount]);
						 echo "</div>";
						 $Projectcount++;
					endforeach;
				endif;
			?>
        </div>
        <div class="col-1-1">
        	<div class="btn btn-icon btn-primary fa-plus" id="add-project-to-profile">Add <?php echo e((!$FeaturedProjets->isEmpty()) ? 'Another' : ''); ?> Project</div>
        </div>
    </div>
    
    <!-- Script Feature Profject Ends From here -->
   
    <div class="clearfix"></div>
    <div class="h-line ymrg20"></div>
    
   <!-- Script Classes Starts From here -->
    <div class="col-2-3">
    	<div class="col-1-1 ymrg20">
        	<h3><?php echo e(trans('lang.classes')); ?></h3>
        </div>
        
        <div class="col-1-1" id="profile-classes-part">
         <?php 
		 $classes	=	$profile->Classes()->get();
		 $classeCount	=	1;
				if(!$classes->isEmpty()):
					foreach($classes as $classe):
						echo '<div class="col-1-1 pul15 Box relative mrgbt20" id="profileClasses'.$classeCount.'">';
						 echo view('profile.addClasses')->with(['classes'=>$classe,'count'=>$classeCount]);
						 echo "</div>";
						 $classeCount++;
					endforeach;
				endif;
			?>
        </div>
        <div class="col-1-1">
        	<div class="btn btn-icon btn-primary fa-plus" id="add-classes-to-profile">Add <?php echo e((!$classes->isEmpty()) ? 'Another' : ''); ?> <?php echo e(trans('lang.class')); ?></div>
        </div>
    </div>
    
    <!-- Script Classes Ends From here -->
       
    <div class="clearfix"></div>
    <div class="h-line ymrg20"></div>
    
    <!-- Script Contaest Starts From here -->
    <div class="col-2-3">
    	<div class="col-1-1 ymrg20">
        	<h3><?php echo e(trans('lang.contest')); ?></h3>
        </div>
        
        <div class="col-1-1" id="profile-contest-part">
         <?php 
		 $contests	=	$profile->Contests()->get();
		 $contestCount	=	1;
				if(!$contests->isEmpty()):
					foreach($contests as $contest):
						echo '<div class="col-1-1 pul15 Box relative mrgbt20" id="profileContest'.$contestCount.'">';
						 echo view('profile.addContest')->with(['contest'=>$contest,'count'=>$contestCount]);
						 echo "</div>";
						 $contestCount++;
					endforeach;
				endif;
			?>
        </div>
        <div class="col-1-1">
        	<div class="btn btn-icon btn-primary fa-plus" id="add-contest-to-profile">Add <?php echo e((!$contests->isEmpty()) ? 'Another' : ''); ?> <?php echo e(trans('lang.contest')); ?></div>
        </div>
    </div>
    
    <!-- Script Contaest Ends From here -->
       
    <div class="clearfix"></div>
    <div class="h-line ymrg20"></div>
    
    <div class="col-2-3">
    	<div class="pull-right">
    		<?php echo Form::submit('SUBMIT',['class'=>"btn btn-primary xpul15","style"=>"font-size:20px;"]); ?>

    	</div>
    </div>
    
    
 	<?php echo Form::open(); ?>

    
    	
<?php $__env->startPush('script'); ?>
<script>
var csrfToken	=	'<?php echo e(csrf_token()); ?>';
(function($){
	$(document).ready(function(e) {
		$("#add-classes-to-profile").data('count',<?php echo e($classeCount); ?>);
		$("#add-project-to-profile").data('count',<?php echo e($Projectcount); ?>);	
		$("#add-contest-to-profile").data('count',<?php echo e($contestCount); ?>);	
	});

})(jQuery)
</script>
	<?php echo Html::script("public/js/specified/edit-profile.js"); ?> 
    <?php echo Html::script("public/plugins/tinymce/tinymce.min.js"); ?> 
<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.myaccount', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>