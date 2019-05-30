@extends('layouts.front')
@section('content')
    @push('css')
    	{!! Html::style("public/css/front/style.css") !!}
    @endpush

<div id="content-box">
    <div class="terms-policy">
<h1 class="top-heading"> {{ trans("front.scriptreader-Enterprises") }}</h1>
<h2 class="top-heading"> {!! trans("front.PRIVACY_POLICY.TopHeading") !!}
</h2>
<p></p>
<h3>
	{{ trans("front.PRIVACY_POLICY.1_head") }}<br>
</h3>
<p> {{ trans("front.PRIVACY_POLICY.1_text") }} </p>
<h3>{{ trans("front.PRIVACY_POLICY.1_2_head") }}</h3>
<p>{{ trans("front.PRIVACY_POLICY.1_2_text") }}</p>
<p>	</p>
<h3>
	{{ trans("front.PRIVACY_POLICY.2_head") }}<br>
    {{ trans("front.PRIVACY_POLICY.2_1_head") }}<br>
</h3>
<h3>
	{{ trans("front.PRIVACY_POLICY.2_1_a_head") }}</h3>
<p>{{ trans("front.PRIVACY_POLICY.2_1_a_text") }}</p>
<h3>{{ trans("front.PRIVACY_POLICY.2_1_b_head") }}</h3>
<p> {{ trans("front.PRIVACY_POLICY.2_1_b_text") }} </p>
<h3> {{ trans("front.PRIVACY_POLICY.2_1_c_head") }} </h3>
<p>{{ trans("front.PRIVACY_POLICY.2_1_c_text") }}</p>
<p></p>
<h3>{{ trans("front.PRIVACY_POLICY.2_2_head") }}<p></p>
<p>{{ trans("front.PRIVACY_POLICY.2_2_a_head") }}<br></p></h3>
<p> {{ trans("front.PRIVACY_POLICY.2_2_a_text") }} </p>
<h3> {{ trans("front.PRIVACY_POLICY.2_2_b_head") }} </h3>
<p> {{ trans("front.PRIVACY_POLICY.2_2_b_text") }} </p>
<h3> {{ trans("front.PRIVACY_POLICY.2_2_c_head") }} </h3>
<p> {{ trans("front.PRIVACY_POLICY.2_2_c_text") }} </p>
<h3> {{ trans("front.PRIVACY_POLICY.2_2_d_head") }} </h3>
<p> {{ trans("front.PRIVACY_POLICY.2_2_d_text") }} </p>
<p></p>
<h3> {{ trans("front.PRIVACY_POLICY.2_2_e_head") }} </h3>
<p> {{ trans("front.PRIVACY_POLICY.2_2_e_text") }} </p>
<h3> {{ trans("front.PRIVACY_POLICY.2_2_f_head") }} </h3>
<p> {{ trans("front.PRIVACY_POLICY.2_2_f_text") }} </p>
<h3> {{ trans("front.PRIVACY_POLICY.2_2_g_head") }} </h3>
<p>{{ trans("front.PRIVACY_POLICY.2_2_g_text") }} </p>
<p></p>
<h3> {{ trans("front.PRIVACY_POLICY.3_head") }}
</h3>
<p> {{ trans("front.PRIVACY_POLICY.3_text") }} </p>
<h3>{{ trans("front.PRIVACY_POLICY.3_1_head") }} </h3>
<p> {{ trans("front.PRIVACY_POLICY.3_1_text") }}</p>
<h3> {{ trans("front.PRIVACY_POLICY.3_2_head") }} </h3>
<p> {{ trans("front.PRIVACY_POLICY.3_2_text") }} </p>
<h3> {{ trans("front.PRIVACY_POLICY.3_3_head") }} </h3>
<p> {{ trans("front.PRIVACY_POLICY.3_3_text") }} </p>
<p></p>
<h3> {{ trans("front.PRIVACY_POLICY.4_head") }} </h3>
<p> {{ trans("front.PRIVACY_POLICY.4_text") }} </p>
</div>
</div>
<div class="clear"></div>
@stop