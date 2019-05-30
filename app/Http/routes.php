<?php

ini_set('max_execution_time', 360); //6 minutes
define('BASEDIR',dirname(dirname(dirname( __FILE__ ))));
include(BASEDIR.'/public/assets/mpdf60/mpdf.php');

error_reporting( E_CORE_ERROR | E_CORE_WARNING | E_COMPILE_ERROR | E_ERROR | E_WARNING | E_PARSE | E_USER_ERROR | E_USER_WARNING | E_RECOVERABLE_ERROR );

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/



Route::group(['middleware' => 'web'], function () {
    Route::auth();
	
	Route::get('/', function () {
    	return view('pages.home');
	});
	
	Route::get('/terms-of-use', function () {
		return view('pages.terms-of-use');
	});
	
	Route::get('/privacy-policy', function () {
		return view('pages.privacy-policy');
	});
	
	Route::get('/contact-us', function () {
		return view('pages.contact-us');
	});
	
	Route::get('/login', ['middleware'=>'guest',function () {
		return view('pages.login');
	}]);
	
	Route::post('/user/search',"UserController@search");
	
	Route::post('/contact-us',array('as'=>"contact-form","uses"=>"HomeController@contact"));
		
	//Routes For Reader Mwmber Directory
	Route::group(['prefix'=>'/directory'],function(){		
		Route::get('/login','ReaderController@login');
		
		Route::post('/login',['as'=>'reader.login','uses'=>'ReaderController@doLogin']);
					
		Route::group(['middleware'=>'reader'], function(){
			Route::get('/','ReaderController@index');
			Route::post('/','ReaderController@filter');
		});
		
	});
	
	//Routes For Producer Mwmber Directory
	Route::group(['prefix'=>'/submission-directory'],function(){
		Route::get('/login','SubmissionController@login');
		
		Route::post('/login',['as'=>'submission.login','uses'=>'SubmissionController@doLogin']);
		
		Route::group(['middleware'=>'submission'],function(){
			Route::get('/','SubmissionController@index');
			Route::get('/{id}/view',['as'=>'user.submission','uses'=>'SubmissionController@view']);
		});
	});
	
	//Sample Coverage re
	Route::get('profile/{id}/sample-coverage',['as'=>'profile.sampleCoverage','uses'=>'DownloadsController@sampleCoverage']);
	Route::get('documents/view/{id}',['as'=>'document.view','uses'=>'DownloadsController@ViewDocuments']);
	
	// sent script request
	Route::post('profile/script-view-request','ProfileController@ScriptRequest');
	
	//Profile page Only For Pro Account
	Route::get('profile/{id}/view','ProfileController@ProfileView');
	Route::get('profile/{token}/private','ProfileController@ProfilePeivateView');
	
	
	Route::group(['prefix'=>'/myaccount','middleware'=>'auth'], function(){
		Route::get('/', 'ScriptManagerController@index');
		
		Route::post('/get-pv-notes','UserController@getPrivateNote');
		Route::post('/set-pv-notes','UserController@setPrivateNote');
		
		Route::post('/read-notification','UserController@ReadNotification');
		
		Route::group(['prefix'=>'/profile'],function(){
			Route::get('/',function() {
				 return view('profile.index'); 
			});
			
			Route::get('/{id}/view','ProfileController@ProfileView');
			Route::get('/{token}/private','ProfileController@ProfilePeivateView');
			
			Route::get('/edit',['as'=>"profile.edit","uses"=>"ProfileController@Edit"]);
			
			Route::post('/edit/addScript',function(){
				return view('profile.addScript');
			});
			
			Route::post('/edit/addProject',function(){
				return view('profile.addProject');
			});
			
			Route::post('/edit/addClasses',function(){
				return view('profile.addClasses');
			});
			
			Route::post('/edit/addContest',function(){
				return view('profile.addContest');
			});
			
			Route::post('/update',['as'=>'profile.update','uses'=>'ProfileController@Update']);			
		});
		
		
		Route::post('/user-search-email','UserController@searchUserByEmail');
		
		Route::group(['prefix'=>'/report-template'],function(){
			Route::get('/',['as'=>'template.index','uses'=>'ReportTemplateController@index']);
			Route::post('/change-status',['as'=>'template.status','uses'=>'ReportTemplateController@ChangeStatus']);
			
			Route::get('/add',function (){return view('report-template.add');});
			Route::post('/create',['as'=>'template.save','uses'=>'ReportTemplateController@create']);
			Route::get('/{id}/edit',['as'=>'template.edit','uses'=>'ReportTemplateController@EditTemplate']);
			Route::post('/{id}/update',['as'=>'template.update','uses'=>'ReportTemplateController@update']);
			
			Route::get('/create/{id}/next',['as'=>'template.next','uses'=>'ReportTemplateController@TemplateNextStep']);
			Route::post('/create/{id}/next',['as'=>'template.next','uses'=>'ReportTemplateController@TemplateNextStep']);
			
			Route::post('/AddCustomQuestion',array('as'=>'template.addquestion','uses'=>'ReportTemplateController@AddCustomQuestion'));
			Route::post('/UpdateCustomQuestion',array('as'=>'template.updateqestion','uses'=>'ReportTemplateController@UpdateCustomQuestion'));
			Route::post('/AddCustomCategory',array('as'=>'template.addcategory','uses'=>'ReportTemplateController@AddCustomCategory'));
			Route::post('/UpdateCustomCategory',array('as'=>'template.updatecategory','uses'=>'ReportTemplateController@UpdateCustomCategory'));
			
			Route::post('/DeleteCustomQuestion',['as'=>'template.deletequestion','uses'=>'ReportTemplateController@DeleteCustomQuestion']);
			Route::post('/DeleteCustomCategory',['as'=>'template.deleteCategory','uses'=>'ReportTemplateController@DeleteCustomCategory']);
			Route::post('/UpdateCustomOrder','ReportTemplateController@UpdateCustomOrder');
			Route::post('/UpdateTemplateOrder','ReportTemplateController@UpdateTemplateFieldsOrder');
			Route::get('/{id}/preview',['as'=>'template.preview','uses'=>'ReportTemplateController@PreViewTemplate']);
			Route::get('/{id}/savepreview',['as'=>'template.savePre','uses'=>'ReportTemplateController@SavePreViewTemplate']);
			Route::get('/{id}/posttemplate',['as'=>'template.post','uses'=>'ReportTemplateController@PostTemplate']);
			
			Route::get('/{id}/view',['as'=>'template.view','uses'=>'ReportTemplateController@ViewTemplateFromURL']);
			
			Route::post('/submit-report',array('as'=>'template.submitreport', 'uses'=>'ReportTemplateController@SubmitReport'));
			Route::get('/submit-report',array('as'=>'template.submitreport', 'uses'=>'ReportTemplateController@SubmitReport'));
			
		});
		
		Route::group(['prefix'=>'/script-reports'],function(){
			Route::get('/',['as'=>'report.index','uses'=>'ScriptReportController@index']);
			Route::get('/{id}/download-pdf/{token}',['as'=>'report.download','uses'=>'ScriptReportController@DownLoadPDFByID']);			
			Route::get('/{id}/edit/',['as'=>'report.edit','uses'=>'ScriptReportController@EditScriptReport']);
			Route::post('/{id}/update/',['as'=>'report.update','uses'=>'ScriptReportController@UpdateReport']);
			Route::get('/{id}/view-pdf/',['as'=>'report.view','uses'=>'ScriptReportController@ViewpdfByUser']);
			Route::post('/change-status',['as'=>'report.status','uses'=>'ScriptReportController@ChangeStatus']);
			Route::get('/sent-report-back','ScriptReportController@SentTemplateToOwner');
			Route::post('/report-compare',['as'=>'report.compare', 'uses'=>'ScriptReportController@ReportCompare']);
			Route::get('/{id}/report-compare-view',['as'=>'report.compare.edit','uses'=>'ScriptReportController@ReportCompareIndex']);
			Route::post('/report-compare/savepdf',array('as'=>'script.compare.savepdf', 'uses'=>'ScriptReportController@SaveComparePDFReport'));
			Route::get('/{id}/view-compare-pdf',['as'=>'report.compare.view','uses'=>'ScriptReportController@ViewComparePDFReport']);
			Route::post('/{id}/sent-report-back','ScriptReportController@sentReportBackToClient');
			Route::post('/{id}/getReportForCompare','ScriptReportController@getReportForCompare');
		});
		
		
				
		Route::group(['prefix'=>'/script-manager'],function(){
			
			Route::get('/','ScriptManagerController@index');
			
			Route::group(['prefix'=>'/scripts'],function(){
				Route::post('/change-status','ScriptsController@ChangeStatus');
				Route::post('/ScriptToProfile','ScriptsController@ScriptToProfile');
				Route::get('/',['as'=>'scripts.index','uses'=>'ScriptsController@index']);
				Route::get('/{id}/view',['as'=>'script.view','uses'=>'ScriptsController@viewScript']);
				Route::get('/{script_id}/view/{track_id}',['as'=>'script.shareview','uses'=>'ScriptsController@scriptShareView']);
				Route::post('/{script_id}/uploadDocs',['as'=>'script.uploadDocs','uses'=>'ScriptsController@uploadDocs']);
				Route::post('/addDocument','ScriptsController@addDocument');
				Route::post('/save-pvt-notes','ScriptsController@PrivateNotesEdit');
				Route::post('/feedback-icon','ScriptsController@SaveFeedbackIcon');
				Route::post('/send-feedback','ScriptsController@SendFeedback');
				Route::get('/{id}/edit',['as'=>'script.edit','uses'=>'ScriptsController@Edit']);
				Route::get('/{id}/track',['as'=>'script.track','uses'=>'ScriptShareController@track']);
				Route::post('/{id}/update',['as'=>'script.update','uses'=>'ScriptsController@Update']);
				Route::get('/iframe-index',function(){ return view('script-manager.scripts.iframe-index'); });
				Route::post('/MsgToScptOwnr',['as'=>'MsgToScptOwnr','uses'=>'ScriptsController@MsgToScptOwnr']);
				Route::get('/{id}/post-unpost-script','ScriptsController@PostUnPostScriptToProfile');
				Route::post('/{id}/update',['as'=>'script.update','uses'=>'ScriptsController@Update']);
			});
			
			Route::get('/script-add',function(){ return view('script-manager.scripts.add'); });	
			
			
			Route::get('/my-documents/iframe','DocumentsController@iframeIndex');
			Route::post('/my-documents/change-status','DocumentsController@ChangeStatus');
			Route::get('/my-documents',['uses'=>function(){ return view('script-manager.my-documents.index'); }, 'as'=>'my-documents']);
			Route::get('/my-documents/add',function(){ return view('script-manager.my-documents.add'); });
			Route::post('my-documents/create','DocumentsController@create');
			Route::get('/my-documents/{id}/edit',['uses'=>'DocumentsController@edit','as'=>'my-document.edit']);
			Route::post('/my-documents/{id}/update',['uses'=>'DocumentsController@update','as'=>'my-document.update']);
			Route::get('/my-documents/downloads/{id}',['uses'=>'DownloadsController@download','as'=>'my-document.download']);
			
			Route::get('/submission-guidelines',['uses'=>'SubmissionController@Edit','as'=>'submission']);
			Route::post('/submission-guidelines/add-request',['uses'=>'SubmissionController@AddRequest','as'=>'submission.add-request']);
			Route::post('/submission-guidelines/remove-reader',['uses'=>'SubmissionController@RemoveReader','as'=>'submission.remove-reader']);
			Route::get('/submission-guidleines/member-directory','SubmissionController@MemberDirectory');
			
			Route::post('/submission-guidelines/update',['uses'=>'SubmissionController@update','as'=>'submission.update']);
			
		});
		
		Route::group(['prefix'=>'message'],function(){
			
			Route::get('/',['uses'=>'InboxController@index','as'=>'message.index']);
			Route::post('/change-status','InboxController@ChagneStatus');
			Route::get('/{id}/view',['as'=>'message.view','uses'=>'InboxController@ViewMessage']);
			Route::post('/{id}/private-notes',['as'=>'message.pv-notes','uses'=>'InboxController@SaveNotes']);
			Route::post('/{id}/reply',['as'=>'message.reply','uses'=>'InboxController@ReplyMessage']);
			Route::post('/send-message',['as'=>'send-message','uses'=>'InboxController@sendMessage']);
			Route::get('/send-message',function(){
				return view('message.message');
			});
			Route::post('/setRequestReqsult','RequestController@setRequestReqsult');
			
		});
		
		Route::group(['prefix'=>'contacts'],function(){			
			Route::get('/',['as'=>'contacts.index','uses'=>function(){return view('contacts.index'); }]);
			Route::post('/change-status','ContactsController@ChagneStatus');
			Route::get('/add',['as'=>'cantacts.add','uses'=>function(){ return view('contacts.add'); }]);
			Route::post('/create',['as'=>'contact.create','uses'=>"ContactsController@create"]);
			Route::get('/{id}/edit',['as'=>'contacts.edit','uses'=>'ContactsController@edit']);
			Route::post('/{id}/update',['as'=>'contacts.update','uses'=>'ContactsController@update']);
			Route::post('/{to}/add/{from}','ContactsController@addMember');
		});
		
		Route::group(['prefix'=>'favorites'],function(){
			
			Route::get('/',['as'=>'favorites.index','uses'=>function(){return view('favorites.index'); }]);
			Route::post('/change-status','FavoritesController@ChagneStatus');
			Route::post('/create',['as'=>'favorites.create','uses'=>"FavoritesController@create"]);
			
		});
		
		Route::get('/accounts-settings',function(){
			return view('accounts-settings.edit');
		});
		Route::post('/accounts-settings','UserController@changeSettings');
		
		Route::group(['prefix'=>'/invite-friends'],function(){
			Route::get('/',function(){
				return view('invite-friends.index');
			});
			
			Route::get('/add',function(){
				return view('invite-friends.add');
			});
			
			Route::post('/search','InvitesController@search');
			
			Route::post('/save',['as'=>'invite.save','uses'=>'InvitesController@save']);
			Route::post('/delete','InvitesController@delete');
		});
		
		
	});
	
	
	/*
|======================================================================================================================================
||                                      
||									   Subscription  Routes
||									   
|======================================================================================================================================
*/
	
	Route::group(['prefix'=>'/subscribes','middleware'=>'guest'],function(){
		//Main Function Will Use in future
		Route::get('/',function(){ return view('subscribe.planNpricing'); });
		Route::get('/{plan}','SubcribeController@Subscribe');
		Route::post('/{plan}',['as'=>'user.registration','uses'=>'SubcribeController@Register']);
		
		//its only for btea text		
		Route::get('/4/{ref_code}','SubcribeController@SubscribeRef');
		Route::post('/ref/{ref_code}',['as'=>'user.store.ref','uses'=>'SubcribeController@SubscribeUserRef']);
		Route::get('{token}/verify','SubcribeController@VerifyUser');
		
		Route::get('/activate/{code}',['uses'=>'SubcribeController@ActivateUser','as'=>'subscribe.verify']);
		
		// one time subscribe
		Route::get('/ot/{code}','SubcribeController@SubscribeOneTime');
		Route::post('/ot/{code}', array('as'=>'user.registrationOT','uses'=>'SubcribeController@AddNewUserOT'));	
	});
	
	
	
	/*
|======================================================================================================================================
|                                       
|									   Admin Routes
|									   
|======================================================================================================================================
*/



Route::group(['prefix' => 'admin','namespace' => 'Admin'], function() {
	// Home page routes
    Route::get('/', 'HomeController@home');
	Route::get('/login', 'HomeController@home');
	Route::post('/login', 'HomeController@login');
	Route::post('/', 'HomeController@login');	
	
	
	Route::group(['middleware'=>'auth.admin'], function() {
	Route::get('/logout', 'HomeController@logout');
	Route::get('/dashboard', 'HomeController@dashbord');
	Route::get('/export-csv', 'HomeController@ExportCsv');
	
	
	// Users route
	Route::get('/users', 'AdminUsersController@index');
	Route::post('/users', 'AdminUsersController@index');
	Route::post('/users/dotask',  array('as'=>'users.dotask','uses'=>'AdminUsersController@DoFormTask'));	
	Route::get('/users/add', array('uses' => 'AdminUsersController@AddNewUser'));
	Route::post('/users/add', array('as'=>'admin.users.update', 'uses' => 'AdminUsersController@StoreNewUser'));
	Route::get('/users/{id}/edit', 'AdminUsersController@editUser');
	Route::post('/users/{id}/update', array('as'=>'admin.users.update','uses'=>'AdminUsersController@updateUser'));
	
	// profile
	Route::get('/profiles','AdminProfileController@index');
	Route::post('/profiles','AdminProfileController@index');
	Route::get('/profiles/{id}/edit','AdminProfileController@editView');
	Route::post('/profiles/{id}/edit',array('as'=>'admin.users.profile.update', 'uses'=>'AdminProfileController@updateProfile'));
	
	Route::get('/users/group', 'AdminUsersController@ViewUserGroup');
	Route::get('/users/group/add', 'AdminUsersController@AddNewUserGroup');
	
	
	// Promo Codes
	Route::get('/promocode', 'PromoCodeController@index');
	Route::post('/promocode', 'PromoCodeController@index');
	Route::post('/promocode/dotask', array('as'=>'promocode.dotask','uses'=>'PromoCodeController@DoFormTask'));
	Route::get('/promocode/dotask', array('as'=>'promocode.dotask','uses'=>'PromoCodeController@DoFormTask'));
	Route::get('/promocode/add', 'PromoCodeController@AddPromoCode');
	Route::post('/promocode/add', 'PromoCodeController@StorePromoCode');
	Route::get('/promocode/{id}/edit', array('as'=>'update.promocode','uses'=>'PromoCodeController@EditPromoCode'));
	Route::post('/promocode/{id}/edit', 'PromoCodeController@UpdatePromoCode');
	
	
	// One time Links
	Route::get('/otlinks', 'OtLinksController@index');
	Route::post('/otlinks', 'OtLinksController@index');
	Route::post('/otlinks/dotask', array('as'=>'otlinks.dotask','uses'=>'OtLinksController@DoFormTask'));
	Route::get('/otlinks/add', 'OtLinksController@AddNew');
	Route::post('/otlinks/add', 'OtLinksController@StoreOtlink');
	Route::get('/otlinks/{id}/edit', array('as'=>'update.otlink','uses'=>'OtLinksController@EditOtLink'));
	Route::post('/otlinks/{id}/edit', array('as'=>'update.otlink','uses'=>'OtLinksController@UpdateOtLink'));
	

	//Template Routes
	Route::get('/templates', 'TemplatesController@index');
	Route::get('/templates/add', 'TemplatesController@AddNew');
	Route::post('/templates/add', 'TemplatesController@StoreCategory');
	Route::get('/templates/{id}/edit', 'TemplatesController@EditCategory');
	Route::post('/templates/{id}/edit', array('as'=>'update.template','uses'=>'TemplatesController@UpdateCategory'));
	Route::post('/templates/dotask', array('as'=>'templates.dotask','uses'=>'TemplatesController@DoFormTask'));
	
	Route::get('/categories', 'CategoriesController@index');
	Route::get('/categories/add', 'CategoriesController@AddNew');
	Route::post('/categories/add', 'CategoriesController@StoreCategory');
	Route::get('/categories/{id}/edit', 'CategoriesController@EditCategory');
	Route::post('/categories/{id}/edit', array('as'=>'update.category','uses'=>'CategoriesController@UpdateCategory'));
	Route::post('/categories/dotask', array('as'=>'categories.dotask','uses'=>'CategoriesController@DoFormTask'));
	
	Route::get('/questions', 'QuestionsController@index');
	Route::post('/questions', 'QuestionsController@index');
	Route::get('/questions/add', 'QuestionsController@AddNew');
	Route::post('/questions/add', 'QuestionsController@StoreQuestion');
	Route::get('/questions/{id}/edit', 'QuestionsController@EditQuestion');
	Route::post('/questions/{id}/edit', array('as'=>'update.questions','uses'=>'QuestionsController@UpdateQuestion'));
	Route::post('/questions/dotask', array('as'=>'questions.dotask','uses'=>'QuestionsController@DoFormTask'));
	
	});
	
});

	//Route::get('/change/{id}','UserController@ChangePassword');	
});

	
/*
|======================================================================================================================================
|                                       
|									   Paypel Routes
|									   
|======================================================================================================================================
*/
Route::match('/paypel/subscribes/{id}/cancel','SubcribeController@PaypalProcessCancel');
Route::match('/paypel/notification','PaymentsController@');
Route::match('/paypel/subscribes/{id}/success','SubcribeController@PaypalProcessSuccess');