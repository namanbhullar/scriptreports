<?php echo Form::open(['route'=>'send-message','method'=>'post','files'=>'true','id'=>'mesaage-sending-form']); ?>


<div id="send-message" class="pop-up">
    <div class="col-1-1 relative">
        <h3 class="blue-head mrg0" id="sendMesageHeading"><?php echo e(trans('menu.message')); ?></h3>
        <?php echo Html::image("public/images/icons/cancel.png","Close This Dilog Box",["onclick"=>"javascript:$(\"#message-overlayer\").trigger('click')","class"=>"closeMessageBox"]); ?>

    </div>
    <div class="col-1-1 pul20">
    	<?php if($email): ?>
        <div class="col-1-1">
            <div class="col-1-1">
            <label class="pop-up-label it ymrg5">Email</label>
            </div>
            <div class="col-5-7">
                <input type="text"  name="email" class="text textInput it ymrg5"/>
            </div>
        </div>
        <?php endif; ?>
        
        <?php if($contact): ?>
        <?php $exitsarray	=	array(); ?>
            <?php if($MSGcontacts): ?>
                <div class="col-1-1">
                    <div class="col-1-1">
                    <label class="pop-up-label it ymrg5"> <?php echo e(trans('menu.contacts')); ?></label>
                    </div>
                    <div class="col-5-7">
                     <select name="member" id="member">
                            <option value="0">Select Member</option>
                            <?php foreach($MSGcontacts as $member){ 
								$exitsarray[] = $member->contact_userid;
							?>
                             <option value="<?php echo e($member->contact_userid); ?>"><?php echo e($member->contactUser->profile->full_name); ?></option>
                            <?php } ?>
                            
                            <?php if($MSGreaders): ?>
                            	<?php foreach($MSGreaders as $reader): ?>
                            		<?php if(!in_array($reader->reader_id,$exitsarray)): ?>
                             			<option value="<?php echo e($reader->reader_id); ?>"><?php echo e($reader->user->profile->full_name); ?></option>
                             		<?php endif; ?>
                            	<?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>
        
        <?php if($ScriptPermission): ?>
        	<div class="col-1-1">
                <div class="col-1-1">
                    <label class="pop-up-label it ymrg5"><?php echo e(trans('lang.permission')); ?></label>
                </div>            
                <div class="col-5-7">
                    <select name="permission" id="permission">
                        <option value="0">Select <?php echo e(trans('lang.permission')); ?></option>
                         <option value="view">View only</option>
                         <option value="edit">Edit</option>
                    </select>
                </div>
            </div>
        <?php endif; ?>
        
        <div class="col-1-1">
            <div class="col-1-1">
                <label class="pop-up-label it ymrg5">Subject</label>
            </div>            
            <div class="col-1-1">
                <input type="text"  name="subject" class="text textInput it ymrg5"/>
            </div>
        </div>
        
        <div class="col-1-1">
            <div class="col-1-1">
                <label class="pop-up-label it ymr5">Message</label>
            </div>
            <div class="col-1-1 mrgbt10">
                <?php echo Form::textarea('message',null,array('class' => 'textArea ymrg5', 'placeholder' => 'Type Your Message here',required)); ?>

            </div>
        </div>    
        <div class="col-1-1 ">
        	<?php if($MSGscripts): ?>
            <div class="col-1-5 pulrt2" id="add-script">
            	 <?php if(count($MSGscripts)){ ?>
                    <div id="script-div-<?php echo e(count($MSGscripts)); ?>" class="user-scripts">
                        <ul class="script-list">
                            <?php $count	=	1;
                                foreach($MSGscripts as $script) : ?>
                                <li title="<?php echo e($script->title); ?>" id="list-<?php echo e($script->id); ?>" class="in-active" data-id="<?php echo e($script->id); ?>" data-title="<?php echo e(str_limit($script->title,15)); ?>">
                                    <?php echo e($count); ?>.&nbsp;<?php echo e(str_limit($script->title,40)); ?>

                                </li>
                            <?php $count++; endforeach; ?>
                        </ul>
                    </div>
                <?php }else{ ?>
                    <div id="no-script" class="user-scripts"><p>No ScriptPacs found</p></div>
                <?php } ?>
                <div class="btn btn-icon bg-add-script" ><?php echo e(trans("lang.script-pac")); ?></div>
            </div>
            <?php endif; ?>
            
            <?php if($MSGtemplates): ?>
            <div class="col-1-5 xpul2" id="add-template">
            
            	<?php if(is_array($MSGtemplates) && count($MSGtemplates)){ ?>
                    <div id="template-div-<?php echo e(count($templates)); ?>" class="user-templates" id="MSGUserTemplates">
                        <ul class="template-list">
                            <?php $count	=	1;
                                foreach($MSGtemplates as $template) : ?>
                                <li title="<?php echo e($template->title); ?>" class="in-active" data-id="<?php echo e($template->id); ?>" data-title="<?php echo e(str_limit($template->title,12)); ?>">
                                    <?php echo e($count); ?>.&nbsp;<?php echo e(str_limit($template->title,26)); ?>

                                </li>
                            <?php $count++; endforeach; ?>
                        </ul>
                    </div>
                <?php }else{ ?>
                    <div id="no-templtes" class="user-templates" id="MSGUserTemplates">
                    	<ul class="template-list">
                        	<p><?php echo e(trans('lang.no-template')); ?></p>
                        </ul>
                    </div>
                <?php } ?>
                
                <div class="btn btn-icon bg-add-template" ><?php echo e(trans("lang.template")); ?></div>
            </div>
            <?php endif; ?>
            
            <div class="col-1-5 xmrg2" id="add-my-docs">
                <div class="documents-list">
                    <ul class="docs-list">                   
                    </ul>
                </div>
                <div class="btn btn-icon bg-add-docs" ><?php echo e(trans("lang.my-docs")); ?></div>
            </div>
            <div class="col-1-5 mrglft2" id="upload-docs">
            	<div class="upload-list">
                	<ul class="uploaded-list">
                    </ul>
                </div>
                <div style="display:none" id="FilesDiv">
                	<?php echo Form::file('attach_file[]',["id"=>"MSGfileBtn1","onchange"=>"attachfileSelect(event)","accept"=>"application/pdf"]); ?>

                </div>
                <div class="btn btn-icon bg-clip" onclick="javascript:$('#MSGfileBtn1').trigger('click')" ><?php echo e(trans("lang.upload")); ?></div>
            </div>
            <div class="col-1-6 right">
            	<?php echo Form::submit(trans("lang.send"),['class'=>'btn btn-primary right xpul30']); ?>

            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>

