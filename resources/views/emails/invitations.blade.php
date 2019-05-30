<html>
    <body>
 		<div style="background:#F6F6F6; width:800px; padding:30px;">
           <div style="background:#fff; padding:20px;">
           		<div>
                	<div style="margin-bottom:50px; text-align:center;">
                    	<img src="http://scriptreports.com/beta/myaccount/public/images/email_logo.jpg">
                    </div>
                    <a href="{{$profileLink}}" style="color:#000;" target="_new">{{$username}}</a> sent you this invitation and left you this message.
                    <br/>
                    <br/>
                    "{{$body}}"
                    <div style="margin-top:40px; text-align:center;">
                    <a style="background:#BB2F30; color:#fff;padding:15px 50px; text-decoration:none; -moz-border-radius: 7px;-webkit-border-radius: 7px;-o-border-radius: 7px;
                    		-ms-border-radius: 7px;-khtml-border-radius: 7px;border-radius: 7px; font-weight:bold; font-size:16px;" 
                            href="{{ URL::to('/subscribes/4/'.$token.'?email='.urlencode($email).'&ext='.base64_encode($inviteid)) }}">
                    		View Now
                     </a>
                    </div> 
                    <br/><br/>
                    <div style="">
                    	<a href="http://scriptreports.com/beta">ScriptReports</a> Provides writers, script consultants and content creators apps to better analyze and provide notes on scripts.
                    </div>
                </div>
            </div>
    	</div>
    </body>
</html>