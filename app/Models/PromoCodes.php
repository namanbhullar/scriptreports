<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Auth;
use Validator;

class PromoCodes extends Model
{
   /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'lr_promo_codes';
	
	public function getIsValidAttribute()
	{
		$ExpiryDate 	= new DateTime($this->expire);
		$CurrentTime	= new DateTime();				
		return ($ExpiryDate > $CurrentTime && $this->used < $this->counts);
	}

	
	public function storePromoCode(){
	
		
		$discount_type	=	request()->get('discount_type');
		
		// Validation rulles
		 $rules = array('title' 			=> 'required', 
		 				'promo_code' 			=> 'required|unique:lr_promo_codes|min:5', 
						'expire' 			=> 'required|date',
						'plan_id' 			=> 'required',
						'counts' 			=> 'integer',
						'discount_type' 	=> 'required'
						);
		
		if($discount_type!=3){
			$rules['discount']	=	'required|integer';	
		}
		// custom error message
		$messages = array(
						  'expire.required'	 		=> 'Expiry date is required field',	
						  'promo_counts.integer'	 => 'Number of Uses must be an integer!',
						  'discount.required'  => 'Discount amount is required field',
						  'discount.integer'   => 'Discount amount must be an integer!'
						  );
		
		$validator = Validator::make(request()->all(), $rules,$messages);
		
		// validate inputs
		if ($validator->fails())
		{
			return $validator;
		}

		// save user if validation is passed 
		$promo = new PromoCodes;
 		$promo->plan_id 		= 	request()->get('plan_id');
        $promo->title  			= 	request()->get('title');
        $promo->promo_code   	= 	request()->get('promo_code');
        $promo->discount      	= 	request()->get('discount');
        $promo->discount_type   =	request()->get('discount_type');
		$promo->expire			=	request()->get('expire');	
		$promo->counts			=	request()->get('counts');
		$promo->status			=	request()->get('status');
		$promo->created_by		=	Auth::user()->id;		
 		$promo->save();	
		return true;
	}
	
	
	public function updatePromoCode($id){
		
			$discount_type	=	request()->get('discount_type');
		
		// Validation rulles
		 $rules = array('title' 			=> 'required', 
		 				'expire' 			=> 'required|date',
						'plan_id' 			=> 'required',
						'counts' 			=> 'integer',
						'discount_type' 	=> 'required'
						);
		
		if($discount_type!=3){
			$rules['discount']	=	'required|integer';	
		}
		// custom error message
		$messages = array(
						  'expire.required'	 => 'Expiry date is required field',
						  'counts.integer'	 => 'Number of Uses must be an integer!',
						  'discount.required'  => 'Discount amount is required field',
						  'discount.integer'   => 'Discount amount must be an integer!'
						  );
		
		$validator = Validator::make(request()->all(), $rules,$messages);
		
		// validate inputs
		if ($validator->fails())
		{
			return $validator;
		}

		// save user if validation is passed 
		$promo = PromoCodes::find($id);
 		$promo->plan_id 		= 	request()->get('plan_id');
        $promo->title  			= 	request()->get('title');
        $promo->discount      	= 	request()->get('discount');
        $promo->discount_type   =	request()->get('discount_type');
		$promo->expire			=	request()->get('expire');	
		$promo->counts			=	request()->get('counts');
		$promo->status			=	request()->get('status');
		$promo->save();	
		
		return true;
	}
	
	
	
	
	public function SearchPromoCode($plan){
		
		return PromoCodes::where('plan_id',$plan)->get();	
	}
}
