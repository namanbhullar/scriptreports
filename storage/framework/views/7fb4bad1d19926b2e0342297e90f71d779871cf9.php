<?php $__env->startSection('content'); ?>
<?php

if(!isset($script)){
	$script	=	new stdClass;
	$script->id	=	0;
	$script->title	=	null;
	$script->draft_number	=	null;
	$script->draft_date	=	date('m/d/Y');
	$script->submitted_by	=	null;
	$script->member_link	=	null;
	$script->form	=	[];
	$script->genre	=	[];
	$script->subgenre	=	[];
	$script->comparisons	=	null;
	$script->created_at	=	date('m/d/Y');
	$script->budget_from	=	null;
	$script->budget_type	=	null;
	$script->budget_to	=	null;
	$script->rating	=	null;
	$script->target_audience	=	null;
	$script->period	=	null;
	$script->pages	=	null;
	$script->location	=	null;
	$script->setting	=	null;
	$script->logline	=	null;
	$script->synopsis	=	null;
	$script->writer_info	=	[];
	$script->script_info	=	[];
	$script->story_by		=	[];
	$script->source		=	[];
	
}else{
	$script->load('agent.address','manager.address');
	
	$agent	=	$script->agent;
	$manager	=	$script->manager;
}

 ?>

<?php echo Form::open(["url"=>route('script.update',['id'=>$script->id]),"method"=>"post","files"=>"true"]); ?>

