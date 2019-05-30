<?php $isWriterInfoEmpty	=	true; ?>
<div class="col-1-1 slideAnimate " id="writerInfo{{$id}}">

    <div class="col-1-1 BorderBox">
        <div class="col-1-1  bgBlue">
            <h5 class="headonBlue">{{ trans('lang.writer-info') }}</h5>
        </div>   
        <div class="col-1-1 pul15 scriptInfoDetail CustomScrollbar">
            @if(!empty($script->writer_info) && is_array($script->writer_info) && count($script->writer_info))
            	<?php $isWriterInfoEmpty = false; ?>
                <div class="col-1-1 mrgbt15">
                    <div class="col-1-1">
                        <h4><b>Script Writer</b></h4>
                    </div>
                    @foreach($script->writer_info as $info)
                        <div class="col-1-1 mrgbt7">
                        @if(!empty($info['link']) && preg_match('#'.URL::to('/').'#',$info['link']))
                            <a href="{{ $info['link'] }}"> {!! $info['name'] !!} </a>
                        @else
                            {!! $info['name'] !!}
                        @endif
                        @if(!empty($info['phone']))
                            <br/>{{ $info['phone'] }}
                        @endif
                        </div>
                    @endforeach
                    <div class="clearfix"></div>
                </div>
            @endif
            
            @if(!empty($script->story_by) && is_array($script->story_by))    
            <?php $isWriterInfoEmpty = false; ?>
                <div class="col-1-1 mrgbt15">
                    <div class="col-1-1">
                        <h4><b>Story By</b></h4>
                    </div>
                    @foreach($script->story_by as $info)
                        <div class="col-1-1 mrgbt7">
                        @if(!empty($info['link']) && preg_match('#'.URL::to('/').'#',$info['link']))
                            <a href="{{ $info['link'] }}"> {!! $info['name'] !!} </a>
                        @else
                            {!! $info['name'] !!}
                        @endif
                        @if(!empty($info['phone']))
                            <br/>{{ $info['phone'] }}
                        @endif
                        </div>
                    @endforeach
                    <div class="clearfix"></div>
                </div>
            @endif
            
            @if(!empty($script->source) && is_array($script->source))    
            <?php $isWriterInfoEmpty = false; ?>
                <div class="col-1-1 mrgbt15">
                    <div class="col-1-1">
                        <h4><b>Source Material</b></h4>
                    </div>
                    @foreach($script->source as $info)
                        <div class="col-1-1 mrgbt7">
                           	{{ (!empty($info['title'])) ? $info['title'] : "" }} 
                            {{ (!empty($info['title']) && !empty($info['form'][0])) ? "-" : "" }}         
                            
                            @if(!empty($info['form']))
                            {{ (strtolower($info['form'][0]) != 'other') ? $info['form'][0] : "" }}
                            @endif
                            {!! !empty($info['phone']) ? "<br/>".$info['phone'] : "" !!}
                        </div>
                    @endforeach
                    <div class="clearfix"></div>
                </div>
            @endif
                       
            @if(!is_null($script->agent) && !empty($script->agent->name))    
            <?php $isWriterInfoEmpty = false; ?>
            <?php $agent =  $script->agent;?>
                <div class="col-1-1 mrgbt15">
                    <div class="col-1-1">
                        <h4><b>Agent</b></h4>
                    </div>
                    <div class="col-1-1 mrgbt7">
                        @if(!empty($agent->link) && preg_match('#'.URL::to('/').'#',$agent->link))
                            <a href="{{ $agent->link }}"> {!! $agent->name !!} </a>
                        @else
                            {!! $agent->name!!}
                        @endif
                        {!! (!empty($agent->company)) ? "<br />".$agent->company : "" !!}
                        {!! (!empty($agent->phone)) ? "<br />".$agent->phone : "" !!}
                        
                        @if(!is_null($agent->address))
                        {!! (!empty($agent->address->street)) ? "<br />".$agent->address->street : "" !!}
                        {!! (!empty($agent->address->city)) ? "<br />".$agent->address->city.",&nbsp;" : "" !!}                        
                        {!! (!empty($agent->address->state)) ? $agent->address->state : "" !!}
                        {!! (!empty($agent->address->zip)) ? "&nbsp;".$agent->address->zip : "" !!}
                        
                        {!! (!empty($agent->address->country)) ? "<br />".$agent->address->country : "" !!}
                        @endif
                    </div>
                    <div class="clearfix"></div>
                </div>
            @endif
            
            
            @if(!is_null($script->manager) && !empty($script->manager->name))    
            <?php $isWriterInfoEmpty = false; ?>
            <?php $manager =  $script->manager;?>
                <div class="col-1-1 mrgbt15">
                    <div class="col-1-1">
                        <h4><b>Manager</b></h4>
                    </div>
                    <div class="col-1-1 mrgbt7">
                        @if(!empty($manager->link) && preg_match('#'.URL::to('/').'#',$manager->link))
                            <a href="{{ $manager->link }}"> {!! $manager->name !!} </a>
                        @else
                            {!! $manager->name!!}
                        @endif
                        {!! (!empty($manager->company)) ? "&nbsp;-&nbsp;".$manager->company : "" !!}
                        {!! (!empty($manager->phone)) ? "<br />".$manager->phone : "" !!}
                        
                        @if(!is_null($manager->address))
                        {!! (!empty($manager->address->street)) ? "<br />".$manager->address->street : "" !!}
                        {!! (!empty($manager->address->city)) ? "<br />".$manager->address->city.",&nbsp;" : "" !!}
                        {!! (!empty($manager->address->state)) ? $manager->address->state : "" !!}
                        {!! (!empty($manager->address->zip)) ? "&nbsp;".$manager->address->zip : "" !!}
                        {!! (!empty($manager->address->country)) ? "<br />".$manager->address->country : "" !!}
                        @endif
                    </div>
                    <div class="clearfix"></div>
                </div>
            @endif
            
            @if($isWriterInfoEmpty)
            	<h4>No Info available</h4>
            @endif
            
        </div>
    </div>
</div>