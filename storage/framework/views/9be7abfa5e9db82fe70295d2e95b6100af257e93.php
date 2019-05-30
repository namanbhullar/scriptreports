<html>
<head>
<style type="text/css">
@page  {
        sheet-size: A4;
		size: 50cm 29cm;
		odd-header-name: html_myHtmlHeaderOdd;
		odd-footer-name: html_myHtmlFooterOdd;
		margin-header: 20px;
		margin-footer: 10px;
		margin-left:30px;
		margin-right:30px;
}
body {
    font-family: sans-serif;
    font-size: 10pt;
    width:100%;
    margin:0;
    padding:0;
}
.questionsdata{
    float:left;	
}
p{
    text-align:justify;
    margin:0px;
}
.clear{ clear:both;}
.scorespan{
    float:right;
    color:#F00;
    text-align:right;
}
.questionsdata b{
    float:left;	
}
.report_2 div{
    margin-bottom:3px;
}
div.innertag{text-align:justify;margin-bottom:10px;}
h2.topmargin{margin-top:0px;width:100%; margin-bottom:0px;}

.Graphmain{
	float:left;
	background:#e8e8e8;
    float: left;
    margin-bottom: 10px;
	margin-top:10px;
    margin-left: 0;
    padding-left: 0;
	padding-bottom:20px;	
}
.Graphmain .heading{
	float:left;
	background:#5b5b5b;
    color: #fff;
    margin: 0;
    padding: 8px 15px;
    width: 870px;
}	

.graphratings{
	float:left;
	width:700px;
	margin:8px 0px 8px 140px;	
}

.pass{
	font-family:Arial, Helvetica, sans-serif;
	font-weight:bold;
	float:left;
	font-size:12px;
	width:202px;
}
.consider{
	font-family:Arial, Helvetica, sans-serif;
	font-weight:bold;
	float:left;
	font-size:12px;
	width:185px;
	
}
.recommend{
	font-family:Arial, Helvetica, sans-serif;
	font-weight:bold;
	text-align:right;
	float:left;
	font-size:12px;
	width:115px;
}

.poor{
	font-family:Arial, Helvetica, sans-serif;
	font-weight:bold;
	float:left;
	font-size:12px;
	width:150px;
}
.fair{
	font-family:Arial, Helvetica, sans-serif;
	font-weight:bold;
	float:left;
	font-size:12px;
	width:145px;
	
}
.good{
	font-family:Arial, Helvetica, sans-serif;
	font-weight:bold;
	text-align:left;
	float:left;
	font-size:12px;
	width:92px;
}
.ratting{
	font-family:Arial, Helvetica, sans-serif;
	font-weight:bold;
	text-align:center;
	float:left;
	font-size:12px;
	width:90px;
}
.excellent{
	font-family:Arial, Helvetica, sans-serif;
	font-weight:bold;
	text-align:right;
	float:left;
	font-size:12px;
	width:115px;
}
.main_graphdiv{
	float:left;
	margin-bottom:5px;	
	vertical-align:middle;
}
.title{
	float:left;
	width:120px;
	padding-right:20px;
	font-size:11px;
	font-weight:bold;
	text-align:right;
	padding-top:0px;
	margin:0px
}

.readBigBG{
	float:left;
	width:510px;
	height:12px;
	margin-top:2px;
	padding:2px 0px 0px 0px;
	border-left:2px solid #233649;	
	background:none;
}
.whiteBG{
	float:left;
	width:500px;
	background:#fff;
	height:10px;
	margin-left:0px;
}
.redEge{
	height:10px;
	float:left;	
	padding:2px 0px;
	border-right:2px solid #233649;
	margin-top:-12px;	
}
.redBG{
	float:left;
	background:#233649;
	height:10px;
}
.rscore{
	font-size:10px;
	text-align:center;
	width:70px;
	float:left;
	color:#999;
	font-weight:bold;
	margin-top:2px;	
}

</style>
</head>
<?php 
	$data				=	unserialize($script->data);
	$screenplay_date	=	$data['report_date'];
	//echo"<pre>"; print_r($script->data); exit;
	//echo $script->draft;