<h1 class="heading_tital"><?php echo e(trans('lang.add-script')); ?></h1>
<div class="col-2-3">
	 <h4 class="BlueRadialHead mrgbt10"><?php echo e(strtoupper(trans('lang.script-info'))); ?></h4>
     
    <div class="col-1-1 mrgbt15">
     	<label class="it mrgbt5 required" for="script_title"><?php echo e(trans('lang.script-title')); ?></label>
		<?php echo e(Form::text('title',$script->title,array('class' => 'text textInput it', 'placeholder' => trans('lang.script-title'),'required'))); ?>

	</div>
    
    <div class="col-1-1 mrgbt15">
    	<label class="it mrgbt5" for="script_draft"><?php echo e(trans('lang.draft-number')); ?> </label>
		<?php echo e(Form::text('script_draft',$script->draft_number,array('class' => 'text textInput it', 'placeholder' => trans('lang.draft-number')))); ?>

    </div>
    
    <div class="col-1-1 mrgbt15">
    	<label class="it mrgbt5" for="draft_date"><?php echo e(trans('lang.draft-date')); ?></label>
		<?php echo e(Form::text('draft_date',date('m/d/Y',strtotime($script->draft_date)),array('class' => 'text textInput it datepicker','data-format'=>'d j y','readonly'))); ?>

    </div>
    
    <div class="col-1-1 mrgbt15">
    	<label class="it mrgbt5" for="submitted_by"><?php echo e(trans('lang.submitted-by')); ?></label>
		<?php echo e(Form::text('submitted_by',$script->submitted_by,array('class' => 'text textInput it', 'placeholder' => trans('lang.submitted-by')))); ?>

    </div>
    
    <div class="col-1-1 mrgbt15">
    	<?php echo e(Form::label('member_link',trans('lang.member-link'),['class'=>'it mrgbt5'])); ?>

		<?php echo e(Form::text('member_link',$script->member_link,array('class'=>'text textInput it','placeholder'=>trans('lang.member-link')))); ?>

    </div>
      
      
  
        <div class="col-1-1 mrgbt15" id="Formdiv">
            <?php $formlist	=	FormList(); ?>
            <?php echo e(Form::label('form[0]',trans('lang.form'),array('class'=>'it mrgbt5'))); ?>

            <?php echo e(Form::select('form[0]',$formlist,$script->form[0],['class'=>'col-1-1','onchange'=>'checkOhter(event)'])); ?>

            
            <?php if(strtolower($script->form[0]) == 'other'): ?>
                <?php echo e(Form::text("form[form][1]",$script->form[1],["class"=>"text textInput it mrgtp8 form","placeholder"=>trans('lang.custom-form-placehlder')])); ?>

            <?php endif; ?>
        </div>
    
    <div class="col-1-1 mrgbt15" id="Genrediv">
		<?php $genrelist	=	GenreList(); ?>
        <?php echo e(Form::label('genre[0]',trans('lang.genre'),array('class'=>'it mrgbt5'))); ?>

        <?php echo e(Form::select('genre[0]',$genrelist,$script->genre[0],['class'=>'col-1-1','onchange'=>'checkOhter(event)'])); ?>

        
         <?php if(strtolower($script->genre[0]) == 'other'): ?>
                <?php echo e(Form::text("genre[1]",$script->genre[1],["class"=>"text textInput it mrgtp8 genre","placeholder"=>trans('lang.custom-genre-placehlder')])); ?>

         <?php endif; ?>
    </div>
    
    <div class="col-1-1 mrgbt15" id="Subgenrediv">
		<?php $subgenrelist	=	SubGenreList(); ?>
        <?php echo e(Form::label('subgenre[0]',trans('lang.sub-genre'),array('class'=>'it mrgbt5'))); ?>

        <?php echo e(Form::select('subgenre[0]',$subgenrelist,$script->subgenre[0],['class'=>'col-1-1','onchange'=>'checkOhter(event)'])); ?>

        
        <?php if(strtolower($script->subgenre[0]) == 'other'): ?>
                <?php echo e(Form::text("subgenre[1]",$script->subgenre[1],["class"=>"text textInput it mrgtp8 genre","placeholder"=>trans('lang.custom-genre-placehlder')])); ?>

         <?php endif; ?>
    </div>
    
     <div class="col-1-1 mrgbt15">
    	<?php echo e(Form::label('comparison',ucfirst(trans('lang.comparisons')), array('class'=>'it mrgbt5'))); ?>

        <?php echo e(Form::text('comparison',$script->comparisons,array('class' => 'text textInput it','placeholder' => ucfirst(trans('lang.comparisons'))))); ?>

    </div>
    
    <div class="col-1-1 mrgbt15">
        <?php echo e(Form::label('created_date', trans('lang.date-created'),array('class'=>'it mrgbt5'))); ?>

        <?php echo e(Form::text('created_date',date('m/d/Y',strtotime($script->created_at)),array('class' => 'text textInput it datepicker','readonly'))); ?>

    </div>
    
    <div class="col-1-1 mrgbt15">
    	<div class="col-1-1">
        	<?php echo e(Form::label('budget',trans('lang.budget'),array('class'=>'it mrgbt5'))); ?>

        </div>
    	<div class="col-1-3 pulrt15">
        	<?php echo e(Form::text('budget_from',$script->budget_from,array('class' => 'text textInput it','placeholder' => 'From','onkeypress'=>'return IsNumeric(event);','ondrop'=>'return false;',
                'onpaste'=>'return false;'))); ?>

        </div>
        <div class="col-1-3 pulrt15">
        	<?php echo e(Form::text('budget_to',$script->budget_to,array('class' => 'text textInput it','placeholder' => 'To','onkeypress'=>'return IsNumeric(event);','ondrop'=>'return false;',
                'onpaste'=>'return false;'))); ?>

        </div>
        <div class="col-1-3">
        	<?php echo e(Form::select('budget_type',['2'=>trans('lang.thousand'),'3'=>trans('lang.million')],$script->budget_type,['class'=>'col-1-1'])); ?>

        </div>
    	<div class="clearfix"></div>
    </div>
    
    <div class="col-1-1 mrgbt15">
		<?php $ratinglist	=	RatingList(); ?>
    	<?php echo e(Form::label('rating',trans('lang.rating'),array('class'=>'it mrgbt5'))); ?>

        <?php echo e(Form::select('rating',$ratinglist,$script->rating,['class'=>'select_full col-1-1'])); ?>

    </div>
    
    <div class="col-1-1 mrgbt15">   
    	<?php echo e(Form::label('target_audience',trans('lang.target-audience'),array('class'=>'it mrgbt5'))); ?>

    	<?php echo e(Form::text('target_audience',$script->target_audience,array('class' => 'text textInput it','placeholder' => trans('lang.target-audience')))); ?>

    </div>
    
    <div class="col-1-1 mrgbt15">	    
        <?php echo e(Form::label('period',trans('lang.period'),array('class'=>'it mrgbt5'))); ?>

        <?php echo e(Form::text('period',$script->period,array('class' => 'text textInput it','placeholder' => trans('lang.period')))); ?>

    </div>
    
    <div class="col-1-1 mrgbt15">	    
        <?php echo e(Form::label('pages',trans('lang.pages'),array('class'=>'it mrgbt5'))); ?>

        <?php echo e(Form::text('pages',$script->pages,array('class' => 'text textInput it','placeholder' => trans('lang.pages')))); ?>

    </div>
    
    <div class="col-1-1 mrgbt15">
        <?php echo e(Form::label('location',trans('lang.location'),array('class'=>'it mrgbt5'))); ?>

        <?php echo e(Form::text('location',$script->location,array('class' => 'text textInput it','placeholder' => trans('lang.location')))); ?>

    </div>
    
    <div class="col-1-1 mrgbt15">
        <?php echo e(Form::label('setting',trans('lang.settings'),array('class'=>'it mrgbt5'))); ?>

        <?php echo e(Form::text('setting',$script->setting,array('class' => 'text textInput it','placeholder' => trans('lang.settings')))); ?>

    </div>
    
    <div class="clearfix"></div>
</div>

<div class="col-2-3 ymrg30">
<?php $CatCount	=	0; ?>
	<div class="col-1-1" id="other_category">
    	<?php if(count($script->script_info)): ?>
        	
        	<?php foreach($script->script_info as $scripInfo): ?>	
            	   <div class="col-1-1 mrgbt20 relative">
                   	<?php echo Form::label("scipt_info[$CatCount]",'New Category',['class'=>'it mrgbt5']); ?>

                    <?php echo Form::text("script_info[$CatCount][name]",$scripInfo[name],['class'=>'text textInput mrgbt5 it','placeholder'=>'Category Name']); ?>

                    <?php echo Form::text("script_info[$CatCount][title]",$scripInfo[title],['class'=>'text textInput mrgbt5 it','placeholder'=>'Category Name']); ?>

                   </div> 	
                   <?php $CatCount++; ?>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <div class="btn btn-primary btn-icon fa-plus xpul40" id="add_cat"><?php echo e(trans("lang.add-category")); ?></div>
</div>

