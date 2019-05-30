<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShareTemplate extends Model
{
   /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table	=	"lr_sharetemplates";
	
	public function sender()
	{
		return $this->belongsTo('App\Models\User','sender_id','id');
	}
	
	public function receiver()
	{
		return $this->belongsTo('App\Models\User','receiver_id','id');
	}
	
	public function Share($template_id,$inbox=null,$email=null)
	{
		$share	=	new ShareTemplate;
		$share->sender_id	=	!is_null($inbox) ? $inbox->sender_id : 0;
		$share->receiver_id	=	!is_null($inbox) ? $inbox->receiver_id : 0;
		$share->receiver_email=	!is_null($email) ? $email : "";
		$share->template_id	=	$template_id;
		$share->save();
	}
}
