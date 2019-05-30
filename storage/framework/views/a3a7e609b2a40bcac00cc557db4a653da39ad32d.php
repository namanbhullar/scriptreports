<?php $__env->startSection('content'); ?>  
<?php 
	$newnreadcount		=	Auth()->user()->ScriptSharedToME()->where('is_seen',0)->where('feedback_icon',NULL)->count();
	$prtunreadcount		=	Auth()->user()->ScriptSharedToME()->where('is_seen',0)->where('feedback_icon','Priority')->count();
	$otherunreadcount	=	Auth()->user()->ScriptSharedToME()->where('is_seen',0)->whereIn('feedback_icon',['recomd-writer','buy','Recommended','Considered','Rejected'])->count();
 
?>
<div id="scriptsindex">
    <div class="col-1-1 heading_tital">
        <h1 class="left"><?php echo e(trans('menu.script-manager.scripts')); ?></h1>
        <div class="right">
            <div class="itemSearch">
                <?php echo e(Form::open(array('route'=>'scripts.index','method'=>'get'))); ?>

                <?php echo e(Form::text('search_script',request()->get('search_script'),['placeholder'=>'Search By Title'])); ?>

                <?php echo e(Form::submit('Search')); ?>

                <?php echo e(Form::hidden('form',request()->get('form'))); ?>

                <?php echo e(Form::hidden('genre',request()->get('genre'))); ?>

                <?php echo e(Form::close()); ?>

              </div>
        </div>
    </div>
    <div class="row">
    	<div class="col-md-12">
        	<?php if(auth()->user()->user_group == 4): ?>
                <ul class="top-tabs scripts-producer left" id="tabs">
                    <li class="active no-icon" data-tab="new">
                    New
                     <?php if($newnreadcount): ?>
                    	<span id="script_unread" class="script-un-read"><?php echo e($newnreadcount); ?></span>
                     <?php endif; ?>
                    </li>
                    <li class="bg-star" data-tab="Priority">
                    <?php echo e(trans('lang.priority')); ?>

                    <?php if($prtunreadcount): ?>
                    	<span id="script_priority_unread" class="script-un-read"><?php echo e($prtunreadcount); ?></span>
                     <?php endif; ?>
                    </li>              
                    <li class="bg-suitcase deeper-nav sdeeper-tab bg-angle-down" data-tab="Recommended">
                    	
                        <span class="indicater li-suitcase"></span>
                        <span class="ltext">Recommend</span>
                        <?php if($otherunreadcount): ?>
                    		<span id="script_other_unread" class="script-un-read"><?php echo e($otherunreadcount); ?></span>
                     	<?php endif; ?>
                        <ul class="sub-tab-nav slideAnimate">
                            <li class="li-recommend" style="display:none" data-tab="Recommended">Recommend</li>
                            <li class="li-buy" data-tab="buy">Buy</li>                            
                            <li class="li-recommend-writer" data-tab="recomd-writer">Recommend Writer</li>
                            <li class="li-consider" data-tab="Considered">Consider</li>
                            <li class="li-pass" data-tab="Rejected">Pass</li>
                            <li class="li-suitcase" data-tab="archived"><?php echo e(trans('lang.archive')); ?></li>
                        </ul>
                    </li>
                    <li class="bg-script" data-tab="my-script"><?php echo e(trans('lang.my-scripts')); ?></li>
                </ul>        		
            <?php else: ?>
                <ul class="top-tabs scripts left" id="tabs">
                    <li class="active bg-script" data-tab="my-script"><?php echo e(trans('lang.my-scripts')); ?></li>
                    <li class="bg-star" data-tab="priority"><?php echo e(trans('lang.priority')); ?></li>
                    <li class="bg-glasses" style="background-position:4px center" data-tab="read">
                    <?php echo e(trans('lang.read')); ?>

                    <?php if($newnreadcount): ?>
                    	<span id="script_unread" class="script-un-read"><?php echo e($newnreadcount); ?></span>
                     <?php endif; ?>
                    <?php if($scripunreadcount): ?>
                    	<span id="script_unread" class="script-un-read"><?php echo e($scripunreadcount); ?></span>
                    <?php endif; ?>
                    </li>
                    <li class="bg-suitcase" data-tab="archived"><?php echo e(trans('lang.archive')); ?></li>
                </ul>
            <?php endif; ?>
            <div class="sortReports search right">
            <form id="sortscritform" action="<?php echo e(route('scripts.index')); ?>" method="get" style="float:left">
            		<?php echo Form::select('form',FormList(),request()->get('form'),['style'=>'width:110px;','class'=>'pul5 mrglft10' ,'onchange'=>'this.form.submit()']); ?>

                    <?php echo Form::select('genre',GenreList(),request()->get('genre'),['style'=>'width:110px;','class'=>'pul5 mrglft10' ,'onchange'=>'this.form.submit()']); ?>

                    <?php echo e(Form::hidden('search_script',request()->get('search_script'))); ?>

               </form>
          </div>
        </div>
    </div>
    <div class="row mrgtp20">
    <?php $show_norecords = true; ?>
        <?php foreach($AllData as $data): ?>
        <?php 
		
			//echo "<pre>"; print_r($AllData); exit;
			$user_id	=	auth()->user()->id;
			$tracker	=	$data;
			$script		=	$data->script;

			$scriptauthor	=	$user_id == $script->created_by;
			
			$script->load('agent.address','manager.address');
				//dump($tracker);		
			if($scriptauthor){
				$tab = $tracker->tabauthor;
			}else{
				$tab = $tracker->tab;
			}
			
			//print_r($tab); 
			
			if(auth()->user()->user_group == 4 && $tab == 'new') $show_norecords = false;
			elseif(auth()->user()->user_group != 4 && $tab == 'my-script') $show_norecords = false;
			
			$pvtnotes	=	$data->notes;
			//dump($script)
		?>
            <div class="item-box pul0 scripts mrgbt20 <?php echo e(($data->is_seen == 0 ) ? "bglightSky" : ""); ?>" data-tab="<?php echo e($tab); ?>" id="scripts<?php echo e($data->id); ?>">
               <div class="col-1-1 xpul15 pultop15 mrgbt15">
                <div class="col-1-24" style="position:relative;">
                    <span class="ul-checkbox fa fa-square-o"></span>
                    <div class="task-div">
                    	<ul class="task-ul" data-id="<?php echo e($data->id); ?>">
                        	<li data-task="priority" <?php echo e(($liPriority) ?"style=display:block" : "style=display:none"); ?> >
                            	<?php echo e(trans('lang.mark-as')); ?> <?php echo e(trans('lang.priority')); ?>

                            </li>
                            <li data-task="default" <?php echo e(($liDefault) ? "style=display:block"  : "style=display:none"); ?> >
                            	<?php echo e(trans('lang.mark-as')); ?> <?php echo e(($scriptauthor) ? trans('lang.my-scrip') : trans('lang.read')); ?>

                            </li>
                            <li data-task="archived" <?php echo e(($liArchived) ? "style=display:block" : "style=display:none"); ?> >
                            	<?php echo e(trans('lang.archive')); ?>

                            </li>
                            <li data-task="delete">
                            	<?php echo e(trans('lang.delete')); ?>

                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-23-24">
                    <div class="col-4-5">
                        <h3 class="item-head script">
                        	<a href="<?php echo e(($scriptauthor) ? url('/myaccount/script-manager/scripts/'.$script->id.'/view') : url('/myaccount/script-manager/scripts/'.$script->id.'/view/'.$tracker->id)); ?>">
                            	<?php echo e(str_limit($script->title,20)); ?>

                            </a>
                            <?php if(!empty($script->draft_number)): ?>
                                <span>&nbsp;-&nbsp;Draft <?php echo e($script->draft_number); ?></span>
                            <?php endif; ?>
                            
                        </h3>
                        <?php if(!empty($script->created_date)): ?>
                        <div class="item-detail mrgbt10">
                        	<?php echo ShortScriptInfo($script); ?>&nbsp;&nbsp;&nbsp;
                            <span class="date script"><?php echo date('F j, Y',strtotime($script->created_date)); ?></span>
                        </div>
                        <?php endif; ?>
                        <div class="item-desc col-4-5 ">
                            <p class="mrg0">
	                                <?php echo e(str_limit($script->logline,200)); ?>

                            </p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="col-1-5 item-right-main script">
                        <div class="item-right-item mrgbt5 bg-info scriptinfo" data-id="#scrriptInfo<?php echo e($data->id); ?>"><?php echo e(trans('lang.script-info')); ?></div>
                        <div class="item-right-item mrgbt5 bg-pencil  writerInfo" data-id="#writerInfo<?php echo e($data->id); ?>"><?php echo e(trans('lang.writer-info')); ?></div>
                        <?php if(auth()->user()->id != $script->created_by): ?>
                        	<div class="item-right-item bg-chat sendmessageso" data-id="<?php echo e($script->id); ?>"><?php echo e(trans('lang.send-message')); ?></div>
                        <?php endif; ?>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
               </div>
               <div class="h-line"></div>
               <div class="xpul15 ypul10 "> 
                <?php if(auth()->user()->user_group == 4 && auth()->user()->id != $script->created_by): ?>
                    <div class="col-1-2">
                        <div class="scriptFeedbackselect">
                            <div class="fbdk-head"> Assign script to folder </div>
                            <ul data-id="<?php echo e($script->id); ?>" data-tid="<?php echo e($tracker->id); ?>" class="">
                                <li data-feedback="Priority" class="li-priroity <?php echo e(($tracker->feedback_icon == 'Priority') ? "active" : ""); ?>" ><?php echo e(trans('lang.priority')); ?></li>
                                <li data-feedback="Rejected" class="li-pass <?php echo e(($tracker->feedback_icon == 'Rejected') ? "active" : ""); ?>">Pass</li>
                                <li data-feedback="Considered" class="li-consider <?php echo e(($tracker->feedback_icon == 'Considered') ? "active" : ""); ?>">Consider</li>
                                <li data-feedback="Recommended" class="li-recommend <?php echo e(($tracker->feedback_icon == 'Recommended') ? "active" : ""); ?>">Recommend</li>
                                <li data-feedback="buy" class="li-buy <?php echo e(($tracker->feedback_icon == 'buy') ? "active" : ""); ?>">Buy</li>
                                <li data-feedback="recomd-writer" class="li-recommend-writer <?php echo e(($tracker->feedback_icon == 'recomd-writer') ? "active" : ""); ?>">Recommend Writer</li>
                            </ul>
                        </div>
                    </div>
                <?php endif; ?>     
                <?php
				
					if(!$scriptauthor && $tracker->permissions == 'edit')
					{
						$class1	=	'col-2-3';
						$class2	=	'col-1-4';
					}
					elseif(!$scriptauthor && $tracker->permissions != 'edit')
					{
						$class1	=	'col-1-5';
						$class2	=	'col-1-1';
					}
					else
					{
						if(auth()->user()->user_group==4){
							$class1	=	'col-2-3';
							$class2	=	'col-1-4';	
						}else{	
							$class1	=	'col-2-2';
							$class2	=	'col-1-5';
							}
					}
				?>         	  
                  <div class="<?php echo e($class1); ?> right">
                  <?php if($scriptauthor && auth()->user()->user_group !=4): ?>
                  <div class="<?php echo e($class2); ?>">
                    	<a href="javascript:void(0)" class="btn btn-icon  <?php echo e(($script->isposted == 1) ? "bg-user-times pdlft35" : "fa-user"); ?>" id="postUnpostScript<?php echo e($script->id); ?>" <?php if($script->isposted == 1): ?> onclick="UnpostScript(<?php echo e($script->id); ?>)"> Unpost from profile <?php else: ?> onclick="PostScript(<?php echo e($script->id); ?>)"> Post to profile <?php endif; ?> </a>
                    </div>
                  <?php endif; ?> 
                  
                        <div class="<?php echo e($class2); ?>">
                            <div class="left btn btn-icon bg-notes pdlft35" onclick="showPrivateNotes(<?php echo e($tracker->id); ?>)"><?php echo e(trans('lang.private-notes')); ?></div>
                        </div>
                        <?php if($scriptauthor): ?>
                        	<div class="<?php echo e($class2); ?>">
                                <div class="left btn btn-icon bg-share share_script pdlft35" data-id="<?php echo e($script->id); ?>">Share Script</div>
                            </div>
                            <div class="<?php echo e($class2); ?>">
                                <a class="left btn btn-icon fa-edit" href="<?php echo e(route('script.edit',['id'=>$script->id])); ?>" >
                                    <?php echo e(trans('lang.edit-scriptpac')); ?>

                                </a>
                            </div>
                        <?php else: ?>
                            <?php if($tracker->permissions == 'edit'): ?>
                            <div class="<?php echo e($class2); ?>">
                                <div class="left btn btn-icon bg-share share_script pdlft35" data-id="<?php echo e($script->id); ?>">Share Script</div>
                            </div>
                            <div class="<?php echo e($class2); ?>">
                                <a class="left btn btn-icon fa-edit" href="<?php echo e(route('script.edit',['id'=>$script->id])); ?>" >
                                    <?php echo e(trans('lang.edit-scriptpac')); ?>

                                </a>
                            </div>
                            <?php endif; ?>
                        <?php endif; ?>
                        
                        <?php if($scriptauthor || $tracker->permissions == 'edit'): ?>
                            <div class="<?php echo e($class2); ?>">
                                <a class="left btn btn-icon bg-track pdlft35" href="<?php echo e(URL::route('script.track',['id'=>$script->id])); ?>" >Track Script</a>
                            </div>
                        <?php endif; ?>
                  </div>
                  <div class="clearfix"></div>
               </div>
               <div class="clearfix"></div>
            </div>
            <?php echo view('script-manager.scripts.script-info')->with(['script'=>$script,'id'=>$data->id]); ?>

            <?php echo view('script-manager.scripts.writer-info')->with(['script'=>$script,'id'=>$data->id]); ?>

        <?php endforeach; ?>
        
        <div class="item-box no-records row" <?php echo e(($show_norecords) ?  "style=display:block" : "style=display:none"); ?>>
        	<p><?php echo e(trans('lang.no-record')); ?></p>
        </div>
    </div>
    
    <?php echo csrf_field(); ?>

    	
