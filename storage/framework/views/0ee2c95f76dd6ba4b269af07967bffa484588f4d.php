<?php $__env->startSection('content'); ?>
<?php $profile	=	auth()->user()->profile; ?>
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
                    <b>(jpeg, png, jpg file only)</b><br />
                    <b>(image size 150x150)</b>
                </div>
                <div class="col-1-5 mrglft20 mrgtp20 relative">
                    <div class="col-1-1 pul10 filebutton-label">Browse...</div>
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
            <?php echo e(Form::label('location',trans('lang.location'),['class'=>'it mrgbt5'])); ?>

            <?php echo e(Form::text('location',$profile->location,array('class'=>'text textInput it','placeholder'=>trans('lang.location')))); ?>

        </div>
        
        <div class="col-1-1 ymrg30">
        	<label class="it mrgbt5" for="brief_boi"><?php echo e(trans('lang.brief_boi')); ?><small>&nbsp;&nbsp;(To appear in Reader List main directory)</small></label>
            <small class="small_label"></small>
            <div class="clearfix"></div>
            <?php echo e(Form::textarea('brief_boi',$profile->brief_boi,array('class' => 'text textArea it', 'placeholder' => 'Height skills(50 words  or less) for main directory.','id'=>'brief_boi'))); ?>

        </div>
        
        <div class="col-1-1 mrgbt30">
        	<label class="it mrgbt5" for="about_me"><?php echo e(trans('lang.about_me')); ?><small>&nbsp;&nbsp;(Full Resume For Profile Page)</small></label>
            <small class="small_label"></small>
            <div class="clearfix"></div>
            <?php echo e(Form::textarea('about_me',$profile->about_me,array('class' => 'text textArea it', 'placeholder' => 'About Me (For Profile Page)','id'=>'about_me'))); ?>

        </div>
        
        
        
        <!--- Check Boxes Starts From Here -->
        <div class="col-1-1">
        	<h5>Select all that apply</h5>
        </div>
        <?php
			 $extra	=	(!empty($profile->extra_fields)) ? $profile->extra_fields : array();
			 
			 
			 $fields	=	[
								"wga-member"=>"WGA Member",	
								"script-consultant"=>"Script Consultant",
								"script-reader"=>"Script Reader",
								"script-writer"=>"Script Writer",
								"director"=>"Director",
								"producer"=>"Producer"
								
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
        
        
        <div class="col-1-1 mrgtp30">
        	<h3><?php echo e(trans('lang.services-offered')); ?>&nbsp;&nbsp;<small>(<?php echo e(trans('lang.select-all-that-apply')); ?>)</small></h3>
        </div>
        <?php 
		$addskil = (!empty($profile->additional_skills)) ? $profile->additional_skills : array();
         $fields	=	[
								"script-coverage"=>"Script Coverage",	
								"script-consultant"=>"Script Consultant",
								"development-notes"=>"Development Notes",
								"script-writing"=>" Script Writing",
								"ghost-writing"=>"Ghost Writing",
								"rewrite-assistance"=>"Rewrite Assistance",
								"proofreading-script-formatting"=>"Proofreading & Script Formatting",
								"phone-consultation"=>"Phone Consultation",
								
			 				]; ?>
                            
         <?php foreach($fields as $key=>$field): ?>
        	<div class="col-1-1 mrgtp10 Box pul10">
                <div class="left">                        
                    <?php echo e(Form::checkbox('additional_skills[]',$field,in_array($field,$addskil))); ?>

                </div>
                <div class="left mrglft15">
                    <?php echo e(Form::label('additional_skills[]',trans("lang.$key"),['class'=>'it checkbox'])); ?>

                </div>
                <div class="clearfix"></div>    
            </div>	
        <?php endforeach; ?>
        
        
        <!--- Other Skills Starts Form Here -->
        <div id="add-profile-services" class="col-1-1">
			<?php if(isset($addskil['other'])) { ?>
				<?php foreach($addskil['other'] as $other) { ?>
                	<div class="col-1-1 mrgtp10 Box pul10 relative">
            			<span class="delete_btn mrg10" onclick="javascript:$(this).parent().remove()"><i class="fa fa-trash"></i></span>
                        <div class="left">                        
                            <?php echo e(Form::checkbox('additional_skills[other][]',$other,true)); ?>

                        </div>
                        <div class="left mrglft15">
                            <?php echo e(Form::label('additional_skills[]',$other,['class'=>'it checkbox'])); ?>

                        </div>
                        <div class="clearfix"></div>    
                    </div>	
                <?php $othercount++; } ?>  
            <?php } ?>   
        </div>
        
        <div class="col-1-1 ymrg20">
        	<div class="btn btn-icon fa-plus btn-primary" id="add-skill-btn"><?php echo e(trans('lang.add-another')); ?></div>
        </div>
        <!--- Other Skills Ends Here -->
             	
        <div class="clearfix"></div>
    </div>
    
    <div class="clearfix"></div>
    <div class="h-line ymrg20"></div>
        <!-- Optional Info Starts form Here --->
        
    <div class="col-2-3">
    	<div class="col-1-1 mrgtp30">
        	<h3><?php echo e(trans('lang.optional-info')); ?>&nbsp;&nbsp;<small>(<?php echo e(trans('lang.select-all-that-apply')); ?>)</small></h3>
        </div>
        
        <div class="col-1-1 mrgbt15">
            <?php echo e(Form::label('script_speciality',trans('lang.script_speciality'),['class'=>'it mrgbt5'])); ?>

            <?php echo e(Form::text('script_speciality',$profile->script_speciality,array('class'=>'text textInput it','placeholder'=>trans('lang.script_speciality')))); ?>

        </div>
        
         <div class="col-1-1 mrgbt15">
            <?php echo e(Form::label('industry_experience',trans('lang.industry_experience'),['class'=>'it mrgbt5'])); ?>

            <?php echo e(Form::text('industry_experience',$profile->industry_experience,array('class'=>'text textInput it','placeholder'=>trans('lang.industry_experience')))); ?>

        </div>
        
        <div class="col-1-1 mrgbt15">
            <?php echo e(Form::label('languages',trans('lang.language_spoken'),['class'=>'it mrgbt5'])); ?>

            <?php echo e(Form::text('languages',$profile->languages,array('class'=>'text textInput it','placeholder'=>trans('lang.language_spoken_palceHolder')))); ?>

        </div>
        
         <div class="col-1-1 mrgbt15">
            <?php echo e(Form::label('education',trans('lang.education'),['class'=>'it mrgbt5'])); ?>

            <?php echo e(Form::text('education',$profile->education,array('class'=>'text textInput it','placeholder'=>trans('lang.education')))); ?>

        </div>
        
        <div class="col-1-1 mrgbt15">
            <?php echo e(Form::label('awards',trans('lang.awards'),['class'=>'it mrgbt5'])); ?>

            <?php echo e(Form::text('awards',$profile->awards,array('class'=>'text textInput it','placeholder'=>trans('lang.awards')))); ?>

        </div>
        
        <div class="col-1-1 mrgbt15">
        	<div class="col-1-1">
            	<?php $status	=	($profile->sample_coverage != '') ? "no_change" : "no-select";?>
            	<?php echo Form::label('languages',trans('lang.sample-coverage'),['class'=>'it mrgbt5']); ?>

                <?php echo Form::hidden('coverageStatus',$status,['id'=>"coverageStatus"]); ?>

            </div>
            <div class="col-1-1">
                <div class="col-3-6 pulrt20">
                    <input type="text" value="<?php echo e($profile->sample_coverage); ?>" name="samplecoveragevalue" placeholder="Uplaod <?php echo e(trans('lang.sample-coverage')); ?>" id="samplecoverage" class="browse text textInput it" >
                </div>
                <div class="col-1-6  filebutton-div">
                    <div class="col-1-1 pul10 filebutton-label">Browse...</div>
                    <input type="file" accept="application/pdf" name="sample_coverageimg"  class="filebutton" id="sample_coverageimg">
                </div>
                <div class="col-7-24 pull-left pullft10">
                	<i>pdf or word doc file Only</i>
                </div> 
                <div class="col-1-24 relative" id="delete_sampleCoverage" <?php echo empty($profile->sample_coverage) ? "style='display:none;'"  : ""; ?>>
                	<span class="delete_btn" >
                    	<i class="fa fa-trash"></i>
                    </span>
                </div>
                <div class="clearfix"></div>                       
            </div>
            <div class="clearfix"></div>                       
        </div>
        
        <div class="col-1-1 mrgbt15">
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
    
    
         <!-- Script Section Starts From here -->
    <div class="col-2-3">
    	<div class="col-1-1 ymrg20">
        	<h3><?php echo e(trans('lang.projects')); ?></h3>
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
        	<div class="btn btn-icon btn-primary fa-plus" id="add-project-to-profile">Add <?php echo e(($FeaturedProjets->isEmpty()) ? 'Another' : ''); ?> Project</div>
        </div>
    </div>
    
    <div class="clearfix"></div>
    <div class="h-line ymrg20"></div>
    
    <!-- Script Section Starts From here -->
    <div class="col-2-3">
    	<div class="col-1-1 ymrg20">
        	<h3><?php echo e(trans('lang.scripts')); ?></h3>
        </div>
        <?php 
			$writingProjects	=	$profile->WrittingProjects()->get();
			$Scriptcount		=	1;
		 ?>
        <div class="col-1-1" id="profile-scripts-part">
        <?php 
			if(!$writingProjects->isEmpty()):
				foreach($writingProjects as $writingProject):
					echo '<div class="col-1-1 pul15 Box relative mrgbt20" id="profileScript'.$Scriptcount.'">';
					 echo view('profile.addScript')->with(['profileScript'=>$writingProject,'count'=>$Scriptcount]);
					 echo "</div>";
					 $Scriptcount++;
				endforeach;
			endif;
		?>
        </div>
        <div class="col-1-1">
        	<div class="btn btn-icon btn-primary fa-plus" id="add-script-to-profile">Add <?php echo e((!$writingProjects->isEmpty()) ? 'Another' : ''); ?> <?php echo e(trans('lang.script')); ?></div>
        </div>
    </div>
    <!-- Script Section Ends From here -->
    
    <div class="clearfix"></div>
    <div class="h-line ymrg20"></div>
    
    
    
    <!-- Script Pac Section Starts From Here-->
    
    <?php $scripts	=	 auth()->user()->scripts()->where('isposted',1)->get(); ?>
    <div class="col-2-3">
        <div class="col-1-1 ymrg20">
            <h3><?php echo e(trans('lang.script-for-sale')); ?>&nbsp;&nbsp;&nbsp;<small style="font-size:14px;">(To create new ScriptPac <a style="color:#6DBCDB;" href="<?php echo e(url('myaccount/script-manager/script-add')); ?>">click here</a>)</small></h3>
        </div>        
        <div class="col-1-1" id="profile-scriptpac-part">
        
            <?php if(!$scripts->isEmpty): ?>
            	<?php foreach($scripts as $script): ?>
                <div class="col-1-1 Box pul10 mrgbt20" id="selectedScriptPac<?php echo e($script->id); ?>">
                    <div class="pull-left mrgrt20">
                        <spna class="pull-left scriptPac_delete" data-id="<?php echo e($script->id); ?>" style="color: rgb(109, 188, 219); font-size: 35px; cursor: pointer;">
                            <i class="fa fa-trash"></i>
                        </spna>
                    </div>
                    <div class="pull-left">
                        <h3 class="item-head script">
                        	<a target="_new" href="<?php echo e(URL::to('/myaccount/script-manager/scripts/'.$script->id.'/view')); ?>">
                        		<?php echo e($script->title); ?>

                       		</a>                                                        
                        </h3>
                        <div class="item-detail ">
                            <?php echo ShortScriptInfo(unserialize($script->script_info)); ?>&nbsp;&nbsp;&nbsp;
                            <span class="date script"><?php echo date('F j, Y',strtotime($script->created_at)); ?></span>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
                    
        </div>
    	<div class="pull-left">
    		<div class="btn btn-icon btn-primary fa-plus" id="add-scriptpac-to-profile">Add <?php echo e((!$scripts->isEmpty()) ? 'Another' : ''); ?> <?php echo e(trans('lang.script-pac')); ?></div>
    	</div>
    </div>    
        	
    <!-- Script Pac Section Ends From Here-->
    
     <div class="clearfix"></div>
    <div class="h-line ymrg20"></div>
    <div class="col-2-3">
    	<div class="pull-right">
    		<?php echo Form::submit('UPDATE',['class'=>"btn btn-primary xpul15","style"=>"font-size:20px;"]); ?>

    	</div>
    </div>
    
    <div style="display:none" id="deletedPojects">
    	
        
    </div>
 	<?php echo Form::open(); ?>

    
    	
<?php $__env->startPush('script'); ?>
<script>
var csrfToken	=	'<?php echo e(csrf_token()); ?>';
(function($){
	$(document).ready(function(e) {
		$("#add-script-to-profile").data('count',<?php echo e($Scriptcount); ?>);
		$("#add-project-to-profile").data('count',<?php echo e($Projectcount); ?>);		
	});

})(jQuery)
</script>
	<?php echo Html::script("public/js/specified/edit-profile.js"); ?> 
    <?php echo Html::script("public/plugins/tinymce/tinymce.min.js"); ?> 
<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.myaccount', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>