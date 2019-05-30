@extends('admin.layouts.master')

@section('content')
	<div class="adminForm">
	<div class='width-100 flt'>
 		<fieldset class="adminForm">
        	<legend>Edit Profile</legend>
              {{ Form::model($profile, array('route' => array('admin.users.profile.update',$profile->id), 'files' => true)) }}
             		<div class='width-60 flt'>
                    	<h3 class="heading">Basic Info</h3>
                        <div class='form-group thumbnaildiv'>
                        	{{ Form::label('profile_pic', 'Profile Image') }}
                            <?php if(!empty($profile->profile_img) && file_exists('public/uploads/profiles/users/'.$profile->user_id.'/'.$profile->profile_img)) { ?>
                            	{{ Html::image("public/uploads/profiles/users/$profile->user_id/$profile->profile_img", "Profile Avtar") }}
                                {{Form::file('profile_imgage',array('class' => 'topmargin',"id" => "profile_image_selector"))}}
                            <?php }else { ?>
                            	{{Form::file('profile_imgage',array('class' => '',"id" => "profile_image_selector"))}}
                           <?php } ?>
                           <div class="clear"></div>
                        </div>
                        <div class='form-group'>
                            {{ Form::label('full_name', 'Full Name') }}
                            {{ Form::text('full_name', null, ['placeholder' => 'Full Name','required']) }}
                        </div>
                        <div class='form-group'>
                            {{ Form::label('company_name', 'Company Name') }}
                            {{ Form::text('company_name', null, ['placeholder' => 'Company Name']) }}
                        </div>
                        <div class='form-group'>
                            {{ Form::label('location', 'Location') }}
                            {{ Form::text('location', null, ['placeholder' => 'Location']) }}
                        </div>
                        <div class='form-group'>
                                {{ Form::label('select_type', 'Select One of the Following:') }}
                                {{Form::radio('select_type', '1')}}Graduated Film School&nbsp;&nbsp;&nbsp;
                                {{Form::radio('select_type', '2')}}Attending Film School&nbsp;&nbsp;&nbsp;
                                {{Form::radio('select_type', '3')}}No&nbsp;
                        </div>
                        <div class='form-group'>
                            {{ Form::label('additional_skills', 'Additional Skills') }}
                            <?php
                            if(!empty($profile->additional_skills)):
                                $addskil = $profile->additional_skills;
                            else:
                                $addskil=array();    	
                            endif;
                            
                            ?>
                             <div style="float:left;line-height:30px;">
                             <input type="checkbox" value="Proofreading & Script Formatting" name="additional_skills[]" 
                             <?php echo in_array('Proofreading & Script Formatting',$addskil) ? 'checked' : '' ; ?>>Proofreading & Script Formatting   
                            
                            <input type="checkbox" value="Screen Writing Help" name="additional_skills[]" <?php echo in_array('Screen Writing Help',$addskil) ? 'checked' : '' ; ?>> 
                            Screen Writing Help<br/>
                            <input type="checkbox" value="Phone Consultation" name="additional_skills[]" <?php echo in_array('Phone Consultation',$addskil) ? 'checked' : '' ; ?>> 
                            Phone Consultation
                        
                            <input type="checkbox" value="Other" name="additional_skills[]" <?php echo in_array('Other',$addskil) ? 'checked' : '' ; ?>> 
                            Other
                            </div>
                        </div>
                        <div class='form-group'>
                            {{ Form::label('brief_boi', 'Brief Bio') }}
                            {{Form::textarea('brief_boi',$profile->brief_boi,array('class' => 'text textArea it', 
                            'placeholder' => 'Brief Bio (30 Words or Less, For Main Directory)'))}}
                        </div>
                        <div class='form-group'>
                            {{ Form::label('about_me', 'About Me') }}
                            {{Form::textarea('about_me',$profile->about_me,array('class' => 'text textArea it', 'placeholder' => 'About Me (For Profile Page)'))}}
                        </div>
     			</div>
     
         
     			<div class='width-40 flt'>
                	<h3 class="heading">Optional Info</h3>
                    	<div class='form-group'>
                            {{ Form::label('website', 'Website') }}
                            {{Form::text('website',$profile->website,array('class' => 'text textInput it', 'placeholder' => 'Website'))}}
                        </div>
                        <div class='form-group'>
                            {{ Form::label('twitter', 'Twitter') }}
                            {{Form::text('twitter',$profile->twitter,array('class' => 'text textInput it', 'placeholder' => 'Twitter'))}}
                        </div>
                        <div class='form-group'>
                            {{ Form::label('industry_experience', 'Industry Experience') }}
                            {{Form::text('industry_experience',$profile->industry_experience,
            			  array('class' => 'text textInput it', 'placeholder' => 'Industry Experience (List studios, producers, agents, and name actors)'))}}
                        </div>
                        <div class='form-group'>
                            {{ Form::label('languages', 'Languages') }}
                            {{Form::text('languages',$profile->languages,
            			  array('class' => 'text textInput it', 'placeholder' => 'Languages Spoken (In addition to English)'))}}
                        </div>
                        
                        <div class='form-group'>
                            {{ Form::label('facebook', 'Facebook') }}
                            {{Form::text('facebook',$profile->facebook,array('class' => 'text textInput it', 'placeholder' => 'Facebook'))}}
                        </div>
                        <div class='form-group'>
                            {{ Form::label('education', 'Education') }}
                            {{Form::text('education',$profile->education,array('class' => 'text textInput it', 'placeholder' => 'Education (Enter School and Degree)'))}}
                        </div>
                        <div class='form-group'>
                        		{{Form::label('writing_partner','Seeking a writing Partner')}}
                                {{Form::checkbox('writing_partner','1')}}           
            			</div>
                        <div class='form-group'>
                        		{{Form::label('script_exchange','Seeking Script Exchange')}}          
                                {{Form::checkbox('script_exchange','1')}}           
            					
            			</div>
                        <div class='form-group'>
                        {{Form::label('sample_coverage','Sample Coverage')}}
              			{{Form::file('sample_coverageimg',array('id' => 'sample_coverageimg'))}}
                        </div>
                        <div class='form-group bottom-0'>
                        	<h4>Writing Projects</h4>
                        </div>
                        <div id="WritingProjects">
                        <?php 
							$count	=	1; 
							dump($writing);
							foreach($writing as $writingprojects): 
						?>
						<div class='form-group group-2 writingdiv_<?php echo $count; ?>'>
                            <?php echo Form::label('writing_title_'.$count,'Title'); ?>
                            <?php echo Form::text('writing_title_'.$count,$writingprojects->title,array('class' => 'text textInput it', 'placeholder' => 'Title')); ?>
                            <?php echo Form::hidden('writing_id_'.$count,$writingprojects->id); ?>
                        </div>
                        <div class='form-group writingdiv_<?php echo $count; ?>'>
                            <?php echo Form::label('script_status_'.$count,'Script Status'); ?>
                            <?php echo Form::select('script_status_'.$count,array(
                                    '0' => 'Script Status',
                                    'Available' => 'Script Written',
                                    'Optioned' => 'Script Optioned',
                                    'Produced' => 'Script Produced',
                                    'Sold' => 'Published Book',
                                    ),$writingprojects->status	
                                ); ?> 
                            <input class="removebtn" type="button" name="addnew" value="Delete" onclick="DeleteWritingProjects('<?php echo $count ;?>');" />
                            <input type="hidden" name="writing_delete_<?php echo $count;?>" id="writing_delete_<?php echo $count;?>" value="0" />
                        </div>
                        <?php $count ++; endforeach; ?>
                        <input type="hidden" name="writing_count" id="writing_count" value="<?php echo $count; ?>" />
                        </div>
                        <div class='form-group' style="padding-top:10px;">
                        	<input class="btn btn-primary" type="button" name="addnew" value="Add New" onclick="AddNewWritingProjects();" />
                        </div>
                        
     		</div>
            <div class='form-button' style="float:right; margin-right:50px; margin-top:20px;">
                {{ Form::submit('Update', ['class' => 'btn btn-primary','id'=>'submitebutton']) }} 
                {{ Form::button('Cancel', ['class' => 'btn btn-primary','id'=>'cancelbutton', 'onclick'=>'setToolbarRoute("profiles","cancel")']) }}           
            </div> 
            {{ Form::close() }}
     </fieldset>    
	</div>
    
    
@stop