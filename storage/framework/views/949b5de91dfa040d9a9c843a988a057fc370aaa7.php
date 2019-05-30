<?php

if(!isset($project)){
	$count	=	request()->get('count');
	$project	=	new stdClass();
	$project->id	=	0;
	$project->title	=	NULL;
	$project->status	=	NULL;
	$project->form	=	NULL;
	$project->genre	=	NULL;
	$project->subgenre	=	NULL;
	$project->pages	=	NULL;
	$project->script	=	NULL;
	$project->document_name	=	NULL;
	$project->document_id	=	NULL;
	$project->permissions	=	NULL;
	
}
else
{
	$project->load('scriptFile');
}

 ?>

    <div class="col-1-1 mrgbt10">
        <div class="pull-left">
            <h5><?php echo e(trans('lang.project')); ?> <?php echo e($count); ?></h5>
        </div>
        <div class="pull-right ">
            <span class="delete_btn mrg10" title="Delete Script" onClick="javascript:$('#profileProject<?php echo e($count); ?>').remove()"><i class="fa fa-trash"></i></span>
        </div>
    </div>
    <div class="col-1-1 mrgbt15">
        <?php echo e(Form::label("project[$count][title]",trans('lang.title'),['class'=>'it mrgbt5'])); ?>

        <?php echo e(Form::text("project[$count][title]",$project->title,array('class'=>'text textInput it','placeholder'=>trans('lang.title')))); ?>

    </div>
    
    <?php if($project->id == 0): ?>
    
        <div class="col-1-1 mrgbt15" id="Formdiv">
            <?php $formlist	=	FormList(); ?>
            <?php echo e(Form::label("project[$count][form][0]",trans('lang.form'),array('class'=>'it mrgbt5'))); ?>

            <?php echo e(Form::select("project[$count][form][0]",$formlist,$project->form,['class'=>'col-1-1','onchange'=>'checkOhter(event)'])); ?>

        </div>
        
        <div class="col-1-1 mrgbt15" id="Genrediv">
            <?php $genrelist	=	GenreList(); ?>
            <?php echo e(Form::label("project[$count][genre][0]",trans('lang.genre'),array('class'=>'it mrgbt5'))); ?>

            <?php echo e(Form::select("project[$count][genre][0]",$genrelist,$project->genre,['class'=>'col-1-1','onchange'=>'checkOhter(event)'])); ?>

        </div>
        
        <div class="col-1-1 mrgbt15" id="Subgenrediv">
            <?php $subgenrelist	=	SubGenreList(); ?>
            <?php echo e(Form::label("project[$count][subgenre][0]",trans('lang.sub-genre'),array('class'=>'it mrgbt5'))); ?>

            <?php echo e(Form::select("project[$count][subgenre][0]",$subgenrelist,$project->subgenre,['class'=>'col-1-1','onchange'=>'checkOhter(event)'])); ?>

        </div>
    
    <?php else: ?>
    
        <div class="col-1-1 mrgbt15" id="Formdiv">
            <?php $formlist	=	FormList();$formValue	=	$project->form; ?>
            
            <?php echo e(Form::label("project[$count][form][0]",trans('lang.form'),array('class'=>'it mrgbt5'))); ?>

            <?php echo e(Form::select("project[$count][form][0]",$formlist,$formValue[0],['class'=>'col-1-1','onchange'=>'checkOhter(event)'])); ?>

            
            <?php if(strtolower($formValue[0]) == 'other'): ?>
                <?php echo e(Form::text("project[$count][form][1]",$formValue[1],["class"=>"text textInput it mrgtp8 form","placeholder"=>trans('lang.custom-form-placehlder')])); ?>

            <?php endif; ?>
        </div>
        
        <div class="col-1-1 mrgbt15" id="Genrediv">
            <?php $genrelist	=	GenreList(); $genreValue	=	$project->genre; ?>
           
            <?php echo e(Form::label("project[$count][genre][0]",trans('lang.genre'),array('class'=>'it mrgbt5'))); ?>

            <?php echo e(Form::select("project[$count][genre][0]",$genrelist,$genreValue[0],['class'=>'col-1-1','onchange'=>'checkOhter(event)'])); ?>

            
             <?php if(strtolower($genreValue[0]) == 'other'): ?>
                <?php echo e(Form::text("project[$count][genre][1]",$genreValue[1],["class"=>"text textInput it mrgtp8 genre","placeholder"=>trans('lang.custom-genre-placehlder')])); ?>

            <?php endif; ?>
        </div>
        
        <div class="col-1-1 mrgbt15" id="Subgenrediv">
            <?php $subgenrelist	=	SubGenreList(); $subgenreValue	=	$project->subgenre; ?>
            <?php echo e(Form::label("project[$count][subgenre][0]",trans('lang.sub-genre'),array('class'=>'it mrgbt5'))); ?>

            <?php echo e(Form::select("project[$count][subgenre][0]",$subgenrelist,$subgenreValue[0],['class'=>'col-1-1','onchange'=>'checkOhter(event)'])); ?>

            
            <?php if(strtolower($subgenreValue[0]) == 'other'): ?>
                <?php echo e(Form::text("project[$count][subgenre][1]",$subgenreValue[1],["class"=>"text textInput it mrgtp8 subgenre","placeholder"=>trans('lang.custom-subgenre-placehlder')])); ?>

            <?php endif; ?>
        </div>
            
    <?php endif; ?>
    
    
    
     <div class="col-1-1 mrgbt15">
        <?php echo e(Form::label("project[$count][minutes]",trans('lang.minutes'),['class'=>'it mrgbt5'])); ?>

        <?php echo e(Form::text("project[$count][minutes]",$project->minutes,array('class'=>'text textInput it','placeholder'=>trans('lang.minutes')))); ?>

    </div>
    
     <div class="col-1-1 mrgbt15">
        <?php echo e(Form::label("project[$count][rating]",trans('lang.rating'),['class'=>'it mrgbt5'])); ?>

        <?php echo e(Form::text("project[$count][rating]",$project->rating,array('class'=>'text textInput it','placeholder'=>trans('lang.rating')))); ?>

    </div>
    
    <div class="col-1-1 mrgbt15">
        <?php echo e(Form::label("project[$count][release_date]",trans('lang.release-date'),['class'=>'it mrgbt5'])); ?>

        <?php echo e(Form::text("project[$count][release_date]",$profileScript->release_date,array('class'=>'text textInput it','placeholder'=>trans('lang.release-date')))); ?>

    </div>
    
     <div class="col-1-1 mrgbt15">
        <?php echo e(Form::label("project[$count][link]",trans('lang.link-more-info'),['class'=>'it mrgbt5'])); ?>

        <?php echo e(Form::text("project[$count][link]",$project->link,array('class'=>'text textInput it','placeholder'=>trans('lang.link-more-info')))); ?>

    </div>
    
    <div class="col-1-1 mrgbt15">
        <?php echo e(Form::label("project[$count][brief]",trans('lang.brief-description'),['class'=>'it mrgbt5'])); ?>

        <?php echo e(Form::textarea("project[$count][brief]",$project->brief,array('class'=>'text textInput it','placeholder'=>trans('lang.brief-description')))); ?>

    </div>
    
    <div class="col-1-1 mrgbt15">
        <div class="col-1-1">
        	<?php $status	=	($project->id != 0) ? "no_change" : "no-select";?>
            <?php echo Form::label("project[$count][poster]",'Upload Poster',['class'=>'it mrgbt5']); ?>

            <?php echo Form::hidden("project[$count][poster_file_status]",$status,['id'=>"profject_image".$count."_status"]); ?>

        </div>
        <div class="col-1-1 relative">
            <div class="col-3-6 pulrt20">
                <input type="text" value="<?php echo e($project->poster); ?>" name="project[<?php echo e($count); ?>][poster]" placeholder="Upload Poster" id="projectPoster<?php echo e($count); ?>" class="browse text textInput it">
            </div>
            <div class="col-1-6  filebutton-div">
                <div class="col-1-1 pul10 filebutton-label">Browse...</div>
                <input type="file" name="projectPoster[<?php echo e($count); ?>]" class="filebutton" id="sample_coverageimg<?php echo e($count); ?>" onchange="checkProjectPoster(<?php echo e($count); ?>,event)">
            </div>
            <div class="col-7-24 pull-left pullft10">
                <i><?php echo e(trans('lang.image-file-only')); ?></i>
            </div>  
            <span class="delete_btn mrg10" title="Delete Script" onClick="javascript:$('#profject_image<?php echo e($count); ?>_status').val('no-select');$('#projectPoster<?php echo e($count); ?>').val('')">
            <i class="fa fa-trash"></i>
            </span>                        
            <div class="clearfix"></div>                       
        </div>
                         
        <div class="clearfix"></div>     
    </div>
    
    <div class="col-1-1 mrgbt15">
        <div class="col-1-1">
	        <?php $status	=	($project->id != 0) ? "no_change" : "no-select";?>
            <?php echo Form::label("project[$count][script]",'Upload Script',['class'=>'it mrgbt5']); ?>

            <?php echo Form::hidden("project[$count][script_file_status]",$status,['id'=>"profject_script".$count."_status"]); ?>

        </div>
        <div class="col-1-1 relative">
            <div class="col-3-6 pulrt20">
                <input type="text" value="<?php echo e($project->scriptFile->file_name); ?>" name="project[<?php echo e($count); ?>][script]" placeholder="Upload Script" id="pojectscriptname<?php echo e($count); ?>" class="browse text textInput it">
            </div>
            <div class="col-1-6  filebutton-div">
                <div class="col-1-1 pul10 filebutton-label">Browse...</div>
                <input type="file" accept="application/pdf" name="projectScript[<?php echo e($count); ?>]" class="filebutton" id="sample_coverageimg" onchange="checkProjectScript(<?php echo e($count); ?>,event)">
            </div>
            <div class="col-7-24 pull-left pullft10">
                <i>pdf file Only</i>
            </div>
            <span class="delete_btn mrg10" title="Delete Script" onClick="javascript:$('#profject_script<?php echo e($count); ?>_status').val('no-select');$('#pojectscriptname<?php echo e($count); ?>').val('')">
            <i class="fa fa-trash"></i>
            </span>                       
            <div class="clearfix"></div>                       
        </div>
        <div class="clearfix"></div>                       
    </div>
    
    
   
    
    
    <?php echo e(Form::hidden("project[$count][id]",$project->id)); ?>