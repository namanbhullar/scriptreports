<div class="dash-profile">
            
    <div class="dash-logo">
        <a href="{{ url('/') }}" >{!! Html::image('public/images/dash-logo.png','logo.png') !!}</a>
    </div>
    
    <div class="dash-search">
        <input type="text" placeholder="search"/>
        <input class="dash-botton" type="button" name="" value=""/>
    </div>
    <div class="dash-profile-bottom">
        <div class="setting">                         
            <ul class="profile-menu setting-icon">
                @foreach($menus as $name=>$link)
                    <li {!! array_key_exists($name,$submenu) ? "class=\"parent\"" : "" !!}>
                        <a href="{{ $link }}" {!! in_array($name,$active['main']) ? "class=\"active\"" : "" !!} >
                        	<span>{{ trans("menu.$name") }}</span>                            
                            @if(array_key_exists($name,$unReadCount) && !empty($unReadCount[$name]))
                                <span id="{{$name}}_unread" class="count">{{ $unReadCount[$name] }}</span>
                            @endif
                        </a>
                        @if(array_key_exists($name,$submenu))
                        	<ul class="sub_menu" {!! array_key_exists($name,$submenu) ? "" : "style=\"display:none\"" !!}>
                            	@foreach($submenu[$name] as $sbname=>$sblink)
                                	<li>
                                    	<a href="{{ $sblink }}" {!! (in_array($name,$active['main']) && in_array($sbname,$active['sub'][$name])) ? "class=\"active\"" : "" !!}>				
                                        	<span>{{ trans("menu.$name.$sbname") }}</span>
                                            @if(array_key_exists($name.".".$sbname,$unReadCount) && !empty($unReadCount["$name.$sbname"]))
                                            	<span id="{{$sbname}}_sub_unread"  class="count">{{ $unReadCount["$name.$sbname"] }}</span>
                                            @endif
                                        </a>
                                    </li>
                                @endforeach
                                <div class="clearfix"></div>
                            </ul>
                            <i class="fa fa-minus"></i>
                       @endif                       
                    </li>
                @endforeach
                <div class="clearfix"></div>
            </ul>                
        </div>                    
    </div>
    
    <div class="clearfix"></div>
</div>