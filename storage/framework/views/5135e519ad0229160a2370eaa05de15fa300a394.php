<?php $__env->startSection('content'); ?>
	
    
    
    <?php echo Form::open(["url"=>route('template.update',['id'=>$template->id]),"files"=>"true","id"=>"add-template-form"]); ?>

    <h1 class="heading_tital"><?php echo e(trans('lang.create-template')); ?> <?php echo e(Form::submit('Save',['class'=>'right btn btn-primary ymrg20'])); ?></h1>
    <!----Forms Part Start------------>
    <div class="col-11-20">
    	<div class="col-1-1 mrgbt15">
        	<h3><?php echo e(trans('lang.template-info')); ?></h3>
        </div>
        <div class="col-1-1 mrgbt15">
	        <label class="it mrgbt5 required" for="template_title"><?php echo e(trans('lang.template-title')); ?></label>
    	    <?php echo e(Form::text('template_title',$template->title,array('class' => 'text textInput it', 'placeholder' => trans('lang.template-title'),'required'))); ?>

        </div>
        <div class="col-1-1 mrgbt15">
	        <label class="it mrgbt5 required" for="created_date"><?php echo e(trans('lang.date-created')); ?></label>
    	    <?php echo e(Form::text('created_date',date('m/d/Y',strtotime($template->created_date)),array('class' => 'text textInput it' , 'required' ))); ?>

        </div>
        
        <div class="col-1-1 mrgbt15">
            <div class="col-1-1">
                <?php echo e(Form::label('budget',trans('lang.budget'),array('class'=>'it mrgbt5'))); ?>

            </div>        
            <div class="col-1-1">
                <div class="col-1-24 dollarSign">$</div>
                <div class="col-1-3 pulrt15">
                        <?php echo e(Form::text('budget_from',$template->budget_from,array('class' => 'text textInput it','placeholder' => 'From','onkeypress'=>'return IsNumeric(event);','ondrop'=>'return false;',
                    'onpaste'=>'return false;'))); ?>

                    </div>
                <div class="col-1-3 pulrt15">
                    <?php echo e(Form::text('budget_to',$template->budget_to,array('class' => 'text textInput it','placeholder' => 'To','onkeypress'=>'return IsNumeric(event);','ondrop'=>'return false;',
                'onpaste'=>'return false;'))); ?>

                </div>
                <div class="col-7-24">
                    <?php echo e(Form::select('budget_type',['2'=>trans('lang.thousand'),'3'=>trans('lang.million')],$template->budget_type,['class'=>'col-1-1'])); ?>

                </div>
                <div class="clearfix"></div>
            </div>        
            <div class="clearfix"></div>
        </div>
        
        <div class="col-1-1 mrgbt15">   
            <?php echo e(Form::label('created_by',trans('lang.created-by'),array('class'=>'it mrgbt5'))); ?>

            <?php echo e(Form::text('created_by',$template->created_by,array('class' => 'text textInput it','placeholder' => trans('lang.created-by')))); ?>

        </div>
        
        <div class="col-1-1 mrgbt15">   
            <?php echo e(Form::label('company',trans('lang.company'),array('class'=>'it mrgbt5'))); ?>

            <?php echo e(Form::text('company',$template->company,array('class' => 'text textInput it','placeholder' => trans('lang.company')))); ?>

        </div>
        
        <div class="col-1-1 mrgbt15">
	        <div class="col-1-1"><?php echo e(Form::label('reader_inst',trans('lang.reader-list'),array('class'=>'it mrgbt5'))); ?></div>
            <div class="clearfix"></div>
            <div class="col-1-1">
            	<?php echo Form::textarea("reader_inst",$template->reader_inst,['class'=>"SimpletinyText"]); ?>

            </div>        	
        </div>
        
        <div class="col-1-1 mrgbt15" id="Formdiv">
			<?php $formlist	=	FormList(); ?>
            <?php echo e(Form::label('form[0]',trans('lang.form'),array('class'=>'it mrgbt5 '))); ?>

            <?php echo e(Form::select('form[0]',$formlist,$template->form[0],['class'=>'col-1-1','onchange'=>'checkOhter(event)'])); ?>

            
            <?php if(strtolower($template->form[0]) == "other"): ?>
            	<?php echo e(Form::text('form[1]',$template->form[1],array('class' => 'text textInput ymrg8 form it','placeholder' => trans('custom-form-placeholder')))); ?>

            <?php endif; ?>
        </div>
        
        <div class="col-1-1 mrgbt15" id="Genrediv">
			<?php $genrelist	=	GenreList(); ?>
            <?php echo e(Form::label('genre[0]',trans('lang.genre'),array('class'=>'it mrgbt5 '))); ?>

            <?php echo e(Form::select('genre[0]',$genrelist,$template->genre[0],['class'=>'col-1-1','onchange'=>'checkOhter(event)'])); ?>

            
            <?php if(strtolower($template->genre[0]) == "other"): ?>
            	<?php echo e(Form::text('genre[1]',$template->genre[1],array('class' => 'text textInput genre it ymrg8','placeholder' => trans('custom-genre-placeholder')))); ?>

            <?php endif; ?>
        </div>
        
        <div class="col-1-1 mrgbt15" id="Subgenrediv">
			<?php $subgenrelist	=	SubGenreList(); ?>
            <?php echo e(Form::label('subgenre[0]',trans('lang.sub-genre'),array('class'=>'it mrgbt5 '))); ?>

            <?php echo e(Form::select('subgenre[0]',$subgenrelist,$template->genre[0],['class'=>'col-1-1','onchange'=>'checkOhter(event)'])); ?>

            
            <?php if(strtolower($template->subgenre[0]) == "other"): ?>
            	<?php echo e(Form::text('subgenre[1]',$template->subgenre[1],array('class' => 'text textInput subgenre ymrg8 it','placeholder' => trans('custom-genre-placeholder')))); ?>

            <?php endif; ?>
        </div>
        
        <div class="col-1-1 mrgbt15">
			<?php $ratinglist	=	RatingList(); ?>
            <?php echo e(Form::label('rating',trans('lang.rating'),array('class'=>'it mrgbt5'))); ?>

            <?php echo e(Form::select('rating',$ratinglist,$template->rating,['class'=>'select_full col-1-1'])); ?>

        </div>
        
        <div class="col-1-1 mrgbt15">   
            <?php echo e(Form::label('target_audience',trans('lang.target-audience'),array('class'=>'it mrgbt5'))); ?>

            <?php echo e(Form::text('target_audience',$template->target_audience,array('class' => 'text textInput it','placeholder' => trans('lang.target-audience')))); ?>

        </div>
        
         <div class="col-1-1 mrgbt15">   
            <?php echo e(Form::label('lead',trans('lang.lead'),array('class'=>'it mrgbt5'))); ?>

            <?php echo e(Form::text('lead',$template->lead,array('class' => 'text textInput it','placeholder' => trans('lang.lead')))); ?>

        </div>
        
        <div class="col-1-1 mrgbt15">
            <?php echo e(Form::label('comparison',ucfirst(trans('lang.comparisons')), array('class'=>'it mrgbt5'))); ?>

            <?php echo e(Form::text('comparison',$template->comparison,array('class' => 'text textInput it','placeholder' => trans('lang.comparisons')))); ?>

        </div>
        
        
        <div class="col-1-1 mrgbt15">
	        <div class="col-1-1"><?php echo e(Form::label('viewer_notes',trans('lang.template-info-desc'),array('class'=>'it mrgbt5'))); ?></div>
            <div class="clearfix"></div>
            <div class="col-1-1">
            	<?php echo Form::textarea("viewer_notes",$template->viewer_notes,['class'=>"SimpletinyText"]); ?>

            </div>        	
        </div>
       <?php /*?> 
        <div class="col-1-1 mrgbt50">
	        <div class="col-1-1">{{Form::label('private_notes',trans('lang.private-notes'),array('class'=>'it mrgbt5'))}}</div>
            <div class="clearfix"></div>
            <div class="col-1-1">
            	{!! Form::textarea("private_notes",$template->private_notes,['class'=>"SimpletinyText"]) !!}
            </div>        	
        </div><?php */?>
        
        
        <!-- Script Info Starts Here -->
        <div class="col-1-1">
        	<h3><?php echo e(trans('lang.script-info')); ?>&nbsp;<small>( <?php echo e(trans('lang.script-infp-sub')); ?> )</small></h3>
        </div>
        <?php //echo"<pre>"; print_r($template->general_info[left]); ?>
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
							]; 
							
			$otherleft = $otherright = array();
			
			if(isset($template->general_info['left'])){
				foreach($template->general_info['left'] as $lftext){
					if(!in_array($lftext,$fieldslft))
						$otherleft[]	=	$lftext;	
				}
			}
			
			if(isset($template->general_info['right'])){
				foreach($template->general_info['right'] as $rgtext){
					if(!in_array($rgtext,$fieldsrgt))
						$otherright[]	=	$rgtext;	
				}
			}
			?>           
                            
          <div id="left_part_scinfo">
        	<div class="col-1-1 mrgtp15"><h3>Left Column</h3></div>
        <?php foreach($fieldslft as $key=>$field ): ?>
        	<div class="col-1-1 mrgtp10 Box pul10">
                <div class="left">
                	<?php if(isset($template->general_info[left])): ?>                        
                    	<?php echo e(Form::checkbox('script_info[left][]',$field,in_array($field,$template->general_info[left]))); ?>

                    <?php else: ?>
                    	<?php echo e(Form::checkbox('script_info[left][]',$field)); ?>

                    <?php endif; ?>    
                </div>
                <div class="left mrglft15">
                    <?php echo e(Form::label('script_info[left][]',trans("lang.$key"),['class'=>'it checkbox'])); ?>

                </div>
                <div class="clearfix"></div>    
            </div>
        <?php endforeach; ?>
        <div class="col-1-1" id="other-script_info_left">
        	<?php if(isset($otherleft) && count($otherleft)): ?>
                <?php foreach($otherleft as $field): ?>
                    <div class="col-1-1 mrgtp10 Box pul10 relative">
                        <span class="delete_btn mrg10" onclick="javascript:$(this).parent().remove()"><i class="fa fa-trash"></i></span>
                        <div class="left">
                            <?php echo e(Form::checkbox('script_info[left][]',$field,true)); ?>

                        </div>
                        <div class="left mrglft15">
                            <?php echo e(Form::label('script_info[left][]',$field,['class'=>'it checkbox'])); ?>

                        </div>
                        <div class="clearfix"></div>    
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
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
                	<?php if(isset($template->general_info[left])): ?>                        
                    	<?php echo e(Form::checkbox('script_info[right][]',$field,in_array($field,$template->general_info[right]))); ?>

                    <?php else: ?>
                    	<?php echo e(Form::checkbox('script_info[right][]',$field)); ?>                        
                    <?php endif; ?>
                </div>
                <div class="left mrglft15">
                    <?php echo e(Form::label('script_info[right][]',trans("lang.$key"),['class'=>'it checkbox'])); ?>

                </div>
                <div class="clearfix"></div>    
            </div>
        <?php endforeach; ?>
        <div class="col-1-1" id="other-script_info_right">
        	<?php if(isset($otherright) && count($otherright)): ?>
                <?php foreach($otherright as $field): ?>
                    <div class="col-1-1 mrgtp10 Box pul10 relative">
                        <span class="delete_btn mrg10" onclick="javascript:$(this).parent().remove()"><i class="fa fa-trash"></i></span>
                        <div class="left">
                            <?php echo e(Form::checkbox('script_info[right][]',$field,true)); ?>

                        </div>
                        <div class="left mrglft15">
                            <?php echo e(Form::label('script_info[right][]',$field,['class'=>'it checkbox'])); ?>

                        </div>
                        <div class="clearfix"></div>    
                    </div>
                <?php endforeach; ?>
        <?php endif; ?>
        </div>
        <div class="col-1-1">
        	<div class="btn btn-primary btn-icon fa-plus ymrg20 add_scriptInfoBtn" data-id="right"><?php echo e(trans('lang.add-another')); ?></div>
        </div>
        </div>
        
        
       <!-- Script Info Ends Here -->              
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
            <?php $template->load('privatenote'); //dump($template->privatenote); ?>
                <h5 class="headonBlue"><?php echo trans("lang.private-notes"); ?></h5>
            </div>
            <div class="col-1-1 pul15 private-notes">
                 <textarea id="pvt-not-text" name="private_notes" rows="7" style="width:100%"><?php echo $template->privatenote->note; ?></textarea>
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
    	<div class="col-1-1 mrgtp10 mrgbt30 Box pul10">
            <div class="left">                        
                <?php echo e(Form::checkbox('character_break[]','Character Breakdowns',in_array('Character Breakdowns',$template->character_break))); ?>

            </div>
            <div class="left mrglft15">   
            	<div class="col-1-1 mrgbt7">
                	<?php echo e(Form::label('character_break[]',trans('lang.character-breakdowns'),['class'=>'it checkbox mrgbt15'])); ?>

                </div>
                <div class="clearfix"></div>
                <?php echo e(Form::textarea('character_break[character_inst]',$template->character_break['character_inst'],['class'=>'it textInput col-1-1','cols'=>65,'rows'=>'7','placeholder'=>trans('lang.instructions')])); ?>

            </div>
            <div class="clearfix"></div>    
        </div>
        
        <div class="col-1-1 mrgtp10 mrgbt5 Box pul10">
            <div class="left">                        
                <?php echo e(Form::checkbox('logsyn[]','Logline',in_array('Logline',$template->logsyn))); ?>

            </div>
            <div class="left mrglft15">   
            	<div class="col-1-1 mrgbt7">
                	<?php echo e(Form::label('logsyn[]',trans('lang.logline'),['class'=>'it checkbox mrgbt15'])); ?>

                </div>
                <div class="clearfix"></div>
                <?php echo e(Form::textarea('logsyn[log_reader_inst]',$template->logsyn['log_reader_inst'],['class'=>'it textInput col-1-1','cols'=>65,'rows'=>'7','placeholder'=>trans('lang.reader-list')])); ?>

            </div>
            <div class="clearfix"></div>    
        </div>
        
        <div class="col-1-1  mrgbt30 Box pul10">
            <div class="left">                        
                <?php echo e(Form::checkbox('logsyn[]','Synopsis',in_array('Synopsis',$template->logsyn))); ?>

            </div>
            <div class="left mrglft15">   
            	<div class="col-1-1 mrgbt7">
                	<?php echo e(Form::label('logsyn[]',trans('lang.synopsis'),['class'=>'it checkbox mrgbt15'])); ?>

                </div>
                <div class="clearfix"></div>
                <?php echo e(Form::textarea('logsyn[syn_reader_inst]',$template->logsyn['syn_reader_inst'],['class'=>'it textInput col-1-1','cols'=>65,'rows'=>'7','placeholder'=>trans('lang.reader-list')])); ?>

            </div>
            <div class="clearfix"></div>    
        </div>
        
        
        <!----- Notes Section Start -->
        <div class="col-1-1 ymrg15">        	
        	<h3><?php echo e(trans('lang.notes')); ?></h3>
        </div>
        <div class="col-1-1 mrgbt5 Box pul10">
            <div class="left">                        
                <?php echo e(Form::checkbox('notes[]','Writing Ability',in_array('Writing Ability',$template->notes))); ?>

            </div>
            <div class="left mrglft15">   
            	<div class="col-1-1 mrgbt7">
                	<?php echo e(Form::label('notes[]',trans('lang.writing-ability'),['class'=>'it checkbox mrgbt15'])); ?>

                </div>
                <div class="clearfix"></div>
                <?php echo e(Form::textarea('notes[writing_ability_inst]',$template->notes['writing_ability_inst'],['class'=>'it textInput col-1-1','cols'=>65,'rows'=>'7','placeholder'=>trans('lang.reader-list')])); ?>

            </div>
            <div class="clearfix"></div>    
        </div>
        
        <div class="col-1-1  mrgbt5 Box pul10">
            <div class="left">                        
                <?php echo e(Form::checkbox('notes[]','Marketability',in_array('Marketability',$template->notes))); ?>

            </div>
            <div class="left mrglft15">   
            	<div class="col-1-1 mrgbt7">
                	<?php echo e(Form::label('notes[]',trans('lang.marketability'),['class'=>'it checkbox mrgbt15'])); ?>

                </div>
                <div class="clearfix"></div>
                <?php echo e(Form::textarea('notes[marketability_inst]',$template->notes['marketability_inst'],['class'=>'it textInput col-1-1','cols'=>65,'rows'=>'7','placeholder'=>trans('lang.reader-list')])); ?>

            </div>
            <div class="clearfix"></div>    
        </div>
        
        <div class="col-1-1  mrgbt5 Box pul10">
            <div class="left">                        
                <?php echo e(Form::checkbox('notes[]','Originality',in_array('Originality',$template->notes))); ?>

            </div>
            <div class="left mrglft15">   
            	<div class="col-1-1 mrgbt7">
                	<?php echo e(Form::label('notes[]',trans('lang.originality'),['class'=>'it checkbox mrgbt15'])); ?>

                </div>
                <div class="clearfix"></div>
                <?php echo e(Form::textarea('notes[originality_inst]',$template->notes['originality_inst'],['class'=>'it textInput col-1-1','cols'=>65,'rows'=>'7','placeholder'=>trans('lang.reader-list')])); ?>

            </div>
            <div class="clearfix"></div>    
        </div>
        
        <div class="col-1-1  mrgbt5 Box pul10">
            <div class="left">                        
                <?php echo e(Form::checkbox('notes[]','Suggestions for Improvements',in_array('Suggestions for Improvements',$template->notes))); ?>

            </div>
            <div class="left mrglft15">   
            	<div class="col-1-1 mrgbt7">
                	<?php echo e(Form::label('notes[]',trans('lang.improv-sugg'),['class'=>'it checkbox mrgbt15'])); ?>

                </div>
                <div class="clearfix"></div>
                <?php echo e(Form::textarea('notes[suggestions_for_improvements_inst]',$template->notes['suggestions_for_improvements_inst'],['class'=>'it textInput col-1-1','cols'=>65,'rows'=>'7','placeholder'=>trans('lang.reader-list')])); ?>

            </div>
            <div class="clearfix"></div>    
        </div>
        
        <div class="col-1-1  mrgbt5 Box pul10">
            <div class="left">                        
                <?php echo e(Form::checkbox('notes[]','Overall Notes',in_array('Overall Notes',$template->notes))); ?>

            </div>
            <div class="left mrglft15">   
            	<div class="col-1-1 mrgbt7">
                	<?php echo e(Form::label('notes[]',trans('lang.ovrol-notes'),['class'=>'it checkbox mrgbt15'])); ?>

                </div>
                <div class="clearfix"></div>
                <?php echo e(Form::textarea('notes[overall_notes_inst]',$template->notes['overall_notes_inst'],['class'=>'it textInput col-1-1','cols'=>65,'rows'=>'7','placeholder'=>trans('lang.reader-list')])); ?>

            </div>
            <div class="clearfix"></div>    
        </div>
        
        <div class="col-1-1" id="other-notes">
        <?php $OnotesCount  = 1 ;?>
        	<?php if(array_key_exists('other',$template->notes) && is_array($template->notes['other'])): ?>
            	<?php foreach($template->notes['other'] as $otherNotes ): ?>
                	<div class="col-1-1  mrgbt5 Box pul10 relative">
                    	<span class="delete_btn mrg10" onclick="javascript:$(this).parent().remove()"><i class="fa fa-trash"></i></span>
                        <div class="left">                        
                            <?php echo e(Form::checkbox("notes[other][$OnotesCount][0]",$otherNotes[0],true)); ?>

                        </div>
                        <div class="left mrglft15">   
                            <div class="col-1-1 mrgbt7">
                                <?php echo e(Form::label("notes[$OnotesCount][]",$otherNotes[0],['class'=>'it checkbox mrgbt15'])); ?>

                            </div>
                            <div class="clearfix"></div>
                            <?php echo e(Form::textarea("notes[other][$OnotesCount][]",$otherNotes[1],['class'=>'it textInput col-1-1','cols'=>65,'rows'=>'7','placeholder'=>trans('lang.reader-list')])); ?>

                        </div>
                        <div class="clearfix"></div>    
                    </div>
                    <?php $OnotesCount++ ;?>
                <?php endforeach; ?>
            <?php endif; ?>
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
                    <?php echo e(Form::checkbox('bar_graphs[]',$field,in_array($field,$template->bar_graphs))); ?>

                </div>
                <div class="left mrglft15">
                    <?php echo e(Form::label('bar_graphs[]',$field,['class'=>'it checkbox'])); ?>

                </div>
                <div class="clearfix"></div>    
            </div>
        <?php endforeach; ?>
        <div class="col-1-1" id="other_barGraph">
        	<?php if(array_key_exists('other',$template->bar_graphs)): ?>
            	<?php foreach($template->bar_graphs['other'] as $field): ?>
                	<div class="col-1-1 mrgtp10 Box pul10 relative">
                    	<span class="delete_btn mrg10" onclick="javascript:$(this).parent().remove()"><i class="fa fa-trash"></i></span>
                        <div class="left">                        
                            <?php echo e(Form::checkbox('bar_graphs[other][]',$field,true)); ?>

                        </div>
                        <div class="left mrglft15">
                            <?php echo e(Form::label('bar_graphs[other][]',$field,['class'=>'it checkbox'])); ?>

                        </div>
                        <div class="clearfix"></div>    
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div class="col-1-1">
        	<div id="add_barBtn" class="btn btn-primary btn-icon fa-plus ymrg20"><?php echo e(trans('lang.add-another')); ?></div>
        </div>
        
            
        <!--- Bar Graph Section Ends -->
        
        
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