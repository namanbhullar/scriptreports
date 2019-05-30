<?php $__env->startSection('content'); ?>
	<h1 class="heading_tital"><?php echo e(trans('lang.submission-page-head')); ?></h1>
    <?php echo Form::open(['url'=>route('submission.update'),'files'=>true]); ?>

    	<div class="col-2-3">
        	<div class="col-1-1 mrgbt50">
                <h4 class="BlueRadialHead mrgbt10"><?php echo e(strtoupper(trans('lang.script-desc'))); ?></h4>
                <div class="col-1-1 mrgbt20">
                    <?php echo e(Form::textarea('guideline_desc',$submission->description,array('class' => 'textArea it','id'=>'guideline_desc','placeholder' => trans('lang.script-desc-placeholder')))); ?>

                </div>
                
                
                <div class="clearfix"></div>    
            </div>
            
            <!-- Release Form Upload And Select Section --->            
            <div class="col-1-1">
            	<h4 class="BlueRadialHead mrgbt10"><?php echo e(strtoupper(trans('lang.submission-head2'))); ?></h4>
                <div class="col-1-1 mrgtp10 Box pul20">
                    <div class="col-1-2">    
	                    <?php echo e(Form::label('release_form_value',trans('lang.release-form'),['class'=>'it'])); ?>

						<?php $restatus = (!empty($submission->release_form)) ? "unchanged" : "no_select"; ?>
                        <?php echo e(Form::hidden('release_form_value',$submission->release_form,array('id'=>'release_form_value'))); ?>

                        <?php echo e(Form::hidden('release_form_status',$restatus,['id'=>'release_form_status'])); ?>

						
                        <a href="<?php echo (!empty($submission->release_form)) ?
                             $submission->rfdoc->link :
                             "javascript:void(0)"; ?>" id="release-url">  <?php echo (!empty($submission->release_form)) ? 
                            "(&nbsp;".$submission->rfdoc->file_name."&nbsp;)" :
                            "No File Selected";; ?> </a>
                    </div>
                    <div class="col-1-2">
                        <div class="col-1-3 addScript-add-docs">
                        	<i class="fa fa-upload" onClick="javascript:$('#release_form').trigger('click')" title="Uplaod File"></i>
                        	<?php echo e(Form::file('release_form',array('onchange'=>'selectReleaseform(event);','class' => 'filebutton','accept'=>'application/pdf','id'=>'release_form'))); ?>

                        </div>
                        <div class="col-1-3 addScript-add-docs" id="addReleaseForm">
                        	 <i class="fa fa-plus"></i>
                        </div>
                        <div class="col-1-3 addScript-add-docs" id="deleteReleaseForm" <?php echo (empty($submission->release_form)) ? "style=\"display:none\"" : ""; ?>>
                        	<i class="fa fa-trash"></i>
                        </div>
                    	<div class="clearfix"></div>       
                    </div>
                	<div class="clearfix"></div>    
                </div>
                
            </div>            
            <!-- Release Form Upload And Select Section --->
            
            <div class="col-1-1 mrgtp10 Box pul10">
                <div class="left">        
                	<?php echo e(Form::checkbox('script','1',$submission->script)); ?>

                </div>
                <div class="left mrglft15">
                    <?php echo e(Form::label('script',trans('lang.script'),['class'=>'it ymrg2'])); ?>

                </div>
                <div class="clearfix"></div>    
            </div>
            
            <div class="col-1-1 mrgtp10 Box pul10">
                <div class="left">        
                	<?php echo e(Form::checkbox('logline','1',$submission->logline)); ?>

                </div>
                <div class="left mrglft15">
                    <?php echo e(Form::label('logline',trans('lang.logline'),['class'=>'it ymrg2'])); ?>

                </div>
                <div class="clearfix"></div>    
            </div>
            
            <div class="col-1-1 mrgtp10 Box pul10">
                <div class="left">        
                	<?php echo e(Form::checkbox('synopsis','1',$submission->synopsis)); ?>

                </div>
                <div class="left mrglft15">
                    <?php echo e(Form::label('synopsis',trans('lang.synopsis'),['class'=>'it ymrg2'])); ?>

                </div>
                <div class="clearfix"></div>    
            </div>
            
            <div class="col-1-1 mrgtp10 Box pul10">
                <div class="left">        
                	<?php echo e(Form::checkbox('coverage','1',$submission->coverage)); ?>

                </div>
                <div class="left mrglft15">
                    <?php echo e(Form::label('coverage',trans('lang.coverage-report'),['class'=>'it ymrg2'])); ?>

                </div>
                <div class="clearfix"></div>    
            </div>
            
            <div class="col-1-1 mrgtp10 Box pul10">
                <div class="left">        
                	<?php echo e(Form::checkbox('treatment','1',$submission->coverage)); ?>

                </div>
                <div class="left mrglft15">
                    <?php echo e(Form::label('treatment',trans('lang.treatment'),['class'=>'it ymrg2'])); ?>

                </div>
                <div class="clearfix"></div>    
            </div>
            
            <div class="col-1-1 mrgtp10 Box pul10">
                <div class="left">        
                	<?php echo e(Form::checkbox('character_break','1',$submission->coverage)); ?>

                </div>
                <div class="left mrglft15">
                    <?php echo e(Form::label('character_break',trans('lang.character-breakdown'),['class'=>'it ymrg2'])); ?>

                </div>
                <div class="clearfix"></div>    
            </div>
            
            <!--- User Custom Files -->
            <?php 
				$additional	=	is_null($submission->add_docs) ? array() : unserialize($submission->add_docs);
				$count		=	1;
				
			?>
            <div class="col-1-1" id="add_docs">
            	 <?php foreach($additional as $key=>$other): ?>
                    <div class="col-1-1 mrgtp10 Box pul10 relative" id="other<?php echo e($count); ?>">
                    	<span class="delete_btn mrg10" onclick="javascript:$('#other<?php echo e($count); ?>').remove()"><i class="fa fa-trash"></i></span>
                        <div class="left">        
	                        <?php echo e(Form::checkbox('additional_docs[]',$key,true)); ?>

                        </div>
                        <div class="left mrglft15">
    	                    <?php echo e(Form::label($key,$key,['class'=>'it ymrg2'])); ?>

                        </div>
                        <div class="clearfix"></div>    
                    </div>
                    <div class="clearfix"></div>
                  <?php endforeach; ?>
            </div>
            <!--- User Custom Files -->
            <div class="btn btn-primary btn-icon fa-plus ymrg20" id="add_docsBtn"><?php echo e(trans('lang.add-docs')); ?></div>
            
             <!--- CheckFor Submission --->
            <div class="col-1-1 Box ymrg20 pul15">
                <div class="col-1-2"><h4><?php echo e(trans('lang.select-1-of-folowing')); ?></h4></div>
                <div class="col-1-1 mrgtp20">
                    <div class="left">
                        <label class="it ymrg2">
                        <?php echo e(Form::radio('accept_submissions','0',($submission->accept_submissions == 0))); ?>

                        &nbsp;&nbsp;<?php echo e(trans('lang.submission-term-no')); ?>

                        </label>
                    </div>
                </div>     
                <div class="col-1-1 mrgtp20">
                    <div class="left">
                    	<label class="it ymrg2">
                        <?php echo e(Form::radio('accept_submissions','1',($submission->accept_submissions == 1))); ?>

                        &nbsp;&nbsp;<?php echo e(trans('lang.submission-term-yes')); ?>

                         </label>
                    </div>
                </div>                                     
            </div>
            <!--- CheckFor Submission --->
            
            
            
           
            <!-- Select Approved Reader ----->
            <div class="col-1-1 Box ymrg20 pul15">
            	<div class="left"><label for="addReader" class="it pultop5" ><?php echo e(trans('lang.submission-head3')); ?></label></div>
                <div class="right">
                	<div class="btn btn-primary btn-icon fa-plus" id="addReader">Add Reader</div>
                </div>
            </div>
            <!-- Select Approved Reader ----->
            
            <!-- Approved Reader List----->
            <div class="col-1-1">
	            <?php $submission->load('reader.user.profile'); ?>
                <?php foreach($submission->reader as $reader): ?>
                	<div class="col-1-1 Box pul10 mrgbt10 relative">
                        <div class="left ymrg15 mrgrt15">
                        	<?php echo Form::checkbox('reader[]',$reader->id,$reader->status); ?>

                        </div>
                    	<div class="left tumbnail-vsm">
                            <?php if($reader->user->profile->profile_img): ?> 
                                <?php echo e(Html::image("public/uploads/profiles/users/".$reader->reader_id."/".$reader->user->profile->profile_img, "Profile Avtar")); ?>

                            <?php else: ?>
                                 <?php echo e(Html::image("public/images/no-image.png", "Profile Avtar")); ?>

                            <?php endif; ?>
                        </div>
                        <div class="left mrglft15">
                        	<h4 class="item-head"><?php echo e($reader->user->profile->full_name); ?></h4>
                            <h5 class="item-sub-head"><?php echo e($reader->user->profile->company_name); ?></h5>
                        </div>
                        <span class="delete_btn mrg20 jsdelete-reader" data-id="<?php echo e($reader->id); ?>"><i class="fa fa-trash"></i></span>
                    </div>
                <?php endforeach; ?>
            </div>
            <!-- Approved Reader List----->
            
            <!-- Save And Reset Button -->
            <div class="col-1-1 ymrg20 pul15">
            	<?php echo Form::submit('UPDATE',['class'=>'btn btn-primary xpul15 ypul7 right']); ?>

                <?php echo Form::reset('RESET',['class'=>'btn btn-primary xpul15 ypul7 right mrgrt20']); ?>

            </div><!-- Save And Reset Button -->
            
            <div class="clearfix"></div>
        </div>
    <?php echo Form::close(); ?>

    
    <?php $__env->startPush('script'); ?>
    	<?php echo Html::script('public/js/specified/submission-edit.js'); ?>

         <?php echo Html::Script("public/plugins/tinymce/tinymce.min.js"); ?>

    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.myaccount', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>