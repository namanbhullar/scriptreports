<?php 

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Models\Profile;
use App\Models\WritingProjects;
use App\Models\FilmProjects;
use App\Models\FeaturedProjets;
use App\Models\Contests;
use App\Models\Classes;
use App\Models\Documents;
use App\Models\User;

use Hash;
use Auth;
use Route;
use URL;
use Redirect;
use DB;
use View;
use Validator;

class AdminProfileController extends AdminBaseController {



	protected $layout 		=	'admin.layouts.master';
	protected $layout_full 	=	 NULL;
	

	
	/**
	 * Default action for Users
	 *
	 * @return Response
	 */
	
	public function index(Request $request){
		
		
		$searchuser	=	$request->get('search');
		$filteruser	=	$request->get('ft_plan');
		if(!$searchuser && !$filteruser){
			$profile	=	Profile::all();
		}else{
			$profile	=	Profile::SearchProfile($searchuser,$filteruser);
		}
		
		return View::make('admin.profiles.index', array('profiles' => $profile));
						
	}
	
	public function editView($id){
		
		$profile			=	Profile::find($id);
		$profile->load('WrittingProjects','FeatureProjects','Classes','Contests','Address');
		$writingprojects	=   $profile->WrittingProjects;
		return View::make('admin.profiles.edit', array('profile' => $profile,'writing'=> $writingprojects));
	}
	

	
	public function updateProfile($id){
		
		$rules = array('full_name' => 'required');		
		$validator = Validator::make(request()->all(), $rules);	
		// validate inputs
		if ($validator->fails())
		{
			return Redirect::back()->withInput()
							->withErrors(implode('<br/>',$validator->messages()->all()));	
		}
		$Profile	=		Profile::find($id);
		$userid				=	$Profile->user_id;
		$data				=	request()->all();
		
		// upload profile image
		$file	=	request()->file('profile_imgage');
		if(!empty($file)){
			
			$destinationPath    = public_path('/uploads/profiles/users/'.$userid);
			$name				=	$file->getClientOriginalName(); 
			$upload_success     = $file->move($destinationPath, $name);
			
			if(!empty($Profile->profile_img) && file_exists($destinationPath.'/'.$Profile->profile_img)){ 
				unlink($destinationPath.'/'.$Profile->profile_img); 
			}
			
			$Profile->profile_img			=	$name;
		}
		
		// upload sample coverage
		$file2	=	request()->file('sample_coverageimg');
		if(!empty($file2) && request()->get('coverageStatus') == 1){
			$destinationPath    = 'public/uploads/profiles/users/'.$userid; 
			$name				=	$file2->getClientOriginalName(); 
			$upload_success     = $file2->move($destinationPath, $name);
						
			// remove old sample
			if(!empty($Profile->sample_coverage) && file_exists($destinationPath.'/'.$Profile->sample_coverage)){ 
				unlink($destinationPath.'/'.$Profile->sample_coverage); 
			}
			
			$Profile->sample_coverage		=	$name; 
		}else{
			if($Profile->sample_coverage != '' && request()->get('coverageStatus') == 0){
				$destinationPath    = 'public/uploads/profiles/users/'.$userid; 
				unlink($destinationPath.'/'.$Profile->sample_coverage); 
				$Profile->sample_coverage		=	''; 
			}
		}
		
		$Profile->full_name				=	$data['full_name'];
		$Profile->brief_boi				=	$data['brief_boi'];
		$Profile->company_name			=	$data['company_name'];
		$Profile->location				=	$data['location'];
		$Profile->title					=	$data['select_type'];
		$Profile->about_me				=	$data['about_me'];
		$Profile->additional_skills		=	$data['additional_skills'];
		$Profile->extra_fields			=	$data['extra_fields'];
		$Profile->website				=	$data['website'];
		$Profile->twitter				=	$data['twitter'];
		$Profile->facebook				=	$data['facebook'];
		$Profile->education				=	$data['education'];
		$Profile->industry_experience	=	$data['industry_experience'];
		$Profile->languages				=	$data['languages'];
		$Profile->awards				=	$data['awards'];
		$Profile->script_speciality		=	$data['script_speciality'];
		$Profile->writing_partner		=	isset($data['writing_partner']) ? $data['writing_partner'] : '';
		$Profile->script_exchange		=	isset($data['script_exchange']) ? $data['script_exchange'] : '';
		$Profile->isnew					=	0;
		
		$Profile->save();
		
		// update user table
		$fulln	=	explode(' ',$data['full_name']);
		if(count($fulln)>2){
			$lastindex	=	count($fulln)-1;
			$lastname	=	end($fulln);
			unset($fulln[$lastindex]);
			$fistname	=	implode(" ",$fulln);	
		}else{
			$fistname	=	$fulln[0];	
			$lastname	=	$fulln[1];	
		}
		$user				=	User::find($Profile->user_id);
		
		$user->first_name 	=  $fistname;
		$user->last_name 	=  $lastname;
		$user->save();
		
		// Update Writing Projects( Scripts )
		$totalwrinting		=	$data['writing_count'];
		
		for($i=1;$i<$totalwrinting;$i++){
			
			if(isset($data['writing_id_'.$i])){
				
				// delete record if delete button pressed
				if(isset($data['writing_delete_'.$i]) && $data['writing_delete_'.$i]==1){
					
					$wrtingprojects		=	WritingProjects::find($data['writing_id_'.$i]);
					$destinationPath    =	'public/uploads/profiles/users/'.$userid.'/mydocuments/'.$wrtingprojects->document_id;
					// remove old sample
					if(!empty($wrtingprojects->script) && file_exists($destinationPath.'/'.$wrtingprojects->script)){ 
						unlink($destinationPath.'/'.$wrtingprojects->script); 
					}
					if(is_dir($destinationPath))
						rmdir($destinationPath);		
					
					Documents::destroy($wrtingprojects->document_id);
					WritingProjects::destroy($data['writing_id_'.$i]);
					continue;
				}
				
				// update existing record
				if(!empty($data['script_title_'.$i]) && $data['writing_delete_'.$i]==0){
					$wrtingprojects	=	WritingProjects::find($data['writing_id_'.$i]);						
					$wrtingprojects->title			=	$data['script_title_'.$i];
					$wrtingprojects->status			=	$data['script_status_'.$i];
					$wrtingprojects->save();
				}
			}
			else
			{
				// add new entry
				if(!empty($data['script_title_'.$i])){
					if(!empty($data['script_title_'.$i]) && $data['writing_delete_'.$i]==1)
						continue;
					$wrtingprojects	=	new WritingProjects;
					
					$wrtingprojects->profile_id		=	$Profile->id;
					$wrtingprojects->title			=	$data['script_title_'.$i];
					$wrtingprojects->status			=	$data['script_status_'.$i];
					$wrtingprojects->save();					
				}
			}	
		}
		return Redirect::to('/admin/profiles')->with('success', 'Profile updated successfully');
	}	
}