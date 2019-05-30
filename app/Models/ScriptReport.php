<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use URL;

class ScriptReport extends Model
{
    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'lr_script_reports';
	
	public function user()
	{
		return $this->belongsTo('App\Models\User','user_id','id');
	}
	
	public function sent()
	{
		return $this->belongsTo('App\Models\User','sent_by','id');
	}
	
	public function owner()
	{
		return $this->belongsTo('App\Models\User','owner_id','id');
	}
	
	public function template()
	{
		return $this->belongsTo('App\Models\Templates','template_id','id');
	}
	
	public function privatenote()
	{
		return $this->hasOne('App\Models\PrivateNotes','item_id','id')->where('item_type','report')->where('user_id',auth()->user()->id);
	}
	
	public function getReportbackAttribute()
	{
		if($this->share_id){
			$share	=	ShareTemplate::find($this->share_id);
			return $share->sender_id;
		}else{
			return Templates::find($this->template_id)->user_id;
		}
	}
	
	public function getDlinkAttribute()
	{
		return URL::route('report.download',['id'=>$this->id,'token'=>md5('script-reports/'.$this->id.'/download-pdf')]);
	}
	
	public function getLinkAttribute()
	{
		if($this->type == 1) return URL::route('report.view',['id'=>$this->id]).'?_token='.md5('script-reports/'.$this->id.'/view-pdf');
		else return URL::route('report.compare.edit',['id'=>$this->id]);
		
	}
	
	public function getPdflinkAttribute()
	{
		if($this->type == 1) return URL::route('report.view',['id'=>$this->id]).'?_token='.md5('script-reports/'.$this->id.'/view-pdf');
		else return URL::route('report.compare.view',['id'=>$this->id]).'?_token='.md5('script-reports/'.$this->id.'/view-compare-pdf');
		
	}
	
	
	// Setup event bindings...
	/*public static function boot()
	{
		 parent::boot();		 
	}*/
	
	public function getIsSeenAttribute($value)
	{
		if($this->user_id != $this->owner_id && $this->type	== 1)
			return $value;
		else
			return 1;
	}
	
