<div class="col-1-1 slideAnimate " id="scrriptInfo{{$id}}">
    <div class="col-1-1 BorderBox">
        <div class="col-1-1  bgBlue">
            <h5 class="headonBlue">{{ trans('lang.script-info') }}</h5>
        </div>   
        <div class="col-1-1 pul15 scriptInfoDetail CustomScrollbar">     
        <div class="col-1-1 mrgbt5">
            <div class="col-1-2">
                <b>{{ trans('lang.date-submited') }}</b>
            </div>
            <div class="col-1-2">
                {{ date('F j, Y',strtotime($script->created_date)) }}
            </div>
            <div class="clearfix"></div>
        </div>
        @if(!empty($script->submitted_by))
            <div class="col-1-1 mrgbt5">
                <div class="col-1-2">
                    <b>{{ trans('lang.submitted-by') }}</b>
                </div>
                <div class="col-1-2">
                    {{ $script->submitted_by }}
                </div>
                <div class="clearfix"></div>
            </div>
        @endif
        
        @if(!empty($script->draft_date))
            <div class="col-1-1  mrgbt5">
                <div class="col-1-2">
                    <b>{{ trans('lang.draft-date') }}</b>
                </div>
                <div class="col-1-2">
                    {{ date('F j, Y',strtotime($script->draft_date)) }}
                </div>
                <div class="clearfix"></div>
            </div>
        @endif
        
        @if(!empty($script->pages))
            <div class="col-1-1 mrgbt5">
                <div class="col-1-2">
                    <b>{{ trans('lang.pages') }}</b>
                </div>
                <div class="col-1-2">
                    {{ $script->pages }}
                </div>
                <div class="clearfix"></div>
            </div>
        @endif
        
        @if(!empty($script->location))
            <div class="col-1-1  mrgbt5">
                <div class="col-1-2">
                    <b>{{ trans('lang.location') }}</b>
                </div>
                <div class="col-1-2">
                    {{ $script->location }}
                </div>
                <div class="clearfix"></div>
            </div>
        @endif
        
        @if(!empty($script->setting))
            <div class="col-1-1 mrgbt5">
                <div class="col-1-2">
                    <b>{{ trans('lang.settings') }}</b>
                </div>
                <div class="col-1-2">
                    {{ $script->setting }}
                </div>
                <div class="clearfix"></div>
            </div>
        @endif
        
        @if(!empty($script->period))
            <div class="col-1-1 mrgbt5">
                <div class="col-1-2">
                    <b>{{ trans('lang.period') }}</b>
                </div>
                <div class="col-1-2">
                    {{ $script->period }}
                </div>
                <div class="clearfix"></div>
            </div>
        @endif
        
        @if(!empty($script->budget_from) || !empty($script->budget_to))
        <div class="col-1-1 mrgbt5">
            <div class="col-1-2">
                <b>{{ trans('lang.budget') }}</b>
            </div>
            <div class="col-1-2">
                {{ $script->budget_from }}{{ budget_type($script->budget_type) }}
                @if(!empty($script->budget_from) && !empty($script->budget_to)) to  @endif
                {{ $script->budget_to }}{{ budget_type($script->budget_type) }}
            </div>
            <div class="clearfix"></div>
        </div>
        @endif
        
        @if(!empty($script->rating))
        <div class="col-1-1 mrgbt5">
            <div class="col-1-2">
                <b>{{ trans('lang.rating') }}</b>
            </div>
            <div class="col-1-2">
                {{ $script->rating }}                                
            </div>
            <div class="clearfix"></div>
        </div>
        @endif
        
        @if(!empty($script->target_audience))
        <div class="col-1-1 mrgbt5">
            <div class="col-1-2">
                <b>{{ trans('lang.target-audience') }}</b>
            </div>
            <div class="col-1-2">
                {{ $script->target_audience }}                                
            </div>
            <div class="clearfix"></div>
        </div>
        @endif
        
        @if(!empty($script->comparisons))
        <div class="col-1-1 mrgbt5">
            <div class="col-1-2">
                <b>{{ trans('lang.comparisons') }}</b>
            </div>
            <div class="col-1-2">
                {{ $script->comparisons }}                                
            </div>
            <div class="clearfix"></div>
        </div>
        @endif
        
        @if(is_array($script->script_info))
         @foreach($script->script_info as $info)
            <div class="col-1-1 mrgbt5">
                <div class="col-1-2">
                    <b>{{ $info[name] }}</b>
                </div>
                <div class="col-1-2">
                    {{ $info[title] }}
                </div>
            </div>
         @endforeach
        @endif
        </div>
    </div>
</div>