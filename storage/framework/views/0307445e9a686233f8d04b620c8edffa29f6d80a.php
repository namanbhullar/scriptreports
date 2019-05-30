<?php $__env->startSection('content'); ?>
    
    <?php echo Form::open(["url"=>route('template.save'),"files"=>"true","id"=>"add-template-form"]); ?>

    <h1 class="heading_tital"><?php echo e(trans('lang.create-template')); ?> <?php echo e(Form::submit('Save',['class'=>'right btn btn-primary ymrg20'])); ?></h1>
    <!----Forms Part Start------------>
    <div class="col-11-20">
    	<div class="col-1-1 mrgbt15">
        	<h3><?php echo e(trans('lang.template-info')); ?></h3>
        </div>
        <div class="col-1-1 mrgbt15">
	        <label class="it mrgbt5 required" for="template_title"><?php echo e(trans('lang.template-title')); ?></label>
    	    <?php echo e(Form::text('template_title',"",array('class' => 'text textInput it', 'placeholder' => trans('lang.template-title'),'required'))); ?>

        </div>
        <div class="col-1-1 mrgbt15">
	        <label class="it mrgbt5 required" for="created_date"><?php echo e(trans('lang.date-created')); ?></label>
    	    <?php echo e(Form::text('created_date',date('m/d/Y'),array('class' => 'text textInput it datepicker' , 'required' ))); ?>

        </div>
        
        <div class="col-1-1 mrgbt15">
            <div class="col-1-1">
                <?php echo e(Form::label('budget',trans('lang.budget'),array('class'=>'it mrgbt5'))); ?>

            </div>        
            <div class="col-1-1">
                <div class="col-1-24 dollarSign">$</div>
                <div class="col-1-3 pulrt15">
                        <?php echo e(Form::text('budget_from','',array('class' => 'text textInput it','placeholder' => 'From','onkeypress'=>'return IsNumeric(event);','ondrop'=>'return false;',
                    'onpaste'=>'return false;'))); ?>

                    </div>
                <div class="col-1-3 pulrt15">
                    <?php echo e(Form::text('budget_to','',array('class' => 'text textInput it','placeholder' => 'To','onkeypress'=>'return IsNumeric(event);','ondrop'=>'return false;',
                'onpaste'=>'return false;'))); ?>

                </div>
                <div class="col-7-24">
                    <?php echo e(Form::select('budget_type',['2'=>trans('lang.thousand'),'3'=>trans('lang.million')],'',['class'=>'col-1-1'])); ?>

                </div>
                <div class="clearfix"></div>
            </div>        
            <div class="clearfix"></div>
        </div>
        
        <div class="col-1-1 mrgbt15">   
            <?php echo e(Form::label('created_by',trans('lang.created-by'),array('class'=>'it mrgbt5'))); ?>

            <?php echo e(Form::text('created_by','',array('class' => 'text textInput it','placeholder' => trans('lang.created-by')))); ?>

        </div>
        
        <div class="col-1-1 mrgbt15">   
            <?php echo e(Form::label('company',trans('lang.company'),array('class'=>'it mrgbt5'))); ?>

            <?php echo e(Form::text('company','',array('class' => 'text textInput it','placeholder' => trans('lang.company')))); ?>

        </div>
        
        <div class="col-1-1 mrgbt15">
	        <div class="col-1-1"><?php echo e(Form::label('reader_inst',trans('lang.reader-list'),array('class'=>'it mrgbt5'))); ?></div>
            <div class="clearfix"></div>
            <div class="col-1-1">
            	<?php echo Form::textarea("reader_inst","",['class'=>"SimpletinyText"]); ?>

            </div>        	
        </div>
        
        <div class="col-1-1 mrgbt15" id="Formdiv">
			<?php $formlist	=	FormList(); ?>
            <?php echo e(Form::label('form[0]',trans('lang.form'),array('class'=>'it mrgbt5 '))); ?>

            <?php echo e(Form::select('form[0]',$formlist,'',['class'=>'col-1-1','onchange'=>'checkOhter(event)'])); ?>

        </div>
        
        <div class="col-1-1 mrgbt15" id="Genrediv">
			<?php $genrelist	=	GenreList(); ?>
            <?php echo e(Form::label('genre[0]',trans('lang.genre'),array('class'=>'it mrgbt5 '))); ?>

            <?php echo e(Form::select('genre[0]',$genrelist,'',['class'=>'col-1-1','onchange'=>'checkOhter(event)'])); ?>

        </div>
        
        <div class="col-1-1 mrgbt15" id="Subgenrediv">
			<?php $subgenrelist	=	SubGenreList(); ?>
            <?php echo e(Form::label('subgenre[0]',trans('lang.sub-genre'),array('class'=>'it mrgbt5 '))); ?>

            <?php echo e(Form::select('subgenre[0]',$subgenrelist,'',['class'=>'col-1-1','onchange'=>'checkOhter(event)'])); ?>

        </div>
        
        <div class="col-1-1 mrgbt15">
			<?php $ratinglist	=	RatingList(); ?>
            <?php echo e(Form::label('rating',trans('lang.rating'),array('class'=>'it mrgbt5'))); ?>

            <?php echo e(Form::select('rating',$ratinglist,'',['class'=>'select_full col-1-1'])); ?>

        </div>
        
        <div class="col-1-1 mrgbt15">   
            <?php echo e(Form::label('target_audience',trans('lang.target-audience'),array('class'=>'it mrgbt5'))); ?>

            <?php echo e(Form::text('target_audience','',array('class' => 'text textInput it','placeholder' => trans('lang.target-audience')))); ?>

        </div>
        
         <div class="col-1-1 mrgbt15">   
            <?php echo e(Form::label('lead',trans('lang.lead'),array('class'=>'it mrgbt5'))); ?>

            <?php echo e(Form::text('lead','',array('class' => 'text textInput it','placeholder' => trans('lang.lead')))); ?>

        </div>
        
        <div class="col-1-1 mrgbt15">
            <?php echo e(Form::label('comparison',ucfirst(trans('lang.comparisons')), array('class'=>'it mrgbt5'))); ?>

            <?php echo e(Form::text('comparison','',array('class' => 'text textInput it','placeholder' => ucfirst(trans('lang.comparisons'))))); ?>

        </div>
        
        
        <div class="col-1-1 mrgbt15">
	        <div class="col-1-1"><?php echo e(Form::label('viewer_notes',trans('lang.template-info-desc'),array('class'=>'it mrgbt5'))); ?></div>
            <div class="clearfix"></div>
            <div class="col-1-1">
            	<?php echo Form::textarea("viewer_notes","",['class'=>"SimpletinyText"]); ?>

            </div>        	
        </div>
                
             
    	<div class="clearfix"></div>
    </div>
    
     <!----Tips Part ------------>
    <div class="col-1-4 right">
    	<div class="col-1-1 BorderBox">
        	<div class="col-1-1  bgBlue">
            	<h5 class="headonBlue"><?php echo e(trans('lang.template-report-tip')); ?></h5>
            </div>
            <div class="col-1-1 pul20">
            	<p class="tip-description"><?php echo e(trans('lang.template-tip.1')); ?></p>
				<p class="tip-description"><?php echo e(trans('lang.template-tip.2')); ?></p>
                <p class="tip-description"><?php echo e(trans('lang.template-tip.3')); ?></p>
                <p class="tip-description"><?php echo e(trans('lang.template-tip.4')); ?></p>
            </div>
            <div class="clearfix"></div>
        </div>
        
        <div id="private-notes" class="col-1-1 BorderBox mrgbt20 mrgtp20">
            <div class="col-1-1  bgBlue">
                <h5 class="headonBlue"><?php echo trans("lang.private-notes"); ?></h5>
            </div>
            <div class="col-1-1 pul15 private-notes">
                 <textarea id="pvt-not-text" name="private_notes" rows="7" style="width:100%"></textarea>
            </div>
            <div class="clearfix"></div>
        </div>
        
        <div class="clearfix"></div>
    </div>
    <!----Tips Part End------------>
    
    <div class="clearfix"></div>
    <div class="h-line ymrg20"></div>
    <div class="clearfix"></div>
    
    
    <div class="col-11-20" >
        <div class="col-1-1 mrgtp10 mrgbt5 Box pul10">
            <div class="left">                        
                <?php echo e(Form::checkbox('logsyn[]','Logline',false)); ?>

            </div>
            <div class="left mrglft15">   
                <div class="col-1-1 mrgbt7">
                    <?php echo e(Form::label('logsyn[]',trans('lang.logline'),['class'=>'it checkbox mrgbt15'])); ?>

                </div>
                <div class="clearfix"></div>
                <?php echo e(Form::textarea('logsyn[log_reader_inst]',"",['class'=>'it textInput col-1-1','cols'=>65,'rows'=>'7','placeholder'=>trans('lang.reader-list')])); ?>

            </div>
            <div class="clearfix"></div>    
        </div>
            
        <div class="col-1-1  mrgbt30 Box pul10">
            <div class="left">                        
                <?php echo e(Form::checkbox('logsyn[]','Synopsis',false)); ?>

            </div>
            <div class="left mrglft15">   
                <div class="col-1-1 mrgbt7">
                    <?php echo e(Form::label('logsyn[]',trans('lang.synopsis'),['class'=>'it checkbox mrgbt15'])); ?>

                </div>
                <div class="clearfix"></div>
                <?php echo e(Form::textarea('logsyn[syn_reader_inst]',"",['class'=>'it textInput col-1-1','cols'=>65,'rows'=>'7','placeholder'=>trans('lang.reader-list')])); ?>

            </div>
            <div class="clearfix"></div>    
        </div>
            
    	<div class="col-1-1 mrgtp10 mrgbt30 Box pul10">
            <div class="left">                        
                <?php echo e(Form::checkbox('character_break[]','Character Breakdowns',false)); ?>

            </div>
            <div class="left mrglft15">   
            	<div class="col-1-1 mrgbt7">
                	<?php echo e(Form::label('character_break[]',trans('lang.character-breakdowns'),['class'=>'it checkbox mrgbt15'])); ?>

                </div>
                <div class="clearfix"></div>
                <?php echo e(Form::textarea('character_break[character_inst]',"",['class'=>'it textInput col-1-1','cols'=>65,'rows'=>'7','placeholder'=>trans('lang.instructions')])); ?>

            </div>
            <div class="clearfix"></div>    
        </div>
        
        
        <!----- Notes Section Start -->
        <div class="col-1-1 ymrg15">        	
        	<h3><?php echo e(trans('lang.notes')); ?></h3>
        </div>
        <div class="col-1-1 mrgbt5 Box pul10">
            <div class="left">                        
                <?php echo e(Form::checkbox('notes[]','Writing Ability',false)); ?>

            </div>
            <div class="left mrglft15">   
            	<div class="col-1-1 mrgbt7">
                	<?php echo e(Form::label('notes[]',trans('lang.writing-ability'),['class'=>'it checkbox mrgbt15'])); ?>

                </div>
                <div class="clearfix"></div>
                <?php echo e(Form::textarea('notes[writing_ability_inst]',"",['class'=>'it textInput col-1-1','cols'=>65,'rows'=>'7','placeholder'=>trans('lang.reader-list')])); ?>

            </div>
            <div class="clearfix"></div>    
        </div>
        
        <div class="col-1-1  mrgbt5 Box pul10">
            <div class="left">                        
                <?php echo e(Form::checkbox('notes[]','Marketability',false)); ?>

            </div>
            <div class="left mrglft15">   
            	<div class="col-1-1 mrgbt7">
                	<?php echo e(Form::label('notes[]',trans('lang.marketability'),['class'=>'it checkbox mrgbt15'])); ?>

                </div>
                <div class="clearfix"></div>
                <?php echo e(Form::textarea('notes[marketability_inst]',"",['class'=>'it textInput col-1-1','cols'=>65,'rows'=>'7','placeholder'=>trans('lang.reader-list')])); ?>

            </div>
            <div class="clearfix"></div>    
        </div>
        
        <div class="col-1-1  mrgbt5 Box pul10">
            <div class="left">                        
                <?php echo e(Form::checkbox('notes[]','Originality',false)); ?>

            </div>
            <div class="left mrglft15">   
            	<div class="col-1-1 mrgbt7">
                	<?php echo e(Form::label('notes[]',trans('lang.originality'),['class'=>'it checkbox mrgbt15'])); ?>

                </div>
                <div class="clearfix"></div>
                <?php echo e(Form::textarea('notes[originality_inst]',"",['class'=>'it textInput col-1-1','cols'=>65,'rows'=>'7','placeholder'=>trans('lang.reader-list')])); ?>

            </div>
            <div class="clearfix"></div>    
        </div>
        
        <div class="col-1-1  mrgbt5 Box pul10">
            <div class="left">                        
                <?php echo e(Form::checkbox('notes[]','Suggestions for Improvements',false)); ?>

            </div>
            <div class="left mrglft15">   
            	<div class="col-1-1 mrgbt7">
                	<?php echo e(Form::label('notes[]',trans('lang.improv-sugg'),['class'=>'it checkbox mrgbt15'])); ?>

                </div>
                <div class="clearfix"></div>
                <?php echo e(Form::textarea('notes[suggestions_for_improvements_inst]',"",['class'=>'it textInput col-1-1','cols'=>65,'rows'=>'7','placeholder'=>trans('lang.reader-list')])); ?>

            </div>
            <div class="clearfix"></div>    
        </div>
        
        <div class="col-1-1  mrgbt5 Box pul10">
            <div class="left">                        
                <?php echo e(Form::checkbox('notes[]','Overall Notes',false)); ?>

            </div>
            <div class="left mrglft15">   
            	<div class="col-1-1 mrgbt7">
                	<?php echo e(Form::label('notes[]',trans('lang.ovrol-notes'),['class'=>'it checkbox mrgbt15'])); ?>

                </div>
                <div class="clearfix"></div>
                <?php echo e(Form::textarea('notes[overall_notes_inst]',"",['class'=>'it textInput col-1-1','cols'=>65,'rows'=>'7','placeholder'=>trans('lang.reader-list')])); ?>

            </div>
            <div class="clearfix"></div>    
        </div>
        
        <div class="col-1-1" id="other-notes">
        	
        </div>
        <div class="col-1-1">
        	<div class="btn btn-primary btn-icon fa-plus ymrg20" id="add_notesBtn"><?php echo e(trans('lang.add-another')); ?></div>
        </div>
        <!----- Notes Section Ends -->
        
        
        <!--- Bar Graph Section Starts -->
        	<div class="col-1-1 mrgbt15 mrgtp30">
                <h3><?php echo e(trans('lang.bar-graphs')); ?>&nbsp;&nbsp;<small style="font-weight:600; font-size:14px;"><?php echo e(trans('lang.bar-graphs-subtitle')); ?></small></h3>
            </div>
            <div class="col-1-1 template-bar-grapgh-img">
            	<?php echo Html::image('public/images/bar-graph.png'); ?>

            </div>
            
            <?php $fields=	[
							"script"=>"Script",
							"marketablity"=>"Marketablity",
							"originality"=>"Originality",
							"concept"=>"Concept",
							"writer"=>"Writer",
						] ?>
        <?php foreach($fields as $key=>$field ): ?>
        	<div class="col-1-1 mrgtp10 Box pul10">
                <div class="left">                        
                    <?php echo e(Form::checkbox('bar_graphs[]',$field,false)); ?>

                </div>
                <div class="left mrglft15">
                    <?php echo e(Form::label('bar_graphs[]',$field,['class'=>'it checkbox'])); ?>

                </div>
                <div class="clearfix"></div>    
            </div>
        <?php endforeach; ?>
        <div class="col-1-1" id="other_barGraph">
        </div>
        <div class="col-1-1">
        	<div id="add_barBtn" class="btn btn-primary btn-icon fa-plus ymrg20"><?php echo e(trans('lang.add-another')); ?></div>
        </div>
        
            
        <!--- Bar Graph Section Ends -->
        
        
        <!-- Script Info Starts Here -->
        <div class="col-1-1">
        	<h3><?php echo e(trans('lang.script-info')); ?>&nbsp;<small>( <?php echo e(trans('lang.script-infp-sub')); ?> )</small></h3>
        </div>
       <?php $fieldslft=	[
							"writer"=>"Writer",
							"story-by"=>"Story By",
							"source-material"=>"Source Material",
							"submitted-by"=>"Submitted By",
							"agent"=>"Agent",
							"manager"=>"Manager",
							"purpose-of-submission"=>"Purpose of Submission",
							"reader"=>"Reader",
							] ;
							
							
			 $fieldsrgt=	[
							"draft-date"=>"Draft Date",
							"form"=>"Form",
							"genre"=>"Genre",
							"sub-genre"=>"Subgenre",
							"pages"=>"Pages",
							"locations"=>"Locations",
							"setting"=>"Setting",
							"period"=>"Period",
							"budget"=>"Budget",
							"rating"=>"Rating",
							"target-audience"=>"Target Audience",
							"comparisons"=>"Comparisons",
							"attachments"=>"Attachments"
							]; ?>  
                            
        <div id="left_part_scinfo">
        	<div class="col-1-1 mrgtp15"><h3>Left Column</h3></div>
        <?php foreach($fieldslft as $key=>$field ): ?>
        	<div class="col-1-1 mrgtp10 Box pul10">
                <div class="left">                        
                    <?php echo e(Form::checkbox('script_info[left][]',$field,false)); ?>

                </div>
                <div class="left mrglft15">
                    <?php echo e(Form::label('script_info[left][]',trans("lang.$key"),['class'=>'it checkbox'])); ?>

                </div>
                <div class="clearfix"></div>    
            </div>
        <?php endforeach; ?>
        <div class="col-1-1" id="other-script_info_left">
        </div>
        <div class="col-1-1">
        	<div class="btn btn-primary btn-icon fa-plus ymrg20 add_scriptInfoBtn" data-id="left"><?php echo e(trans('lang.add-another')); ?></div>
        </div>
        </div>
        <div id="right_part_scinfo">
        <div class="col-1-1 mrgtp15"><h3>Right Column</h3></div>
        <?php foreach($fieldsrgt as $key=>$field ): ?>
        	<div class="col-1-1 mrgtp10 Box pul10">
                <div class="left">                        
                    <?php echo e(Form::checkbox('script_info[right][]',$field,false)); ?>

                </div>
                <div class="left mrglft15">
                    <?php echo e(Form::label('script_info[right][]',trans("lang.$key"),['class'=>'it checkbox'])); ?>

                </div>
                <div class="clearfix"></div>    
            </div>
        <?php endforeach; ?>
        <div class="col-1-1" id="other-script_info_right">
        </div>
        <div class="col-1-1">
        	<div class="btn btn-primary btn-icon fa-plus ymrg20 add_scriptInfoBtn" data-id="right"><?php echo e(trans('lang.add-another')); ?></div>
        </div>
        </div>
        
        
        
       <!-- Script Info Ends Here -->         
        
        
         <div class="clearfix"></div>
         
         <div class="col-1-1 ymargin40">
         	
         	<?php echo e(Form::submit('NEXT',['class'=>'right btn btn-primary ymrg20'])); ?>

            <?php echo e(Form::reset('clear',['class'=>'right btn btn-primary ymrg20 mrgrt10'])); ?>

         </div>
    </div>
    
    
    <!----Forms Part Ends------------>
    
    <?php echo Form::close(); ?>

    
    
<?php $__env->startPush('script'); ?>
	<?php echo Html::Script("public/js/specified/addTemplate.js"); ?>

    <?php echo Html::Script("public/plugins/tinymce/tinymce.min.js"); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startPush('css'); ?>
<style>
.mce-statusbar .mce-path{
	display:none;
}
	.mce-statusbar.mce-panel {
		background-color: #fff !important;
		border-top: medium none navy;
		position: relative;
	}
</style>
<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.myaccount', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>