<div id="header-top">
    <span class="title"><a href="{{URL::to('/admin')}}">ScriptReader Online - Admin</a></span>
</div>
@if(Auth::check())

    <div id="header-menubox">
        <ul id="menu">
            <li><a href="#">Site</a></li>
            <li class="parrent level-1" data-id="users">
            	<a href="#">Users</a>
            	<ul id="users" class="second">
                	<li><a class="icon-16-add-user" href="{{URL::to('/admin')}}/users/add">Add New User</a></li>
                    <li><a href="{{URL::to('/admin')}}/users">View Users</a></li>
                    <li><a href="{{URL::to('/admin')}}/profiles">Profiles</a></li>
                    <!--<li><a href="{{URL::to('/admin')}}/users/group/add">Add New Group</a></li>
                    <li><a href="{{URL::to('/admin')}}/users/group">View All Groups</a></li>-->
                </ul>    
            </li>
            <li><a href="#">Menu</a></li>
            <li><a href="#">Pages</a></li>
            <li class="parrent level-1" data-id="plan">
            	<a href="#">Modules</a>
            	<ul id="plan" class="second">
                	<li><a class="" href="{{URL::to('/admin')}}/promocode">Promo Codes</a></li>
                </ul>    
            </li>
            <li class="parrent level-1" data-id="templates">
            	<a href="#">Templates</a>
            	<ul id="templates" class="second">
                	<li class="level-2" data-id="temp_template">
                    	<a class="" href="{{URL::to('/admin')}}/templates">Templates</a>
                    	<ul id="temp_template" class="third">
                        	<li><a href="{{URL::to('/admin')}}/templates/add">Add Template</a></li>
                            <li><a href="{{URL::to('/admin')}}/templates">View All</a></li>
                        </ul>
                    </li>
                	<li class="level-2" data-id="temp_cat">
                    	<a class="" href="{{URL::to('/admin')}}/categories">Categories</a>
                    	<ul id="temp_cat" class="third">
                        	<li><a href="{{URL::to('/admin')}}/categories/add">Add Category</a></li>
                            <li><a href="{{URL::to('/admin')}}/categories">View All</a></li>
                        </ul>
                    </li>
                    <li class="level-2" data-id="temp_questions">
                    	<a class="" href="{{URL::to('/admin')}}/questions">Questions</a>
                    	<ul id="temp_questions" class="third">
                        	<li><a href="{{URL::to('/admin')}}/questions/add">Add Question</a></li>
                            <li><a href="{{URL::to('/admin')}}/questions">View All</a></li>
                        </ul>
                    </li>
                </ul>    
            </li>
            
        </ul>
        <ul id="topicons">
        	<li><a href="{{URL::to('/')}}" target="_blank">View Site</a></li>
            <li><a style="color:#CC0000" href="{{URL::to('/admin')}}/logout">Logout</a></li>
        </ul>
        <div class="clear"></div>
    </div>
@endif
