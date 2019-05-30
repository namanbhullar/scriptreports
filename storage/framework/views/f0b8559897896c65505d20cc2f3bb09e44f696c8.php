<?php
if(!isset($profileScript)){
	$count	=	request()->get('count');
	$profileScript	=	new stdClass();
	$profileScript->id	=	0;
	$profileScript->title	=	NULL;
	$profileScript->status	=	NULL;
	$profileScript->form	=	NULL;
	$profileScript->genre	=	NULL;
	$profileScript->subgenre	=	NULL;
	$profileScript->pages	=	NULL;
	$profileScript->script	=	NULL;
	$profileScript->document_name	=	NULL;
	$profileScript->document_id	=	NULL;
	$profileScript->permissions	=	NULL;
	
}else{
	$profileScript->load('scriptFile');	
}

 ?>
 

    <div class="col-1-1 mrgbt10">
        <div class="pull-left">
            <h4>Script <?php echo e($count); ?></h4>
        </div>
        <div class="pull-right ">
            <span class="delete_btn mrg10" title="Delete Script" onClick="javascript:$('#profileScript<?php echo e($count); ?>').remove()"><i class="fa fa-trash"></i></span>
        </div>
    </div>
    
    <div class="col-1-1 mrgbt15">
        <div class="col-1-1">
        	<?php $status	=	($profileScript->id != 0) ? "no_change" : "no-select";?>
            <?php echo Form::label("script[$count][script]",'Upload Script',['class'=>'it mrgbt5']); ?>

            <?php echo Form::hidden("script[$count][script_file_status]",$status,['id'=>"file_".$count."_status"]); ?>

        </div>
        <div class="col-1-1 relative">
            <div class="col-3-6 pulrt20">
                <input type="text" value="<?php echo e($profileScript->scriptFile->file_name); ?>" name="script[<?php echo e($count); ?>][script]" placeholder="Upload Script" id="scriptname<?php echo e($count); ?>" class="browse text textInput it" required>
            </div>
            <div class="col-1-6  filebutton-div">
                <div class="col-1-1 pul10 filebutton-label">Browse...</div>
                <input type="file" accept="application/pdf" name="scriptFile[<?php echo e($count); ?>]" class="filebutton" id="sample_coverageimg" onChange="checkScript(<?php echo e($count); ?>,event)">
                
            </div>
            <div class="col-7-24 pull-left pullft10">
                <i>pdf file Only</i>
            </div>       
            <span class="delete_btn mrg10" title="Delete Script" onClick="javascript:$('#file_<?php echo e($count); ?>_status').val('no-select');$('#scriptname<?php echo e($count); ?>').val('')">
            <i class="fa fa-trash"></i>
            </span>                  
            <div class="clearfix"></div>                       
        </div>
        <div class="clearfix"></div>                       
    </div>
    
    <div class="col-1-1 mrgbt15">
        <?php echo e(Form::label("script[$count][title]",'Title',['class'=>'it mrgbt5 required'])); ?>

        <?php echo e(Form::text("script[$count][title]",$profileScript->title,array('class'=>'text textInput it','placeholder'=>"Title",'required'))); ?>

    </div>
   
    
    <?php if($profileScript->id == 0): ?>
    
    	<div class="col-1-1 mrgbt15" id="Formdiv">
			<?php $formlist	=	FormList(); ?>
            <?php echo e(Form::label("script[$count][form][0]",trans('lang.form'),array('class'=>'it mrgbt5 required'))); ?>

            <?php echo e(Form::select("script[$count][form][0]",$formlist,$profileScript->form,['class'=>'col-1-1','onchange'=>'checkOhter(event)','required'])); ?>

        </div>
        
        <div class="col-1-1 mrgbt15" id="Genrediv">
            <?php $genrelist	=	GenreList(); ?>
            <?php echo e(Form::label("script[$count][genre][0]",trans('lang.genre'),array('class'=>'it mrgbt5 required'))); ?>

            <?php echo e(Form::select("script[$count][genre][0]",$genrelist,$profileScript->genre,['class'=>'col-1-1','onchange'=>'checkOhter(event)','required'])); ?>

        </div>
        
        <div class="col-1-1 mrgbt15" id="Subgenrediv">
            <?php $subgenrelist	=	SubGenreList(); ?>
            <?php echo e(Form::label("script[$count][subgenre][0]",trans('lang.sub-genre'),array('class'=>'it mrgbt5 required'))); ?>

            <?php echo e(Form::select("script[$count][subgenre][0]",$subgenrelist,$profileScript->subgenre,['class'=>'col-1-1','onchange'=>'checkOhter(event)','required'])); ?>

        </div>
    	
    <?php else: ?>
    
    	<div class="col-1-1 mrgbt15" id="Formdiv">
			<?php $formlist	=	FormList();$formValue	=	$profileScript->form; ?>
            
            <?php echo e(Form::label("script[$count][form][0]",trans('lang.form'),array('class'=>'it mrgbt5 required'))); ?>

            <?php echo e(Form::select("script[$count][form][0]",$formlist,$formValue[0],['class'=>'col-1-1','onchange'=>'checkOhter(event)'])); ?>

            
            <?php if(strtolower($formValue[0]) == 'other'): ?>
            	<?php echo e(Form::text("script[$count][form][1]",$formValue[1],["class"=>"text textInput it mrgtp8 form","placeholder"=>trans('lang.custom-form-placehlder')])); ?>

            <?php endif; ?>
        </div>
        
        <div class="col-1-1 mrgbt15" id="Genrediv">
            <?php $genrelist	=	GenreList(); $genreValue	=	$profileScript->genre; ?>
           
            <?php echo e(Form::label("script[$count][genre][0]",trans('lang.genre'),array('class'=>'it mrgbt5 required'))); ?>

            <?php echo e(Form::select("script[$count][genre][0]",$genrelist,$genreValue[0],['class'=>'col-1-1','onchange'=>'checkOhter(event)','required'])); ?>

            
             <?php if(strtolower($genreValue[0]) == 'other'): ?>
            	<?php echo e(Form::text("script[$count][genre][1]",$genreValue[1],["class"=>"text textInput it mrgtp8 genre","placeholder"=>trans('lang.custom-genre-placehlder')])); ?>

            <?php endif; ?>
        </div>
        
        <div class="col-1-1 mrgbt15" id="Subgenrediv">
            <?php $subgenrelist	=	SubGenreList(); $subgenreValue	=	$profileScript->subgenre; ?>
            <?php echo e(Form::label("script[$count][subgenre][0]",trans('lang.sub-genre'),array('class'=>'it mrgbt5 '))); ?>

            <?php echo e(Form::select("script[$count][subgenre][0]",$subgenrelist,$subgenreValue[0],['class'=>'col-1-1','onchange'=>'checkOhter(event)'])); ?>

            
            <?php if(strtolower($subgenreValue[0]) == 'other'): ?>
            	<?php echo e(Form::text("script[$count][subgenre][1]",$subgenreValue[1],["class"=>"text textInput it mrgtp8 subgenre","placeholder"=>trans('lang.custom-subgenre-placehlder')])); ?>

            <?php endif; ?>
        </div>
    	
    <?php endif; ?>
    
     <div class="col-1-1 mrgbt15">
        <?php echo e(Form::label("script[$count][pages]",Pages,['class'=>'it mrgbt5 required'])); ?>

        <?php echo e(Form::text("script[$count][pages]",$profileScript->pages,array('class'=>'text textInput it','placeholder'=>"Pages",'required'))); ?>

    </div>
     
    
    
     <div class="col-1-1 mrgbt15">
        <?php echo e(Form::label("script[$count][logline]",Logline,['class'=>'it mrgbt5 required'])); ?>

        <?php echo e(Form::textarea("script[$count][logline]",$profileScript->logline,array('class'=>'text textInput it','placeholder'=>"Logline",'required'))); ?>

        
    </div>
   
    
    
   <div class="col-1-1 mrgbt15">
        <?php echo e(Form::label("script[$count][status]",'Script Status',['class'=>'it mrgbt5'])); ?>

        <?php echo e(Form::select("script[$count][status]",[
                                    "Available"=>"Available",
                                    "Optioned"=>"Optioned",
                                    "Sold"=>"Sold",
                                    "Produced"=>"Produced"
                                ],$profileScript->status,array('class'=>'text textInput it'))); ?>

    </div>
    
    <div class="col-1-1 mrgbt15">
        <?php echo e(Form::label("script[$count][permissions]",'Permissions',['class'=>'it mrgbt5'])); ?>

        <?php echo e(Form::select("script[$count][permissions]",[
                                    "View"=>"View",
                                    "Request"=>"Request"
                                ],$profileScript->permissions,array('class'=>'text textInput it'))); ?>

    </div>
    
    
    
    
    <?php echo e(Form::hidden("script[$count][id]",$profileScript->id)); ?>

    
   