<div class="col-1-1 mrgtp10 Box xpul10 ypul20 sortable <?php echo e(($question->type==1) ? "relative" : ""); ?>" id="arrayorder_<?php echo e($question->id); ?>">
    <div class="left">                        
        <?php echo e(Form::checkbox("questions[$question->id][]",$question->id,isset($data[$question->id]),["onclick"=>"ShowInst(this,'".$question->id."')"])); ?>

        <?php echo e(Form::hidden('hid_text',$question->title,['id'=>'hid_text_'.$question->id])); ?>

    </div>
    <div class="col-22-24 mrglft15">
        <?php echo e(Form::label("questions[$question->id][]",$question->title,['class'=>'questions','id'=>"title_$question->id"])); ?>

    </div>
    <textarea name="questions[<?php echo e($question->id); ?>][]" class="text it questionint" rows="2" placeholder="Reader Instructions" id="int_<?php echo e($question->id); ?>"
       <?php if(isset($data[$question->id])) { ?> 
       style="display:block" <?php } ?> ><?php if(isset($data[$question->id])) { echo trim($data[$question->id][1]); } ?></textarea>
    <div class="clearfix"></div>    
    <?php if($question->type==1): ?> 
        <div class="edit-temp-question">
                <a onclick="editqst(<?php echo e($question->id); ?>)" href="javascript:void(0);">
                    <i class="fa fa-pencil" title="Edit"></i>
                </a>
                <a onclick="deleteqst(<?php echo e($question->id); ?>)" href="javascript:void(0);" >
                    <i class="fa fa-trash-o" title="Remove"></i>
                 </a>
        </div>	
    <?php endif; ?>
</div>