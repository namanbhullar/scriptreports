@extends('admin.layouts.master')

@section('content')
	<div id="cpanel">
    	<div class="cpanel-left">
    		<h1>Admin Dashboard</h1>
            <div class="icon-wrapper">
                <div class="icon">
                    <a href="{{URL::to('admin')}}/users">
                        {{Html::image('public/images/admin/icons/header/icon-48-user.png','')}}
                            <span>User Manager</span>
                    </a>
                 </div>
             </div>
             <div class="icon-wrapper">
                <div class="icon">
                    <a href="{{URL::to('admin')}}/users/add">
                        {{Html::image('public/images/admin/icons/header/icon-48-user-add.png','')}}
                            <span>Add New User</span>
                    </a>
                 </div>
             </div>
             <div class="icon-wrapper">
                <div class="icon">
                    <a href="{{URL::to('admin')}}/users/profiles">
                        {{Html::image('public/images/admin/icons/header/icon-48-groups.png','')}}
                            <span>Profile Manager</span>
                    </a>
                 </div>
             </div>
             <div class="icon-wrapper">
                <div class="icon">
                    <a href="#">
                        {{Html::image('public/images/admin/icons/header/icon-48-groups-add.png','')}}
                            <span>Group Manager</span>
                    </a>
                 </div>
             </div>
             <div class="icon-wrapper">
                <div class="icon">
                    <a href="#">
                        {{Html::image('public/images/admin/icons/header/icon-48-menu.png','')}}
                            <span>Menu Manager</span>
                    </a>
                 </div>
             </div>
             <div class="icon-wrapper">
                <div class="icon">
                    <a href="#">
                        {{Html::image('public/images/admin/icons/header/icon-48-article.png','')}}
                            <span>Pages Manager</span>
                    </a>
                 </div>
             </div><div class="icon-wrapper">
                <div class="icon">
                    <a href="#">
                        {{Html::image('public/images/admin/icons/header/icon-48-config.png','')}}
                            <span>Settings</span>
                    </a>
                 </div>
             </div>
             <div class="icon-wrapper">
                <div class="icon">
                    <a href="#">
                        {{Html::image('public/images/admin/icons/header/icon-48-media.png','')}}
                            <span>Media Manager</span>
                    </a>
                 </div>
             </div>
          </div>
	</div>
@stop