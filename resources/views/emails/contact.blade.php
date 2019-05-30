<html>
    <body>
 		<div style="background:#F6F6F6; width:800px; padding:30px;">
           <div style="background:#fff; padding:20px;">
           		<div>
                	Message From :: <b>{{ $request->get('name') }}</b> <em>( {{ $request->get('email') }} )</em> 
                    <br/>
                    <br/>
                    <b>Message</b> :: {{ $request->get('message') }}
                </div>
            </div>
    	</div>
    </body>
</html>