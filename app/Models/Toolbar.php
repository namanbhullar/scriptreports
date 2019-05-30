<?php

namespace App\Models;

/**
 * Toolbar helper 
 *
 * @var string
 */
 
	 
class Toolbar{		
	public function GetDefaultIcons($conroller,$action=''){
		
		$html	=	"<ul>";
		
		// Hide the other icons and show save and cancel on add or edit pages
		if($action=='add' || $action=='edit' || $action=='new'){
			$html	.=	self::save($conroller,'add');
			$html	.=	self::cancel($conroller,'cancel');	
		}else{
			$html	.=	self::add($conroller,'add');
			//$html	.=	self::edit($conroller,'edit');
			$html	.=	self::Devider();
			$html	.=	self::activate($conroller,'activate');
			$html	.=	self::block($conroller,'block');
			$html	.=	self::Devider();
			$html	.=	self::delete($conroller,'delete');		
		}
		
		
		$html	.=	"</ul>";
		
		return $html;
			
	}
		
	
	public function UsersToolbarIcons($conroller,$action=''){
		
		$html	=	"<ul>";
		
		// Hide the other icons and show save and cancel on add or edit pages
		if($action=='add' || $action=='edit' || $action=='new'){
			$html	.=	self::save($conroller,'add');
			$html	.=	self::cancel($conroller,'cancel');	
		}else{
			$html	.=	self::exportCSV();
			$html	.=	self::Devider();
			$html	.=	self::add($conroller,'add');
			//$html	.=	self::edit($conroller,'edit');
			$html	.=	self::Devider();
			$html	.=	self::activate($conroller,'activate');
			$html	.=	self::block($conroller,'block');
			$html	.=	self::Devider();
			$html	.=	self::delete($conroller,'delete');		
		}
		
		$html	.=	"</ul>";
		
		return $html;
			
	}
	
	
	public function PromocodeToolbarIcons($conroller,$action=''){
		
		$html	=	"<ul>";
		
		// Hide the other icons and show save and cancel on add or edit pages
		if($action=='add' || $action=='edit' || $action=='new'){
			$html	.=	self::save($conroller,'add');
			$html	.=	self::cancel($conroller,'cancel');	
		}else{
			$html	.=	self::add($conroller,'add');
			//$html	.=	self::edit($conroller,'edit');
			$html	.=	self::Devider();
			$html	.=	self::activate($conroller,'activate');
			$html	.=	self::block($conroller,'block');
			$html	.=	self::Devider();
			$html	.=	self::delete($conroller,'delete');		
		}
		
		
		$html	.=	"</ul>";
		
		return $html;
			
	}
	
	
	public function OtlinksToolbarIcons($conroller,$action=''){
		
		$html	=	"<ul>";
		
		// Hide the other icons and show save and cancel on add or edit pages
		if($action=='add' || $action=='edit' || $action=='new'){
			$html	.=	self::save($conroller,'add');
			$html	.=	self::cancel($conroller,'cancel');	
		}else{
			$html	.=	self::add($conroller,'add');
			//$html	.=	self::edit($conroller,'edit');
			$html	.=	self::Devider();
			$html	.=	self::activate($conroller,'activate');
			$html	.=	self::block($conroller,'block');
			$html	.=	self::Devider();
			$html	.=	self::delete($conroller,'delete');		
		}
		
		
		$html	.=	"</ul>";
		
		return $html;
			
	}
	
	
	public function CategoriesToolbarIcons($conroller,$action=''){
		
		$html	=	"<ul>";
		
		// Hide the other icons and show save and cancel on add or edit pages
		if($action=='add' || $action=='edit' || $action=='new'){
			$html	.=	self::save($conroller,'add');
			$html	.=	self::cancel($conroller,'cancel');	
		}else{
			$html	.=	self::add($conroller,'add');
			//$html	.=	self::edit($conroller,'edit');
			$html	.=	self::Devider();
			$html	.=	self::activate($conroller,'activate');
			$html	.=	self::block($conroller,'block');
			$html	.=	self::Devider();
			$html	.=	self::delete($conroller,'delete');		
		}
		
		
		$html	.=	"</ul>";
		
		return $html;
			
	}
	
	
	
		
	protected function add($controller,$route){ 
		
		return '<li class="addnew"><a href="#" onclick="setToolbarRoute(\''.$controller.'\',\''.$route.'\')"><span class="icon-32-new">New</span></a></li>';
			
	}
	
	protected function cancel($controller,$route){
		
		return '<li class="cancel"><a href="#" onclick="setToolbarRoute(\''.$controller.'\',\''.$route.'\')"><span class="icon-32-cancel">cancel</span></a></li>';
			
	}
	protected function save($controller,$route){
		
		return '<li class="save"><a href="#" onclick="submitForm()"><span class="icon-32-save">Save & Close</span></a></li>';
			
	}
	protected function delete($controller,$route){
		
		return '<li class="delete"><a href="#" onclick="setToolbarRoute(\''.$controller.'\',\''.$route.'\')"><span class="icon-32-delete">Delete</span></a></li>';
			
	}
	
	protected function edit($controller,$route){
		
		return '<li class="edit"><a href="#" onclick="setToolbarRoute(\''.$controller.'\',\''.$route.'\')"><span class="icon-32-edit">Edit</span></a></li>';
			
	}
	
	protected function publish($controller,$route){
		
		return '<li class="publish"><a href="#" onclick="setToolbarRoute(\''.$controller.'\',\''.$route.'\')"><span class="icon-32-publish">Publish</span></a></li>';
			
	}
	
	protected function unpublish($controller,$route){
		
		return '<li class="unpublish"><a href="#" onclick="setToolbarRoute(\''.$controller.'\',\''.$route.'\')"><span class="icon-32-unpublish">Unublish</span></a></li>';
			
	}
	
	protected function activate($controller,$route){
		
		return '<li class="activate"><a href="#" onclick="setToolbarRoute(\''.$controller.'\',\''.$route.'\')"><span class="icon-32-publish">Activate</span></a></li>';
			
	}
	
	protected function block($controller,$route){
		
		return '<li class="block"><a href="#" onclick="setToolbarRoute(\''.$controller.'\',\''.$route.'\')"><span class="icon-32-unpublish">Block</span></a></li>';
			
	}
	
	
	protected function Devider(){
		
		return '<li class="devider">&nbsp;</li>';
			
	}
	
	protected function exportCSV()
	{
		$link	=	request()->has('ft_plan')? "?ft_plane=".request()->get('ft_plan') : "";
		return '<li class="export"><a href="'.url('admin/export-csv').$link.'"><span class="icon-32-export">Export CSV</span></a></li>';
	}

}
