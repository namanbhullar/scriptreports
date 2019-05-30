@extends('layouts.myaccount')

@section('content')

@push('script')
	{!! Html::script('public/plugins/simpleslider/simple-slider.js') !!}
	{!! Html::script('public/old/common.js') !!}
    {!! Html::script('public/old/ajax.js') !!}
@endpush
 <?php 
 
 	$data	=	unserialize($script->data);
	$script->load('privatenote');
	//dump($script);
	$user			=	$owner->profile;
	$titlearray		=	($user->title!='') ? unserialize($user->title) : ''; 
	$ptitle	    	=	(count($titlearray)>1 && $titlearray[0]=='Other') ? $titlearray[1] : $titlearray[0];
	
	$formarray		=	!empty($template->form) ? $template->form : array(); 
	$formtext	    =	(count($formarray)>1 && $formarray[0]=='Other') ? $formarray[1] : $formarray[0];
	
	$genrearray		=	!empty($template->genre) ? $template->genre : array(); 
	$genretext	    =	(count($genrearray)>1 && $genrearray[0]=='Other') ? $genrearray[1] : $genrearray[0];
	$subgenarray	=	!empty($template->subgenre) ? $template->subgenre : array(); 
	$subgentext	    =	(count($subgenarray)>1 && $subgenarray[0]=='Other') ? $subgenarray[1] : $subgenarray[0];
	
	
	
?>	
<div class="item-box pul20 preTemplate">
	<div class="col-1-8 user-thumbline">
    	{!! $owner->profile->image !!}        
    </div>
     <div class="col-11-16 xpul10">
     	 <div class="col-5-8">
         	@if($owner->user_group == 4)
            	<h1 class="item-head {!! (strlen($template->title) > 40)?  "hasTooltip\" title=\"$template->title\"" : "\"" !!}>
                	{{ str_limit($template->title,40) }}
                </h1>
            @else
            	<h1 class="item-head"  {!! (strlen($user->full_name) > 40) ?  "hasTooltip\" title=\"$user->full_name\"" : "\"" !!}>
                	<a href="{{ $owner->link }}">{{ $user->full_name  }}</a>
               	</h1>
            @endif  
             <h3 class="item-sub-head left">
            @if(!empty($formtext))         
            	{{ $formtext }}
            @endif
            {!! (!empty($formtext) && (!empty($genretext) || !empty($subgentext))) ? "|" : ""!!}
            
            @if(!empty($genretext))         
            	{{ $genretext }}
            @endif
            {!! (!empty($genretext) && !empty($subgentext)) ? "-" : "" !!}
            @if(!empty($subgentext))         
            	{{ $subgentext }}
            @endif
            </h3>
         </div>
     </div>
    <div class="col-3-16 item-right-main right">
       @if(auth()->user()->id == $template->user_id)
            <div onclick="FlashMessage('You can\'t send message to yourself')" class="item-right-item bg-profile mrgbt5">Send Message</div>
        @else
            <div id="message-send" class="item-right-item bg-profile mrgbt5">Send Message</div>
        @endif
          <?php
			  $checkfav	=	auth()->user()->favorites()->where('item_type','template')->where('item_id',$template->id)->count(); 
		 ?>
		@if(!$checkfav)
			<div class="item-right-item  bg-favorite mrgbt5" id="template-favorite" >{{ trans('lang.favorites') }}</div>
		@else
			<div class="item-right-item disabled  mrgbt5 relative bg-favorite" id="template-favorite" >
				{{ trans('lang.favorites') }} <i class="fa fa-check absolute t9 r10"></i>
			</div>
		@endif
        <div id="template-info" class="item-right-item  bg-eye">Template Info</div>
        <div class="clearfix"></div>
    </div>
     <div class="clearfix"></div>
