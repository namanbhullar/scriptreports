@if(!$reports->isEmpty())
    @foreach($reports as $report)
        <div class="col-1-1 mrgbt10">
            <div class="col-1-15">
                {!! Form::checkbox('reportchck[]',$report->id) !!}
            </div>
            <div class="left mrgrt10">
                <div class="thumnailsmall">
                    {!! $report->owner->profile->image !!}
                </div>
            </div>
            <div class="col-7-15">
                <div class="col-1-1 report-head">
                    {!! str_limit($report->owner->profile->full_name,30) !!}
                </div>
                <div class="col-1-1 report-date">{{ date('F j, Y',strtotime($report->created_at)) }}</div>
            </div>
            <div class="col-5-15">
                <div class="col-1-1 report-sub-head">                                	
                    {!! $report->title !!}
                </div>
                <div class="col-1-1 report-draft">Draft:{!! $report->draft !!}</div>
            </div>
        </div>
    @endforeach
@else
	<div class="Box pul10"><h4>No Reports found for this template. Please try diffrent One.</h4></div>
@endif