<div class="col-2-3 ymrg30">
    <div class="col-1-1 mrgbt15">
        <?php echo e(Form::label('logline',trans('lang.logline'),array('class'=>'it mrgbt5'))); ?>

        <?php echo e(Form::textarea('logline',$script->logline,array('class' => 'it textInput col-1-1','placeholder' => 'Logline','rows'=>2))); ?>

    </div>
    <div class="col-1-1 mrgbt15" style="position:relative;">
    	<?php echo e(Form::label('synopsis',trans('lang.synopsis'),array('class'=>'it'))); ?>

        <div class="clearfix"></div>
            <?php echo e(Form::textarea('synopsis',$script->synopsis,array('class' => 'textArea it', 'placeholder' => 'Synopsis(800 Words Less)'))); ?>

    </div>
    
    <div class="clearfix"></div>
</div>

<div class="h-line ymrg20"></div>
<div class="col-2-3 mrgtp20">
	 <h4 class="BlueRadialHead mrgbt10"><?php echo e(strtoupper( trans('lang.writer-info') )); ?></h4>
     
     <div class="col-1-1 mrgbt15">
        <?php echo e(Form::label('writer[0][name]',trans('lang.script-writer'),array('class'=>'it mrgbt5'))); ?>

        <?php echo e(Form::text('writer[0][name]',$script->writer_info[0][name],['class'=>'text textInput it','placeholder'=>trans('lang.script-writer-name')])); ?>

     </div>
     
     <div class="col-1-1 mrgbt15">
        <?php echo e(Form::label('writer[0][phone]',trans('lang.phone-no'),array('class'=>'it mrgbt5'))); ?>

        <?php echo e(Form::text('writer[0][phone]',$script->writer_info[0][phone],array('class'=>'text textInput it','placeholder'=>trans('lang.script-writer')."&nbsp;".trans('lang.phone-no')))); ?>

     </div>
     
     <div class="col-1-1 mrgbt15">
        <?php echo e(Form::label('writer[0][link]',trans('lang.member-link'),array('class'=>'it mrgbt5'))); ?>

        <?php echo e(Form::text('writer[0][link]',$script->writer_info[0][link],array('class'=>'text textInput it','placeholder'=>trans('lang.member-link')))); ?>

     </div>
     
     
    <?php    
			$WriterCount	=	1; 
			$writers	=	$script->writer_info; 
			unset($writers[0]);
			
	?>     
    <div class="col-1-1" id="other_writer">
    	<?php foreach($writers as $witer): ?>
        
        <?php //echo "<pre>"; print_r($writers); exit; ?>
        	<div class="col-1-1 relative ymrg15">
            
            <span class="delete_btn" onclick="javascript:$(this).parent().remove()" title="Delete this Category" style="top: -5px; right: 0%;">
            	<i class="fa fa-trash"></i>
            </span>
            
        	 <div class="col-1-1 mrgbt15">
                <?php echo e(Form::label("writer[$WriterCount][name]",trans('lang.script-writer'),array('class'=>'it mrgbt5'))); ?>

                <?php echo e(Form::text("writer[$WriterCount][name]",$witer[name],['class'=>'text textInput it','placeholder'=>trans('lang.script-writer-name')])); ?>

             </div>
             
             <div class="col-1-1 mrgbt15">
                <?php echo e(Form::label("writer[$WriterCount][phone]",trans('lang.phone-no'),array('class'=>'it mrgbt5'))); ?>

                <?php echo e(Form::text("writer[$WriterCount][phone]",$witer[phone],array('class'=>'text textInput it','placeholder'=>trans('lang.script-writer')."&nbsp;".trans('lang.phone-no')))); ?>

             </div>
             
             <div class="col-1-1 mrgbt15">
                <?php echo e(Form::label("writer[$WriterCount][link]",trans('lang.member-link'),array('class'=>'it mrgbt5'))); ?>

                <?php echo e(Form::text("writer[$WriterCount][link]",$witer[link],array('class'=>'text textInput it','placeholder'=>trans('lang.member-link')))); ?>

             </div>
            </div>
             <?php    $WriterCount++; ?>
        <?php endforeach; ?>
    </div>
    
    <div class="col-1-1">
	    <div class="btn btn-primary btn-icon fa-plus xpul40" id="add_writer">Add Writer</div>
    </div>
     <div class="clearfix"></div>
</div>


