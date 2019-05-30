@extends('layouts.myaccount')

@section('content')
	<h1 class="heading_tital">Add {{ trans('menu.contacts') }}</h1>
    {{ Form::open(array('url' => route('contacts.update',$contact->id), 'files' => true,'id'=>'contact-create')) }}
    <div class="col-2-3">
    	 <div class="col-1-1 mrgbt15">
            {{ Form::label('fname',trans('lang.first-name'),['class'=>'it mrgbt5 required']) }}
            {{ Form::text('fname',$contact->first_name,array('class'=>'text textInput it','placeholder'=>trans('lang.first-name'))) }}
        </div>
       
        <div class="col-1-1 mrgbt15">
            {{ Form::label('lname',trans('lang.last-name'),['class'=>'it mrgbt5']) }}
            {{ Form::text('lname',$contact->last_name,array('class'=>'text textInput it','placeholder'=>trans('lang.last-name'))) }}
        </div>
        
        <div class="col-1-1 mrgbt15">
            {{ Form::label('title',trans('lang.title'),['class'=>'it mrgbt5']) }}
            {{ Form::text('title',$contact->title,array('class'=>'text textInput it','placeholder'=>trans('lang.title'))) }}
        </div>
        
        <div class="col-1-1 mrgbt15">
            {{ Form::label('company',trans('lang.company'),['class'=>'it mrgbt5']) }}
            {{ Form::text('company',$contact->company,array('class'=>'text textInput it','placeholder'=>trans('lang.company'))) }}
        </div>
        
        <div class="col-1-1 mrgbt15">
            {{ Form::label('email',trans('lang.email-id'),['class'=>'it mrgbt5 required']) }}
            {{ Form::text('email',$contact->email,array('class'=>'text textInput it','placeholder'=>trans('lang.email-id'))) }}
        </div>
        
        <div class="col-1-1 mrgbt15">
            {{ Form::label('cell_phone',trans('lang.cell-phone'),['class'=>'it mrgbt5']) }}
            {{ Form::text('cell_phone',$contact->cellphone,array('class'=>'text textInput it','placeholder'=>trans('lang.cell-phone'))) }}
        </div>
        
        <div class="col-1-1 mrgbt15">
            {{ Form::label('bus_phone',trans('lang.business-phone'),['class'=>'it mrgbt5']) }}
            {{ Form::text('bus_phone',$contact->busiphone,array('class'=>'text textInput it','placeholder'=>trans('lang.business-phone'))) }}
        </div>
        
        <div class="col-1-1 mrgbt15">
            {{ Form::label('address',trans('lang.address'),['class'=>'it mrgbt5']) }}
            {{ Form::textarea('address',$contact->address,array('class'=>'text textInput it','placeholder'=>trans('lang.user-address'),'rows'=>5)) }}
        </div>
        
        <div class="col-1-1 mrgbt15">
            {{ Form::label('notes',trans('lang.notes'),['class'=>'it mrgbt5']) }}
            {{ Form::textarea('notes',$contact->notes,array('class'=>'text textInput it','placeholder'=>trans('lang.notes'),'rows'=>5)) }}
        </div>
        
        <div class="h-line ymrg30"></div>

        <!-- Save And Clear Buttons -->
        <div class="col-1-1">
            {!! Form::submit("Save",['class'=>"btn btn-primary right xpul20 mrglft20",'id'=>"savBtn"]) !!}
            {!! Form::button("Reset",['class'=>"btn btn-primary right xpul20",'id'=>"resetBtn", 'type'=>'reset']) !!}
        </div>
        <!-- Save And Clear Buttons -->
    </div>
    
    {{ Form::close() }}
    
@stop