</div>
       <div class="clearfix"></div>
        <div id="template_view" class="col-1-1 ymrg10">
        	{{Form::open(['route'=>['report.update','id'=>$script->id],'id'=>'Create_Report_Form'])}}
				<?php 
					$rederinst			=	$template->reader_inst;
                    $scriptinfo			=	!empty($template->general_info) ? $template->general_info : array();
					
					
                    $logsyn				=	!empty($template->logsyn) ? $template->logsyn : array();
					$charector			=	!empty($template->character_break) ? $template->character_break : array();
					$bargraphs			=	!empty($template->bar_graphs) ? $template->bar_graphs : array();
                    $notesarray			=	!empty($template->notes) ? $template->notes : array();
					$tempnotes			=	$notesarray;
					
					$notesother			=	false;
					if(isset($tempnotes['other'])){
						unset($tempnotes['other']);
						foreach($notesarray['other'] as $ncheck){
							if(count($ncheck)>1)
								$notesother = true;	
						}
					}
						
					$notes				=	$tempnotes;
					
					$questionpart	=	false;
					$readerpart		=	false;
					$gridpart		=	false;
					$infopart		=	false;
					$charetorpart	=	false;
					$logsyspart		=	false;
					$notespart		=	false;
					$activediv		=	'readerinst';
					//echo "<pre>"; print_r($scriptinfo); exit;
				?>
            	<div class="col-1-1">
                  <ul id="sortingtemplate" class="template-tabs left">
                   <?php if(!empty($rederinst)){ $readerpart = true; ?>	
                        <li id="readerinst" class="active"><a data-class="readerinst" href="javascript:void(0)">Instructions</a></li>
                    <?php } ?>    
                    <?php if(count($categories)>0){ $questionpart = true; ?>	
                    	<?php if($readerpart==false){
								$class 		=   'active';
								$activediv	=	'question'; 
							}?>	
                        <li id="questions" class="{{$class}}"><a data-class="questions" href="javascript:void(0)">Questions</a></li>
                    <?php } ?>    
                    <?php if(count($bargraphs)>0){ $gridpart = true; $class =''; ?>
                    	<?php if($readerpart==false && $questionpart==false){
								$class 		=  'active';
								$activediv	=	'grid'; 
							}?>
                    	<li id="grid" class="{{$class}}"><a data-class="grid" href="javascript:void(0)" class="sorted">Grid</a></li>
                	<?php } ?>
                    <?php if(count($scriptinfo['left']) || count($scriptinfo['right'])){ $infopart = true; $class =''; ?> 
                    		<?php if($readerpart==false && $questionpart==false && $gridpart==false){
								$class 		=  'active';
								$activediv	=	'scriptinfo'; 
							}?>
                    	<li id="scriptinfo" class="{{$class}}"><a data-class="scriptinfo" href="javascript:void(0)" class="sorted">Script Info</a></li>
                    <?php } ?>
                    <?php if(count($charector)>1){ $charetorpart = true; $class ='';?>  
                    	<?php if($readerpart==false && $questionpart==false && $gridpart==false && $infopart==false){
								$class 		=  'active';
								$activediv	=	'charector'; 
							}?>    
                    	<li id="character" class="{{$class}}"><a data-class="character" href="javascript:void(0)" class="sorted">Character Breakdown</a></li>
                    <?php } ?>
                    <?php if(count($logsyn)>2){ $logsyspart=true; $class =''; ?>
                    	<?php if($readerpart==false  && $questionpart==false && $gridpart==false && $infopart==false && $charetorpart==false){
								$class 		=  'active';
								$activediv	=	'logsys'; 
							}?>
                    	<li id="logsys" class="{{$class}}"><a data-class="logsys" href="javascript:void(0)" class="sorted">Logline / Synopsis</a></li>
                    <?php } ?>
                    <?php if(count($notes)>5 || $notesother){ $class =''; ?>
                    	<?php if($readerpart==false  && $questionpart==false && $gridpart==false && $infopart==false && $charetorpart==false && $logsyspart==false){
								$class 		=  'active';
								$activediv	=	'notes'; 
							}?>    
                    	<li id="notes" class="{{$class}}"><a data-class="notes" href="javascript:void(0)" class="sorted">Notes</a></li>
                    <?php } ?>    
                  </ul>
                  
                  @if(auth()->user()->id  != $template->user_id)
                  	<a class="right btn btn-primary xpul20" id="submit-report" href="#submit-report-poopup">Update Report</a>
                  @endif
                </div>
                
                <div class="col-1-1 ymrg15">
                	<div class="left">
                    	<h2 id="temp-tab-head" class="item-head">Instructions</h2>
                    </div>
                    <div class="right">
                    	<div class="btn right btn-gray fa-chevron-right btn-icon-right temp-nav  xpul30" data-type="next">Next</div>
                        <div class="btn right btn-gray fa-chevron-left btn-icon mrgrt15 temp-nav xpul30">Previous</div>                        
                    </div>
                    <div class="clearfix"></div>
                </div>
                
            <div class="clear"></div>
            <div class="template-div readerinst" style="display:<?php echo ($activediv=='readerinst') ? 'block' : 'none'; ?>">
            	<?php echo $rederinst; ?>
            </div>
            <div class="left_mid_view template-div questions" style="display:<?php echo ($activediv=='question') ? 'block' : 'none'; ?>">
             
                <?php
				$offset	=	1;		
				$Templatedata	=	($template->data!='') ? json_decode($template->data) : new stdClass();
				//echo"<pre>"; print_r($categories);exit;
				 foreach($categories as $category => $questions): ?>
                    <div class="templ-categories">
                        <h4 class="tmplt-qstn-catHead">{{ App\Models\Categories::find($category)->title}}</h4>
                        <div class="clear"></div>
                         <div class="clear"></div>
                        <?php 
                         $count = 1;
						 
                         foreach($questions as $question): ?>
                         <?php 
						 	$qid	=	$question->id;
							if(isset($Templatedata->$category->$qid)){
								$Instruction	 = 	$Templatedata->$category->$qid;
						 ?>
                            <div id="mq_{{$offset}}" class="mainquestion question-{{$count}}">
                                <div class="col-5-7 left Box ">
                                <div class="col-1-1 xpul15 pultop15">
                                    <div class="question_title ">
                                            {{$count}}.&nbsp;{{$question->title}}
                                    </div>
									<?php if(isset($Instruction[1]) && $Instruction[1]!=''):?>
                                        <div class="textareaInfo bg-info">
                                            <div class="info slideAnimate">
                                                <div class="col-1-1 BorderBox">
                                                    <div class="col-1-1  bgBlue xpul8 ypul8">
                                                        <h5>{{ trans('lang.reader-list') }}</h5>
                                                    </div>
                                                    <div class="col-1-1 pul8">
                                                        {!!  $Instruction[1] !!}
                                                    </div>                                                	
                                                </div>
                                            </div>
                                            </div>
                                    <?php endif; ?>
                                    <span class="delete_btn" style="display:none" onclick="deleteQuestion( {{ $question->category_id }}, {{ $question->id }}, 'mq_{{$offset}}')">
                                        <i class="fa fa-trash-o fa-lg"></i>
                                    </span> 
                                </div>   
                                <div class="clear"></div>
                                <div class="templ-note">
                                	<div class="col-1-1">
                                    	<h5 class="note_{{$question->id}}" data-id="note_{{$question->id}}">Notes</h5>
                                    </div>
                                    <div id="note_{{$question->id}}" class="col-23-24 no-display mrglft8">
                                        <textarea name="data[{{$category}}][{{$question->id}}][notes]" class="editers_questionAndnotes" rows="2">{!! $data['data'][$category][$question->id][notes]!!}</textarea>
                                    </div>
                                    
                                </div>
                                <div class="h-line"></div>
                                <div class="templ-suggs">
                                	<div class="col-1-1">
                                    	<h5 class="suggestion_{{$question->id}}" data-id="suggestion_{{$question->id}}">Suggestions</h5>
                                    </div>
                                    <div id="suggestion_{{$question->id}}" class="col-23-24 no-display mrglft8">
                                        <textarea  name="data[{{$category}}][{{$question->id}}][suggestion]" class="editers_questionAndnotes" rows="2">{!! $data['data'][$category][$question->id][suggestion]!!}</textarea>
                                    </div>
                                </div>
                            </div>
                                <div class="col-3-14 templ-score right">
                                    <h4>Score</h4>
                                    <ul id="ul-{{$question->id}}" class="scoring">
                                        <li data-set="{{$offset}}" data-q="{{$question->id}}" data-score="1">1</li>
                                        <li data-set="{{$offset}}" data-q="{{$question->id}}" data-score="2">2</li>
                                        <li data-set="{{$offset}}" data-q="{{$question->id}}" data-score="3">3</li>
                                        <li data-set="{{$offset}}" data-q="{{$question->id}}" data-score="4">4</li>
                                        <li data-set="{{$offset}}" data-q="{{$question->id}}" data-score="5">5</li>
                                    </ul>
                               <div class="clear"></div>
                           </div>
                           <input type="hidden" name="data[{{$category}}][{{$question->id}}][score]" id="score_{{$question->id}}"  value="{!! $data['data'][$category][$question->id][score]!!}" />
                           </div>
                           <?php $offset++; $count++;  } ?>
                        <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>
             </div>            
            <div class="bar_graphs template-div grid" style="display:<?php echo ($activediv=='grid') ? 'block' : 'none'; ?>">
            	<?php 
					if(count($bargraphs)>0){ 
						$counter	=	1;
						foreach($bargraphs as $graphs) {
							if(!is_array($graphs)){	
								$barid	=	str_replace(" ","_",$graphs);	
								?>
                                    <div id="graphdiv-{{$counter}}" class="col-5-7 mrgbt20 relative Box pultop15">
                                        <div class="bardiv-{{$counter}}">
                                            <h4>{{$graphs}}</h4>
                                            <div class="left">
                                                {{Html::image('public/images/script_img.png','',['class'=>'main_bar'])}}
                                                
                                                <input type="hidden" name="graphs[{{$barid}}]" data-slider="true" data-slider-highlight="true"  data-slider-range="1,100" value="{!! $data['graphs'][$barid]!!}" />
                                            </div>
                                        </div>
                                        <span data-id="graphdiv-{{$counter}}" data-value="{{$graphs}}" data-type="graphbar" class="delete_btn mrgtp25 mrgrt70" title="Remove" id="move_1"><i class="fa fa-trash"></i></span>
                                        <div class="clear"></div>
                                    </div>
                               <?php }else{ ?>
                               			<?php if(is_array($bargraphs['other']) && count($bargraphs['other'])>0){ ?>
                                        		<?php foreach($bargraphs['other'] as $graphs) { 
													$barid	=	str_replace(" ","_",$graphs);
													?>
                                                 	<div id="graphdiv-{{$counter}}" class="col-5-7 mrgbt20 relative Box pultop15">
                                                        <div class="bardiv-{{$counter}}">
                                                            <h4 title="{{$graphs}}">{{str_limit($graphs,15)}}</h4>
                                                            <div class="left">
                                                                {{Html::image('public/images/script_img.png','',['class'=>'main_bar'])}}
                                                                <input type="hidden" name="graphs[{{$barid}}]" data-slider="true" data-slider-highlight="true"  
                                                                data-slider-range="1,100" value="{!! $data['graphs'][$barid] !!}" />
                                                            </div>
                                                        </div>
                                                        <span data-id="graphdiv-{{$counter}}" data-value="{{$graphs}}" data-type="graphbar" class="delete_btn mrgtp25 mrgrt70" title="Remove" id="move_1"><i class="fa fa-trash"></i></span>
                                                        <div class="clear"></div>
                                                	</div>
                                                <?php $counter++; } ?>
                                        <?php } ?>
                               <?php } ?>
                <?php 	$counter++;	}
						}
					 ?>
            </div>            
            <div class="template-div scriptinfo" style="display:<?php echo ($activediv=='scriptinfo') ? 'block' : 'none'; ?>">
            	<div  class="col-1-1">
					<?php $idcount = 1;?>
                    <?php if(count($scriptinfo)>0){ ?>
                    		<?php if(isset($scriptinfo['left']) && count($scriptinfo['left'])){ ?>
                            <?php foreach($scriptinfo['left'] as $leftkey => $leftval){?>
                                <?php if(!empty($leftval) && !is_array($leftval)){?>
                                	@if((strtolower($leftval) == "writer" || strtolower($leftval) == "story by"))
                                        	<?php $count_value	=	1; ?>
                                            @if(is_array($data['general_info']['left'][$leftval]))
                                                @foreach($data['general_info'][left][$leftval] as $key=>$value)
                                                
                                                    <div class="col-1-1 relative" data-div="left_{{str_replace(' ','',strtolower($leftval))}}_add">
                                                        <div class="col-20-24 mrgbt15" id="move_{{$count_value}}" >
                                                            {{ Form::label('general_info', $leftval." ".$count_value,['class'=>'it']) }}
                                                            {{Form::text('general_info[left]['.$leftval.']['.$count_value.']',$value,array('class' => 'text textInput it mrgbt5'))}}
                                                            @if($count_value != 1)
                                                            <span style="display:block;" title="Remove" class="delete_btn mrgtp25 mrgrt70"><i class="fa fa-trash"></i></span>
                                                        @endif
                                                        </div>
                                                        
                                                </div>
                                                    <?php $count_value++; ?>
                                                @endforeach
                                            @else
                                            	<div class="col-1-1 relative" data-div="left_{{str_replace(' ','',strtolower($leftval))}}_add">
                                                        <div class="col-20-24 mrgbt15" id="move_{{$count_value}}" >
                                                            {{ Form::label('general_info', $leftval." ".$count_value,['class'=>'it']) }}
                                                            {{Form::text('general_info[left]['.$leftval.'][1]',$value,array('class' => 'text textInput it mrgbt5'))}}
                                                        </div>
                                                        
                                                </div>
                                            
                                            @endif
                                            <a data-count="{{($count_value - 1)}}" data-div="left_{{str_replace(' ','',strtolower($leftval))}}_add" class="add_other col-20-24 mrgbt15"><i class="fa fa-plus"></i>&nbsp;Add {{$leftval}}</a>
                                        @else                                    
                                    <div class="col-1-1 relative">
                                        <div class="col-20-24 mrgbt15" id="move_{{$idcount}}">
                                        	{{ Form::label('general_info', $leftval,['class'=>'it']) }}
                                        	{{Form::text('general_info[left]['.$leftval.']',$data['general_info']['left'][$leftval],array('class' => 'text textInput it mrgbt5'))}}
                                        </div>
                                        <div class="col-4-24">
                                            <span id="move_{{$idcount}}" title="Remove" class="delete_btn mrgtp25 mrgrt70"><i class="fa fa-trash"></i></span>
                                        </div>
                                    </div>
                                    @endif
                                     <?php }else{?>
                            		@foreach($leftval as $other)
                                    	 <div class="col-1-1 mrgbt15 relative">
                                            <div class="col-20-24" id="move_{{$idcount}}">
                                                {{ Form::label('general_info', $other,['class'=>'it']) }}
                                                {{Form::text('general_info[left]['.$other.']',$data['general_info'][left][$other],array('class' => 'text textInput it mrgbt5'))}}
                                            </div>
                                            <div class="col-4-24">
                                                <span id="move_{{$idcount}}" title="Remove" class="delete_btn mrgtp25 mrgrt70"><i class="fa fa-trash"></i></span>
                                            </div>
                                        </div>
                                        <?php $idcount++; ?>
                                    @endforeach
									<?php }?>
                                <?php $idcount++; } ?>
                                <?php } ?>
                                
                                
                                
                          <?php if(isset($scriptinfo['right']) && count($scriptinfo['right'])){ ?>
                            <?php foreach($scriptinfo['right'] as $leftkey => $leftval){?>
                                <?php if(!empty($leftval) && !is_array($leftval)){?>
                                	@if((strtolower($leftval) == "writer" || strtolower($leftval) == "story by") && is_array($data['general_info']['right'][$leftval]))
                                        	<?php $count_value	=	1; ?>
                                        	@foreach($data['general_info']['right'][$leftval] as $key=>$value)
                                            
                                            	<div class="col-1-1 relative" data-div="left_{{str_replace(' ','',strtolower($leftval))}}_add">
                                                    <div class="col-20-24 mrgbt15" id="move_{{$count_value}}" >
                                                        {{ Form::label('general_info', $leftval." ".$count_value,['class'=>'it']) }}
                                                        {{Form::text('general_info[right]['.$leftval.']['.$count_value.']',$value,array('class' => 'text textInput it mrgbt5'))}}
                                                        @if($count_value != 1)
                                                        <span style="display:block;" title="Remove" class="delete_btn mrgtp25 mrgrt70"><i class="fa fa-trash"></i></span>
                                                    @endif
                                                    </div>
                                                    
                                            </div>
                                                <?php $count_value++; ?>
                                            @endforeach
                                            <a data-count="{{($count_value - 1)}}" data-div="left_{{str_replace(' ','',strtolower($leftval))}}_add" class="add_other col-20-24 mrgbt15"><i class="fa fa-plus"></i>&nbsp;Add {{$leftval}}</a>
                                        @else                                    
                                    <div class="col-1-1 relative">
                                        <div class="col-20-24 mrgbt15" id="move_{{$idcount}}">
                                        	{{ Form::label('general_info', $leftval,['class'=>'it']) }}
                                        	{{Form::text('general_info[right]['.$leftval.']',$data['general_info']['right'][$leftval],array('class' => 'text textInput it mrgbt5'))}}
                                        </div>
                                        <div class="col-4-24">
                                            <span id="move_{{$idcount}}" title="Remove" class="delete_btn mrgtp25 mrgrt70"><i class="fa fa-trash"></i></span>
                                        </div>
                                    </div>
                                    @endif
                                     <?php }else{?>
                            		@foreach($leftval as $other)
                                    	 <div class="col-1-1 mrgbt15 relative">
                                            <div class="col-20-24" id="move_{{$idcount}}">
                                                {{ Form::label('general_info', $other,['class'=>'it']) }}
                                                {{Form::text('general_info[right]['.$other.']',$data['general_info']['right'][$other],array('class' => 'text textInput it mrgbt5'))}}
                                            </div>
                                            <div class="col-4-24">
                                                <span id="move_{{$idcount}}" title="Remove" class="delete_btn mrgtp25 mrgrt70"><i class="fa fa-trash"></i></span>
                                            </div>
                                        </div>
                                        <?php $idcount++; ?>
                                    @endforeach
									<?php }?>
                                <?php $idcount++; } ?>
                                <?php } ?>
                           
                    <?php } ?>
                </div>                                        
            </div>            
            <div class="template-div character" style="display:<?php echo ($activediv=='charector') ? 'block' : 'none'; ?>"> 
            	<?php $counter = 0; ?>
            	<?php if(count($charector)>0){ ?>
                    	<?php foreach($charector as $key => $value){?>
                        	<?php if(!empty($value) && is_numeric($key)){ ?>
                            	<div id="character-{{$counter}}" class="col-1-1 relative">
                                    <div class="col-20-24">
                                        {{Form::label('character_break', $value,['class'=>'it mrgbt10 nofull']) }}
                                         <?php if($charector['character_inst']!=''):?>
                                            	<div class="textareaInfo bg-info">
                                            	<div class="info slideAnimate">
                                                	<div class="col-1-1 BorderBox">
                                                    	<div class="col-1-1  bgBlue xpul8 ypul8">
                                                        	<h5>{{ trans('lang.reader-list') }}</h5>
                                                        </div>
                                                        <div class="col-1-1 pul8">
                                                        	{!!  $charector['character_inst'] !!}
                                                        </div>                                                	
                                                    </div>
                                                </div>
                                                </div>
                                        	<?php endif; ?>		
                                        {{Form::textarea('character_break['.$value.']',$data['character_break'][$value],array('class' => 'text it textArea editers', 'rows'=>'2'))}}
                                   </div>
                                   <span data-id="character-{{$counter}}" data-value="{{$value}}" data-type="character" class="delete_btn mrgtp25 mrgrt70" title="Remove" id="move_1">
                                   <i class="fa fa-trash"></i>
                                   </span>
                                </div>    
                            <?php $counter++; } ?>
                    	<?php } ?>
                    <?php } ?>             
            </div>
            <div class="template-div logsys" style="display:<?php echo ($activediv=='logsys') ? 'block' : 'none'; ?>">
            	<?php $counter = 0;  ?>
            	<?php if(count($logsyn)>0){ //print_r($logsyn);?>
                    	<?php foreach($logsyn as $key => $value){?>
                        	<?php if(!empty($value) && is_numeric($key)){ ?>
                                 <div id="logsys-{{$counter}}" class="col-1-1 relative"> 
                                    <div class="col-20-24 mrgbt15">
                                    	<?php 
											$inst	= '';
											if($value=='Logline')
												$inst	= $logsyn['log_reader_inst']; 
											if($value=='Synopsis')
												$inst	= $logsyn['syn_reader_inst']; 	
										?>	
                                        {{Form::label('notes', $value,['class'=>'it nofull']) }}
                                         <?php if($inst!=''):?>
                                         	<div class="textareaInfo bg-info">
                                            	<div class="info slideAnimate">
                                                	<div class="col-1-1 BorderBox">
                                                    	<div class="col-1-1  bgBlue xpul8 ypul8">
                                                        	<h5>{{ trans('lang.reader-list') }}</h5>
                                                        </div>
                                                        <div class="col-1-1 pul8">
                                                        	{!!  $inst !!}
                                                        </div>                                                	
                                                    </div>
                                                </div>
                                                </div>
                                        	<?php endif; ?>		
                                        {{Form::textarea('logsys['.$value.']',$data['logsys'][$value],array('class' => 'text it textArea editers', 'rows'=>'2'))}}

                                    </div>  
                                    <span ddata-id="logsys-{{$counter}}" data-value="{{$value}}" data-type="logsys" class="delete_btn mrgtp25 mrgrt70" title="Remove" id="move_1">
                                   <i class="fa fa-trash"></i>
                                   </span>
                               </div>
                            <?php $counter++; } ?>
                    	<?php } ?>
                    <?php } ?>             
            </div>
            <div class="template-div notes" style="display:<?php echo ($activediv=='notes') ? 'block' : 'none'; ?>">
            	<?php $counter = 0;  ?>
            	<?php if(count($notes)>5){ //echo"<pre>"; print_r($notes); ?>
                    	<?php foreach($notes as $key => $value){?>
                        	<?php if(!empty($value) && is_numeric($key)){ ?>
                            	<div id="notes-{{$counter}}" class="col-1-1 relative">
                                    <div class="col-20-24 mrgbt15">
                                    		<?php $inst	=	$notes[strtolower(str_replace(' ','_',$value)).'_inst']; ?>	
                                            {{Form::label('notes', $value,['class'=>'it nofull']) }}
                                            <?php if($inst!=''):?>
                                            	<div class="textareaInfo bg-info">
                                            	<div class="info slideAnimate">
                                                	<div class="col-1-1 BorderBox">
                                                    	<div class="col-1-1  bgBlue xpul8 ypul8">
                                                        	<h5>{{ trans('lang.reader-list') }}</h5>
                                                        </div>
                                                        <div class="col-1-1 pul8">
                                                        	{!!  $inst !!}
                                                        </div>                                                	
                                                    </div>
                                                </div>
                                                </div>
                                        	<?php endif; ?>	
                                            {{Form::textarea('notes['.$value.']',$data['notes'][$value],array('class' => 'text it textArea editers', 'rows'=>'2'))}}
                                    </div> 
                                    <span data-id="notes-{{$counter}}" data-value="{{$value}}" data-type="notes"  class="delete_btn mrgtp25 mrgrt70" title="Remove" >
                                   <i class="fa fa-trash"></i>
                                   </span>  
                                </div>
                            <?php $counter++; } ?>
                    	<?php } ?>
                    <?php } ?> 
                    
                    <?php if($notesother){ ?>
                    	<?php foreach($notesarray['other'] as $key => $value){?>
                        	<?php if(count($value)>1){ ?>
                            	<div id="notes-{{$counter}} " class="col-1-1 relative">
                                    <div class="col-20-24 mrgbt15">
                                            {{Form::label('notes', $value[0],['class'=>'it nofull']) }}
                                             <?php if($value[1]!=''):?>
                                            	<div class="textareaInfo bg-info">
                                            	<div class="info slideAnimate">
                                                	<div class="col-1-1 BorderBox">
                                                    	<div class="col-1-1  bgBlue xpul8 ypul8">
                                                        	<h5>{{ trans('lang.reader-list') }}</h5>
                                                        </div>
                                                        <div class="col-1-1 pul8">
                                                        	{!!  $value[1] !!}
                                                        </div>                                                	
                                                    </div>
                                                </div>
                                                </div>
                                        	<?php endif; ?>	
                                            {{Form::textarea('notes['.$value[0].']',$data['notes'][$value[0]],array('class' => 'text it textArea editers', 'rows'=>'2'))}}
                                    </div> 
                                    <span data-id="notes-{{$counter}}" data-value="{{$key}}" data-type="notesextra"  class="delete_btn mrgtp25 mrgrt70" title="Remove" >
                                   <i class="fa fa-trash"></i>
                                   </span> 
                                </div>
                            <?php $counter++; } ?>
                    	<?php } ?>
                    <?php } ?>  
            </div>
     		<div class="clearfix"></div>
            
            <div id="submit-report-poopup" class="col-1-1" style="min-width:500px;">
            {!! Html::image("public/images/icons/cancel.png","Close This Dilog Box",["onclick"=>"javascript:$(\"#message-overlayer\").trigger('click')","class"=>"closeMessageBox"]) !!}
                <h3 class="blue-head mrg0">Create Report</h3>
                <div class="col-1-1 pul15">
                    <div class="col-1-1 ymrg10">
                        {{Form::text('script_title',$script->title,array('class' => 'text textInput it','placeholder'=>'Script Title', 'required'))}}
                    </div>
                    <div class="col-1-1 ymrg10">
                        {{Form::text('script_draft',$script->draft,array('class' => 'text textInput it','placeholder'=>'Draft'))}}
                    </div>
                    <div class="col-1-1 ymrg10">
                        {{Form::text('script_date',date('F d, Y',strtotime($script->created_date)),array('class' => 'text textInput it datepicker' ,'placeholder'=>'Date','readonly'))}}
                    </div>
                    <div class="col-1-1 ymrg10">
                        {{Form::textarea('script_notes',$script->privatenote->note,array('class' => 'text it textArea', 'rows'=>'2' ,'placeholder'=>'Private Notes'))}}
                    </div>
                </div>
                <div class="col-1-1 xpul20 pulbotm20">
                    <div class="col-1-1">
                        {{Form::button('CANCEL',array('class'=>'btn btn-icon btn-primary fa-times right','id'=>'cancelreport'))}}
                        {{Form::submit('SUBMIT',array('class'=>'btn btn-icon btn-primary fa-save right mrgrt15'))}}
                    </div>
                </div>
                {{Form::hidden('template_id',$template->id)}}
                    @if(isset($share_id))
                        {{Form::hidden('share_id',$share_id)}}
                    @endif  
            </div>   
            
            {{ Form::close() }}
           </div>
             <div class="bottomNextPre">
                <div class="btn right btn-gray fa-chevron-right btn-icon-right temp-nav  xpul30" data-type="next">Next</div>
                <div class="btn right btn-gray fa-chevron-left btn-icon mrgrt15 temp-nav xpul30">Previous</div>
             </div>
            
		<div class="clearfix"></div>
     {!! view('report-template.template-info')->with('template',$template) !!} 
    @if(auth()->check() && auth()->user()->id != $user->id)
    	{!! view('message.message')->with(['contact'=>false,'email'=>false]) !!}
    @endif
    
    @if(!auth()->check() || auth()->user()->id == $user->id)
    	{!! Html::script('public/js/message.js') !!}
    @endif 

<script type="text/javascript">
	$(document).ready(function(){ 	
	$("#submit-report-poopup").sendMessagePopUp({'clicker':'submit-report',width:500});
	 
	$("#send-message").sendMessagePopUp({
			'clicker':'message-send',
			beforeOpen:function(){
			var form	=	document.getElementById("mesaage-sending-form");
			
			form.member.value	=	{{ $template->user_id }};
		},
		}); 
	});	
</script>
<script type="text/javascript">

var Question	=	{!! $template->data !!};
var template_id	=	{!! $template->id !!};
delete_other();
</script> 

@push('script')
	{!! HTml::Script('public/js/specified/template-view.js') !!}
    {!! Html::Script("public/plugins/tiny_mce/tiny_mce.js") !!}
@endpush
<style>
.delete_btn{
display:none;
}
.question_info .fa-trash-o{
	display:none;
	color: #bb2f30;
    font-size: 21px;
    margin-right: 7px;
	cursor:pointer;
}
</style>                            
@stop