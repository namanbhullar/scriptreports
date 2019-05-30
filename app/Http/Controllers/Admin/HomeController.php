<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Models\Toolbar;
use App\Models\User;

use Auth;
use Route;
use URL;
use Redirect;

use Validator;

class HomeController extends AdminBaseController {

	public function home()
	{
		
		
		// Redirect to dashboard if user is already logged in
		if (Auth::check())
			{
				return redirect('/admin/dashboard');
			}
		
		
		return view('admin.home.index');
		
	}
	
	
	/**
	 * Login users
	 *
	 * @return Response
	 */
	 
	public function login(Request $request){
		
			$username	=	$request->get('username');
			$password	=	$request->get('password');
			
		
			if (Auth::attempt(['username' => $username, 'password' => $password]))
			{
				return Redirect::intended('/admin/dashboard');
			}else{
				
			return back()
            	->withInput($request->except('password'))
            	->withErrors('Username or Password does not match or you don\'t have account yet.');
			}
	}
	
	
	/**
	 * Logout users
	 *
	 * @return Response
	 */
	public function logout(){
		
			Auth::logout();
			return Redirect::to('/admin')->with('success', 'You have successfully logged out.');
			
	}
	
	
	/**
	 * Default action for dashboard
	 *
	 * @return Response
	 */
	
	public function dashbord(){
		
		$data	=	User::all();		
		return view('admin.dashboard.index', array('users' => $data));
						
	}
	
	
	public function ExportCsv(Request $request){
		if($request->has('ft_plane'))
			$data = User::where('user_plan',$request->get('ft_plane'))->select('id','username','email','first_name','last_name','user_group','user_plan')->get()->toArray();
		else 
			$data = User::select('id','username','email','first_name','last_name','user_group','user_plan')->get()->toArray();
				
		array_walk($data,function(&$value, $key){
			unset($value['user_group']);
			unset($value['user_plan']);
		});
		if(!count($data))	return back()->withErrors('No Users Found in Selected Plan.');
			
		$output	=	"";
		$output	.=	implode(',',array_keys($data[0]))."\n";		
		
		foreach($data as $line)
		{
			$output	.= implode(',',$line)."\n";
		}
		header('Content-Disposition: attachment; filename="export.csv"');
		header("Cache-control: private");
		header("Content-type: application/csv");
		header("Content-transfer-encoding: binary\n");
		echo $output;
	}


}
