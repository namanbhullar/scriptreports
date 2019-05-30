<?php $__env->startSection('content'); ?>

<?php $__env->startPush('script'); ?>
	<?php echo Html::script('public/plugins/simpleslider/simple-slider.js'); ?>

	<?php echo Html::script('public/old/common.js'); ?>

    <?php echo Html::script('public/old/ajax.js'); ?>

<?php $__env->stopPush(); ?>
 <?php 
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
    	<?php echo $owner->profile->image; ?>        
    </div>
     <div class="col-11-16 xpul10">
     	 <div class="col-5-8">
         	<?php if($owner->user_group == 4): ?>
            	<h1 class="item-head <?php echo (strlen($template->title) > 40)?  "hasTooltip\" title=\"$template->title\"" : "\""; ?>>
                	<?php echo e(str_limit($template->title,40)); ?>

                </h1>
            <?php else: ?>
            	<h1 class="item-head"  <?php echo (strlen($user->full_name) > 40) ?  "hasTooltip\" title=\"$user->full_name\"" : "\""; ?>>
                	<a href="<?php echo e($owner->link); ?>"><?php echo e($user->full_name); ?></a>
               	</h1>
            <?php endif; ?>  
             <h3 class="item-sub-head left">
            <?php if(!empty($formtext)): ?>         
            	<?php echo e($formtext); ?>

            <?php endif; ?>
            <?php echo (!empty($formtext) && (!empty($genretext) || !empty($subgentext))) ? "|" : ""; ?>

            
            <?php if(!empty($genretext)): ?>         
            	<?php echo e($genretext); ?>

            <?php endif; ?>
            <?php echo (!empty($genretext) && !empty($subgentext)) ? "-" : ""; ?>

            <?php if(!empty($subgentext)): ?>         
            	<?php echo e($subgentext); ?>

            <?php endif; ?>
            </h3>
         </div>
     </div>
    <div class="col-3-16 item-right-main right">
       <?php if(auth()->user()->id == $template->user_id): ?>
            <div onclick="FlashMessage('You can\'t send message to yourself')" class="item-right-item bg-profile mrgbt5">Send Message</div>
        <?php else: ?>
            <div id="message-send" class="item-right-item bg-profile mrgbt5">Send Message</div>
        <?php endif; ?>
        <?php
			  $checkfav	=	auth()->user()->favorites()->where('item_type','template')->where('item_id',$template->id)->count(); 
		 ?>
		<?php if(!$checkfav): ?>
			<div class="item-right-item  bg-favorite mrgbt5" id="template-favorite" ><?php echo e(trans('lang.favorites')); ?></div>
		<?php else: ?>
			<div class="item-right-item disabled  mrgbt5 relative bg-favorite" id="template-favorite" >
				<?php echo e(trans('lang.favorites')); ?> <i class="fa fa-check absolute t9 r10"></i>
			</div>
		<?php endif; ?>	
        <div id="template-info" class="item-right-item  bg-eye">Template Info</div>
        <div class="clearfix"></div>
    </div>
     <div class="clearfix"></div>
