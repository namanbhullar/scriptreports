<?php $__env->startSection('content'); ?>

<?php $__env->startPush('css'); ?>
	<?php echo Html::style('public/css/report-compare.css'); ?>

<?php $__env->stopPush(); ?>
<?php $__env->startPush('script'); ?>
	<?php echo Html::script('public/js/specified/report-compare.js'); ?>

<?php $__env->stopPush(); ?>
<?php echo $id; ?>
                 <div class="col-md-12">
                    <div class="innar_box top_massage">
                        <div class="pull-left">
                        <h2><?php echo $reports['title']; ?></h2>
                        <h5><?php echo date('F d, Y',strtotime($reports['month']."/".$reports['day']."/".$reports['year'])); ?></h5>
                        </div>
    	                <a class="right btn-icon btn btn-primary bg-download-wh" href="javascript:void(0)" id="saveReport">Save New PDF</a>
	                    <div class="clearfix"></div>                    
                    </div>
                 </div>
              
               <div class="col-md-9 pulrt25">
                
                <div class="col-1-1 BorderBox mrgbt20" id="bar-graph">
                	<?php if(isset($reports['graph']['evl_graph']) && count($reports['graph']['evl_graph'])): ?>
                        <div class="col-1-1 bgBlue">
                            <h4 class="headonBlue">Evalaution Graph</h4>
                        </div>  
                        <?php foreach($reports['graph']['evl_graph'] as $Eindex => $Evalue): ?>                     
                            <div class="graph mrgbt20">
                                <h2><?php echo $Eindex; ?></h2>
                                <div class="col-1-1">
                                	<div class="col-17-20">
                                        <div class="col-14-17 right top_heading_graph">
                                            <ul>
                                                <li class="text-left">Pass</li>
                                                <li class="text-center">Consider</li>
                                                <li class="text-right">Recommend</li>
                                                <div class="clearfix"></div>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-1-1 mrgbt5">
                                    <div class="left_graph">Average</div>
                                    <div class="right_graph">
                                        <div class="graph_main">
                                            <div class="graph_bar barbgAv" style="width:<?php echo $Evalue['average']; ?>%"></div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <?php unset($Evalue['average']); $count = 1; ?>
                                <?php foreach($Evalue as $readers): ?>
                                	<div class="col-1-1 mrgbt5">
                                        <div class="left_graph">Reader <?php echo $count; ?></div>
                                        <div class="right_graph">
                                            <div class="graph_main">
                                                <div class="graph_bar barbg<?php echo $count; ?>" style="width:<?php echo $readers; ?>%"></div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                <?php $count++; ?>
                                <?php endforeach; ?>
                                <div class="clearfix"></div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>                        
                </div>
                <div class="col-1-1 BorderBox mrgbt20 pulbotm10" id="scorechart">
                    <div class="col-1-1 bgBlue">
                        <h4 class="headonBlue">Score Chart</h4>
                    </div>
                    <div class="col-1-1 pultop30">
                        <div class="chart_right">
                            <ul>
                                <li><h1>Points</h1></li>
                                <li><h1>Avarage</h1></li>
                                <li><h1>Reader 1</h1></li>
                                <li><h1>Reader 2</h1></li>
                                <li><h1>Reader 3</h1></li>
                                <li><h1>Reader 4</h1></li>
                                <li><h1>Reader 5</h1></li>
                            </ul>
                        </div>
                    </div>
                    <?php 
					$totalpoints	=	0;
					$totalavg		=	0;
					$totalreader1	=	0;
					$totalreader2	=	0;
					$totalreader3	=	0;
					$totalreader4	=	0;
					$totalreader5	=	0;
				?>
                    <?php foreach($reports['scorechart'] as $Qkey => $Qval): ?>
                    <div class="col-1-1">
                    	<div class="chart_left">
	                        <h2><?php echo $Qkey; ?></h2>
                    	</div>
                        <div class="chart_right">
                            <ul>
                                <li><span><?php echo $Qval['total']; ?></span></li>
                                <li><span><?php echo $Qval['average']; ?></span></li>
                                <?php   
										$totalpoints	+=	$Qval['total'];
										$totalavg		+=	$Qval['average'];
										$count	=	1;
										unset($Qval['average']);
										unset($Qval['total']);
								
								 foreach($Qval as $key => $val){
									${"totalreader".$count}	+=	$val; ?>
                                    <li><span><?php echo $val; ?></span></li>
                        		<?php $count++; } ?>
                                
                                 <?php for($i=count($Qval);$i<5;$i++){ ?>
                                     <li><span>-</span></li>
                                <?php } ?>
                                <div class="clearfix"></div>
                            </ul>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <div class="col-1-1">
                    	<div class="chart_left">
	                        <h2>Total</h2>
                    	</div>
                        <div class="chart_right">
                            <ul>
                                <li><p><?php echo $totalpoints; ?></p></li>
                                <li><p><?php echo strpos($average,'.') ? number_format($totalavg,2) : $totalavg; ?></p></li>
                                 <?php for($i=1;$i<=5;$i++): ?>
                                 	<li><p>
                                    	<?php 	if(${"totalreader".$i}==0)	echo "=";
												else echo ${"totalreader".$i}; ?>
                                    </p></li>
                                 <?php endfor; ?>
                                <div class="clearfix"></div>
                            </ul>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                    
                <div class="col-1-1 BorderBox mrgbt20" id="questions">
                    <div class="col-1-1 bgBlue">
                        <h4 class="headonBlue">Questions</h4>
                    </div>
                    <?php if(isset($reports['questions']) && count($reports['questions'])): ?>
                     <?php $catcount=1 ;?> 
                     <?php foreach($reports['questions'] as $qkeys => $qvals): ?>
                     	<?php $qstid	=	str_replace(" ","_Q_",$qkeys); ?>
                        <div class="col-1-1 pul10" id="<?php echo $qstid; ?>">
                        	<div class="pull-left que-cat col-1-1">
                                <?php echo $qkeys; ?>

                             </div>
                             <?php $qcount=1; ?>
							<?php foreach($qvals as $qkey => $qval): ?>
                                 <div class="pull-left question">
                                    <?php echo $qcount; ?>. <?php echo $qval['title']; ?>

                                 </div>
                                
                                <div class="pull-right graph_score">
                                    <ul class="numbring">
                                        <li>5</li>
                                        <li>4</li>
                                        <li>3</li>
                                        <li>2</li>
                                        <li>1</li>
                                    </ul>
                                    <ul class="graph_score_lvl">
                                    	<?php foreach($qval['score'] as $score): ?>
                                        	<li style="height:<?php echo $score*17; ?>px;margin-top:<?php echo (85 - ($score*17)); ?>px"></li>
                                        <?php endforeach; ?>
                                        
                                        <li ></li>
                                        <li ></li>
                                        <li></li>
                                        <li ></li>
                                    </ul>
                                    
                                
                                </div>
                                <div class="clearfix"></div>
                                <?php $count	=	1; ?>
                                <?php foreach($qval['notes'] as $nkey => $nval): ?>
                                 <?php if(!empty($nval['notes']) || !empty($nval['suggestion'])): ?>
                               		<div class="col-1-1 dsp report_dsp "> 
                                    <h2 class="r<?php echo $count; ?>">Reader <?php echo $count; ?></h2>                                    
                                     <?php if($nval['notes']): ?> 
                                     	<div class="col-1-1 pul15 mrgbt10">
                                     		<b>Notes:</b><?php echo $nval['notes']; ?><br/> 
                                        </div>
                                     <?php endif; ?>
                                     
                                     <?php if($nval['suggestion']): ?>
                                     	<div class="col-1-1 pul15 mrgbt10">
                                     		<b>Suggestions:</b><?php echo $nval['suggestion']; ?>

                                        </div>
                                     <?php endif; ?>
                                    </div>
                                 <?php endif; ?>
                                 <?php $count++; ?>
                                <?php endforeach; ?>  
                                <?php $qcount++?>                              
                    		<?php endforeach; ?>
                        </div>
                        <div class="h-line"></div>
                        <?php $catcount++;?>
                     <?php endforeach; ?>
                     <div class="clearfix"></div>
                    <?php endif; ?>
                </div>
                    
                 <div class="col-1-1 BorderBox mrgbt20" id="notes">
                	<div class="col-1-1 bgBlue">
                        <h4 class="headonBlue">Notes</h4>
                    </div>
                    <div class="clearfix"></div>
                    <?php if(isset($reports['notes']) && count($reports['notes'])): ?>
                    <?php $catcount	=1;?>
                     <?php foreach($reports['notes'] as $nkeys => $nvals): ?>
                     	<?php $catid	=	str_replace(" ","_N_",$nkeys); ?>
                        <div class="col-1-1 pul10 mrgbt10" id="<?php echo $catid; ?>">
                        	<h3 class="sub_heding mrgtp10"><?php echo $nkeys; ?></h3>
                            <?php $count=1; ?>
                            <?php foreach($nvals as $nkey => $nval): ?>
                            <div class="col-1-1 dsp report_dsp">  
                            	<h2 class="r<?php echo $count; ?>">Reader <?php echo $count; ?></h2> 
                                <div class="col-1-1 pul15 mrgbt10">
                                	<?php echo $nval; ?>

                                </div>
                            </div>
                            <?php $count++; ?>
                            <?php endforeach; ?>
                        </div>
                        <div class="h-line"></div>
                       <?php $catcount++;?>
                     <?php endforeach; ?>
                    <?php endif; ?>
                    </div>
                    
                </div>
                
                <div class="col-md-3">
                <div class="col-1-1 BorderBox mrgbt20">
                
                	<h4 class="headonBlue text-left bgBlue">Shortcuts</h4>
                     <div class="dash-profile-bottom right_side_menu">
                     <div class="setting">
                          
                        <ul class="profile-menu setting-icon">                        
                        	<li><a href="#bar-graph">Bar Graph</a></li>
                            <li><a href="#scorechart">Score Chart</a></li>                            
                        	<li><a href="#questions">Questions</a>
                            	<?php if(count($reports['questions'])): ?>
                                	<ul class="sub_menu">
                                    <?php foreach($reports['questions'] as $qstK => $qstV): ?>
                                    	<?php $qstid	=	str_replace(" ","_Q_",$qstK); ?>
                                    	<li><a href="#<?php echo $qstid; ?>"><?php echo $qstK; ?></a></li>
                                    <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                            </li>
                            <li><a href="#notes">Notes</a>
								<?php if(count($reports['notes'])): ?>
                                    <ul class="sub_menu">
                                        <?php foreach($reports['notes'] as $notesK => $notesV): ?>
                                            <?php $catid	=	str_replace(" ","_N_",$notesK); ?>
                                            <li><a href="#<?php echo $catid; ?>"><?php echo $notesK; ?></a></li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                            </li>
                            <div class="clearfix"></div>
                        </ul>
                        
                        </div>
                    
                	</div>
                </div>
                
                <!--  // docs section starts here -->
                <div id="docs-section" class="col-1-1 BorderBox">
                    <div class="col-1-1  bgBlue">
                        <h5 class="headonBlue"><?php echo trans('lang.documents'); ?></h5>
                    </div>
                    <div class="col-1-1 bgblueLg pul10 add-docs-script" style="display:none;">
                        <a href="#uploadfilePopUp" class="upload fancybox-inline" id="uploadFile"><?php echo Html::image("public/images/icons/up.png","Upolad"); ?></a>
                        <a href="javascript:void(0)" class="add" id="addFile"><?php echo Html::image("public/images/icons/plus.png","Add"); ?></a>
                    </div>
                    
                    <div class="col-1-1 add-docs-script mrgbt20	">
                        <ul class="folder_menu sdocs_folder">
                        	<?php if(!empty($reports['script'])): ?>
                            <li>
                                <a href="#"><?php echo Html::image("public/images/icons/folder.png","Folder Image"); ?> Scripts</a>
                                <ul class="docs_menu">
                                	
                                	<?php $dox	=	App\Models\Documents::find($reports['script']); ?>
                                    <li><a target="_new" href="<?php echo $dox->link; ?>"><?php echo $dox->title; ?>&nbsp;<?php echo e(!empty($dox->draft) ? "DRAFT: ".$dox->draft : ""); ?> </a></li>                                  
                                </ul>
                            </li>
                            <?php endif; ?>
                            
                            <?php if(count($reports['info'])): ?>
                            <?php $count	=	1; ?>
                             <?php foreach($reports['info'] as $Rkey=>$Rval): ?>
                             	<li>
                                    <a href="#"><?php echo Html::image("public/images/icons/report".$count.".png","Folder Image"); ?> Reader <?php echo $count; ?></a>									
                                    <ul class="docs_menu">
                                        <li><a target="_blank" href="<?php echo URL::to("/myaccount/script-reports/".$Rkey."/view-pdf"); ?>?_token=<?php echo md5('script-reports/'.$Rkey.'/view-pdf'); ?>"><?php echo $Rval['title']; ?> </a></li>
                                    </ul>
                                </li>
                                 <?php $count++; ?>
                             <?php endforeach; ?>
                            <?php endif; ?>                            
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!---//  docs section  Start  here -->
                
                
                <!---// Private  section Start  here -->
                
                <div id="private-notes" class="col-1-1 BorderBox mrgtp20">
                    <div class="col-1-1  bgBlue">
                        <h5 class="headonBlue"><?php echo trans("lang.private-notes"); ?></h5>
                    </div>
                    <div class="col-1-1 pul15 private-notes">
                         <textarea id="pvt-not-text" name="pvt-notes" rows="10" style="width:100%"></textarea>
                    </div>
                    <div class="clearfix"></div>
                </div>
                 <!---// Private  section ends  here -->
               
                </div>
                
