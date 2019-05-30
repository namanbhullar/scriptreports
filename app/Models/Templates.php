<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use URL;
use Auth;
use DB;
class Templates extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table	=	"lr_templates";
	
	/**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
		'form'	=> 'array',
		'genre'		=> 'array',
		'subgenre'	=> 'array',
		'general_info'=>'array',
		'logsyn'=>'array',
		'character_break'	=>'array',
		'notes'	=>'array',
		'bar_graphs'=>'array'
    ];
	
    public function GetPostedTemplatesByID($id){
		
		return Templates::where('user_id',$id)->where('draft','0')->where('status',1)->get();	
	}
	
	public function getLinkAttribute()
	{
		return URL::to("myaccount/report-template/$this->id/view");
	}
	
	public function getIsfavoriteAttribute()
	{
		auth()->user()->id == $template->user_id;
		
		$favorite	= Favorites::where('item_id',$this->id)->where('item_type','template')->where('user_id',auth()->user()->id)->count();
		
		return  (bool) $favorite ? 'active' : 'inactive';
		
	}
	
	public function user()
	{
		return $this->belongsTo('App\Models\User');
	}
	
	public function shareList()
	{
		return $this->hasMany('App\Models\ShareTemplate','template_id','id')->where('sender_id',auth()->user()->id);
	}
	
	public function privatenote()
	{
		return $this->hasOne('App\Models\PrivateNotes','item_id','id')->where('item_type','template')->where('user_id',auth()->user()->id);
	}
	
	public function SaveTempateData($id){
		
			$questions		=	request()->get('questions');
			$categoryid		=	request()->get('current_cat_id');
			$post_template	=	request()->get('post_template');
			if(is_array($questions) && count($questions)>0){
					foreach($questions as $key =>$value){
						if($value[0]>0){
							$data[$key]	=		$value;	
						}
					}
					
					$template	=	Templates::find($id);
					
					if($post_template==1)
						$template->draft	=	0;
						
					$Existingdata		=	($template->data!='') ? json_decode($template->data) : emptyClass();
					$Existingdata->$categoryid	=	$data;
					
					// save new data
					$template->data	=	json_encode($Existingdata);
					$template->save();
			}
	}
	
	public function GetTemplateData($id,$categoryID){
		
			$datatoReturn	=	array();
			
			$template	=	Templates::find($id);
			$data		=	($template->data!='') ? json_decode($template->data) : emptyClass();
			if(isset($data->$categoryID)){
				
				foreach($data->$categoryID as $key => $values)
					$datatoReturn[$key]	=	$values;
					
			}
			
			return $datatoReturn;
		
	}
	
	public function GetTemplateCategories($id){
		
		$template	=	Templates::find($id);
		$data		=	($template->data!='') ? json_decode($template->data) : array();
		$array		=	array();
		foreach($data as $key=>$val){
			if(count($val)){
				$array[$key] 	= 	Questions::GetTemplateQueationsByCategory($id,$key,'view');
			}
		}
		// sort the array
		ksort($array);
		return $array;
	}
	
	public function GetFavoriteTemplates(){
		$id	=	Auth::user()->id;
		//echo $id;exit;
		$query	=	DB::table('lr_templates')
					->leftjoin("lr_favorites",function($query){
						$id	=	Auth::user()->id;
						$query->on("lr_favorites.item_id","=","lr_templates.id")
								->where("lr_favorites.item_type","=","template")
								->where('lr_favorites.user_id','=',$id);
					})
					->select('lr_templates.*')
					->addselect('lr_favorites.id as fid')
					->where('lr_templates.user_id','=',$id)					
					->orwhere('lr_favorites.user_id','=',$id);
					$template	=	$query->get();
		return $template;
	}
	
	public function GetTempateBarGraphs($id){
		
		$template			=	Templates::find($id);
		$data				=	array();
		$data				=	$template->bar_graphs;
		
		if(isset($tempate_graph_cat['other']) && count($tempate_graph_cat['other'])>0){
			
			// remove other from data
			unset($data['other']);
			
			foreach($tempate_graph_cat['other'] as $other)
				$data[]	=	$other;
		}
		return $data;
	}
	
	public function GetTemplateQuestions($id){
		
		$template	=	Templates::find($id);
		$data		=	($template->data!='') ? json_decode($template->data) : array();
		
		$array		=	array();
		foreach($data as $key=>$val){
			if(count($val)){
				foreach($val as $qkey=>$qval)
					$array[]	=	$qkey;	
			}
		}
		
		$data	=	Questions::GetQuestionsForTemplate($array,$id);
		return $data;
	}
	
}
