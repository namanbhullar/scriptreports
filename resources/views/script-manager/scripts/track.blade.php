@extends('layouts.myaccount')

@section('content')  
    <h1 class="heading_tital">Track Script {!! Html::image('public/images/icons/angle-right.png') !!} {{$script->title}}</h1>
    <?php $script->load('share.receiver.profile'); ?>
    @if(!$script->share->isEmpty() && $script->share->count() > 1)
    	@foreach($script->share as $share)
          @if($share->share_to != auth()->user()->id)
            <div class="col-1-1 item-box pul10 mrgbt10">            
                <div class="left mrgrt20">
                    <div class="inbox-thumnail ">
                        {!! $share->receiver->profile->image !!}
                    </div>
                </div>
                <div class="col-8-24">
                     <h4 class="item-head">
                        <a href="{{ $share->receiver->link }}" >{{str_limit($share->receiver->profile->full_name,40)}}</a>
                     </h4>
                     <div class="item-detail">
                        {{str_limit($share->receiver->profile->company_name,35)}}
                     </div>
                     <div class="item-detail">
                        <span class="date" >{{ date('F j, Y',strtotime($share->created_at)) }}</span>
                     </div>
                </div>            
                <div class="col-4-24 ypul10">
                    @if(!empty($share->first_view))
                     <div class="col-1-1 mrgbt10">
                        <b>First View</b> : <span class="date" >{{ date('F j, Y',strtotime($share->first_view)) }}</span>
                     </div>
                   @endif    
                   
                   @if(!empty($share->last_view))
                     <div class="col-1-1">
                        <b>Last View</b> : <span class="date" >{{ date('F j, Y',strtotime($share->last_view)) }}</span>
                     </div>
                   @endif
                     
                </div>
                <div class="col-4-24">
                    <div class="col-1-1 ypul20 text-center">
                        <?php switch($share->feedback_icon){
                                case 'Rejected': 
                                    $url = URL::to('public/images/icons/thumbs-down-blue.png');
                                    $text	= "Pass";	
                                break;
                                
                                case 'Considered': 
                                    $url = URL::to('public/images/icons/question-mark-blue.png');
                                    $text	= "Consider";
                                break;
                                
                                case 'Recommended': 
                                    $url = URL::to('public/images/icons/thumbs-up-blue.png');
                                    $text	= "Recommend";
                                break;
                                
                                case 'Priority': 
                                    $url = URL::to('public/images/icons/star.png');
                                    $text	= "Priority";
                                break;
                                
                                case 'buy': 
                                    $url = URL::to('public/images/icons/dollar-blue.png');
                                    $text	= "Buy";
                                break;
                                
                                case 'recomd-writer': 
                                    $url = URL::to('public/images/icons/recommend-writer.png');
                                    $text	= "Recommend Writer";
                                break; 
                                
                                default:
                                    $url = "";
                                    $text	= "";
                                break;
                            } ?>
                           @if(!is_null($url))
                           		@if(!empty($url))
                                	{!! Html::image($url) !!}&nbsp;&nbsp;
                                @endif
                                {{ $text }} 
                           @endif
                    </div>
                    
                </div>
                <div class="right pul10">{{ $share->feedback_text }}</div>
                
                <div class="clearfix"></div>
            </div>          	
          @endif
        @endforeach
    @else
    	<div class="item-box row">
        	<h3>{{ trans('lang.no-record') }}</h3>
    	</div>
    @endif
    
    

@stop