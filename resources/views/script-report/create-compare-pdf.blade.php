<html>
<head>
<style type="text/css">
@page {
        sheet-size: A4;
		size: 50cm 29cm;
		odd-header-name: html_myHTMLHeaderOdd;
		odd-footer-name: html_myHTMLFooterOdd;
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

p{
    text-align:justify;
    margin:0px;
}
.clear{ clear:both;}
.MainDivcontainer{
	width:900px;
	float:left;
	page-break-inside:avoid;
}
.CompareGraphmain{
	float:left;
	float: left;
    margin-bottom:0px;
	margin-top:0px;
    margin-left: 0;
    padding-left: 0;
	padding-bottom:20px;	
	width:100%;
}
.Reprot-compare .Compareheading{
	font-size:20px;
	font-weight:normal;
	float:left;
	background:#5b5b5b;
    color: #fff;
    margin: 0;
    padding: 8px 14px;
    width: 96%;
	border:none !important;
}	
.CompareMainDiv{
	float:left;
	width:100%;
	margin-top:10px;
	padding-left:10px;	
}
.Compareheading{
	font-size:20px;
	margin:5px 0px;	
}
.CompareCatheading{
	width:130px;
	float:left;	
	font-size:16px;
	color:#000;
	padding:4px 8px;
	font-weight:bold;
}
.Comparegraphratings{
	float:left;
	margin:14px 0px 8px 20px;	
}

.Comparepass{
	font-family:Arial, Helvetica, sans-serif;
	font-weight:bold;
	float:left;
	font-size:14px;
	width:190px;
}
.Compareconsider{
	font-family:Arial, Helvetica, sans-serif;
	font-weight:bold;
	float:left;
	font-size:14px;
	width:195px;
	
}
.Comparerecommend{
	font-family:Arial, Helvetica, sans-serif;
	font-weight:bold;
	text-align:right;
	float:left;
	font-size:14px;
	width:115px;
}

.Comparepoor{
	font-family:Arial, Helvetica, sans-serif;
	font-weight:bold;
	float:left;
	font-size:14px;
	width:145px;
}
.Comparefair{
	font-family:Arial, Helvetica, sans-serif;
	font-weight:bold;
	float:left;
	font-size:14px;
	width:140px;
	
}
.Comparegood{
	font-family:Arial, Helvetica, sans-serif;
	font-weight:bold;
	text-align:left;
	float:left;
	font-size:14px;
	width:100px;
}

.Compareexcellent{
	font-family:Arial, Helvetica, sans-serif;
	font-weight:bold;
	text-align:right;
	float:left;
	font-size:14px;
	width:115px;
}
.Comparemain_graphdiv{
	float:left;
	margin-bottom:5px;	
	vertical-align:middle;
}
.Comparetitle{
	float:left;
	width:146px;
	padding-right:20px;
	font-size:14px;
	text-align:right;
	padding-top:0px;
	margin:0px;
	color:#000;
}

.ComparereadBigBG{
	float:left;
	width:510px;
	height:12px;
	margin-top:2px;
	padding:2px 0px 0px 0px;
	background:none;
}

.ComparewhiteBG{
	float:left;
	width:500px;
	background:#EBEBEB;
	height:10px;
	margin-left:0px;
}
.CompareredEge{
	height:10px;
	float:left;	
	padding:2px 0px;
	border-right:2px solid #BB2F30;
	margin-top:-12px;	
}
.CompareredBG{
	float:left;
	background:#BB2F30;
	height:10px;
}
.CompareReader1BG{
	float:left;
	background:#32839E;
	height:10px;
}
.CompareReader1Ege{
	height:10px;
	float:left;	
	padding:2px 0px;
	border-right:2px solid #32839E;
	margin-top:-12px;	
}
.CompareReader2BG{
	float:left;
	background:#E0B640;
	height:10px;
}
.CompareReader2Ege{
	height:10px;
	float:left;	
	padding:2px 0px;
	border-right:2px solid #E0B640;
	margin-top:-12px;	
}
.CompareReader3BG{
	float:left;
	background:#A00257;
	height:10px;
}
.CompareReader3Ege{
	height:10px;
	float:left;	
	padding:2px 0px;
	border-right:2px solid #A00257;
	margin-top:-12px;	
}
.CompareReader4BG{
	float:left;
	background:#9D9936;
	height:10px;
}
.CompareReader4Ege{
	height:10px;
	float:left;	
	padding:2px 0px;
	border-right:2px solid #9D9936;
	margin-top:-12px;	
}
.CompareReader5BG{
	float:left;
	background:#E47B00;
	height:10px;
}
.CompareReader5Ege{
	height:10px;
	float:left;	
	padding:2px 0px;
	border-right:2px solid #E47B00;
	margin-top:-12px;	
}

.chart-heading{
	float:left;
	width:100%;
	margin-bottom:10px;	
}
.chart-heading h2{
	background:#808080;
	color:#fff;
	font-size:16px;
	width:80px;
	text-align:center	
}
.Qcat-heading{
	float:left;
	width:auto;	
}
.N-heading{
	float:left;
	margin-bottom:0px;
}
.no-margin{
	margin-top:0px !important;	
}
.Qcat-heading h2, .N-heading h2{
	background:#808080;
	color:#fff;
	font-size:16px;
	width:250px;
	padding:5px 10px;
	text-align:center	
}
.chartdiv{
	float:left;
	width:100%;
	background:#fff;	
	margin-bottom:30px;
	border:1px solid #ccc;
}
.notes{
	float:left;
	margin-bottom:30px;	
}
.chart-block{
	border-bottom:1px solid #ccc;	
	float:left;
}
.chart-block .cat-title{
	width:136px;
	float:left;
	padding:7px 0px;
	text-align:center;
	font-size:14px;
	color:#5B5B5B;
}
.chart-block .chart-point{
	width:84px;
	float:left;
	background:#990002;
	padding:8px 0px;
	text-align:center;
	font-weight:bold;
	color:#fff;
	margin-left:1px;
}
.chart-block .chart-avg{
	width:84px;
	float:left;
	background:#D50100;
	padding:8px 0px;
	text-align:center;
	font-weight:bold;
	color:#fff;
	margin-left:1px;
}
.chart-block .reader1{
	width:84px;
	float:left;
	background:#32839E;
	padding:8px 0px;
	text-align:center;
	font-weight:bold;
	color:#fff;
	margin-left:1px;
}
.chart-block .reader2{
	width:84px;
	float:left;
	background:#E0B640;
	padding:8px 0px;
	text-align:center;
	font-weight:bold;
	color:#fff;
	margin-left:1px;
}
.chart-block .reader3{
	width:84px;
	float:left;
	background:#A00257;
	padding:8px 0px;
	text-align:center;
	font-weight:bold;
	color:#fff;
	margin-left:1px;
}
.chart-block .reader4{
	width:84px;
	float:left;
	background:#9D9936;
	padding:8px 0px;
	text-align:center;
	font-weight:bold;
	color:#fff;
	margin-left:1px;
}
.chart-block .reader5{
	width:84px;
	float:left;
	background:#E47B00;
	padding:8px 0px;
	text-align:center;
	font-weight:bold;
	color:#fff;
	margin-left:1px;
}
.chart-blocks{
	width:84px;
	float:left;
	padding:8px 0px;
	text-align:center;
	font-weight:bold;
	color:#5B5B5B;
	border-left:1px solid #ccc;
}
.chart-totalblock{
	background:#AFAFAF;
	float:left;
	width:100%;	
}

.chart-totalblock .cat-title{
	width:133px;
	float:left;
	padding:7px 0px;
	text-align:center;
	font-size:14px;
	color:#fff;
}
.chart-totalblock .chart-blocks{
	color:#fff;
	border-left:none;	
}
.QCat-div{
	float:left;
	width:100%;
	margin-top:10px;	
}
.q-maindiv{
	float:left;
	width:100%;
	margin-top:0px;	
}
.n-maindiv{
	float:left;
	width:100%;
}
.q-toppart{
	float:left;
	width:100%;
}
.q-title{
	float:left;
	width:80%;
	font-size:16px;
	color:#000;	
	padding-top:15px;
}
.q-graph{
	float:right;
	width:55;
	border:1px solid #CCC;
	background:#EBEBEB;
	padding:5px;
	position:relative;
	line-height:10px;	
}
.g-ratings{
	width:10px;
	float:left;
	height:50px;
	color:#808080;
	font-size:8px;
}
.g-blocks1{
	margin-left:1px;
	width:30px;
	border-left:10px solid #fff;
	float:left;
	height:64px;
	margin-top:7px;
}
.g-blocks2{
	margin-left:25px;
	width:30px;
	border-left:10px solid #fff;
	float:left;
	height:64px;
	margin-top:-64px;
}
.g-blocks3{
	margin-left:50px;
	width:30px;
	position:absolute;
	border-left:10px solid #000;
	float:left;
	height:64px;
	margin-top:-64px;
}
.g-blocks4{
	margin-left:75px;
	width:30px;
	border-left:10px solid #fff;
	float:left;
	height:64px;
	margin-top:-64px;
}
.g-blocks5{
	margin-left:100px;
	width:30px;
	border-left:10px solid #fff;
	float:left;
	height:64px;
	margin-top:-64px;
}
.g-score{
	float:left;
	width:15px;
	height:13px;
	font-weight:bold;
	font-size:10px;	
}
.g-reader1{
	width:11px;
	border-left:1px solid #2D86A4;
	background:#2D86A4;	
	position:absolute;
	bottom:9px;
	
}
.g-reader2{
	position:absolute;
	bottom:9px;
	width:11px;
	background:#D8B456;
	
}
.g-reader3{
	position:absolute;
	bottom:9px;
	width:11px;
	background:#A0005A;	
	
}
.g-reader4{
	position:absolute;
	bottom:9px;
	width:11px;
	background:#9B9A30;	
	
}
.g-reader5{
	position:absolute;
	bottom:9px;
	width:11px;
	background:#E47B00;
	
}
.q-details{
	float:left;
	width:100%;	
}
.q-detail-div{
	width:100%;
	float:left;	
}
.q-detail-reader1 h2{
	width:100%;
	float:left;	
}
.q-notes-heading{
	width:110px;
	float:left;	
}
.q-notes-heading h2{
 	color: #000;
    font-size: 13px;
    padding: 5px 0px;
    text-align: left;
    width: auto;
	margin:0px;	
}
.q-notes-desc{
	background:#fff;
	float:left;
	width:96%;
	padding:3px 5px 0px 5px;
	font-size:12px;	
	margin-top:-1px;
}
.q-notes-reader1, .q-notes-reader2, .q-notes-reader3, .q-notes-reader4, .q-notes-reader5{
	 float:left;
	 width:100%;
	 margin-bottom:0px;	
}
.notes-desc{
	margin-bottom:5px;	
}
.q-notes-reader1 .q-notes-heading h2{
	
}
.q-notes-reader1 .q-notes-desc{
	border-top:1px solid #33839C;
}
.q-notes-reader2 .q-notes-heading h2{
	/*background:#DFB441;*/
}
.q-notes-reader2 .q-notes-desc{
	border-top:1px solid #DFB441;
}
.q-notes-reader3 .q-notes-heading h2{
	/*background:#A0005A;*/
}
.q-notes-reader3 .q-notes-desc{
	border-top:1px solid #A0005A;
}
.q-notes-reader4 .q-notes-heading h2{
	/*background:#A19936;*/
}
.q-notes-reader4 .q-notes-desc{
	border-top:1px solid #A19936;
}
.q-notes-reader5 .q-notes-heading h2{
	/*background:#E37F07;*/
}
.q-notes-reader5 .q-notes-desc{
	border-top:1px solid #E37F07;
}
.bar-graph{
	float:left;
	margin-bottom:0px;	
}
.scorechart, .questions{
	float:left;	
}

</style>
</head>
<?php //echo $script->data;
	$reports				=	unserialize($script->data); 
	//echo"<pre>"; print_r($reports); exit;
	$inc	=	!empty($script->inc) ? $script->inc :'';
	
	$incarray	=	explode(',',$inc);
?>

<body>
<htmlpageheader name="myHTMLHeaderOdd" style="display:none;">
				<table width="100%" style="border-bottom:1px solid #000; margin-bottom:0px; float:left;">
				<tr>
					<td align="left" colspan="2">
					  <p style="float:left;">
                          <strong style="font-size:22px;">{!!$script->title!!}</strong>
                          <?php if(!empty($script->draft)) { ?>
                            <strong style="font-size:12px;">&nbsp; &nbsp;DRAFT&nbsp;{!!$script->draft!!}</strong>
                          <?php } ?>    
                      </p>
					</td>
                    <td align="right">
                    	 	<h4 style="float:left;width:100%;">{!!date('F d, Y',strtotime($script->created_at))!!}</h4>
                    </td>
				</tr>   
			</table>
</htmlpageheader>
<htmlpagefooter name="myHTMLFooterOdd" style="display:none">
	<div style="color:#000; font-weight:bold; border-top:1px solid #000; padding-top:5px;" align="right"><b>{PAGENO}</b></div>
</htmlpagefooter>


	<div class="MainDivcontainer">
     	<?php if(in_array('graph',$incarray) || in_array('all',$incarray)) { ?>
        	<div class="bar-graph">
     	<?php if(isset($reports['graph']['evl_graph']) && count($reports['graph']['evl_graph'])){?>
     		<div class="CompareGraphmain">
                <h3 class="Compareheading">Evalaution Graph</h3>
                <?php foreach($reports['graph']['evl_graph'] as $Eindex => $Evalue) { ?> 
                       <div class="CompareMainDiv">
                            <div class="CompareCatheading">{!!$Eindex!!}</div>
                            <div class="Comparegraphratings">
                                <div class="Comparepass">Pass</div>
                                <div class="Compareconsider">Consider</div>
                                <div class="Comparerecommend">Recommend</div>
                            </div>
                            <div class="clear"></div>
                            <div class="Comparemain_graphdiv">
                                <div class="Comparetitle">Average</div>
                                <div class="ComparereadBigBG">
                                    <div class="ComparewhiteBG">
                                    	<?php 
										$avgwidth	= (500/100)*$Evalue['average'];
										$orwidth	=	($avgwidth<30) ? 32 : $avgwidth;
										?>
                                        <div class="CompareredBG" style="width:{!!$orwidth!!}px;"></div>
                                    </div>
                                    <div class="CompareredEge" style="width:{!!$orwidth-2!!}px;"></div>
                                </div>
                            </div>
                            <?php
							$count	=	1;	
							unset($Evalue['average']);
							 foreach($Evalue as $readers){ ?>
                            <div class="Comparemain_graphdiv">
                                <div class="Comparetitle">Reader {!!$count!!}</div>
                                <div class="ComparereadBigBG">
                                    <div class="ComparewhiteBG">
                                    	<?php 
											$rwidth	= (500/100)*$readers;
											$orwidth	=	($rwidth<30) ? 32 : $rwidth;
										?>
                                        <div class="CompareReader{!!$count!!}BG" style="width:{!!$orwidth!!}px;"></div>
                                    </div>
                                    <div class="CompareReader{!!$count!!}Ege" style="width:{!!$orwidth-2!!}px;"></div>
                                </div>
                            </div>
                            <?php $count++; } ?>
                       </div>
                <?php } ?>   
            </div>
            
            <?php } ?>
            <!-- Question part -->
            <?php if(isset($reports['scorechart']) && count($reports['scorechart'])){?>
            <div class="CompareGraphmain">
                <h3 class="Compareheading">Questions Graph</h3>
                   		<?php foreach($reports['scorechart'] as $Qkey => $Qval){ ?>	
                        <div class="CompareMainDiv">
                            <div class="CompareCatheading">{!!$Qkey!!}</div>
                            <div class="Comparegraphratings">
                                <div class="Comparepoor">Poor</div>
                                <div class="Comparefair">Fair</div>
                                <div class="Comparegood">Good</div>
                                <div class="Compareexcellent">Excellent</div>
                            </div>
                            <div class="clear"></div>
                            <div class="Comparemain_graphdiv">
                                <div class="Comparetitle">Average</div>
                                <div class="ComparereadBigBG">
                                    <div class="ComparewhiteBG">
                                    	<?php 
										$qper	=	($Qval['average']/$Qval['total'])*100;
										$qwith	=	(500/100)*$qper;
										$orwidth	=	($qwith<30) ? 32 : $qwith;
										?>
                                        <div class="CompareredBG" style="width:{!!$orwidth!!}px;"></div>
                                    </div>
                                    <div class="CompareredEge" style="width:{!!$orwidth-2!!}px;"></div>
                                </div>
                            </div>
                            <?php 
								$count	=	1;
								$total	=	$Qval['total'];
								unset($Qval['average']);
								unset($Qval['total']);
								foreach($Qval as $readers){
							?>
                                <div class="Comparemain_graphdiv">
                                    <div class="Comparetitle">Reader {!!$count!!}</div>
                                    <div class="ComparereadBigBG">
                                        <div class="ComparewhiteBG">
											<?php 
												$qper		=	($readers/$total)*100;
												$qwith		=	(500/100)*$qper;
												$orwidth	=	($qwith<30) ? 32 : $qwith;
                                            ?>
                                            <div class="CompareReader{!!$count!!}BG" style="width:{!!$orwidth!!}px;"></div>
                                        </div>
                                        <div class="CompareReader{!!$count!!}Ege" style="width:{!!$orwidth-2!!}px;"></div>
                                    </div>
                                </div>
                            <?php $count++;} ?>
                            
                           </div> 
                        <?php } ?>
                  
            </div>
        <?php } ?>
         </div>
        <?php } ?>
        
        <?php if(in_array('scorechart',$incarray) || in_array('all',$incarray)) { ?>
        	<div class="scorechart">
            <?php if(isset($reports['scorechart']) && count($reports['scorechart'])){?>
                
                <div class="chart-heading">
                    <h3 class="Compareheading">Score</h3>
                </div>
                <div class="chartdiv">
                    <div class="chart-block">
                        <div class="cat-title">&nbsp;</div>
                        <div class="chart-point">Points</div>
                        <div class="chart-avg">Average</div>
                        <div class="reader1">Reader 1</div>
                        <div class="reader2">Reader 2</div>
                        <div class="reader3">Reader 3</div>
                        <div class="reader4">Reader 4</div>
                        <div class="reader5">Reader 5</div>
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
                    <?php foreach($reports['scorechart'] as $Qkey => $Qval){ ?>	
                        <div class="chart-block">
                            <div class="cat-title">{!!$Qkey!!}</div>
                            <div class="chart-blocks">{!!$Qval['total']!!}</div>
                            <div class="chart-blocks">{!!$Qval['average']!!}</div>
                            <?php 
								$totalpoints	+=	$Qval['total'];
								$totalavg		+=	$Qval['average'];
                                $count	=	1;
                                unset($Qval['average']);
                                unset($Qval['total']);
                                foreach($Qval as $key => $val){
								${"totalreader".$count}	+=	$val;	
                            ?>
                                <div class="chart-blocks">{!!$val!!}</div>	
                            <?php $count++; } ?>
                            <?php for($i=count($Qval);$i<5;$i++){ ?>
                                <div class="chart-blocks">-</div>	
                            <?php } ?>
                        </div>
                    <?php } ?>
                    
                    
                    <div class="chart-totalblock">
                	<div class="cat-title">Total</div>
                    <div class="chart-blocks">{!!$totalpoints!!}</div>
                    <div class="chart-blocks">
                    	<?php 
							if(strpos($average,'.'))
								echo number_format($totalavg,2);
							else
								echo $totalavg;	
						?>
                    </div>
                    <?php for($i=1;$i<=5;$i++){ ?>
                    		<?php if(${"totalreader".$i}==0){ ?>
                        		<div class="chart-blocks">-</div>	
                            <?php }else{ ?>
                            	<div class="chart-blocks"><?php echo ${"totalreader".$i}; ?></div>	
                            <?php } ?>
                      <?php } ?>
                </div>
                </div>
               <?php } ?> 
            </div>
		<?php } ?>
        
        <?php if(in_array('notes',$incarray) || in_array('all',$incarray)) { ?>
        	<div class="notes">
        	<?php if(isset($reports['notes']) && count($reports['notes'])){?>
            	<div class="chart-heading">
                	<h3 class="Compareheading" style="margin-bottom:0px;">Notes</h3>
                </div>    
                <?php $catcount	=1;?>
        		<?php foreach($reports['notes'] as $nkeys => $nvals){?>
                    <div class="QCat-div <?php echo ($catcount==1) ? 'no-margin': ''; ?>">
                        <table style="float:left; margin-left:-2px; margin-bottom:5px; margin-top:10px;">
                        	<tr>
                            	<td style="color:#000; font-size:14px; font-weight:bold; padding:6px 0px;">{!!$nkeys!!}</td>
                            </tr>
                        </table>
                        <div class="clear"></div>
                    	<?php 
                        $count=1;
                        foreach($nvals as $nkey => $nval){?>
                            <div class="q-notes-reader{!!$count!!} notes-desc">
                                <div class="q-notes-heading">
                                    <h2>Reader {!!$count!!}</h2>
                                </div>
                                <div class="q-notes-desc">
                                   {!! $nval !!}
                                </div>
                            </div>
                        		
                    <?php $count++; } ?>    
                </div>
        <?php $catcount++;} ?>
        	<?php } ?>
        </div>
        <?php } ?>
                
        <?php if(in_array('questions',$incarray) || in_array('all',$incarray)) { ?>
        	<div class="questions">
        	<?php if(isset($reports['questions']) && count($reports['questions'])){?>
            	<div class="chart-heading">
                	<h3 class="Compareheading">Questions</h3>
                </div>  
                <?php $catcount=1 ;?>  
        		<?php foreach($reports['questions'] as $qkeys => $qvals){?>
                    <div class="QCat-div <?php echo ($catcount==1) ? 'no-margin': ''; ?>">
                        <table style="float:left; margin-left:-2px; margin-bottom:10px;">
                        	<tr>
                            	<td style="color:#000; font-size:14px; font-weight:bold; padding:6px 0px;">{!!$qkeys!!}</td>
                            </tr>
                        </table>
                        <div class="clear"></div>
                    	<?php 
                        $qcount=1;
                        foreach($qvals as $qkey => $qval){?>
                        <div class="q-maindiv" style="margin-bottom:10px;">
                            <div class="q-toppart">
                                <div class="q-title">
                                     {!!$qcount!!}. {!!$qval['title']!!}
                                </div>
                                <div class="q-graph">
                                    <div class="g-ratings" style="line-height:9px;">
                                       5&nbsp;-<br>
                                       4&nbsp;-<br>
                                       3&nbsp;-<br>
                                       2&nbsp;-<br>
                                       1&nbsp;-<br>
                                    </div>
                                    <table style="float:left; width:50px; margin-left:12px; margin-top:3px;padding:0px;" cellpadding="0">
                                    	<tr>
											<?php 
                                                $count	=	1;
                                                $height	=	0;
                                                foreach($qval['score'] as $score){
                                                    if($score==1)$height	=	7;
                                                    if($score==2)$height	=	19;
                                                    if($score==3)$height	=	28;
                                                    if($score==4)$height	=	38;
                                                    if($score==5)$height	=	50;
													
													if($count==1)$tdbg	=	'#32839E';
                                                    if($count==2)$tdbg	=	'#E0B640';
                                                    if($count==3)$tdbg	=	'#A00257';
                                                    if($count==4)$tdbg	=	'#9D9936';
                                                    if($count==5)$tdbg	=	'#E47B00';
																	
                                            ?>
                                            <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;">
                                                <table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td style="background:{!!$tdbg!!}; width:8px; height:{!!$height!!}px; padding:0px; margin:0px;border:none;"></td>
                                                    </tr>
                                                </table>
                                             </td>
                                            <?php $count++; } ?>
                                            <?php for($i=count($qval['score']);$i<5;$i++){ ?>
                                            <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;">
                                                <table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <?php $count++; } ?>
                                            </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="q-details">
                                <div class="q-detail-div">
                                    <?php 
                                    $count	=	1;
                                    foreach($qval['notes'] as $nkey => $nval){
                                        if(!empty($nval['notes']) || !empty($nval['suggestion'])){
                                        ?>
                                        <div class="q-notes-reader{!!$count!!}">
                                            <div class="q-notes-heading">
                                                <h2>Reader {!!$count!!}</h2>
                                            </div>
                                            <div class="clear"></div>
                                            <div class="q-notes-desc">
                                                <?php if($nval['notes']){ ?>
                                                    <b>Notes:</b>{!! $nval['notes'] !!}<br/>
                                                <?php } ?>
                                                <?php if($nval['suggestion']){ ?>
                                                    <b>Suggestion:</b>{!! $nval['suggestion'] !!}<br/>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    <?php $count++; 
                                        }
                                    } ?>
                                </div>
                            </div>
                        </div>
                    <?php $qcount++; } ?>    
                </div>
        <?php $catcount++; } ?>
        	<?php } ?>
        </div>
        <?php } ?>
     </div> 
     	
</body>
</html>