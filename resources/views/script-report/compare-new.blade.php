@extends('layouts.myaccount')

@section('content')

@push('css')
	{!! Html::style('public/css/report-compare.css') !!}
@endpush
@push('script')
	{!! Html::script('public/js/specified/report-compare.js') !!}
@endpush
<?php echo $id; ?>
                 <div class="col-md-12">
                    <div class="innar_box top_massage">
                        <div class="pull-left">
                        <h2>{!! $reports['title'] !!}</h2>
                        <h5>{!! date('F d, Y',strtotime($reports['month']."/".$reports['day']."/".$reports['year'])) !!}</h5>
                        </div>
    	                <a class="right btn-icon btn btn-primary bg-download-wh" href="javascript:void(0)" id="saveReport">Save New PDF</a>
	                    <div class="clearfix"></div>                    
                    </div>
                 </div>
              
               <div class="col-md-9 pulrt25">
                
                <div class="col-1-1 BorderBox mrgbt20" id="bar-graph">
                	@if(isset($reports['graph']['evl_graph']) && count($reports['graph']['evl_graph']))
                        <div class="col-1-1 bgBlue">
                            <h4 class="headonBlue">Evalaution Graph</h4>
                        </div>  
                        @foreach($reports['graph']['evl_graph'] as $Eindex => $Evalue)                     
                            <div class="graph mrgbt20">
                                <h2>{!!$Eindex!!}</h2>
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
                                            <div class="graph_bar barbgAv" style="width:{!! $Evalue['average'] !!}%"></div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <?php unset($Evalue['average']); $count = 1; ?>
                                @foreach($Evalue as $readers)
                                	<div class="col-1-1 mrgbt5">
                                        <div class="left_graph">Reader {!!$count!!}</div>
                                        <div class="right_graph">
                                            <div class="graph_main">
                                                <div class="graph_bar barbg{!!$count!!}" style="width:{!!$readers!!}%"></div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                <?php $count++; ?>
                                @endforeach
                                <div class="clearfix"></div>
                            </div>
                        @endforeach
                    @endif                        
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
                    @foreach($reports['scorechart'] as $Qkey => $Qval)
                    <div class="col-1-1">
                    	<div class="chart_left">
	                        <h2>{!! $Qkey !!}</h2>
                    	</div>
                        <div class="chart_right">
                            <ul>
                                <li><span>{!!$Qval['total']!!}</span></li>
                                <li><span>{!!$Qval['average']!!}</span></li>
                                <?php   
										$totalpoints	+=	$Qval['total'];
										$totalavg		+=	$Qval['average'];
										$count	=	1;
										unset($Qval['average']);
										unset($Qval['total']);
								
								 foreach($Qval as $key => $val){
									${"totalreader".$count}	+=	$val; ?>
                                    <li><span>{!!$val!!}</span></li>
                        		<?php $count++; } ?>
                                
                                 <?php for($i=count($Qval);$i<5;$i++){ ?>
                                     <li><span>-</span></li>
                                <?php } ?>
                                <div class="clearfix"></div>
                            </ul>
                        </div>
                    </div>
                    @endforeach
                    <div class="col-1-1">
                    	<div class="chart_left">
	                        <h2>Total</h2>
                    	</div>
                        <div class="chart_right">
                            <ul>
                                <li><p>{!!$totalpoints!!}</p></li>
                                <li><p>{!! strpos($average,'.') ? number_format($totalavg,2) : $totalavg !!}</p></li>
                                 @for($i=1;$i<=5;$i++)
                                 	<li><p>
                                    	<?php 	if(${"totalreader".$i}==0)	echo "=";
												else echo ${"totalreader".$i}; ?>
                                    </p></li>
                                 @endfor
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
                    @if(isset($reports['questions']) && count($reports['questions']))
                     <?php $catcount=1 ;?> 
                     @foreach($reports['questions'] as $qkeys => $qvals)
                     	<?php $qstid	=	str_replace(" ","_Q_",$qkeys); ?>
                        <div class="col-1-1 pul10" id="{!!$qstid!!}">
                        	<div class="pull-left que-cat col-1-1">
                                {!!$qkeys!!}
                             </div>
                             <?php $qcount=1; ?>
							@foreach($qvals as $qkey => $qval)
                                 <div class="pull-left question">
                                    {!!$qcount!!}. {!!$qval['title']!!}
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
                                    	@foreach($qval['score'] as $score)
                                        	<li style="height:{!! $score*17 !!}px;margin-top:{!! (85 - ($score*17)) !!}px"></li>
                                        @endforeach
                                        
                                        <li ></li>
                                        <li ></li>
                                        <li></li>
                                        <li ></li>
                                    </ul>
                                    
                                
                                </div>
                                <div class="clearfix"></div>
                                <?php $count	=	1; ?>
                                @foreach($qval['notes'] as $nkey => $nval)
                                 @if(!empty($nval['notes']) || !empty($nval['suggestion']))
                               		<div class="col-1-1 dsp report_dsp "> 
                                    <h2 class="r{!!$count!!}">Reader {!!$count!!}</h2>                                    
                                     @if($nval['notes']) 
                                     	<div class="col-1-1 pul15 mrgbt10">
                                     		<b>Notes:</b>{!!$nval['notes']!!}<br/> 
                                        </div>
                                     @endif
                                     
                                     @if($nval['suggestion'])
                                     	<div class="col-1-1 pul15 mrgbt10">
                                     		<b>Suggestions:</b>{!!$nval['suggestion']!!}
                                        </div>
                                     @endif
                                    </div>
                                 @endif
                                 <?php $count++; ?>
                                @endforeach  
                                <?php $qcount++?>                              
                    		@endforeach
                        </div>
                        <div class="h-line"></div>
                        <?php $catcount++;?>
                     @endforeach
                     <div class="clearfix"></div>
                    @endif
                </div>
                    
                 <div class="col-1-1 BorderBox mrgbt20" id="notes">
                	<div class="col-1-1 bgBlue">
                        <h4 class="headonBlue">Notes</h4>
                    </div>
                    <div class="clearfix"></div>
                    @if(isset($reports['notes']) && count($reports['notes']))
                    <?php $catcount	=1;?>
                     @foreach($reports['notes'] as $nkeys => $nvals)
                     	<?php $catid	=	str_replace(" ","_N_",$nkeys); ?>
                        <div class="col-1-1 pul10 mrgbt10" id="{!!$catid!!}">
                        	<h3 class="sub_heding mrgtp10">{!!$nkeys!!}</h3>
                            <?php $count=1; ?>
                            @foreach($nvals as $nkey => $nval)
                            <div class="col-1-1 dsp report_dsp">  
                            	<h2 class="r{!!$count!!}">Reader {!!$count!!}</h2> 
                                <div class="col-1-1 pul15 mrgbt10">
                                	{!!$nval!!}
                                </div>
                            </div>
                            <?php $count++; ?>
                            @endforeach
                        </div>
                        <div class="h-line"></div>
                       <?php $catcount++;?>
                     @endforeach
                    @endif
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
                            	@if(count($reports['questions']))
                                	<ul class="sub_menu">
                                    @foreach($reports['questions'] as $qstK => $qstV)
                                    	<?php $qstid	=	str_replace(" ","_Q_",$qstK); ?>
                                    	<li><a href="#{!!$qstid!!}">{!!$qstK!!}</a></li>
                                    @endforeach
                                    </ul>
                                @endif
                            </li>
                            <li><a href="#notes">Notes</a>
								@if(count($reports['notes']))
                                    <ul class="sub_menu">
                                        @foreach($reports['notes'] as $notesK => $notesV)
                                            <?php $catid	=	str_replace(" ","_N_",$notesK); ?>
                                            <li><a href="#{!!$catid!!}">{!!$notesK!!}</a></li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                            <div class="clearfix"></div>
                        </ul>
                        
                        </div>
                    
                	</div>
                </div>
                
                <!--  // docs section starts here -->
                <div id="docs-section" class="col-1-1 BorderBox">
                    <div class="col-1-1  bgBlue">
                        <h5 class="headonBlue">{!! trans('lang.documents') !!}</h5>
                    </div>
                    <div class="col-1-1 bgblueLg pul10 add-docs-script" style="display:none;">
                        <a href="#uploadfilePopUp" class="upload fancybox-inline" id="uploadFile">{!! Html::image("public/images/icons/up.png","Upolad") !!}</a>
                        <a href="javascript:void(0)" class="add" id="addFile">{!! Html::image("public/images/icons/plus.png","Add") !!}</a>
                    </div>
                    
                    <div class="col-1-1 add-docs-script mrgbt20	">
                        <ul class="folder_menu sdocs_folder">
                        	@if(!empty($reports['script']))
                            <li>
                                <a href="#">{!! Html::image("public/images/icons/folder.png","Folder Image") !!} Scripts</a>
                                <ul class="docs_menu">
                                	
                                	<?php $dox	=	App\Models\Documents::find($reports['script']); ?>
                                    <li><a target="_new" href="{!! $dox->link !!}">{!! $dox->title !!}&nbsp;{{ !empty($dox->draft) ? "DRAFT: ".$dox->draft : "" }} </a></li>                                  
                                </ul>
                            </li>
                            @endif
                            
                            @if(count($reports['info']))
                            <?php $count	=	1; ?>
                             @foreach($reports['info'] as $Rkey=>$Rval)
                             	<li>
                                    <a href="#">{!! Html::image("public/images/icons/report".$count.".png","Folder Image") !!} Reader {!!$count!!}</a>									
                                    <ul class="docs_menu">
                                        <li><a target="_blank" href="{!! URL::to("/myaccount/script-reports/".$Rkey."/view-pdf") !!}?_token={!!md5('script-reports/'.$Rkey.'/view-pdf')!!}">{!! $Rval['title'] !!} </a></li>
                                    </ul>
                                </li>
                                 <?php $count++; ?>
                             @endforeach
                            @endif                            
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!---//  docs section  Start  here -->
                
                
                <!---// Private  section Start  here -->
                
                <div id="private-notes" class="col-1-1 BorderBox mrgtp20">
                    <div class="col-1-1  bgBlue">
                        <h5 class="headonBlue">{!! trans("lang.private-notes") !!}</h5>
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
    {!! Form::open(array('route' => 'script.compare.savepdf','id'=>'createReportFrom')) !!}
    <div class="col-1-1 pul20 ">
        <div class="col-1-1 mrgtp10">
             {!!Form::label('title','Report Title',array('class'=>'it mrgbt5'))!!}
              {!!Form::text('title',$reports['title'],array('class'=>'text textInput it '))!!}
        </div>
        <div class="col-1-1 mrgtp10">
             {!!Form::label('draft','Script Draft',array('class'=>'it mrgbt5'))!!}
              {!!Form::text('draft',$reports['draft'],array('class'=>'text textInput it '))!!}
        </div>
        <div class="col-1-1 mrgtp15">
             {!!Form::label('mothe','Date',array('class'=>'it mrgbt5'))!!}
              {!!Form::text('date',$reports['date'],array('class'=>'text textInput it datepicker','readonly'))!!}
             
        </div>
         <div class="inc">
            {!!Form::label('inc','Checkmark all/any categories to appear in PDF',['class'=>'it ymrg10'])!!}	
            <div class="col-1-1 mrgtp10 Box xpul10 pultop5">
                <div class="left">        
                	{!!Form::checkbox('inc[]','all',2)!!}
                </div>
                <div class="left mrglft15">
                    {!!Form::label('inc[]','All',['class'=>'it ymrg2'])!!}
                </div>
                <div class="clearfix"></div>    
            </div>
            
            
            <div class="col-1-1 mrgtp10 Box xpul10 pultop5">
                <div class="left">        
                	{!!Form::checkbox('inc[]','graph')!!}
                </div>
                <div class="left mrglft15">
                    {!!Form::label('inc[]','Graph Chart',['class'=>'it ymrg2'])!!}
                </div>
                <div class="clearfix"></div>    
            </div>
            
            <div class="col-1-1 mrgtp10 Box xpul10 pultop5">
                <div class="left">        
                	{!!Form::checkbox('inc[]','scorechart')!!}
                </div>
                <div class="left mrglft15">
                    {!!Form::label('inc[]','Score Chart',['class'=>'it ymrg2'])!!}
                </div>
                <div class="clearfix"></div>    
            </div>
            
            <div class="col-1-1 mrgtp10 Box xpul10 pultop5">
                <div class="left">        
                	{!!Form::checkbox('inc[]','questions')!!}
                </div>
                <div class="left mrglft15">
                    {!!Form::label('inc[]','Questions',['class'=>'it ymrg2'])!!}
                </div>
                <div class="clearfix"></div>    
            </div>
            
            <div class="col-1-1 mrgtp10 Box xpul10 pultop5">
                <div class="left">        
                	{!!Form::checkbox('inc[]','notes')!!}
                </div>
                <div class="left mrglft15">
                    {!!Form::label('inc[]','Notes',['class'=>'it ymrg2'])!!}
                </div>
                <div class="clearfix"></div>    
            </div>
         </div>
        
        <div class="col-1-1 mrgbt5 mrgtp20">
            {!!Form::submit('Compare',array('class'=>'btn btn-primary right','id'=>'SaveNoteBtn'))!!}
        </div>
        <div class="clearfix"></div>
    </div>
     {!!Form::hidden('template_id',$template_id)!!}
     {!!Form::hidden('script_cmp_id',$script_cmp_id)!!}
     {!!Form::hidden('cr_type',$type,['id'=>'cr_type'])!!}
     {!!Form::hidden('draft1',$draft1,['id'=>'draft1'])!!}
     {!!Form::hidden('draft2',$draft2,['id'=>'draft2'])!!}
    {!! Form::close() !!}
</div>
<!-- Compare Reports-->

</div>
@stop