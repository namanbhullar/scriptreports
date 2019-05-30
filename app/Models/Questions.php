<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Validator;

use Auth;
use URL;

use App\Models\Templates;

class Questions extends Model
{
    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'lr_template_questions';
	
	public function category()
	{
		return $this->belongsTo('App\Models\Categories','category_id','id');
	}


	public function SaveNew(){
		
		$rules	=	array('title'=>'required');
						
		
		$validator = Validator::make(request()->all(), $rules);
		
		if($validator->fails()){
			return $validator;	
		}
		
		
		$Questions				=	new Questions;
		$Questions->title		=	request()->get('title');
		$Questions->category_id	=	request()->get('category_id');
		$Questions->created_by	=	Auth::User()->id;	
		$Questions->type		=	'0';	
		$Questions->status		=	request()->get('status');
		$Questions->save();
		return true;
	}
	
	public function Update($id){
		
			
		$rules	=	array('title'=>'required');
						
		$validator = Validator::make(request()->all(), $rules);
		
		if($validator->fails()){
			return $validator;	
		}
		
		
		$Questions				=	Questions::find($id);
		$Questions->title		=	request()->get('title');
		$Questions->category_id	=	request()->get('category_id');
		$Questions->status		=	request()->get('status');
		$Questions->save();
		return true;
	}
	
	public function UpdateStatus($ids,$task){ 
		
		foreach($ids as $id){
			$Questions = Questions::find($id);
			$Questions->status	 =	($task=='activate') ? '0' : '1';
			$Questions->save();	
		}
		
	}
	
	
	public function SaveNewCustom(){
		$Questions				=	new Questions;
		$Questions->title		=	request()->get('title');
		$Questions->category_id	=	request()->get('post_cat_id');
		$Questions->created_by	=	Auth::User()->id;	
		$Questions->type		=	'1';	
		$Questions->status		=	'0';
		$Questions->save();
		
		
		$html	=	view('report-template.question')->with('question',$Questions);
		return $html;
	}
	
	public function GetTemplateQueationsByCategory($id,$catid,$type=NULL){
			
			
			$query			=	Questions::where('status','0')->where('category_id',$catid)->where('type',0);
			
			if($type=='view'){
				$query->orwhere('type',1);
			}else{
				$query->orwhere(function($query) use ($catid){
						$query->where('type',1)->where('created_by',Auth::User()->id)->where('category_id',$catid);	
				});
			}
			
			$questions	=	$query->get();
			
			$template	=	Templates::find($id);
			$ordering	=	json_decode($template->ordering);
			
			if(!empty($template->ordering) && isset($ordering->$catid)){
				
					$data		=	array();
					$notadded	=	array();
					foreach($ordering->$catid as $value){
							foreach($questions as $question){
								if($value==$question->id){
									$data[]	=	$question;
									$added[$question->id]		=	$question->id;				
								}else{
									$notadded[$question->id]	=	$question;	
								}
						}
				}
				
				$total	=	count($data);
				foreach($notadded as $key=>$value){
						if(!isset($added[$key])){
							$data[$total]	= $value;
							$total++;
						}
				}
					
				//echo"<pre>"; print_r($data); exit;
				return $data;
			}else{
				return $questions;	
			}
			
			
	}
	
	
	public function GetQuestionsForTemplate($qids,$tempid){
		
		if(!count($qids))
			return array();
		
			$query			=	Questions::where('status','0')->wherein('id',$qids);
			$questions	=	$query->get();
			
			$datatoreturn	=	array();
			$template		=	Templates::find($tempid);
			$ordering		=	json_decode($template->ordering);
			//echo"<pre>"; print_r($ordering); exit;
			if(!empty($template->ordering)){
				
					foreach($ordering as $okey=>$oval){
						
							foreach($questions as $qq){
								$catid	=	$qq->category_id;
								if(isset($ordering->$catid)){ 
										$newkey	=	array_search($qq->id,$oval);
										$datatoreturn[$qq->category_id][$newkey]	=	$qq;	
								}else{
									$datatoreturn[$qq->category_id][]	=	$qq;	
								}
							}
					}
				
				// Sort key as per ordering	
				foreach($datatoreturn as $catkey=>$catval)
					ksort($datatoreturn[$catkey]);	
				
				return $datatoreturn;
			}else{
				
				foreach($questions as $qq){
					$datatoreturn[$qq->category_id][]	=	$qq;
				}
				return $datatoreturn;	
			}
					
	}
	
	public function UpdateCustomOrder(){
		
		$arrayorder				=	request()->get('arrayorder');
		$temp_id				=	request()->get('temp_id');
		$category_id			=	request()->get('category_id');
		
		// update ordering	
		$template					=	Templates::find($temp_id);
		$oldordering				=	!empty($template->ordering) ? json_decode($template->ordering) :emptyClass();
		$oldordering->$category_id	=	$arrayorder;
		
		$template->ordering		=	json_encode($oldordering);
		$template->save();	
	}
	
	public function SearchQuestion($catid){
		if($catid==0){
			return Questions::where('type',0)->get();
		}else{
			return Questions::where('type',0)->where('category_id',$catid)->get();
		}
	}
}