<?php if(!$contact): ?>
	<?php echo Form::hidden('member',''); ?>

<?php endif; ?>

<?php echo Form::hidden('script_id','',['id'=>'MSGScriptId']); ?>

<?php echo Form::hidden('template_id','',['id'=>'MSGTemplateId']); ?>

<?php echo Form::hidden('document_id','',['id'=>'MSGDocumentId']); ?>

<?php echo Form::hidden('redirect_url',$redirect_url,['id'=>'MSGDocumentId']); ?>

<?php if($report): ?>
 <?php echo Form::hidden('report_id',null); ?>

<?php endif; ?>
<?php echo Form::close(); ?>


<?php $__env->startPush('script'); ?>
	
    <?php echo Html::script("public/js/message.js"); ?>

	
<?php $__env->stopPush(); ?>

<?php $__env->startPush('css'); ?>
	<style>
		body.message-lock{
			overflow:hidden;
		}
		#add-template,
		#add-script,
		#add-my-docs,
		#upload-docs{
			position:relative;
		}
		
		.user-templates,
		.user-scripts,
		.documents-list,
		.upload-list {
			background-color: #D9D9D9;
			border-radius: 5px;
			color: #233649;
			display: block;
			position: absolute;
			top: -77px;
			width: 285px;
			display:none;
		}
		
		.user-templates ul,
		.user-scripts ul,
		.documents-list ul,
		.upload-list ul{ 
			padding: 10px;
		 }
		 
		.user-templates li ,
		.user-scripts li,
		.documents-list li,
		.upload-list li{
			cursor:pointer;
			border-radius: 5px;
			font-family: Raleway;
			font-size: 14px;
			font-weight: 600;
			line-height: 19px;
			margin-bottom: 5px;
			padding: 7px;
			width: 100%;
			z-index: 505;
		}
		
		.user-templates li:hover,
		.user-scripts li:hover,
		.documents-list li:hover,
		.upload-list li:hover{
			color:#fff;
			background-color: #6DBCDB;
		}
		
		.user-templates li:last-child,
		.user-scripts li:last-child,
		.documents-list li:last-child,
		.upload-list li:last-child{
			margin-bottom:0px;
		}
		i.closeBtn{
			background-color:#6DBCDB ;
			border-radius: 50%;
			color:#2A4764;
			float: right;
			font-size: 16px;
			height: 20px;
			line-height: 19px;
			padding-left: 1px;
			text-align: center;
			width: 20px;
		}
		i.closeBtn:hover{
			background-color:#2A4764;
			color:#6DBCDB;
		}
    </style>
<?php $__env->stopPush(); ?>