<div class="col-2-3 mrgtp20">	 
<?php $StoryCount	=	(count($script->story_by) > 0) ? 1 : 0; ?>
    <div class="col-1-1" id="other_story">
    	<?php if(count($script->story_by) > 0): ?>
        	<h4 class="BlueRadialHead mrgbt10">Story By</h4>
            <?php foreach($script->story_by as $story): ?>
              <div class="col-1-1 relative ymrg15">
                <span class="delete_btn" onclick="javascript:$(this).parent().remove()" title="Delete this Category" style="top: -5px; right: 0%;">
                    <i class="fa fa-trash"></i>
                </span>
                 <div class="col-1-1 mrgbt15">
                    <?php echo e(Form::label("story[$StoryCount][name]",'Story Writer Name',array('class'=>'it mrgbt5'))); ?>

                    <?php echo e(Form::text("story[$StoryCount][name]",$story[name],['class'=>'text textInput it','placeholder'=>'Story Writer Name'])); ?>

                 </div>
                 
                 <div class="col-1-1 mrgbt15">
                    <?php echo e(Form::label("story[$StoryCount][phone]",'Phone Number',array('class'=>'it mrgbt5'))); ?>

                    <?php echo e(Form::text("story[$StoryCount][phone]",$story[phone],array('class'=>'text textInput it','placeholder'=>"Story Writer "."&nbsp;".trans('lang.phone-no')))); ?>

                 </div>
                 
                 <div class="col-1-1 mrgbt15">
                    <?php echo e(Form::label("story[$StoryCount][link]",'Member Link',array('class'=>'it mrgbt5'))); ?>

                    <?php echo e(Form::text("story[$StoryCount][link]",$story[link],array('class'=>'text textInput it','placeholder'=>trans('lang.member-link')))); ?>

                 </div>
               </div>
                 <?php $StoryCount++; ?>
            <?php endforeach; ?>
         <?php endif; ?>
    </div>    
    <div class="col-1-1">
    	
	    <div class="btn btn-primary btn-icon fa-plus xpul40" id="add_story">Add Story By</div>
    </div>
     <div class="clearfix"></div>
</div>

<div class="col-2-3 mrgtp20">	 
<?php $sourceCount	=	(count($script->source) > 0) ? 1 : 0; ?>
    <div class="col-1-1" id="source_material">.
    	<?php if(count($script->source) > 0): ?>
	        <h4 class="BlueRadialHead mrgbt10">Source Material</h4>
            <?php foreach($script->source as $source): ?>
            <div class="col-1-1 relative ymrg15">
                <span class="delete_btn" onclick="javascript:$(this).parent().remove()" title="Delete this Category" style="top: -5px; right: 0%;">
                    <i class="fa fa-trash"></i>
                </span>
                 <div class="col-1-1 mrgbt15">
                    <?php echo e(Form::label('source[$sourceCount][title]','Story Writer Name',array('class'=>'it mrgbt5'))); ?>

                    <?php echo e(Form::text('source[$sourceCount][name]',$source[title],['class'=>'text textInput it','placeholder'=>'Story Writer Name'])); ?>

                 </div>
                 
                <div class="col-1-1 mrgbt15">
					<?php $ProducerFormList	=	ProducerFormList(); ?>
                    <?php echo e(Form::label('source[$sourceCount][form][0]',trans('lang.rating'),array('class'=>'it mrgbt5'))); ?>

                    <?php echo e(Form::select('source[$sourceCount][form][0]',$ProducerFormList,$source[form][0],['class'=>'select_full col-1-1'])); ?>

                    
                    <?php if(strtolower($source[$sourceCount][form][0]) == 'other'): ?>
                    	<?php echo e(Form::text('source[$sourceCount][form][1]',$source[form][1],['class'=>'text textInput it','placeholder'=>'Custom Form Title'])); ?>

                    <?php endif; ?>
                </div>
                 
                 <div class="col-1-1 mrgbt15">
                    <?php echo e(Form::label('source[$sourceCount][author]','Author',array('class'=>'it mrgbt5'))); ?>

                    <?php echo e(Form::text('source[$sourceCount][author]',$source[author],array('class'=>'text textInput it','placeholder'=>'Author'))); ?>

                 </div>
                 
                 <div class="col-1-1 mrgbt15">
                    <?php echo e(Form::label('source[$sourceCount][phone]','Phone No.',array('class'=>'it mrgbt5'))); ?>

                    <?php echo e(Form::text('source[$sourceCount][phone]',$source[phone],array('class'=>'text textInput it','placeholder'=>'Phone No.'))); ?>

                 </div>
                 <?php $sourceCount++; ?>
               </div>
            <?php endforeach; ?>
         <?php endif; ?>
    </div>    
    <div class="col-1-1">
	    <div class="btn btn-primary btn-icon fa-plus xpul40" id="add_source">Add  Source Material</div>
    </div>
     <div class="clearfix"></div>
</div>

