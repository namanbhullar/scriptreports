<?php $__env->startSection('content'); ?>

<?php $__env->startPush('script'); ?>
    <?php echo e(Html::script('public/js/jquery-ui.js')); ?>    
    <?php echo e(Html::script('public/js/specified/template-next.js')); ?>    
<?php $__env->stopPush(); ?>
<h1 class="heading_tital">Script Rater Evaluation Tool</h1>
<div class="col-1-1 script-evaluation-pera">
	 <P>Makes it easier to get multiple feedback and compare notes. Because all readers “score” the same questions on a scale of 1-5, a quantitative pattern emerges that pinpoints weaknesses to help decide which changes merit consideration.  </P>
     <p>You have the option to write your own questions and categories or select from those based on universal screenwriting principles.</p>
</div>

<div class="col-1-1">
	<div class="col-5-7">
    	<div class="col-1-1">
        	<h3 class="left"><?php echo e(App\Models\Categories::find($post_cat_id)->title); ?></h3>
            <div class="right btn btn-icon btn-primary fa-plus" onclick="AddQuestionPopup()">Add Question</div>
        </div>
        <div  class="col-1-1">
        	<?php echo Form::model($data,array('route' => array('template.next',$id),'id'=>'Next_form')); ?>

            <div id="questions-div" class="col-1-1">
            	<?php foreach($questions as $question): ?>
                	<?php echo view('report-template.question')->with(['question'=>$question,'data'=>$data]); ?>

                <?php endforeach; ?>
            </div>
            <div class="col-1-1 ymrg20">
            <a class="btn btn-primary fa-chevron-left btn-icon mrgrt15 xpul50" onclick="NextPrevioussSubmit('previous','<?php echo e($prevcat); ?>')">Previous</a>
            <a class="btn btn-primary fa-chevron-right btn-icon-right  xpul50" onclick="NextPrevioussSubmit('next','<?php echo e($nextcat); ?>')">Next</a>
            <?php echo e(Form::button('Preview Template',array('class'=>'btn btn-primary bg-template-wh btn-icon xpul50 right', 'onclick'=>'PreviewTempalte("'.$template_id.'")'))); ?>    
            </div>
                    
                
                <?php echo e(Form::hidden('current_cat_id',$post_cat_id)); ?>

                <?php echo e(Form::hidden('post_cat_id',$post_cat_id,['id'=>'post_cat_id'])); ?>

                <?php echo e(Form::hidden('post_template',0,['id'=>'post_template'])); ?>

                <?php echo Form::close(); ?>

        </div>
        <div class="clearfix"></div>
    </div>
    <div class="col-2-7 pullft20">
    	<div class="col-1-1 BorderBox mrgbt20">
            <div class="col-1-1  bgBlue">
                <h5 class="headonBlue">Categories</h5>
            </div>
            <div class="col-1-1 pul15">
            	<ul id="template-cat" class="tem-nav-categories">
            	<?php foreach($categories as $category): ?>
                	<li class="<?php echo ($category->id==$post_cat_id) ? 'active' : ''; ?> <?php echo e(($category->type==1) ? 'relative' : ""); ?> ">
                    	<a onclick="submiteForm('<?php echo e($category->id); ?>')" href="javascript:void();" id="cat_title_<?php echo e($category->id); ?>" title="<?php echo e($category->title); ?>">
                        	<?php echo e(str_limit($category->title,20)); ?>

                        </a>
                        <?php if($category->type==1): ?>
                        <ul class="x-icons">
                            <li>
                                    <i onclick="editcat(<?php echo e($category->id); ?>)" class="fa fa-pencil" title="Edit"></i>
                            </li>
                            <li>        
                                    <i class="fa fa-trash-o" title="Remove" onclick="deletecat(<?php echo e($category->id); ?>)"></i>
                               
                            </li>
                        </ul>
                        <?php endif; ?>
                        <input type="hidden" value="<?php echo e($category->title); ?>" id="hid_cattext_<?php echo e($category->id); ?>" />
                    </li>
                <?php endforeach; ?>
                </ul>
            </div>
            <div class="col-1-1 ymrg15" >
            	<div class="btn btn-primary btn-icon fa-plus right mrgrt10" id="AddCustomCate">Add Category</div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>

    
   
 	
    <div style="display:none">
    <!-- Add custom quetions   -->
    	<div id="addQuestion" class="col-1-1">
      		<h3 class="blue-head mrg0">Add Question</h3>
            <?php echo e(Form::open(array('route' => 'template.addquestion','id'=>'Addquestion_form'))); ?>

            <div class="col-1-1 pul20 ">
                <div class="col-1-1 margtp15">
                    <?php echo e(Form::textarea('title',null,array('class' => 'text textArea it', 'placeholder' => 'Type Your Question  here',required,'rows'=>'3'))); ?>

                </div>
                <div class="col-1-1 ymrg5">
                    <h5 style="color:#000;float:left;"><b>Note : </b>Make certain to checkmark the box with your question.</h5>
                </div>
                <div class="col-1-1 ymrg5">
                    <?php echo e(Form::button('Add Question',array('class'=>'btn btn-icon btn-primary fa-plus right','id'=>'AddQuestionBtn'))); ?>

                </div>
            </div>
            <?php echo e(Form::hidden('post_cat_id',$post_cat_id)); ?>

            <?php echo e(Form::close()); ?>

       </div>
       <!-- Add custom quetions   -->
       
       <!-- Edit quetions part -->
       <div id="editQuetions" class="col-1-1">
       		<h3 class="blue-head mrg0">Edit Question</h3>
            <?php echo e(Form::open(array('route' => 'template.updateqestion','id'=>'Editquestion_form'))); ?>

            <div class="col-1-1 pul20 ">
                <div class="col-1-1 margtp15">
                   <?php echo e(Form::textarea('updated_title',null,array('class' => 'text textArea it',required,'rows'=>'3','id'=>'edit_q'))); ?>

                </div>
                <div class="col-1-1 ymrg10">
                    <?php echo e(Form::button('Update Question',array('class'=>'btn btn-icon btn-primary fa-edit right','id'=>'UPdateQuestion'))); ?>

                </div>
            </div>
            <?php echo e(Form::hidden('question_id','',['id'=>'question_id'])); ?>

            <?php echo e(Form::close()); ?>

       </div>
       <!-- Edit quetions part -->
       
       <!-- Delete Question Alert-->
       	<div id="DeleteQuetions" class="col-1-1" style="min-width:500px;">
       		<h3 class="blue-head mrg0">Delete This Question ?</h3>
            <?php echo e(Form::open(array('route' => 'template.deletequestion','id'=>'deleteQuestion'))); ?>

            <div class="col-1-1 pul20 ">
                <div class="col-1-1 margtp15" >
                	<h5 id="question_delete_text"> Q. <span><span></h5>
                </div>
                <div class="col-1-1 mrgtp20">
                    <?php echo e(Form::button('No',array('class'=>'btn btn-icon btn-primary fa-times right','id'=>'QDeleteCancel'))); ?>

                    <?php echo e(Form::button('Yes',array('class'=>'btn btn-icon btn-primary fa-check right mrgrt15','id'=>'QDeleteConfirm'))); ?>

                </div>
            </div>
            <?php echo e(Form::hidden('question_id','')); ?>

            <?php echo e(Form::close()); ?>

       </div>
       <!-- Delete Question Alert-->
       
       
       <!-- Add Custom Category -->
       <div id="addCategory" class="col-1-1">
      		<h3 class="blue-head mrg0">Add Category</h3>
            <?php echo e(Form::open(array('route' => 'template.addcategory','id'=>'addCategoryForm'))); ?>

            <div class="col-1-1 pul20 ">
                <div class="col-1-1 margtp15">
                    <?php echo e(Form::textarea('title',null,array('class' => 'text textArea it', 'placeholder' => 'Type Your Category title here',required,'rows'=>'3'))); ?>

                </div>
                <div class="col-1-1 ymrg5">
                    <?php echo e(Form::button('Add Category',array('class'=>'btn btn-icon btn-primary fa-plus right','id'=>'AddCategoryBtn'))); ?>

                </div>
            </div>
            <?php echo e(Form::close()); ?>

       </div>
       	
       <!-- Add Custom Category End-->
       
       <!-- Edit Custom Category Start-->
       	<div id="editCategory" class="col-1-1">
      		<h3 class="blue-head mrg0">Edit Category</h3>
            <?php echo e(Form::open(array('route' => 'template.updatecategory','id'=>'editCategoryForm'))); ?>

            <div class="col-1-1 pul20 ">
                <div class="col-1-1 margtp15">
                    <?php echo e(Form::textarea('updated_title',null,array('class' => 'text textArea it', 'placeholder' => 'Type Your Category title here',required,'rows'=>'3'))); ?>

                </div>
                <div class="col-1-1 ymrg5">
                    <?php echo e(Form::button('Update Category',array('class'=>'btn btn-icon btn-primary fa-plus right','id'=>'UpdateCategoryBtn'))); ?>

                </div>
            </div>
            <?php echo e(Form::hidden('category_id','',['id'=>'category_id'])); ?>

            <?php echo e(Form::close()); ?>

       </div>
       <!-- Edit Custom Category End-->
       
       <!-- Edit Question Alert-->
       	<div id="DeleteCaTpop" class="col-1-1" style="min-width:500px;">
       		<h3 class="blue-head mrg0">Delete This Category ?</h3>
            <?php echo e(Form::open(array('route' => 'template.deleteCategory','id'=>'deleteCategory'))); ?>

            <div class="col-1-1 pul20 ">
                <div class="col-1-1 margtp15" >
                	<h5 id="category_delete_text"></h5>
                </div>
                <div class="col-1-1 mrgtp20">
                    <?php echo e(Form::button('No',array('class'=>'btn btn-icon btn-primary fa-times right','id'=>'CatDeleteCancel'))); ?>

                    <?php echo e(Form::button('Yes',array('class'=>'btn btn-icon btn-primary fa-check right mrgrt15','id'=>'CatDeleteConfirm'))); ?>

                </div>
            </div>
            <?php echo e(Form::hidden('category_id','')); ?>

            <?php echo e(Form::close()); ?>

       </div>
       <!-- Edit Question Alert-->
       
    </div>
    
     
     

    
