<div class="col-1-1 mrgtp10 Box xpul10 ypul20 sortable {{ ($question->type==1) ? "relative" : "" }}" id="arrayorder_{{$question->id}}">
    <div class="left">                        
        {{ Form::checkbox("questions[$question->id][]",$question->id,isset($data[$question->id]),["onclick"=>"ShowInst(this,'".$question->id."')"]) }}
        {{Form::hidden('hid_text',$question->title,['id'=>'hid_text_'.$question->id])}}
    </div>
    <div class="col-22-24 mrglft15">
        {{Form::label("questions[$question->id][]",$question->title,['class'=>'questions','id'=>"title_$question->id"])}}
    </div>
    <textarea name="questions[{{$question->id}}][]" class="text it questionint" rows="2" placeholder="Reader Instructions" id="int_{{$question->id}}"
       <?php if(isset($data[$question->id])) { ?> 
       style="display:block" <?php } ?> ><?php if(isset($data[$question->id])) { echo trim($data[$question->id][1]); } ?></textarea>
    <div class="clearfix"></div>    
    @if($question->type==1) 
        <div class="edit-temp-question">
                <a onclick="editqst({{$question->id}})" href="javascript:void(0);">
                    <i class="fa fa-pencil" title="Edit"></i>
                </a>
                <a onclick="deleteqst({{$question->id}})" href="javascript:void(0);" >
                    <i class="fa fa-trash-o" title="Remove"></i>
                 </a>
        </div>	
    @endif
</div>