</div>
       <div class="clearfix"></div>
        <div id="template_view" class="col-1-1 ymrg10">
        	<?php echo e(Form::open(['route'=>'template.submitreport','id'=>'Create_Report_Form'])); ?>

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
                        <li id="questions" class="<?php echo e($class); ?>"><a data-class="questions" href="javascript:void(0)">Questions</a></li>
                    <?php } ?>    
                    <?php if(count($bargraphs)>0){ $gridpart = true; $class =''; ?>
                    	<?php if($readerpart==false && $questionpart==false){
								$class 		=  'active';
								$activediv	=	'grid'; 
							}?>
                    	<li id="grid" class="<?php echo e($class); ?>"><a data-class="grid" href="javascript:void(0)" class="sorted">Bar Graph</a></li>
                	<?php } ?>
                    <?php if(count($scriptinfo['left']) || count($scriptinfo['right'])){ $infopart = true; $class =''; ?> 
                    		<?php if($readerpart==false && $questionpart==false && $gridpart==false){
								$class 		=  'active';
								$activediv	=	'scriptinfo'; 
							}?>
                    	<li id="scriptinfo" class="<?php echo e($class); ?>"><a data-class="scriptinfo" href="javascript:void(0)" class="sorted">Script Info</a></li>
                    <?php } ?>
                    <?php if(count($charector)>1){ $charetorpart = true; $class ='';?>  
                    	<?php if($readerpart==false && $questionpart==false && $gridpart==false && $infopart==false){
								$class 		=  'active';
								$activediv	=	'charector'; 
							}?>    
                    	<li id="character" class="<?php echo e($class); ?>"><a data-class="character" href="javascript:void(0)" class="sorted">Character Breakdown</a></li>
                    <?php } ?>
                    <?php if(count($logsyn)>2){ $logsyspart=true; $class =''; ?>
                    	<?php if($readerpart==false  && $questionpart==false && $gridpart==false && $infopart==false && $charetorpart==false){
								$class 		=  'active';
								$activediv	=	'logsys'; 
							}?>
                    	<li id="logsys" class="<?php echo e($class); ?>"><a data-class="logsys" href="javascript:void(0)" class="sorted">Logline / Synopsis</a></li>
                    <?php } ?>
                    <?php if(count($notes)>5 || $notesother){ $class =''; ?>
                    	<?php if($readerpart==false  && $questionpart==false && $gridpart==false && $infopart==false && $charetorpart==false && $logsyspart==false){
								$class 		=  'active';
								$activediv	=	'notes'; 
							}?>    
                    	<li id="notes" class="<?php echo e($class); ?>"><a data-class="notes" href="javascript:void(0)" class="sorted">Notes</a></li>
                    <?php } ?>    
                  </ul>
                  
                  <?php $shareData	=	App\Models\ShareTemplate::where('template_id',$template->id)->where('receiver_id',auth()->user()->id)->orderBy('id','desc')->first(); ?>
                  <?php if(auth()->user()->id  != $template->user_id && !is_null($shareData)): ?>
                  	<a class="right btn btn-primary xpul20" id="submit-report" href="#submit-report-poopup"><?php echo e(trans('lang.save-report')); ?></a>
                  <?php endif; ?>
                </div>
                
                <div class="col-1-1 ymrg15">
                	<div class="left">
                    	<h2 id="temp-tab-head" class="item-head">
                        	<?php 
								switch($activediv){
									case'question':
										echo "Questions";
									break;	
									
									case'question':
										echo "Questions";
									break;	
									
									case'grid':
										echo "Bar Graph";
									break;	
									
									case'scriptinfo':
										echo "Script Info";
									break;	
									
									case'charector':
										echo "Character Breakdown";
									break;	
									
									case'logsys':
										echo "Logline / Synopsis";
									break;
									
									case'notes':
										echo "Notes";
									break;
									
									default:	
										echo "Instructions";
									break;		
								}
							?>
                        </h2>
                    </div>
                    <div class="right">
                    	<div class="btn right btn-gray fa-chevron-right btn-icon-right temp-nav  xpul30" data-type="next">Next</div>
                        <div class="btn right btn-gray fa-chevron-left btn-icon mrgrt15 temp-nav xpul30">Previous</div>
                        <?php if(auth()->user()->id == $template->user_id): ?>
                        <a class="btn right btn-icon fa-save btn-primary xpul30 mrgrt30" href="<?php echo e(URL::route('template.savePre',['id'=>$tempalte->id])); ?>">
                        	Save Template
                        </a>
                        <a class="btn right btn-icon fa-user btn-primary xpul30 mrgrt15" href="<?php echo e(URL::route('template.post',['id'=>$template->id])); ?>">
                        	Post Template
                        </a>
                        <?php endif; ?>
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
                        <h4 class="tmplt-qstn-catHead"><?php echo e(App\Models\Categories::find($category)->title); ?></h4>
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
                            <div id="mq_<?php echo e($offset); ?>" class="mainquestion question-<?php echo e($count); ?>">
                                <div class="col-5-7 left Box ">
                                <div class="col-1-1 xpul15 pultop15">
                                    <div class="question_title ">
                                            <?php echo e($count); ?>.&nbsp;<?php echo e($question->title); ?>

                                    </div>
									<?php if(isset($Instruction[1]) && $Instruction[1]!=''):?>
                                        <div class="textareaInfo bg-info">
                                            <div class="info slideAnimate">
                                                <div class="col-1-1 BorderBox">
                                                    <div class="col-1-1  bgBlue xpul8 ypul8">
                                                        <h5><?php echo e(trans('lang.reader-list')); ?></h5>
                                                    </div>
                                                    <div class="col-1-1 pul8">
                                                        <?php echo $Instruction[1]; ?>

                                                    </div>                                                	
                                                </div>
                                            </div>
                                            </div>
                                    <?php endif; ?>
                                    <span class="delete_btn" style="display:none" onclick="deleteQuestion( <?php echo e($question->category_id); ?>, <?php echo e($question->id); ?>, 'mq_<?php echo e($offset); ?>')">
                                        <i class="fa fa-trash-o fa-lg"></i>
                                    </span> 
                                </div>   
                                <div class="clear"></div>
                                <div class="templ-note">
                                	<div class="col-1-1">
                                    	<h5 class="note_<?php echo e($question->id); ?>" data-id="note_<?php echo e($question->id); ?>">Notes</h5>
                                    </div>
                                    <div id="note_<?php echo e($question->id); ?>" class="col-23-24 no-display mrglft8">
                                        <textarea name="data[<?php echo e($category); ?>][<?php echo e($question->id); ?>][notes]" class="editers_questionAndnotes" rows="2"></textarea>
                                    </div>
                                    
                                </div>
                                <div class="h-line"></div>
                                <div class="templ-suggs">
                                	<div class="col-1-1">
                                    	<h5 class="suggestion_<?php echo e($question->id); ?>" data-id="suggestion_<?php echo e($question->id); ?>">Suggestions</h5>
                                    </div>
                                    <div id="suggestion_<?php echo e($question->id); ?>" class="col-23-24 no-display mrglft8">
                                        <textarea  name="data[<?php echo e($category); ?>][<?php echo e($question->id); ?>][suggestion]" class="editers_questionAndnotes" rows="2"></textarea>
                                    </div>
                                </div>
                            </div>
                                <div class="col-3-14 templ-score right">
                                    <h4>Score</h4>
                                    <ul id="ul-<?php echo e($question->id); ?>" class="scoring">
                                        <li data-set="<?php echo e($offset); ?>" data-q="<?php echo e($question->id); ?>" data-score="1">1</li>
                                        <li data-set="<?php echo e($offset); ?>" data-q="<?php echo e($question->id); ?>" data-score="2">2</li>
                                        <li data-set="<?php echo e($offset); ?>" data-q="<?php echo e($question->id); ?>" data-score="3">3</li>
                                        <li data-set="<?php echo e($offset); ?>" data-q="<?php echo e($question->id); ?>" data-score="4">4</li>
                                        <li data-set="<?php echo e($offset); ?>" data-q="<?php echo e($question->id); ?>" data-score="5">5</li>
                                    </ul>
                               <div class="clear"></div>
                           </div>
                           <input type="hidden" name="data[<?php echo e($category); ?>][<?php echo e($question->id); ?>][score]" id="score_<?php echo e($question->id); ?>" value="" />
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
                                    <div id="graphdiv-<?php echo e($counter); ?>" class="col-5-7 mrgbt20 relative Box pultop15">
                                        <div class="bardiv-<?php echo e($counter); ?>">
                                            <h4><?php echo e($graphs); ?></h4>
                                            <div class="left">
                                                <?php echo e(Html::image('public/images/script_img.png','',['class'=>'main_bar'])); ?>

                                                <input type="hidden" name="graphs[<?php echo e($barid); ?>]" data-slider="true" data-slider-highlight="true"  data-slider-range="1,100" value="" />
                                            </div>
                                        </div>
                                        <span data-id="graphdiv-<?php echo e($counter); ?>" data-value="<?php echo e($graphs); ?>" data-type="graphbar" class="delete_btn mrgtp25 mrgrt70" title="Remove" id="move_1"><i class="fa fa-trash"></i></span>
                                        <div class="clear"></div>
                                    </div>
                               <?php }else{ ?>
                               			<?php if(is_array($bargraphs['other']) && count($bargraphs['other'])>0){ ?>
                                        		<?php foreach($bargraphs['other'] as $graphs) { 
													$barid	=	str_replace(" ","_",$graphs);	
													?>
                                                 	<div id="graphdiv-<?php echo e($counter); ?>" class="col-5-7 mrgbt20 relative Box pultop15">
                                                        <div class="bardiv-<?php echo e($counter); ?>">
                                                            <h4 title="<?php echo e($graphs); ?>"><?php echo e(str_limit($graphs,15)); ?></h4>
                                                            <div class="left">
                                                                <?php echo e(Html::image('public/images/script_img.png','',['class'=>'main_bar'])); ?>

                                                                <input type="hidden" name="graphs[<?php echo e($barid); ?>]" data-slider="true" data-slider-highlight="true"  
                                                                data-slider-range="1,100" value="" />
                                                            </div>
                                                        </div>
                                                        <span data-id="graphdiv-<?php echo e($counter); ?>" data-value="<?php echo e($graphs); ?>" data-type="graphbar" class="delete_btn mrgtp25 mrgrt70" title="Remove" id="move_1"><i class="fa fa-trash"></i></span>
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
                    
                    		<?php if(isset($scriptinfo['left']) && count($scriptinfo['left'])) { ?>
                            <?php foreach($scriptinfo['left'] as $leftkey => $leftval){?>
                                <?php if(!empty($leftval) && !is_array($leftval)){?>                                    
                                    <div class="col-1-1 relative">
                                     <?php if( strtolower($leftval) == "writer" || strtolower($leftval) == "story by" ): ?>
                                        <div class="col-20-24 mrgbt15" id="move_<?php echo e($idcount); ?>" data-div="left_<?php echo e(str_replace(' ','',strtolower($leftval))); ?>_add">
                                        	<?php echo e(Form::label('general_info', $leftval,['class'=>'it'])); ?>

                                        	<?php echo e(Form::text('general_info[left]['.$leftval.'][1]','',array('class' => 'text textInput it mrgbt5'))); ?>

                                        </div>
                                        
                                        <a data-count="1" data-div="left_<?php echo e(str_replace(' ','',strtolower($leftval))); ?>_add" class="add_other col-20-24 mrgbt15"><i class="fa fa-plus"></i>&nbsp;Add <?php echo e($leftval); ?></a>
                                        <?php else: ?>
                                        <div class="col-20-24 mrgbt15" id="move_<?php echo e($idcount); ?>">
                                        	<?php echo e(Form::label('general_info', $leftval,['class'=>'it'])); ?>

                                        	<?php echo e(Form::text('general_info[left]['.$leftval.']','',array('class' => 'text textInput it mrgbt5'))); ?>

                                        </div>
                                        <?php endif; ?>
                                        <div class="col-4-24">
                                            <span id="move_<?php echo e($idcount); ?>" title="Remove" class="delete_btn mrgtp25 mrgrt70"><i class="fa fa-trash"></i></span>
                                        </div>
                                    </div>
                                    
                                     <?php }else{?>
                            		<?php foreach($leftval as $other): ?>
                                    	 <div class="col-1-1 mrgbt15 relative">
                                            <div class="col-20-24" id="move_<?php echo e($idcount); ?>">
                                                <?php echo e(Form::label('general_info', $other,['class'=>'it'])); ?>

                                                <?php echo e(Form::text('general_info[left]['.$other.']','',array('class' => 'text textInput it mrgbt5'))); ?>

                                            </div>
                                            <div class="col-4-24">
                                                <span id="move_<?php echo e($idcount); ?>" title="Remove" class="delete_btn mrgtp25 mrgrt70"><i class="fa fa-trash"></i></span>
                                            </div>
                                        </div>
                                        <?php $idcount++; ?>
                                    <?php endforeach; ?>
									<?php }?>
                                	<?php $idcount++; } ?>
                                <?php } ?>
                                
                                
                               <?php if(isset($scriptinfo['right']) && count($scriptinfo['right'])) { ?>
                            	<?php foreach($scriptinfo['right'] as $leftkey => $leftval){?>
                                <?php if(!empty($leftval) && !is_array($leftval)){?>                                    
                                    <div class="col-1-1 relative">
                                     <?php if( strtolower($leftval) == "writer" || strtolower($leftval) == "story by" ): ?>
                                        <div class="col-20-24 mrgbt15" id="move_<?php echo e($idcount); ?>" data-div="left_<?php echo e(str_replace(' ','',strtolower($leftval))); ?>_add">
                                        	<?php echo e(Form::label('general_info', $leftval,['class'=>'it'])); ?>

                                        	<?php echo e(Form::text('general_info[right]['.$leftval.'][1]','',array('class' => 'text textInput it mrgbt5'))); ?>

                                        </div>
                                        
                                        <a data-count="1" data-div="left_<?php echo e(str_replace(' ','',strtolower($leftval))); ?>_add" class="add_other col-20-24 mrgbt15"><i class="fa fa-plus"></i>&nbsp;Add <?php echo e($leftval); ?></a>
                                        <?php else: ?>
                                        <div class="col-20-24 mrgbt15" id="move_<?php echo e($idcount); ?>">
                                        	<?php echo e(Form::label('general_info', $leftval,['class'=>'it'])); ?>

                                        	<?php echo e(Form::text('general_info[right]['.$leftval.']','',array('class' => 'text textInput it mrgbt5'))); ?>

                                        </div>
                                        <?php endif; ?>
                                        <div class="col-4-24">
                                            <span id="move_<?php echo e($idcount); ?>" title="Remove" class="delete_btn mrgtp25 mrgrt70"><i class="fa fa-trash"></i></span>
                                        </div>
                                    </div>
                                    
                                     <?php }else{?>
                            		<?php foreach($leftval as $other): ?>
                                    	 <div class="col-1-1 mrgbt15 relative">
                                            <div class="col-20-24" id="move_<?php echo e($idcount); ?>">
                                                <?php echo e(Form::label('general_info', $other,['class'=>'it'])); ?>

                                                <?php echo e(Form::text('general_info[right]['.$other.']','',array('class' => 'text textInput it mrgbt5'))); ?>

                                            </div>
                                            <div class="col-4-24">
                                                <span id="move_<?php echo e($idcount); ?>" title="Remove" class="delete_btn mrgtp25 mrgrt70"><i class="fa fa-trash"></i></span>
                                            </div>
                                        </div>
                                        <?php $idcount++; ?>
                                    <?php endforeach; ?>
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
                            	<div id="character-<?php echo e($counter); ?>" class="col-1-1 relative">
                                    <div class="col-20-24">
                                        <?php echo e(Form::label('character_break', $value,['class'=>'it mrgbt10 nofull'])); ?>

                                         <?php if($charector['character_inst']!=''):?>
                                            	<div class="textareaInfo bg-info">
                                            	<div class="info slideAnimate">
                                                	<div class="col-1-1 BorderBox">
                                                    	<div class="col-1-1  bgBlue xpul8 ypul8">
                                                        	<h5><?php echo e(trans('lang.reader-list')); ?></h5>
                                                        </div>
                                                        <div class="col-1-1 pul8">
                                                        	<?php echo $charector['character_inst']; ?>

                                                        </div>                                                	
                                                    </div>
                                                </div>
                                                </div>
                                        	<?php endif; ?>		
                                        <?php echo e(Form::textarea('character_break['.$value.']','',array('class' => 'text it textArea editers', 'rows'=>'2'))); ?>

                                   </div>
                                   <span data-id="character-<?php echo e($counter); ?>" data-value="<?php echo e($value); ?>" data-type="character" class="delete_btn mrgtp25 mrgrt70" title="Remove" id="move_1">
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
                                 <div id="logsys-<?php echo e($counter); ?>" class="col-1-1 relative"> 
                                    <div class="col-20-24 mrgbt15">
                                    	<?php 
											$inst	= '';
											if($value=='Logline')
												$inst	= $logsyn['log_reader_inst']; 
											if($value=='Synopsis')
												$inst	= $logsyn['syn_reader_inst']; 	
										?>	
                                        <?php echo e(Form::label('notes', $value,['class'=>'it nofull'])); ?>

                                         <?php if($inst!=''):?>
                                         	<div class="textareaInfo bg-info">
                                            	<div class="info slideAnimate">
                                                	<div class="col-1-1 BorderBox">
                                                    	<div class="col-1-1  bgBlue xpul8 ypul8">
                                                        	<h5><?php echo e(trans('lang.reader-list')); ?></h5>
                                                        </div>
                                                        <div class="col-1-1 pul8">
                                                        	<?php echo $inst; ?>

                                                        </div>                                                	
                                                    </div>
                                                </div>
                                                </div>
                                        	<?php endif; ?>		
                                        <?php echo e(Form::textarea('logsys['.$value.']','',array('class' => 'text it textArea editers', 'rows'=>'2'))); ?>

                                    </div>  
                                    <span ddata-id="logsys-<?php echo e($counter); ?>" data-value="<?php echo e($value); ?>" data-type="logsys" class="delete_btn mrgtp25 mrgrt70" title="Remove" id="move_1">
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
                            	<div id="notes-<?php echo e($counter); ?>" class="col-1-1 relative">
                                    <div class="col-20-24 mrgbt15">
                                    		<?php $inst	=	$notes[strtolower(str_replace(' ','_',$value)).'_inst']; ?>	
                                            <?php echo e(Form::label('notes', $value,['class'=>'it nofull'])); ?>

                                            <?php if($inst!=''):?>
                                            	<div class="textareaInfo bg-info">
                                            	<div class="info slideAnimate">
                                                	<div class="col-1-1 BorderBox">
                                                    	<div class="col-1-1  bgBlue xpul8 ypul8">
                                                        	<h5><?php echo e(trans('lang.reader-list')); ?></h5>
                                                        </div>
                                                        <div class="col-1-1 pul8">
                                                        	<?php echo $inst; ?>

                                                        </div>                                                	
                                                    </div>
                                                </div>
                                                </div>
                                        	<?php endif; ?>	
                                            <?php echo e(Form::textarea('notes['.$value.']','',array('class' => 'text it textArea editers', 'rows'=>'2'))); ?>

                                    </div> 
                                    <span data-id="notes-<?php echo e($counter); ?>" data-value="<?php echo e($value); ?>" data-type="notes"  class="delete_btn mrgtp25 mrgrt70" title="Remove" >
                                   <i class="fa fa-trash"></i>
                                   </span>  
                                </div>
                            <?php $counter++; } ?>
                    	<?php } ?>
                    <?php } ?> 
                    
                    <?php if($notesother){ ?>
                    	<?php foreach($notesarray['other'] as $key => $value){?>
                        	<?php if(count($value)>1){ ?>
                            	<div id="notes-<?php echo e($counter); ?> " class="col-1-1 relative">
                                    <div class="col-20-24 mrgbt15">
                                            <?php echo e(Form::label('notes', $value[0],['class'=>'it nofull'])); ?>

                                             <?php if($value[1]!=''):?>
                                            	<div class="textareaInfo bg-info">
                                            	<div class="info slideAnimate">
                                                	<div class="col-1-1 BorderBox">
                                                    	<div class="col-1-1  bgBlue xpul8 ypul8">
                                                        	<h5><?php echo e(trans('lang.reader-list')); ?></h5>
                                                        </div>
                                                        <div class="col-1-1 pul8">
                                                        	<?php echo $value[1]; ?>

                                                        </div>                                                	
                                                    </div>
                                                </div>
                                                </div>
                                        	<?php endif; ?>	
                                            <?php echo e(Form::textarea('notes['.$value[0].']','',array('class' => 'text it textArea editers', 'rows'=>'2'))); ?>

                                    </div> 
                                    <span data-id="notes-<?php echo e($counter); ?>" data-value="<?php echo e($key); ?>" data-type="notesextra"  class="delete_btn mrgtp25 mrgrt70" title="Remove" >
                                   <i class="fa fa-trash"></i>
                                   </span> 
                                </div>
                            <?php $counter++; } ?>
                    	<?php } ?>
                    <?php } ?>  
            </div>
     		<div class="clearfix"></div>
            
            <div id="submit-report-poopup" class="col-1-1" style="min-width:500px;">
            <?php echo Html::image("public/images/icons/cancel.png","Close This Dilog Box",["onclick"=>"javascript:$(\"#message-overlayer\").trigger('click')","class"=>"closeMessageBox"]); ?>

                <h3 class="blue-head mrg0">Create Report</h3>
                <div class="col-1-1 pul15">
                    <div class="col-1-1 ymrg10">
                        <?php echo e(Form::text('script_title','',array('class' => 'text textInput it','placeholder'=>'Script Title', 'required'))); ?>

                    </div>
                    <div class="col-1-1 ymrg10">
                        <?php echo e(Form::text('script_draft','',array('class' => 'text textInput it','placeholder'=>'Draft'))); ?>

                    </div>
                    <div class="col-1-1 ymrg10">
                        <?php echo e(Form::text('script_date',date('m/d/Y'),array('class' => 'text textInput it datepicker' ,'placeholder'=>'Date','readonly'))); ?>

                    </div>
                    <div class="col-1-1 ymrg10">
                        <?php echo e(Form::textarea('script_notes','',array('class' => 'text it textArea', 'rows'=>'2' ,'placeholder'=>'Private Notes'))); ?>

                    </div>
                </div>
                <div class="col-1-1 xpul20 pulbotm20">
                    <div class="col-1-1">
                        <?php /* Form::button('Cancel',array('class'=>'btn btn-icon btn-primary fa-times right','id'=>'cancelreport')) */ ?>
                        <?php echo e(Form::submit('Save',array('class'=>'btn btn-primary  right mrgrt15','type'=>'submit'))); ?>

                    </div>
                </div>
                <?php echo e(Form::hidden('template_id',$template->id)); ?>

                    <?php if(isset($share_id)): ?>
                        <?php echo e(Form::hidden('share_id',$share_id)); ?>

                    <?php endif; ?>  
            </div>   
            
            <?php echo e(Form::close()); ?>

           </div>
             <div class="bottomNextPre">
                <div class="btn right btn-gray fa-chevron-right btn-icon-right temp-nav  xpul30" data-type="next">Next</div>
                <div class="btn right btn-gray fa-chevron-left btn-icon mrgrt15 temp-nav xpul30">Previous</div>
             </div>
            
		<div class="clearfix"></div>
        
    <?php if(auth()->check() && auth()->user()->id != $user->id): ?>
    	<?php echo view('message.message')->with(['contact'=>false,'email'=>false]); ?>

    <?php endif; ?>
    
    <?php if(!auth()->check() || auth()->user()->id == $user->id): ?>
    	<?php echo Html::script('public/js/message.js'); ?>

    <?php endif; ?> 
    
	<?php echo view('report-template.template-info')->with('template',$template); ?>

    
<script type="text/javascript">
	$(document).ready(function(){ 	
	$("#submit-report-poopup").sendMessagePopUp({'clicker':'submit-report',width:500});
	
	
	
	 
	$("#send-message").sendMessagePopUp({
			'clicker':'message-send',
			beforeOpen:function(){
			var form	=	document.getElementById("mesaage-sending-form");
			
			form.member.value	=	<?php echo e($template->user_id); ?>;
		},
		}); 
	});	
</script>
<script type="text/javascript">
var template_id	=	<?php echo e($template->id); ?>;

	$(document).ready(function(){ 
});	

</script> 

	<?php echo Html::Script('public/js/specified/template-view.js'); ?>

    <?php echo Html::Script("public/plugins/tiny_mce/tiny_mce.js"); ?>

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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.myaccount', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>