<div style="display:none;">
 <!-- Compare Reports-->
<div id="create-report" class="col-1-1" style="max-width:450px">
    <h3 class="blue-head mrg0">Create Report</h3>
    <?php echo Form::open(array('route' => 'script.compare.savepdf','id'=>'createReportFrom')); ?>

    <div class="col-1-1 pul20 ">
        <div class="col-1-1 mrgtp10">
             <?php echo Form::label('title','Report Title',array('class'=>'it mrgbt5')); ?>

              <?php echo Form::text('title',$reports['title'],array('class'=>'text textInput it ')); ?>

        </div>
        <div class="col-1-1 mrgtp10">
             <?php echo Form::label('draft','Script Draft',array('class'=>'it mrgbt5')); ?>

              <?php echo Form::text('draft',$reports['draft'],array('class'=>'text textInput it ')); ?>

        </div>
        <div class="col-1-1 mrgtp15">
             <?php echo Form::label('mothe','Date',array('class'=>'it mrgbt5')); ?>

              <?php echo Form::text('date',$reports['date'],array('class'=>'text textInput it datepicker','readonly')); ?>

             
        </div>
         <div class="inc">
            <?php echo Form::label('inc','Checkmark all/any categories to appear in PDF',['class'=>'it ymrg10']); ?>	
            <div class="col-1-1 mrgtp10 Box xpul10 pultop5">
                <div class="left">        
                	<?php echo Form::checkbox('inc[]','all',2); ?>

                </div>
                <div class="left mrglft15">
                    <?php echo Form::label('inc[]','All',['class'=>'it ymrg2']); ?>

                </div>
                <div class="clearfix"></div>    
            </div>
            
            
            <div class="col-1-1 mrgtp10 Box xpul10 pultop5">
                <div class="left">        
                	<?php echo Form::checkbox('inc[]','graph'); ?>

                </div>
                <div class="left mrglft15">
                    <?php echo Form::label('inc[]','Graph Chart',['class'=>'it ymrg2']); ?>

                </div>
                <div class="clearfix"></div>    
            </div>
            
            <div class="col-1-1 mrgtp10 Box xpul10 pultop5">
                <div class="left">        
                	<?php echo Form::checkbox('inc[]','scorechart'); ?>

                </div>
                <div class="left mrglft15">
                    <?php echo Form::label('inc[]','Score Chart',['class'=>'it ymrg2']); ?>

                </div>
                <div class="clearfix"></div>    
            </div>
            
            <div class="col-1-1 mrgtp10 Box xpul10 pultop5">
                <div class="left">        
                	<?php echo Form::checkbox('inc[]','questions'); ?>

                </div>
                <div class="left mrglft15">
                    <?php echo Form::label('inc[]','Questions',['class'=>'it ymrg2']); ?>

                </div>
                <div class="clearfix"></div>    
            </div>
            
            <div class="col-1-1 mrgtp10 Box xpul10 pultop5">
                <div class="left">        
                	<?php echo Form::checkbox('inc[]','notes'); ?>

                </div>
                <div class="left mrglft15">
                    <?php echo Form::label('inc[]','Notes',['class'=>'it ymrg2']); ?>

                </div>
                <div class="clearfix"></div>    
            </div>
         </div>
        
        <div class="col-1-1 mrgbt5 mrgtp20">
            <?php echo Form::submit('Compare',array('class'=>'btn btn-primary right','id'=>'SaveNoteBtn')); ?>

        </div>
        <div class="clearfix"></div>
    </div>
     <?php echo Form::hidden('template_id',$template_id); ?>

     <?php echo Form::hidden('script_cmp_id',$script_cmp_id); ?>

     <?php echo Form::hidden('cr_type',$type,['id'=>'cr_type']); ?>

     <?php echo Form::hidden('draft1',$draft1,['id'=>'draft1']); ?>

     <?php echo Form::hidden('draft2',$draft2,['id'=>'draft2']); ?>

    <?php echo Form::close(); ?>

</div>
<!-- Compare Reports-->

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.myaccount', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>