?>

<body>
<htmlpageheader name="myHtmlHeaderOdd" style="display:none;">
				<table width="100%" style="border-bottom:1px solid #000; margin-bottom:0px; float:left;">
				<tr>
					<td align="left" colspan="2">
					  <p style="float:left;">
                          <strong style="font-size:22px;"><?php echo $script->title; ?></strong>
                          <?php if(!empty($script->draft)) { ?>
                            <strong style="font-size:12px;">&nbsp; &nbsp;DRAFT&nbsp;<?php echo $script->draft; ?></strong>
                          <?php } ?>    
                      </p>
					</td>
                    <td align="right">
                    	 	<h4 style="float:left;width:100%;"><?php echo date('F d, Y',strtotime($script->created_at)); ?></h4>
                    </td>
				</tr>   
			</table>
</htmlpageheader>
<htmlpagefooter name="myHtmlFooterOdd" style="display:none">
	<div style="color:#000; font-weight:bold; border-top:1px solid #000; padding-top:5px;" align="right">
<div style="float:left;width:80px;margin-top:-5px;color:rgb(150,150,150); font-size:13px">Powered by</div><div style="float:left;margin-top:3px;"><?php echo Html::image('public/images/script_reports.png','',array('style'=>'height:15px; width:80px;')); ?></div><div style="float:right; width:55px; margin-top:-20px">{PAGENO}</div></div>
</htmlpagefooter>


	<div style="float:left; top:0;left:0; padding:0; margin-top:-40px;;">
		<div style="float:left; margin:0px; width:900px; padding:0px;margin-bottom:5px;">

            <?php 
				$template			=	$script->template;
				$scriptinfo			=	($template->general_info!='') ? $template->general_info : array();  
				
				if(array_key_exists('other',$scriptinfo)){
					$other	=	$scriptinfo['other'];
					unset($scriptinfo['other']);
					$scriptinfo	=	array_merge($scriptinfo,$other);
				}
				$scriptinfo;
				
				$scriptCount	=	count($scriptinfo);
				$halftScript	=	($scriptCount%2) ? ($scriptCount/2) : (($scriptCount + 1 )/2) ;
				
				//$scriptleft		=	array_slice($scriptinfo,0,$halftScript);
				//$scriptright	=	array_slice($scriptinfo,$halftScript,(count($scriptinfo) - 1));
				
				$scriptinfopart		=	false;
				$chctrpart			=	false;
				$logsyspart			=	false;
				$garphpart			=	false;
				$notespart			=	false;
				
				//echo "<pre>"; print_r($data['general_info']); exit;
			?>
            
            <div style="float:left;margin-bottom:10px;width:900px;">
            	<div style="float:left;width:310px;padding-right:70px; padding-left:50px;">
                	<?php 
					if(count($data['general_info']['left'])){
					foreach($data['general_info']['left'] as $label => $left) { ?>
                    		<?php if(!empty($left)){ ?>
                            	<?php if(is_array($left)){ $count_value	=	1; ?>
                                	<?php foreach($left as $key=>$value){ ?>
                                    	<?php if(!empty($value)): ?>
                                			<div><b><?php echo $label; ?> <?php echo e($count_value); ?>:</b> 
                                        &nbsp;<?php echo $value; ?></div>
                                        <?php endif; ?>
                                    <?php $count_value++; } ?>
                                <?php }else{?>
									<div><b><?php echo $label; ?>:</b> &nbsp;<?php echo e($left); ?></div>
                                <?php } ?>
                            <?php $scriptinfopart=true; } ?>
                    <?php } ?>
                    <?php } ?>
                </div>
                <div style="float:left;width:250px; padding-right:50px;">
                	<?php 
					if(count($data['general_info']['right'])){
					foreach($data['general_info']['right'] as $label => $right) { ?>
                    		<?php if(!empty($right)){ ?>
                            
                            <?php if(is_array($right)){ $count_value	=	1; ?>
                                	<?php foreach($right as $key=>$value){ ?>
                                    	<?php if(!empty($value)): ?>
                                			<div><b><?php echo $label; ?> <?php echo e($count_value); ?>:</b>
                                        	&nbsp;<?php echo $value; ?></div>
                                        <?php endif; ?>    
                                    <?php $count_value++; } ?>
                                <?php }else{?>
									<div><b><?php echo $label; ?>:</b> &nbsp;<?php echo e($right); ?></div>
                                <?php } ?>
								<?php $scriptinfopart=true; } ?>
                    <?php } ?>
                   <?php } ?>
                </div>
            </div>



					<!-- Graphs section --->
                 <?php if($chctrpart || $scriptinfopart || $logsyspart){ ?>
            		<hr class="hidden" style="float:left; width:100%;margin: 5px 0px;">
            	<?php } ?>
                
                <?php // check if graph is marked or not
					$isgraphExists	=	false;
					if(isset($data[graphs]) && count($data[graphs])>0){             
						foreach($data[graphs] as $gkey => $graphs) { 
							if($graphs>1)
								$isgraphExists=true;
						}
					}
					?>
                <?php if($isgraphExists) { ?>                    
                        <div class="Graphmain">
                            <h3 class="heading">Evaluation Graph</h3>
                            <div class="graphratings">
                                <div class="pass">Pass</div>
                                <div class="consider">Consider</div>
                                <div class="recommend">Recommend</div>
                            </div>
                            <?php if(isset($data[graphs]) && count($data[graphs])>0){ ?>            
                                        <?php foreach($data[graphs] as $gkey => $graphs) { ?>
                                            <?php if($graphs>1){ ?>
                                                <div class="main_graphdiv" style="float:left;">
                                                    <?php $graphtitle	=	str_replace('_',' ',$gkey); ?>
                                                    <div class="title"><?php echo $graphtitle; ?></div>
                                                    <div class="readBigBG">
                                                        <div class="whiteBG">
                                                            <?php $gwidth = (498/100*$graphs); ?>
                                                            <div class="redBG" style="width:<?php echo $gwidth; ?>"></div>
                                                        </div>
                                                        <div class="redEge" style="width:<?php echo $gwidth; ?>"></div>
                                                    </div>
                                                   
                                                </div>
                                            <?php } ?>
                                        <?php } ?>
                                <?php } ?>
                        </div>
                <?php } ?>
                
                
				<?php //print_r($data['data']); exit;
					if(isset($data['data']) && is_array($data['data'])){ ?>
                    
                    	<div class="Graphmain">
                            <h3 class="heading">Questions Graph</h3>
                            <div class="graphratings">
                                <div class="poor">Poor</div>
                                <div class="fair">Fair</div>
                                <div class="good">Good</div>
                                <div class="excellent">Excellent</div>
                                <div class="ratting"></div>
                            </div>
					<?php foreach($data['data'] as $category => $questions){	?>
                    			<?php 
								$cat			=	App\Models\Categories::find($category);
								$totalscore		=	count($questions)*5;
								$gainedscore	=	0;
								
								foreach($questions as $gscore)
									$gainedscore	+=	$gscore['score'];
									?>
                                    <div class="main_graphdiv" style="float:left;">
											<div class="title"><?php echo $cat->title; ?></div>
                                            <div class="readBigBG">
                                                <div class="whiteBG">
                                                	<?php 
														$swidth 	=	($gainedscore/$totalscore*100);
														$widthpx	=	(498/100)*$swidth;
													 ?>
                                                    <div class="redBG" style="width:<?php echo $widthpx; ?>"></div>
                                                </div>
                                                <div class="redEge" style="width:<?php echo $widthpx; ?>"></div>
                                            </div>
                                            <div class="rscore"><span style="color:#000;"><?php echo $gainedscore ?></span>/<?php echo $totalscore; ?></div>
                                    </div>
							
                <?php } 
					}
				?>    
             </div>
             
             
            <!-- Logline and synopsis section --->
 
            <?php if($chctrpart || $scriptinfopart){ ?>
            	<hr class="hidden" style="float:left; width:100%;margin: 5px 0px;">
            <?php } ?>
            <div class="report_2" style="float:left; padding-left:0px; margin-bottom:5px;">
                <?php if(isset($data['logsys'])){ ?>
					<?php foreach($data['logsys'] as $index => $logsyn) { ?>
                                <?php if(!empty($logsyn)){ ?>
                                    <div><b><?php echo $index; ?>:</b><br><p><?php echo $logsyn; ?></p></div>
                                <?php $logsyspart=true; } ?>
                    <?php } ?>
                <?php } ?>   
            </div>
            
          <!-- Charector Breakdown section --->
            <?php if($scriptinfopart){ ?>
            	<hr class="hidden" style="float:left; width:100%;margin: 5px 0px;">
            <?php } ?>
            <div class="report_2" style="float:left; padding-left:0px; margin-bottom:5px;">
                <?php if(isset($data['character_break'])){ ?>
					<?php foreach($data['character_break'] as $index => $charector) { ?>
                                <?php if(!empty($charector)){ ?>
                                    <div><b><?php echo $index; ?>:</b><br><p><?php echo $charector; ?></p></div>
                                <?php $chctrpart=true; } ?>
                    <?php } ?>
                <?php } ?>   
            </div>    
                        
    

             
             <?php 
			 	$tophr2	=	0;
				if(isset($data['notes'])){
					foreach($data['notes'] as $index => $notes){
						if(!empty($notes))
							$tophr2 = 1;	
					}
				}
			?>
             <?php if($tophr2==1){ ?>
            	<hr class="hidden" style="float:left; width:100%;margin: 5px 0px;">
            <?php } ?>
            <div class="report_2" style="float:left; padding-left:0px; margin-bottom:5px;">
                <?php if(isset($data['notes'])){ ?>
					<?php foreach($data['notes'] as $index => $notes) { ?>
                    		<?php if(!empty($notes)){ ?>
                            	 <div><b><?php echo $index; ?>:</b><br><p><?php echo $notes; ?></p></div>
                            <?php } ?>
                	<?php } ?>
                <?php } ?>
            </div>
            <div class="clear"></div>
           	<div class="questionsdata">
            	<?php if(isset($data['data']) && is_array($data['data'])){ ?>
					<?php foreach($data['data'] as $category => $questions){	?>
                        
                        <?php 
                            $cat			=	App\Models\Categories::find($category); 
                            $totalscore		=	count($questions)*5;
                            $gainedscore	=	0;
                            
                            foreach($questions as $gscore)
                                    $gainedscore	+=	$gscore['score'];
                        ?>
                        
                        <div style="margin-bottom:10px;width:100%;text-align:left; margin-top:5px; border-top:1px solid #666;border-bottom:1px solid #666;padding:4px 0px;">
                            <div style="float:left; font-size:20px; font-weight:bold;width:400px;margin-right:50px;"><?php echo $cat->title; ?></div>
                            <div style="float:right; text-align:right; padding-top:5px;"><b>TOTAL SCORE <font color="#D01C1D"><?php echo $gainedscore; ?></font> out of <?php echo $totalscore; ?></b></div>
                        </div>
                            <?php 
                                $qcount	=	1;
                                foreach($questions as $id => $question){ 
                            ?>
                                <div class="innertag">
                                    <div style="float:left;width:650px;margin-right:10px;">
                                        <b><?php echo $qcount; ?>. <?php echo App\Models\Questions::find($id)->title; ?> </b>
                                        <?php if(!empty($question['notes'])): ?>
                                            <br/><b>Notes:</b>&nbsp;<?php echo $question['notes']; ?>

                                        <?php endif; ?>
                                        <?php if(!empty($question['suggestion'])): ?>
                                            <p style="margin-top:5px;"><b>Suggestions:</b>&nbsp;<?php echo $question['suggestion']; ?></p>
                                        <?php endif; ?>
                                    </div>
                                    <div class="scorespan"> Score <?php echo $question['score']; ?></div>
                                </div>
                    		<?php $qcount++; } ?>
              		<?php } ?>  
                 <?php } ?>     
            </div>
			
    </div>
</div>
</body>
</html>