<div class="col-2-3 mrgtp20">	 
    <div class="col-1-1" id="agent">
    	<div class="col-1-1 relative ymrg15">
             <h4 class="BlueRadialHead mrgbt10">Agent</h4>
             <div class="col-1-1 mrgbt15">
                <?php echo e(Form::label('agent[name]','Agent Name',array('class'=>'it mrgbt5'))); ?>

                <?php echo e(Form::text('agent[name]',$agent->name,['class'=>'text textInput it','placeholder'=>'Agent Name'])); ?>

             </div>
             
              <div class="col-1-1 mrgbt15">
                <?php echo e(Form::label('agent[company]','Company Name',array('class'=>'it mrgbt5'))); ?>

                <?php echo e(Form::text('agent[company]',$agent->company,['class'=>'text textInput it','placeholder'=>'Company Name'])); ?>

             </div>	
             
              <div class="col-1-1 mrgbt15">
                <?php echo e(Form::label('agent[phone]','Phone no',array('class'=>'it mrgbt5'))); ?>

                <?php echo e(Form::text('agent[phone]',$agent->phone,['class'=>'text textInput it','placeholder'=>'Phone no'])); ?>

             </div>
             
              <div class="col-1-1 mrgbt15">
                <?php echo e(Form::label('agent[link]','ScriptReports Member Link',array('class'=>'it mrgbt5'))); ?>

                <?php echo e(Form::text('agent[link]',$agent->link,['class'=>'text textInput it','placeholder'=>'ScriptReports Member Link
    '])); ?>

             </div>
             <div class="col-1-1 mrgbt15">
                <label for="agent[address][street]" class="it mrgbt5">Address</label>
                <?php $address = $agent->address; ?>
                <div class="col-1-1 mrgbt5">
                    <?php echo e(Form::text('agent[address][street]',$address->street,['class'=>'text textInput it mrgbt5','placeholder'=>'Street Name or No.'])); ?>

                    <?php echo e(Form::text('agent[address][city]',$address->city,['class'=>'text textInput it mrgbt5','placeholder'=>'City'])); ?>

                    <?php echo e(Form::text('agent[address][state]',$address->state,['class'=>'text textInput mrgbt5 it','placeholder'=>'State'])); ?>

                    <?php echo e(Form::text('agent[address][zip]',$address->zip,['class'=>'text textInput mrgbt5 it','placeholder'=>'Zip'])); ?>

                    <?php echo e(Form::text('agent[address][country]',$address->country,['class'=>'text mrgbt5 textInput it','placeholder'=>'Country'])); ?>

                </div>
             </div>
             <span class="delete_btn" onclick="javascript:$(this).parent().remove();$('#add_agent').show()" title="Delete this Category" style="top: 8px; right: 7px;"><i class="fa fa-trash"></i></span>
         </div>
    </div>    
    <div class="col-1-1">
	    <div class="btn btn-primary btn-icon fa-plus xpul40" style="display:none" id="add_agent">Add Agent</div>
    </div>
     <div class="clearfix"></div>
</div>

<div class="col-2-3 mrgtp20 mrgbt30">	 
    <div class="col-1-1" id="manager">
    	<div class="col-1-1 relative ymrg15">
             <h4 class="BlueRadialHead mrgbt10">Manager</h4>
             <div class="col-1-1 mrgbt15">
                <?php echo e(Form::label('manager[name]','Manager Name',array('class'=>'it mrgbt5'))); ?>

                <?php echo e(Form::text('manager[name]',$manager->name,['class'=>'text textInput it','placeholder'=>'Manager Name'])); ?>

             </div>
             
              <div class="col-1-1 mrgbt15">
                <?php echo e(Form::label('manager[company]','Company Name',array('class'=>'it mrgbt5'))); ?>

                <?php echo e(Form::text('manager[company]',$manager->company,['class'=>'text textInput it','placeholder'=>'Company Name'])); ?>

             </div>	
             
              <div class="col-1-1 mrgbt15">
                <?php echo e(Form::label('manager[phone]','Phone no',array('class'=>'it mrgbt5'))); ?>

                <?php echo e(Form::text('manager[phone]',$manager->phone,['class'=>'text textInput it','placeholder'=>'Phone no'])); ?>

             </div>
             
              <div class="col-1-1 mrgbt15">
                <?php echo e(Form::label('manager[link]','ScriptReports Member Link',array('class'=>'it mrgbt5'))); ?>

                <?php echo e(Form::text('manager[link]',$manager->link,['class'=>'text textInput it','placeholder'=>'ScriptReports Member Link
    '])); ?>

             </div>
             <div class="col-1-1 mrgbt15">
                <label for="agent[address][street]" class="it mrgbt5">Address</label>
                <div class="col-1-1 mrgbt5">
                <?php $address = $manager->address; ?>
                    <?php echo e(Form::text('manager[address][street]',$address->street,['class'=>'text textInput it mrgbt5','placeholder'=>'Street Name or No.'])); ?>

                    <?php echo e(Form::text('manager[address][city]',$address->city,['class'=>'text textInput it mrgbt5','placeholder'=>'City'])); ?>

                    <?php echo e(Form::text('manager[address][state]',$address->state,['class'=>'text textInput mrgbt5 it','placeholder'=>'State'])); ?>

                    <?php echo e(Form::text('manager[address][zip]',$address->zip,['class'=>'text textInput mrgbt5 it','placeholder'=>'Zip'])); ?>

                    <?php echo e(Form::text('manager[address][country]',$address->country,['class'=>'text mrgbt5 textInput it','placeholder'=>'Country'])); ?>

                </div>
             </div>
             <span class="delete_btn" onclick="javascript:$(this).parent().remove();$('#add_manager').show()" title="Delete this Category" style="top: 8px; right: 7px;"><i class="fa fa-trash"></i></span>
         </div>
    </div>    
    <div class="col-1-1">
	    <div class="btn btn-primary btn-icon fa-plus xpul40" style="display:none" id="add_manager">Add Manager</div>
    </div>
     <div class="clearfix"></div>
</div>

<div class="h-line ymrg30"></div>


<!-- Documetns Uploading Section -->

<div class="col-2-3 ymrg20">	
	 <h4 class="BlueRadialHead mrgbt10"><?php echo e(strtoupper( 'Documents' )); ?></h4>
      
      <!--- Add Script Section --->
    <div class="col-1-1 mrgbt20" id="script-doc-container">
    	<?php echo e(Form::label('script',trans('lang.script'),array('class'=>'it mrgbt5'))); ?>

        <div class="col-2-3">
        	<?php if($script->documents['Script']): ?>
            	<?php  $dox	=	App\Models\Documents::find($script->documents['Script']); ?>
                <?php echo e(Form::text('script',$dox->file_name,array('id'=>'script_value','class' => 'text it', 'placeholder' => 'Upload Script',"readonly"=>"readonly"))); ?>

                <?php echo e(Form::hidden("all_docs[Script]",$dox->id)); ?>  
            <?php else: ?>
        		<?php echo e(Form::text('script','',array('id'=>'script_value','class' => 'text it', 'placeholder' => 'Upload Script',"readonly"=>"readonly"))); ?>

            <?php endif; ?>
        </div>
        <div class="col-1-3">
        	<div class="col-1-3 addScript-add-docs">
                <i class="fa fa-upload" onClick="javascript:$('#docs_script').trigger('click')" title="Uplaod File"></i>
                <?php echo e(Form::file('script',array('class' => 'filebutton','accept'=>'application/pdf','onchange'=>'fileSelect("script_value",event); ' , 'id'=>'docs_script'))); ?>

            </div>    
            <div class="col-1-3 addScript-add-docs iframe-fancybox" href="<?php echo e(url('/myaccount/script-manager/my-documents/iframe?script=addScript.js&name=script_value#add_script')); ?>">
                <i class="fa fa-plus"></i>
                <?php echo e(Form::hidden('add_script','',array('id'=>'add_script'))); ?>

            </div>
            <div class="col-1-3 addScript-add-docs" onClick="javascript:$('#script-doc-container').remove()" ><i class="fa fa-trash"></i></div>
        </div>
    </div>
    <!--- Add Script Section --->
    
    
    <!--- Add Treatment Section --->    
    <div class="col-1-1 mrgbt20" id="treatment-doc-container">
    	<?php echo e(Form::label('treatment','Treatment',array('class'=>'it mrgbt5'))); ?>

        <div class="col-2-3">
        	<?php if($script->documents['Treatment']): ?>
            	<?php  $dox	=	App\Models\Documents::find($script->documents['Treatment']); ?>
                <?php echo e(Form::text('treatment',$dox->file_name,array('id'=>'treatment_value','class' => 'text it', 'placeholder' => 'Upload Script',"readonly"=>"readonly"))); ?>

                <?php echo e(Form::hidden("all_docs[Treatment]",$dox->id)); ?>  
            <?php else: ?>
        		<?php echo e(Form::text('treatment','',array('id'=>'treatment_value','class' => 'text it', 'placeholder' => 'Upload Script',"readonly"=>"readonly"))); ?>

            <?php endif; ?>
        	
        </div>
        <div class="col-1-3 ">
        	<div class="col-1-3 addScript-add-docs">
                <i class="fa fa-upload" onClick="javascript:$('#docs_treatment').trigger('click')" title="Uplaod File"></i>
                <?php echo e(Form::file('treatment',array('class' => 'filebutton','accept'=>'application/pdf','onchange'=>'fileSelect("treatment_value",event); ' , 'id'=>'docs_treatment'))); ?>

            </div>    
            <div class="col-1-3 addScript-add-docs iframe-fancybox" href="<?php echo e(URL::to('/myaccount/script-manager/my-documents/iframe?script=addScript.js&name=treatment_value#add_treatment')); ?>">
                <i class="fa fa-plus"></i>
                <?php echo e(Form::hidden('add_treatment','',array('id'=>'add_treatment'))); ?>

            </div>
            <div class="col-1-3 addScript-add-docs" onClick="javascript:$('#treatment-doc-container').remove()" ><i class="fa fa-trash"></i></div>
        </div>
    </div>
    <!--- Add Treatment Section --->    
    
    
    <!--- Add Script Coverage Section --->        
    <div class="col-1-1 mrgbt20" id="coverage-container">
    	<?php echo e(Form::label('script_coverage','Script Coverage',array('class'=>'it mrgbt5'))); ?>

        <div class="col-2-3">
        	<?php if($script->documents['Script Coverage']): ?>
            	<?php  $dox	=	App\Models\Documents::find($script->documents['Script Coverage']); ?>
                <?php echo e(Form::text('script_coverage',$dox->file_name,array('id'=>'script_coverage_value','class' => 'text it', 'placeholder' => 'Upload Script Coverage',"readonly"=>"readonly"))); ?>

                <?php echo e(Form::hidden("all_docs[Script Coverage]",$dox->id)); ?>  
            <?php else: ?>
        		<?php echo e(Form::text('script_coverage','',array('id'=>'script_coverage_value','class' => 'text it', 'placeholder' => 'Upload Script Coverage',"readonly"=>"readonly"))); ?>

            <?php endif; ?>
        
        	
        </div>
        <div class="col-1-3">
        	<div class="col-1-3 addScript-add-docs">
                <i class="fa fa-upload" onClick="javascript:$('#docs_script_coverage').trigger('click')" title="Uplaod File"></i>
                <?php echo e(Form::file('script_coverage',array('class' => 'filebutton','accept'=>'application/pdf','onchange'=>'fileSelect("script_coverage_value",event); ' , 'id'=>'docs_script_coverage'))); ?>

            </div>    
            <div class="col-1-3 addScript-add-docs iframe-fancybox" href="<?php echo e(URL::to('/myaccount/script-manager/my-documents/iframe?script=addScript.js&name=script_coverage_value#add_script_coverage')); ?>">
                <i class="fa fa-plus"></i>
                <?php echo e(Form::hidden('add_script_coverage','',array('id'=>'add_script_coverage'))); ?>

            </div>
            <div class="col-1-3 addScript-add-docs " onClick="javascript:$('#coverage-container').remove()" ><i class="fa fa-trash"></i></div>
        </div>
    </div>
    <!--- Add Script Coverage Section --->    
    
    <!--- Add Outline Section --->        
    <div class="col-1-1 mrgbt20" id="outline-container">
    	<?php echo e(Form::label('outline','Outline',array('class'=>'it mrgbt5'))); ?>

        <div class="col-2-3">
        	<?php if($script->documents['Outline']): ?>
            	<?php  $dox	=	App\Models\Documents::find($script->documents['Outline']); ?>
                <?php echo e(Form::text('outline',$dox->file_name,array('id'=>'outline_value','class' => 'text it', 'placeholder' => 'Upload Outline' , "readonly" => "readonly"))); ?>

                 <?php echo e(Form::hidden("all_docs[Outline]",$dox->id)); ?>  
            <?php else: ?>
        		<?php echo e(Form::text('outline','',array('id'=>'outline_value','class' => 'text it', 'placeholder' => 'Upload Outline' , "readonly" => "readonly"))); ?>

            <?php endif; ?>
        	
        </div>
        <div class="col-1-3">
        	<div class="col-1-3 addScript-add-docs">
                <i class="fa fa-upload" onClick="javascript:$('#docs_outline').trigger('click')" title="Uplaod File"></i>
                <?php echo e(Form::file('outline',array('class' => 'filebutton','accept'=>'application/pdf','onchange'=>'fileSelect("outline_value",event); ' , 'id'=>'docs_outline'))); ?>

            </div>    
            <div class="col-1-3 addScript-add-docs iframe-fancybox" href="<?php echo e(URL::to('/myaccount/script-manager/my-documents/iframe?script=addScript.js&name=outline_value#add_outline')); ?>">
                <i class="fa fa-plus"></i>
                <?php echo e(Form::hidden('add_outline','',array('id'=>'add_outline'))); ?>

            </div>
            <div class="col-1-3 addScript-add-docs" onClick="javascript:$('#outline-container').remove()" ><i class="fa fa-trash"></i></div>
        </div>
    </div>
    <!--- Add Outline Section ---> 
    
    <!--- Add Outline Section --->        
    <div class="col-1-1 mrgbt20" id="one-sheet-container">
    	<?php echo e(Form::label('one-sheet','One-Sheet',array('class'=>'it mrgbt5'))); ?>

        <div class="col-2-3">
        	<?php if($script->documents['One Sheet']): ?>
            	<?php  $dox	=	App\Models\Documents::find($script->documents['One Sheet']); ?>
                <?php echo e(Form::text('one-sheet',$dox->file_name,array('id'=>'one-sheet_value','class' => 'text it', 'placeholder' => 'Upload One-Sheet' , "readonly" => "readonly"))); ?>

                <?php echo e(Form::hidden("all_docs[One Sheet]",$dox->id)); ?>  
            <?php else: ?>
        		<?php echo e(Form::text('one-sheet','',array('id'=>'one-sheet_value','class' => 'text it', 'placeholder' => 'Upload One-Sheet' , "readonly" => "readonly"))); ?>

            <?php endif; ?>
        	
        </div>
        <div class="col-1-3">
        	<div class="col-1-3 addScript-add-docs">
                <i class="fa fa-upload" onClick="javascript:$('#docs_one-sheet').trigger('click')" title="Uplaod File"></i>
                <?php echo e(Form::file('one-sheet',array('class' => 'filebutton','accept'=>'application/pdf','onchange'=>'fileSelect("one-sheet_value",event); ' , 'id'=>'docs_one-sheet'))); ?>

            </div>    
            <div class="col-1-3 addScript-add-docs iframe-fancybox" href="<?php echo e(URL::to('/myaccount/script-manager/my-documents/iframe?script=addScript.js&one-sheet_value#add_one-sheet')); ?>">
                <i class="fa fa-plus"></i>
                <?php echo e(Form::hidden('add_one-sheet','',array('id'=>'add_one-sheet'))); ?>

            </div>
            <div class="col-1-3 addScript-add-docs" onClick="javascript:$('#one-sheet-container').remove()" ><i class="fa fa-trash"></i></div>
        </div>
    </div>
    <!--- Add Outline Section --->
    
     <!--- Add Character List Section --->        
    <div class="col-1-1 mrgbt20" id="charactor-container">
    	<?php echo e(Form::label('charactor_list','Character List',array('class'=>'it mrgbt5'))); ?>

        <div class="col-2-3">
        	<?php if($script->documents['Charactor List']): ?>
            	<?php  $dox	=	App\Models\Documents::find($script->documents['Charactor List']); ?>
                <?php echo e(Form::text('charactor_list',$dox->file_name,array('id'=>'charactor_list_value','class' => 'text it', 'placeholder' => 'Upload Character List' , "readonly" => "readonly"))); ?>

              <?php echo e(Form::hidden("all_docs[Charactor List]",$dox->id)); ?>  
            <?php else: ?>
        		<?php echo e(Form::text('charactor_list','',array('id'=>'charactor_list_value','class' => 'text it', 'placeholder' => 'Upload Character List' , "readonly" => "readonly"))); ?>

            <?php endif; ?>
        	
        </div>
        <div class="col-1-3">
        	<div class="col-1-3 addScript-add-docs">
                <i class="fa fa-upload" onClick="javascript:$('#docs_charactor_list').trigger('click')" title="Uplaod File"></i>
                <?php echo e(Form::file('charactor_list',array('class' => 'filebutton','accept'=>'application/pdf','onchange'=>'fileSelect("charactor_list_value",event); ' , 'id'=>'docs_charactor_list'))); ?>

            </div>    
            <div class="col-1-3 addScript-add-docs iframe-fancybox" href="<?php echo e(URL::to('/myaccount/script-manager/my-documents/iframe?script=addScript.js&nam=charactor_list_value#add_charactor_list')); ?>">
                <i class="fa fa-plus"></i>
                <?php echo e(Form::hidden('add_charactor_list','',array('id'=>'add_charactor_list'))); ?>

            </div>
            <div class="col-1-3 addScript-add-docs" onClick="javascript:$('#charactor-container').remove()" ><i class="fa fa-trash"></i></div>
        </div>
    </div>
    <!--- Add Character List Section ---> 
    
    
    <!---- other document list -->
    
<?php    $files=	['script'=>'Script','treatment'=>'Treatment','script_coverage'=>'Script Coverage','outline'=>'Outline','one-sheet'=>'One Sheet','charactor_list'=>'Charactor List']; 

?>
	<?php if(count($script->documents)): ?>
	<?php foreach($script->documents as $key => $otherdox): ?>
    
    <?php if(!in_array($key,$files)): ?>
    <div class="col-1-1 mrgbt20" id="ext-other-<?php echo e($otherdox); ?>">
    	<?php echo e(Form::label("other_docs[$othercount]['name']",$key,array('class'=>'it mrgbt5'))); ?>

        <div class="col-2-3">
        		<?php  $dox	=	App\Models\Documents::find($otherdox); ?>
                <?php echo e(Form::text("other_file_name_$otherdox",$dox->file_name,array('id'=>'other_file_name_'.$otherdox,'class' => 'text it', 'placeholder' => 'Upload Character List' , "readonly" => "readonly"))); ?>

            
        </div>
        <div class="col-1-3"> 
        	<div class="col-1-3 addScript-add-docs">
                <i class="fa fa-upload" onClick="javascript:$('#docs_other_<?php echo e($othercount); ?>').trigger('click')" title="Uplaod File"></i>
                <?php echo e(Form::file("other_docs[$otherdox][file]",array('class' => 'filebutton','accept'=>'application/pdf','onchange'=>"fileSelect('other_file_name_$otherdox',event); " , 'id'=>'docs_other_'.$othercount))); ?>

            </div>    
            <div class="col-1-3 addScript-add-docs iframe-fancybox" href="<?php echo e(URL::to('/myaccount/script-manager/my-documents/iframe?script=addScript.js&name=other_file_name_'.$otherdox.'#other_docs_value_'.$otherdox)); ?>">
                <i class="fa fa-plus"></i>
                <?php echo e(Form::hidden("other_docs_value_$otherdox",'',array('id'=>"other_docs_value_$otherdox"))); ?>

                <?php echo e(Form::hidden("other_docs[$otherdox][name]",$key)); ?>

                <?php echo e(Form::hidden("all_docs[$key]",$dox->id)); ?>

            </div>
            <div class="col-1-3 addScript-add-docs" onClick="javascript:$('#ext-other-<?php echo e($otherdox); ?>').remove()" ><i class="fa fa-trash"></i></div>
        </div>
    </div>
    <?php $othercount++; ?>
    <?php endif; ?>
    <?php endforeach; ?>
    <?php endif; ?>
    <!--- End other documents---->
    
    
    
    <div class="col-1-1" id="other_docs">
    </div>    
    <div class="col-1-1">
	    <div class="btn btn-primary btn-icon fa-plus xpul40" id="add_docs">Add Document</div>
    </div>
     <div class="clearfix"></div>
</div>

<!-- Documetns Uploading Section -->

<div class="h-line ymrg30"></div>

<!-- Save And Clear Buttons -->
<div class="col-1-1">
	<?php echo Form::submit("Save",['class'=>"btn btn-primary right xpul20 mrglft20",'id'=>"savBtn"]); ?>

    <?php echo Form::button("Reset",['class'=>"btn btn-primary right xpul20",'id'=>"resetBtn"]); ?>

</div>
<!-- Save And Clear Buttons -->
<?php echo Form::close(); ?>


<?php $__env->startPush('script'); ?>
	<?php echo Html::Script("public/js/specified/add-script.js"); ?>

    <?php echo Html::Script("public/plugins/tinymce/tinymce.min.js"); ?>

    
    <script>
		(function($){
			$(document).ready(function(e) {
                $("#add_cat").data('count',<?php echo e($CatCount); ?>);
				$("#add_writer").data('count',<?php echo e($WriterCount); ?>);
				$("#add_story").data('count',<?php echo e($StoryCount); ?>);
				$("#add_source").data('count',<?php echo e($sourceCount); ?>);
				$("#add_docs").data('count',0);
				enableDocIframe();
            });
		})(jQuery)
	</script>
<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.myaccount', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>