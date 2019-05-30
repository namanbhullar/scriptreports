<div class="dash-profile">
            
    <div class="dash-logo">
        <a href="<?php echo e(url('/')); ?>" ><?php echo Html::image('public/images/dash-logo.png','logo.png'); ?></a>
    </div>
    
    <div class="dash-search">
        <input type="text" placeholder="search"/>
        <input class="dash-botton" type="button" name="" value=""/>
    </div>
    <div class="dash-profile-bottom">
        <div class="setting">                         
            <ul class="profile-menu setting-icon">
                <?php foreach($menus as $name=>$link): ?>
                    <li <?php echo array_key_exists($name,$submenu) ? "class=\"parent\"" : ""; ?>>
                        <a href="<?php echo e($link); ?>" <?php echo in_array($name,$active['main']) ? "class=\"active\"" : ""; ?> >
                        	<span><?php echo e(trans("menu.$name")); ?></span>                            
                            <?php if(array_key_exists($name,$unReadCount) && !empty($unReadCount[$name])): ?>
                                <span id="<?php echo e($name); ?>_unread" class="count"><?php echo e($unReadCount[$name]); ?></span>
                            <?php endif; ?>
                        </a>
                        <?php if(array_key_exists($name,$submenu)): ?>
                        	<ul class="sub_menu" <?php echo array_key_exists($name,$submenu) ? "" : "style=\"display:none\""; ?>>
                            	<?php foreach($submenu[$name] as $sbname=>$sblink): ?>
                                	<li>
                                    	<a href="<?php echo e($sblink); ?>" <?php echo (in_array($name,$active['main']) && in_array($sbname,$active['sub'][$name])) ? "class=\"active\"" : ""; ?>>				
                                        	<span><?php echo e(trans("menu.$name.$sbname")); ?></span>
                                            <?php if(array_key_exists($name.".".$sbname,$unReadCount) && !empty($unReadCount["$name.$sbname"])): ?>
                                            	<span id="<?php echo e($sbname); ?>_sub_unread"  class="count"><?php echo e($unReadCount["$name.$sbname"]); ?></span>
                                            <?php endif; ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                                <div class="clearfix"></div>
                            </ul>
                            <i class="fa fa-minus"></i>
                       <?php endif; ?>                       
                    </li>
                <?php endforeach; ?>
                <div class="clearfix"></div>
            </ul>                
        </div>                    
    </div>
    
    <div class="clearfix"></div>
</div>