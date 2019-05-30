<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Validator;
use App\Models\Templates;

use Auth;

class Categories extends Model
{
    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'lr_template_categories';
			
	public function question()
	{
		return $this->hasMany('App\Models\Questions','category_id','id');
	}
	
	public function SaveNew(){
		
		$rules	=	array('title'=>'required|unique:lr_template_categories');
						
		
		$validator = Validator::make(request()->all(), $rules);
		
		if($validator->fails()){
			return $validator;	
		}
		
		
		$category				=	new Categories;
		$category->title		=	request()->get('title');
		$category->created_by	=	auth()->user()->id;	
		$category->type			=	0;	
		$category->status		=	request()->get('status');
		$category->save();
		return true;
	}
	
	
	public function SaveNewCustom(){
		$category				=	new Categories;
		$category->title		=	request()->get('title');
		$category->created_by	=	auth()->user()->id;	
		$category->type			=	1;	
		$category->status		=	0;
		$category->save();
		$html	=	'<li class="relative"><a onclick="submiteForm(\''.$category->id.'\')" href="javascript::void();" id="cat_title_'.$category->id.'" title="'.$category->title.'">'.str_limit($category->title,20).'</a><ul class="x-icons"><li><i onclick="editcat('.$category->id.')" class="fa fa-pencil editcat" title="Edit"></i></li><li><i class="fa fa-trash-o" onclick="deletecat('.$category->id.')" title="Remove"></i></li></ul><input type="hidden" value="'.$category->title.'" id="hid_cattext_'.$category->id.'" /></li>';
		return $html;
	}
	
	public function Update($id){
		
			
		$rules	=	array('title'=>'required|unique:lr_template_categories,title,'.$id);
						
		$validator = Validator::make(request()->all(), $rules);
		
		if($validator->fails()){
			return $validator;	
		}
		
		
		$category				=	Categories::find($id);
		$category->title		=	request()->get('title');
		$category->status		=	request()->get('status');
		$category->save();
		return true;
	}
	
	public function UpdateStatus($ids,$task){ 
		
		foreach($ids as $id){
			$category = Categories::find($id);
			$category->status	 =	($task=='activate') ? '0' : '1';
			$category->save();	
		}
		
	}
	
	public function GetNextCategory($id){
		
		$cat	=	 Categories::where('status','0')
					->where(function($query){
						$query->where('type',0)
							->orWhere(function($query){
								$query->where('type',1)
									->where('created_by',auth()->user()->id);	
							});							
					})
					->where('id','>',$id)->orderby('id','asc')->first();
		if($cat)
			return $cat->id;
		else
			return 0;	 
	}
	
	public function GetPreviousCategory($id){
		
		$cat	=	Categories::where('status','0')
					->where(function($query){
						$query->where('type',0)
							->orWhere(function($query){
								$query->where('type',1)
									->where('created_by',auth()->user()->id);
							});						
					})->where('id','<',$id)->orderby('id','desc')->first();
		if($cat)
			return $cat->id;
		else
			return 0;
	}
	
	public function GetCategoriesByUserID($id){
		
		if($id){
			
				$query			=	Categories::where('status','0')->where('type',0);
				$query->orwhere(function($query) use ($catid){
						$query->where('type',1)->where('created_by',Auth::User()->id);	
				});
				return	$query->get();	
				
		}else{
			
				return Categories::where('status','0')->get();	
		}	
	}
	
	
}
