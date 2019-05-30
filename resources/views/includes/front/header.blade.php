<div align="center" id="header">			
    <div id="top-con">
        <div id="logo">
        	
            <a href="{{ URL::to('/') }}">
            	{!! Html::image('public/images/logo.png') !!}
            </a>
        </div>
        <div id="login-con">
        	<div id="try-box"></div>
            <div id="signup-box">
                <a onclick="" class="login" href="{{ URL::to('/login') }}">
                	<button id="signup-b" value="SUBSCRIBE" style="float:left;margin: 33px 19px 0px 0px;">Login</button>
                </a> 	
            </div>
        </div>
    	<div class="clear"></div>
    </div>
    
    <div id="menu">
        <div id="nav">
            <div id="centerthis-con">
                <div class="menu-home-container">
                    <ul class="sf-menu" id="menu-home">
                    	<li>
                        	<a href="{{ URL::to('/directory') }}">Directory</a>
                        </li>
                        <li>
                        	<a href="{{ URL::to('/submission-directory') }}">Submissions</a>
                        </li>
                        <li>
                        	<a href="{{ URL::to('/contact-us') }}">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>