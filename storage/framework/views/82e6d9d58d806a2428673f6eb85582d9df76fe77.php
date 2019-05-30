<?php $isWriterInfoEmpty	=	true; ?>
<div class="col-1-1 slideAnimate " id="writerInfo<?php echo e($id); ?>">

    <div class="col-1-1 BorderBox">
        <div class="col-1-1  bgBlue">
            <h5 class="headonBlue"><?php echo e(trans('lang.writer-info')); ?></h5>
        </div>   
        <div class="col-1-1 pul15 scriptInfoDetail CustomScrollbar">
            <?php if(!empty($script->writer_info) && is_array($script->writer_info) && count($script->writer_info)): ?>
            	<?php $isWriterInfoEmpty = false; ?>
                <div class="col-1-1 mrgbt15">
                    <div class="col-1-1">
                        <h4><b>Script Writer</b></h4>
                    </div>
                    <?php foreach($script->writer_info as $info): ?>
                        <div class="col-1-1 mrgbt7">
                        <?php if(!empty($info['link']) && preg_match('#'.URL::to('/').'#',$info['link'])): ?>
                            <a href="<?php echo e($info['link']); ?>"> <?php echo $info['name']; ?> </a>
                        <?php else: ?>
                            <?php echo $info['name']; ?>

                        <?php endif; ?>
                        <?php if(!empty($info['phone'])): ?>
                            <br/><?php echo e($info['phone']); ?>

                        <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                    <div class="clearfix"></div>
                </div>
            <?php endif; ?>
            
            <?php if(!empty($script->story_by) && is_array($script->story_by)): ?>    
            <?php $isWriterInfoEmpty = false; ?>
                <div class="col-1-1 mrgbt15">
                    <div class="col-1-1">
                        <h4><b>Story By</b></h4>
                    </div>
                    <?php foreach($script->story_by as $info): ?>
                        <div class="col-1-1 mrgbt7">
                        <?php if(!empty($info['link']) && preg_match('#'.URL::to('/').'#',$info['link'])): ?>
                            <a href="<?php echo e($info['link']); ?>"> <?php echo $info['name']; ?> </a>
                        <?php else: ?>
                            <?php echo $info['name']; ?>

                        <?php endif; ?>
                        <?php if(!empty($info['phone'])): ?>
                            <br/><?php echo e($info['phone']); ?>

                        <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                    <div class="clearfix"></div>
                </div>
            <?php endif; ?>
            
            <?php if(!empty($script->source) && is_array($script->source)): ?>    
            <?php $isWriterInfoEmpty = false; ?>
                <div class="col-1-1 mrgbt15">
                    <div class="col-1-1">
                        <h4><b>Source Material</b></h4>
                    </div>
                    <?php foreach($script->source as $info): ?>
                        <div class="col-1-1 mrgbt7">
                           	<?php echo e((!empty($info['title'])) ? $info['title'] : ""); ?> 
                            <?php echo e((!empty($info['title']) && !empty($info['form'][0])) ? "-" : ""); ?>         
                            
                            <?php if(!empty($info['form'])): ?>
                            <?php echo e((strtolower($info['form'][0]) != 'other') ? $info['form'][0] : ""); ?>

                            <?php endif; ?>
                            <?php echo !empty($info['phone']) ? "<br/>".$info['phone'] : ""; ?>

                        </div>
                    <?php endforeach; ?>
                    <div class="clearfix"></div>
                </div>
            <?php endif; ?>
                       
            <?php if(!is_null($script->agent) && !empty($script->agent->name)): ?>    
            <?php $isWriterInfoEmpty = false; ?>
            <?php $agent =  $script->agent;?>
                <div class="col-1-1 mrgbt15">
                    <div class="col-1-1">
                        <h4><b>Agent</b></h4>
                    </div>
                    <div class="col-1-1 mrgbt7">
                        <?php if(!empty($agent->link) && preg_match('#'.URL::to('/').'#',$agent->link)): ?>
                            <a href="<?php echo e($agent->link); ?>"> <?php echo $agent->name; ?> </a>
                        <?php else: ?>
                            <?php echo $agent->name; ?>

                        <?php endif; ?>
                        <?php echo (!empty($agent->company)) ? "<br />".$agent->company : ""; ?>

                        <?php echo (!empty($agent->phone)) ? "<br />".$agent->phone : ""; ?>

                        
                        <?php if(!is_null($agent->address)): ?>
                        <?php echo (!empty($agent->address->street)) ? "<br />".$agent->address->street : ""; ?>

                        <?php echo (!empty($agent->address->city)) ? "<br />".$agent->address->city.",&nbsp;" : ""; ?>                        
                        <?php echo (!empty($agent->address->state)) ? $agent->address->state : ""; ?>

                        <?php echo (!empty($agent->address->zip)) ? "&nbsp;".$agent->address->zip : ""; ?>

                        
                        <?php echo (!empty($agent->address->country)) ? "<br />".$agent->address->country : ""; ?>

                        <?php endif; ?>
                    </div>
                    <div class="clearfix"></div>
                </div>
            <?php endif; ?>
            
            
            <?php if(!is_null($script->manager) && !empty($script->manager->name)): ?>    
            <?php $isWriterInfoEmpty = false; ?>
            <?php $manager =  $script->manager;?>
                <div class="col-1-1 mrgbt15">
                    <div class="col-1-1">
                        <h4><b>Manager</b></h4>
                    </div>
                    <div class="col-1-1 mrgbt7">
                        <?php if(!empty($manager->link) && preg_match('#'.URL::to('/').'#',$manager->link)): ?>
                            <a href="<?php echo e($manager->link); ?>"> <?php echo $manager->name; ?> </a>
                        <?php else: ?>
                            <?php echo $manager->name; ?>

                        <?php endif; ?>
                        <?php echo (!empty($manager->company)) ? "&nbsp;-&nbsp;".$manager->company : ""; ?>

                        <?php echo (!empty($manager->phone)) ? "<br />".$manager->phone : ""; ?>

                        
                        <?php if(!is_null($manager->address)): ?>
                        <?php echo (!empty($manager->address->street)) ? "<br />".$manager->address->street : ""; ?>

                        <?php echo (!empty($manager->address->city)) ? "<br />".$manager->address->city.",&nbsp;" : ""; ?>

                        <?php echo (!empty($manager->address->state)) ? $manager->address->state : ""; ?>

                        <?php echo (!empty($manager->address->zip)) ? "&nbsp;".$manager->address->zip : ""; ?>

                        <?php echo (!empty($manager->address->country)) ? "<br />".$manager->address->country : ""; ?>

                        <?php endif; ?>
                    </div>
                    <div class="clearfix"></div>
                </div>
            <?php endif; ?>
            
            <?php if($isWriterInfoEmpty): ?>
            	<h4>No Info available</h4>
            <?php endif; ?>
            
        </div>
    </div>
</div>