<?php echo view('message.message')->with(['contact'=>true,'email'=>false,'MSGtemplates'=>ture,'MSGscripts'=>false,'redirect_url'=>'script-share','ScriptPermission'=>true]); ?>


<div style="display:none">  
  
    <!-- Private Notes-->
<div id="private-notes" class="col-1-1">
    <h3 class="blue-head mrg0">Private Notes</h3>
    <?php echo e(Form::open(array('url' =>URL::to('myaccount/set-pv-notes'),'id'=>'privateNoteForm'))); ?>

    <div class="col-1-1 pul20 ">
        <div class="col-1-1 margtp15">
            <?php echo e(Form::textarea('pvnotes',null,array('class' => 'text textArea it', 'placeholder' => 'Type Your Private Note',required,'rows'=>'3'))); ?>

        </div>
        <div class="col-1-1 ymrg5">
            <?php echo e(Form::button('Save Notes',array('class'=>'btn btn-icon btn-primary fa-save right','id'=>'SaveNoteBtn'))); ?>

        </div>
    </div>
    <?php echo e(Form::hidden('item_id',"")); ?>

    <?php echo e(Form::hidden('script_id',"")); ?>

    <?php echo e(Form::close()); ?>

</div>
<!-- Private Notes-->

    <!-- Send Message To Script Owner -->
