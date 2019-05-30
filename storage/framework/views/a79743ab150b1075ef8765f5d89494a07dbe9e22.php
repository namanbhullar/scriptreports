<?php 
	
	$favorite->load('template.user.profile');
	$template	=	$favorite->template;
	//$template	=	
	//dump($template);
	
	$arcived		=	(bool) $favorite->status;
	$formArray		=	(!empty($template->form)) ? $template->form : [];
	$genreArray		=	(!empty($template->genre)) ? $template->genre : [];
	$subgenreArray	=	(!empty($template->subgenre)) ? $template->subgenre : [];
	
	$form		=	(strtolower($formArray[0]) 		== 'other') ? $formArray[1] 	: $formArray[0] ;
	$genre		=	(strtolower($genreArray[0]) 	== 'other') ? $genreArray[1] 	: $genreArray[0] ;
	$subgenre	=	(strtolower($subgenreArray[0]) 	== 'other') ? $subgenreArray[1] : $subgenreArray[0] ;
	
	$arcived	=	(bool) $favorite->status;
	
?>
<div class="col-1-1 item-box pul10 mrgbt10" data-tab="<?php echo e(($arcived) ? "template" : "archived"); ?>" id="favorite<?php echo e($favorite->id); ?>">
    <div class="col-1-24">
        <span class="ul-checkbox fa fa-square-o"></span>
        <div class="task-div">
            <ul class="task-ul" data-id="<?php echo e($favorite->id); ?>">
                 <li data-task="archived" <?php echo (!$arcived) ? 'style="display:none;"' : ""; ?>>
                    <?php echo e(trans('lang.archive')); ?>

                </li>
                <li data-task="unarchived" <?php echo (!$arcived) ? "" : 'style="display:none;"'; ?>>
                    <?php echo e(trans('lang.unarchived')); ?>

                </li>
                <li data-task="delete">
                    <?php echo e(trans('lang.delete')); ?>

                </li>
            </ul>
        </div>                
    </div>
    <div class="left mrgrt20">
        <div class="inbox-thumnail ">     
	        <?php echo $template->user->profile->image; ?>

        </div>
    </div>
    <div class="col-8-24">
         <h4 class="item-head">
            <?php echo e(str_limit($template->title,40)); ?>

         </h4>
         <div class="item-detail">
            <span class="date" ><?php echo e(date('F j, Y',strtotime($favorite->created_at))); ?></span>
         </div>
    </div>            
    <div class="col-8-24">
         <div class="item-detail text-center">
            <?php if(!empty($form)): ?> <?php echo e(str_limit($form,25)); ?> <br/> <?php endif; ?>
            <span class="date col-1-1">
            	<?php 
					if(!empty($genre)) echo $genre;
					if(!empty($genre) &&  !empty($subgenre)) echo "&nbsp;/&nbsp;";
					if(!empty($subgenre)) echo $subgenre;
				?>
                
            </span>
         </div>
    </div>
    <div class="col-4-24 right">
        <div class="item-right-main">
            <div class="item-right-item mrgbt5 bg-template mrgtp20"><a href="<?php echo $template->link; ?>"><?php echo e(trans('lang.view-template')); ?></a></div>
        </div>
    </div>
    
    <div class="clearfix"></div>
</div>