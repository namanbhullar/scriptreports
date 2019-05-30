<html>
    <body>
 		<div style="background:#F6F6F6; width:800px; padding:30px;">
           <div style="background:#fff; padding:20px;">
           		<div style="margin-bottom:50px; text-align:center;">
                    	<img src="http://scriptreports.com/beta/myaccount/public/images/email_logo.jpg">
                </div>
                <div style="margin-bottom:30px;">Hello {{$name}},</div>
               	<div>
                    Thanks for choosing ScriptReports. Please confirm your email address by clicking on the link below.
                    <br/><br/>
                    <a style="background-color:#6DBCDB; color:#fff;padding:8px 18px; text-decoration:none; -moz-border-radius: 7px;-webkit-border-radius: 7px;-o-border-radius: 7px;
                    		-ms-border-radius: 7px;-khtml-border-radius: 7px;border-radius: 7px; font-weight:bold;" href="{{ URL::route('subscribe.verify',['code'=>$code]) }}">
                    		Confirm my email address
                     </a>
                    <br/><br/><br/><br/>
                    <div style="">
                    	<a href="http://scriptreports.com/beta">ScriptReports</a> Provides writers, script consultants and content creators apps to better analyze and provide notes on scripts.
                    </div>
				</div>
               
               	
            </div>
    	</div>
    </body>
</html>