<div id="sendMessageToScriptOwner" class="col-1-1">
    <h3 class="blue-head mrg0">Send Message To Script Owner</h3>
    <?php echo e(Form::open(array('route'=>'MsgToScptOwnr','method'=>'post','id'=>'mesaagetoownerform'))); ?>

    <div class="col-1-1 pul20 ">
    	 <div class="col-1-1">
            <div class="col-1-1">
                <label class="pop-up-label it ymrg5">Subject</label>
            </div>            
            <div class="col-1-1">
                <input type="text"  name="subject" class="text textInput it ymrg5"/>
            </div>
        </div>
        <div class="col-1-1 margtp15">
            <?php echo e(Form::textarea('message',null,array('class' => 'text textArea it', 'placeholder' => 'Type Your Message',required,'rows'=>'3'))); ?>

        </div>
        <div class="col-1-1 ymrg5">
            <?php echo e(Form::submit('SEND',array('class'=>'btn btn-icon btn-primary fa-save right',))); ?>

        </div>
    </div>
    <?php echo e(Form::hidden('script_id',"")); ?>

    <?php echo e(Form::close()); ?>

</div>
<!-- Send Message To Script Owner -->

</div>
</div>
<?php $__env->startPush('css'); ?>
<style>
.item-box.scripts[data-tab="Priority"],
.item-box.scripts[data-tab="archived"],
.item-box.scripts[data-tab="<?php echo (auth()->user()->user_group == 4) ? "my-script" : "new"; ?>"],
.item-box.scripts[data-tab="Rejected"],
.item-box.scripts[data-tab="Considered"],
.item-box.scripts[data-tab="Recommended"],
.item-box.scripts[data-tab="buy"],
.item-box.scripts[data-tab="recomd-writer"]{
	display:none;
}
</style>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('script'); ?>
	<?php echo e(Html::script('public/js/specified/scripts.js')); ?>    
    <script>
		ActiveTab = '<?php echo (auth()->user()->user_group != 4) ? "my-script" : "new"; ?>"]';
	</script>
<?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.myaccount', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>