<script type="text/javascript">
 	
	
	function AddCategoryPopUP(){
		
		var top = parseInt($(document).scrollTop())+parseInt(130);
		document.getElementById('addcategory').style.top = top+'px';
		document.getElementById('addcategory').style.display='block';
		document.getElementById('fade').style.display='block'	
	}
	
	
	function submiteForm(id){
			
			$("#post_cat_id").val(id);
			$("#post_template").val('0');
			$("#Next_form").submit();		
			
	}
	
	function NextPrevioussSubmit(type,id){
		
			if(type=='next'){
				if(id==0)
					return false;
					
				$("#post_cat_id").val(id);
				$("#Next_form").submit();		
			}else{
				
				if(id==0){
						var url = '<?php echo e(URL::to("/myaccount/report-template/$id/edit")); ?>';
						window.location.href=url;
				}else{
					$("#post_cat_id").val(id);
					$("#Next_form").submit();		
				}
			}
				
	}
	
	
	
	
	
 </script> 
 
<script type="text/javascript">
var $	=	jQuery;
$(document).ready(function(){ 	
	
	$(function() {
		$("#questions-div").sortable({ opacity: 0.8, cursor: 'move', update: function() {
			var order = $(this).sortable("serialize")+'&temp_id=<?php echo e($id); ?>&category_id=<?php echo e($post_cat_id); ?>'; 
			$.ajax({
				url:'<?php echo e(URL::to('/myaccount/report-template/UpdateCustomOrder')); ?>', 
				data:order,
				type:'post',
				headers:{'X-CSRF-TOKEN':TOKEN},
				success:function(theResponse){
					FlashMessage('Question Ordering successfully saved',true);
				}
			}); 															 
		}								  
		});
	});

});	
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.myaccount', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>