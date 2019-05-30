<?php $__env->startSection('content'); ?>
	<h1 class="heading_tital"><?php echo e(trans('menu.script-manager.my-documents')); ?></h1>
    <?php echo e(Form::open(array('url' => 'myaccount/script-manager/my-documents/create', 'files' => true,'id'=>'add-documentform'))); ?>

    <div class="col-2-3">
    	 <div class="col-1-1 mrgbt15">
            <?php echo e(Form::label('title',trans('lang.doc-title'),['class'=>'it mrgbt5'])); ?>

            <?php echo e(Form::text('title','',array('class'=>'text textInput it','placeholder'=>trans('lang.doc-title')))); ?>

        </div>
        <div class="col-1-1 mrgbt15">
            <?php echo e(Form::label('type',trans('lang.doc-cat'),array('class'=>'it mrgbt5'))); ?>

            <?php echo e(Form::select('type',docTypeList(),'',['class'=>'col-1-1'])); ?>

        </div>
        <div class="col-1-1 mrgbt15">
            <?php echo e(Form::label('draft',trans('lang.draft'),['class'=>'it mrgbt5'])); ?>

            <?php echo e(Form::text('draft','',array('class'=>'text textInput it','placeholder'=>trans('lang.draft')))); ?>

        </div>
        <div class="col-1-1 mrgbt15">
            <?php echo e(Form::label('description',trans('lang.description'),['class'=>'it mrgbt5'])); ?>

            <?php echo e(Form::textarea('description','',array('class'=>'text textInput it','placeholder'=>trans('lang.description'),'rows'=>2))); ?>

        </div>
       
        <div class="col-1-1 mrgbt30">
        	<div class="col-1-1  mrgbt5">
            	<?php echo e(Form::label('upload_document_name',trans('lang.upload-doc'),['class'=>'it'])); ?>  
            </div>
		   <div class="col-2-5">
           	<?php echo Form::text('upload_document_name','',array('class' => 'textInput it text', 'placeholder' => trans('lang.upload-doc'),"readonly"=>"readonly",'required')); ?>

           </div>
        	<div class="col-1-5  mrglft20 filebutton-div">
                <div class="col-1-1 pul10 filebutton-label">Browse...</div>
                <?php echo Form::file("upload_document" ,["onchange"=>"fileSelect('upload_document_name',event);", "class"=>"filebutton", "id"=>"fileUpload",'accept'=>'application/pdf,.docx,dox,.xls,.xlsx'] ); ?>

            </div>
            <div class="col-1-5 mrglft20" style="line-height:32px;">
            PDF, Word and Excel files only
            </div>
        </div>
        
        <div class="h-line ymrg30"></div>

        <!-- Save And Clear Buttons -->
        <div class="col-1-1">
            <?php echo Form::submit("Save",['class'=>"btn btn-primary right xpul20 mrglft20",'id'=>"savBtn"]); ?>

            <?php echo Form::button("Reset",['class'=>"btn btn-primary right xpul20",'id'=>"resetBtn", 'type'=>'reset']); ?>

        </div>
        <!-- Save And Clear Buttons -->
    </div>
    
    <?php echo e(Form::close()); ?>

    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.myaccount', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>