<div class="col-1-1 slideAnimate " id="templateInfo{{$template->id}}">
    <div class="col-1-1 BorderBox">
        <div class="col-1-1  bgBlue">
            <h5 class="headonBlue">{{ trans('lang.template-info') }}</h5>
        </div>   
        <div class="col-1-1 pul15 scriptInfoDetail CustomScrollbar">     
        <div class="col-1-1 mrgbt5">
            <div class="col-1-2">
                <b>{{ trans('lang.date-submited') }}</b>
            </div>
            <div class="col-1-2">
                {{ date('F j, Y',strtotime($template->created_date)) }}
            </div>
            <div class="clearfix"></div>
        </div>
        @if(!empty($template->created_by))
            <div class="col-1-1 mrgbt5">
                <div class="col-1-2">
                    <b>{{ trans('lang.created-by') }}</b>
                </div>
                <div class="col-1-2">
                    {{ $template->created_by }}
                </div>
                <div class="clearfix"></div>
            </div>
        @endif
        
        @if(!empty($template->lead))
            <div class="col-1-1 mrgbt5">
                <div class="col-1-2">
                    <b>{{ trans('lang.lead') }}</b>
                </div>
                <div class="col-1-2">
                    {{ $template->lead }}
                </div>
                <div class="clearfix"></div>
            </div>
        @endif
        
       
        
        @if(!empty($template->company))
            <div class="col-1-1 mrgbt5">
                <div class="col-1-2">
                    <b>{{ trans('lang.company') }}</b>
                </div>
                <div class="col-1-2">
                    {{ $template->company }}
                </div>
                <div class="clearfix"></div>
            </div>
        @endif
        
        
        @if(!empty($template->budget_from) || !empty($template->budget_to))
        <div class="col-1-1 mrgbt5">
            <div class="col-1-2">
                <b>{{ trans('lang.budget') }}</b>
            </div>
            <div class="col-1-2">
                {{ $template->budget_from }}{{ budget_type($template->budget_type) }}
                @if(!empty($template->budget_from) && !empty($template->budget_to)) to  @endif
                {{ $template->budget_to }}{{ budget_type($template->budget_type) }}
            </div>
            <div class="clearfix"></div>
        </div>
        @endif
        
        @if(!empty($template->rating))
        <div class="col-1-1 mrgbt5">
            <div class="col-1-2">
                <b>{{ trans('lang.rating') }}</b>
            </div>
            <div class="col-1-2">
                {{ $template->rating }}                                
            </div>
            <div class="clearfix"></div>
        </div>
        @endif
        
        @if(!empty($template->target_audience))
        <div class="col-1-1 mrgbt5">
            <div class="col-1-2">
                <b>{{ trans('lang.target-audience') }}</b>
            </div>
            <div class="col-1-2">
                {{ $template->target_audience }}                                
            </div>
            <div class="clearfix"></div>
        </div>
        @endif
        
        @if(!empty($template->comparison))
        <div class="col-1-1 mrgbt5">
            <div class="col-1-2">
                <b>{{ trans('lang.comparisons') }}</b>
            </div>
            <div class="col-1-2">
                {{ $template->comparison }}                                
            </div>
            <div class="clearfix"></div>
        </div>
        @endif
        
        @if(!empty($template->viewer_notes))        
            <div class="col-1-1 mrgbt5">
                <div class="col-1-1">
                    <b>Template info description</b>
                </div>
                <div class="col-1-1">
                    {!! $template->viewer_notes !!}
                </div>
            </div>
        @endif
        </div>
    </div>
</div>