	public function GetCompareReportData(){
		
		$data	=	request()->all();
		
		$template_id	=	$data['template'];
		$reprotsids		=	$data['reportchck'];	
		
		$tempate				=	Templates::find($template_id);
		$tempate_graph_cat		=	Templates::GetTempateBarGraphs($template_id);
		
		
		$tempate_questions		=	Templates::GetTemplateQuestions($template_id);
		$notes	=	$tempate->notes;
		if(count($notes)>5){
			foreach($notes as $nkey=>$nval){
				if(!empty($nval) && is_numeric($nkey)){
					$tempnotes[]	=	$nval;	
				}	
			}
			if(isset($notes['other']) && count($notes['other'])>0){
				foreach($notes['other'] as $okey=>$oval){
					if($oval[0])
						$tempnotes[]	=	$oval[0];		
				}
			}	
		}
		//dd($tempate->notes);
		
		$reprotdata		=	array();
		if(!$template_id)
			return array();
			
		if(count($reprotsids)>1){
				
			$reports	=	ScriptReport::wherein('id',$reprotsids)->orderby('id','desc')->get();
			
			
			foreach($reports as $rdata){
				
				$data	=	unserialize($rdata->data);
				//echo"<pre>"; print_r($data); exit;
				
				$reprotdata['info'][$rdata->id]['general_info']		=	$data['general_info'];
				$reprotdata['info'][$rdata->id]['owner_id']			=	$rdata->owner_id;
				$reprotdata['info'][$rdata->id]['title']			=	$data['script_title'];
				$reprotdata['info'][$rdata->id]['draft']			=	$data['script_draft'];
				$reprotdata['info'][$rdata->id]['script_date']		=	$data['script_date'];
				$reprotdata['info'][$rdata->id]['script_notes']		=	$data['script_notes'];
				
				// Evaluation graph
				if(count($tempate_graph_cat)){
					foreach($tempate_graph_cat as $graphcat){
							if(is_array($graphcat))
							{
								foreach($graphcat as $otherGraph)
								{
									if(isset($data['graphs'][$otherGraph]) && $data['graphs'][$otherGraph]>1){							
										$reprotdata['graph']['evl_graph'][$otherGraph][$rdata->id]	=	$data['graphs'][$otherGraph];
									}
								}
							}
							else
							{
								if(isset($data['graphs'][$graphcat]) && $data['graphs'][$graphcat]>1){							
									$reprotdata['graph']['evl_graph'][$graphcat][$rdata->id]	=	$data['graphs'][$graphcat];
								}
							}
					}
				}
				// End Evaluation
				
				// Questin part
				if(count($tempate_questions)){
					$rqdata	=	$data['data']; 
					foreach($tempate_questions as $qcat=>$qval){
							$cat_total	=	0; 
							
							if(isset($rqdata[$qcat]) && count($rqdata[$qcat])){
								$cattitle	=	trim(Categories::find($qcat)->title);
								foreach($rqdata[$qcat] as $skey=>$sval){
										$reprotdata['questions'][$cattitle][$skey]['title']					=	Questions::find($skey)->title;
										$reprotdata['questions'][$cattitle][$skey]['score'][$rdata->id]		=	$sval['score'];
										$reprotdata['questions'][$cattitle][$skey]['notes'][$rdata->id]['notes']		=	$sval['notes'];
										$reprotdata['questions'][$cattitle][$skey]['notes'][$rdata->id]['suggestion']	=	$sval['suggestion'];
												
										$cat_total	+= (int)$sval['score'];
								}
								
								$reprotdata['graph']['qst_graph'][$qcat][$rdata->id]['gained']	=	$cat_total;		
								$reprotdata['graph']['qst_graph'][$qcat][$rdata->id]['total']	=	count($rqdata[$qcat])*5;
								
								
								$reprotdata['scorechart'][$cattitle][$rdata->id]	=	$cat_total;		
								$reprotdata['scorechart'][$cattitle]['total']		=	count($rqdata[$qcat])*5;
								
							}
					}
						
				}
				// End Questions
				
				// Notes
				if(!is_null($tempnotes) && !empty($tempnotes))
				{
					foreach($tempnotes as $notes){
							if(isset($data['notes'][$notes]) && !empty($data['notes'][$notes]))
							$reprotdata['notes'][$notes][$rdata->id]	=	$data['notes'][$notes];
					}
				}
				
			}
			
			if(!is_null($reprotdata['scorechart']) && !empty($reprotdata['scorechart'])){
				foreach($reprotdata['scorechart'] as $sskey=>$ssval){ 
					
						$tempavg			=	$ssval;
						$total				=	$ssval['total'];
						$totalreportscore	=	0;
						unset($tempavg['total']);
						
						$totalreports	=	count($tempavg);
						foreach($tempavg as $temval)
								$totalreportscore	+= $temval;
						
						$temtotal	=	$total*$totalreports; 
						$gprecent	=	($totalreportscore/$temtotal)*100;	
						$average	=	($total/100)*$gprecent;
						
						if(strpos($average,'.'))
							$reprotdata['scorechart'][$sskey]['average']	=	number_format($average,2); 	
						else
							$reprotdata['scorechart'][$sskey]['average']	=	$average; 
							
				}
			}
			if(!is_null($reprotdata['graph']['evl_graph']) && !empty($reprotdata['graph']['evl_graph'])){
				foreach($reprotdata['graph']['evl_graph'] as $gkey=>$gval){ 
					
						$total				=	100;
						$totalreportscore	=	0;
						$totalreports		=	0;
						
						foreach($gval as $ggg){
							if($ggg>1){
								$totalreports++;
								$totalreportscore	+= $ggg;
							}
						}
						
						 $tttt	=	number_format($total*$totalreports,2);
						 if($tttt>0){
							 $gprecent	=	($totalreportscore/$tttt)*100;	
							 $average	=	($total/100)*$gprecent;
						}
						
						$reprotdata['graph']['evl_graph'][$gkey]['average']	=	number_format($average,2); 
				}
			}
				
			//echo "<pre>"; print_r($reprotdata); exit;
			return $reprotdata;
		}else{
			return array();	
		}
	}
}
