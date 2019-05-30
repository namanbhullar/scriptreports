<div class="top-left"> 
    <div class="mrgtp20 xmrg40 left">
        <a href="{{ url('/') }}">{!! Html::image('public/images/dash-logo.png','logo.png') !!}</a>
    </div>               
    <ul class="left">
        <li><a href="{{ URL::to('/directory') }}">Directory</a></li>
        <li><a href="{{ URL::to('/submission-directory') }}">Submissions</a></li>
        <li><a href="{{ URL::to('/contact-us') }}">Contact</a></li>
        
        <div class="clearfix"></div>
        
    </ul>
</div>

<div class="dash-top-right">        
    
 	<a href="{{ url('/login') }}" class="btn btn-primary mrgtp15 xmrg20">Login</a>
    
</div>  