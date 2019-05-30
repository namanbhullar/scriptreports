<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Script Reports</title>

    <!-- Bootstrap Core CSS -->
    {{ Html::style("public/css/home/bootstrap.min.css") }}
    {{ Html::style("public/css/home/font-awesome.min.css") }}
    {{ Html::style("public/css/home/main.css") }}
    {!! Html::script('public/js/jquery-1.10.2.min.js?v=2.1.5') !!}
    {!! Html::script('public/plugins/fancybox/jquery.fancybox.pack.js') !!}
    {!! Html::script('public/js/responsive/pages/home.js') !!}
    {!! Html::style('public/plugins/fancybox/jquery.fancybox.css') !!}
    {!! Html::style('public/css/home/responsive.css') !!}
	
    {!! Html::style('public/css/uikit.css') !!}
  <link href='https://fonts.googleapis.com/css?family=Raleway:400,700,800,500,300' rel='stylesheet' type='text/css'>

    <!-- Custom CSS -->

</head>

<body id="page-top" class="index">

    <!-- Navigation -->
    <div class="container top">
    <nav class="navbar navbar-default dash-nav">
        
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll dropdown" >
            	<div id="rt-offcanvas">
                	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">                
                   <span class="sr-only">Toggle navigation</span>                    
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                </div>
                
                                
                <a class="navbar-brand page-scroll" href="#page-top">{{ Html::image('public/images/home/dash-logo.png') }}</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="{{ URL::to('/directory') }}">Directory</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="{{ URL::to('/submission-directory') }}">Submissions</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="javascript:void(0)">Rate Your Script</a>
                    </li>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        
        <!-- /.container-fluid -->
    </nav>
</div>


@if (count($errors) > 0 || session('success'))
<div class="container ">
<div class="container-fluid mrgtp10">    
    
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ol>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ol>
        </div>
    @endif
    
    @if (session('success'))
        <div class="alert alert-success">
            <ol>
                    <li>{{ session('success') }}</li>
            </ol>
        </div>
    @endif
    
    <div class="clearfix"></div>         
</div>
<div class="clearfix"></div>    
</div>
@endif



  <div class="clearfix"></div>
    <!-- Header -->
    <header>
        <div class="container ">
        <div class="dash-banner">
        	<ul class="nav navbar-nav navbar-right banner_nav">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <?php /*?><li>
                        <a class="page-scroll" href="#">Features</a>
                    </li><?php */?>
                    <li>
                        <a class="page-scroll" href="{{ URL::to('/contact-us') }}">Contact</a>
                    </li>
                    <li>
                        <a class="page-scroll login" href="{{ URL::to('/login') }}">Log In</a>
                    </li>
                    
                </ul>
                <div class="clearfix"></div>
        	
            <div class="intro-text">
                <div class="intro-lead-in">IT ALL STARTS WITH A GREAT STORY</div>
                <div class="intro-heading">ScriptReports is a cloud-based platform that connects writers, script consultants, and entertainment 
professionals with tools to better manage,
evaluate, and share scripts.</div>
               <?php /*?> <a href="#" class="page-scroll btn btn-xl">Start Free Trial Now</a><?php */?>
            </div>
            <div class="clearfix"></div>
            
            
            </div>
            
            <div class="imac">
            	{{ Html::image("public/images/home/imac.png","Imac Logo") }}
            </div>
        </div>
         <div class="clearfix"></div>
    </header>
 <div class="clearfix"></div>
    <!-- Services Section -->
    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">The Simple Way to Manage, Evaluate and Sell Scripts.</h2>
                    
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-4">
                    
                   
                    <p class="text-muted">Streamline your workflow to keep your projects moving forward.</p>
                </div>
                <div class="col-md-4">
                    
                    <p class="text-muted">Access all important documents anywhere, anytime, on any device.</p>
                </div>
                <div class="col-md-4">
                    
                    <p class="text-muted">Keep message streams and shared file history in one convenient place.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio Grid Section -->
    <section id="portfolio1" class="bg-light-gray">
        <div class="container">
            <div class="row">
               
            <div class="row">
                <div class="col-md-6 ">
                	<div class="portfolio-item">
                    	{{ Html::image('public/images/home/icon_pr.png','Share and Track Scripts') }}
                   	<h2>Share and Track Scripts</h2>
                    <p>Share your projects with a sales presentation page or "ScriptPac".</p>

<p>Make it easy for others to evaluate your script and give quick feedback.</p>

<p style="margin-bottom:20px;">Keep track of submissions, see who views your scripts and when.</p>
                   
                    </div>
                    <div class="port_img">
                    	{{ Html::image('public/images/home/port-1.jpg','Click image to enlarge') }}
                        <?php /*?><div class="resize">
                        	<a href="{{ URL::to('/public/images/home/port-1.jpg') }}" class="fancybox">Click image to enlarge</a>
                            
                        </div><?php */?>
                    </div>
                </div>
                <div class="col-md-6 ">
                	<div class="portfolio-item" style="padding-bottom:2px;">
                    {{ Html::image('public/images/home/port-2.png','Build Powerful Evaluation') }}
                   	<h2>Build Powerful Evaluation Forms</h2>
                <p>Create custom script coverage forms readers can use on any browser.</p>

<p>Utilize the ScriptReports Evaluator tool to root out weaknesses in your script and identify needed revisions.</p>

<p style="margin-bottom:10px;">Compare up to 5 readers' reports and merge them into one PDF file.</p>
 

                   
                    </div>
                    <div class="port_img">
                     {{ Html::image('public/images/home/port_1.jpg','Click image to enlarge') }}
                        <?php /*?><div class="resize">
                        	<a href="{{ URL::to('/public/images/home/port_1.jpg') }}" class="fancybox">Click image to enlarge</a>
                            
                        </div><?php */?>
                    </div>
                </div>
                
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="portfolio" class="bg-light-gray">
        <div class="container">
            <div class="row">
               
            <div class="row">
                <div class="col-md-6 ">
                	<div class="portfolio-item" style=" border-bottom:1px solid #ecf0f1;">
                    {{ Html::image('public/images/home/icon_pr3.png','Find Script Readers') }}
                   	<h2>Find Script Readers, Consultants and Writers</h2>
                <p>From story idea to final draft getting professional, unbiased feedback is essential.</p>

<p>Our open marketplace lets you connect directly with the talent you need.</p>

                   
                    </div>
                    
               
                </div>
                <div class="col-md-6 ">
                	<div class="portfolio-item" style="padding-bottom:157px; border-bottom:1px solid #ecf0f1;">
                        {{ Html::image('public/images/home/icon_pr4.png','Find Work') }}
                   	<h2>Find Work, Get Hired</h2>
                <p>Create a profile and be listed in our directory.</p>

<p>Promote your services and showcase your projects on your own web page.</p>

 

                   
                    </div>
                    
                </div>
                
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    

    <!-- Clients Aside -->
    
    
    <!-- Contact Section -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center cntct_wrap">
                    <h2 class="section-heading">Contact</h2>
                    <h3 class="section-subheading text-muted">Let us know how we can help you.</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 cntct_wrap">
                    {!! Form::open(['route' => 'contact-form','method'=>"post"]) !!}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" placeholder="Your Name *" id="name" required >
                                    <p class="help-block text-danger"></p>
                                </div>
                                </div>
                                 <div class="col-md-6">
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" placeholder="Your Email *" id="email" required >
                                    <p class="help-block text-danger"></p>
                                </div>
                                </div>
                                
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Your Message *" name="message" id="message" required ></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <button type="submit" class="btn btn-xl pull-right">Submit mail</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer-dash">
        <?php /*?><div class="container">
            <div class="row">
                <div class="col-md-3">
                    <span class="copyright">{{ Html::image('public/images/home/dash-logo.png','Site Logg') }}</span>
                </div>
                <div class="col-md-3">
                    <ul class="list-inline social-buttons">
                        <li><a href="#">My Account</a>
                        </li>
                        <li><a href="#">Reader Directory</a>
                        </li>
                        <li><a href="#">Post Jobs</a>
                        </li>
                        <li><a href="#">Job Listings</a></li>
                         <li><a href="#">Resources</a>
                        </li>
                    </ul>
                </div>
                
                 <div class="col-md-3">
                    <ul class="list-inline social-buttons">
                        <li><a href="#">Home</a>
                        </li>
                        <li><a href="#">Features</a>
                        </li>
                        <li><a href="#">Terms of Service</a>
                        </li>
                        <li><a href="#">Privacy Policy</a></li>
                         <li><a href="#">Contact</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <ul class="list-inline quicklinks">
                        <li><a href="#">{{ Html::image('public/images/home/dash-fb.png','Facbook Link') }}</a></li>
                        <li><a href="#">{{ Html::image('public/images/home/dash-insta.png','Instagrame Link') }}</a></li>
                        <li><a href="#">{{ Html::image('public/images/home/dash-twitter.png','Twitter Link') }}</a></li>
                    </ul>
                </div>
            </div>
        </div><?php */?>
        <div class="clearfix"></div>
        <div class="copyright_dash">
        <div class="container">
            <div class="col-lg-3 text-center">
              <img alt="Site Logg" style="margin-top: 13px" src="{{ url('/public/images/home/dash-logo.png') }}">
            </div>
        	<div class="col-lg-6 text-center">
            	<p>
                    {!! link_to('/terms-of-use',trans('footer.TERMS_LINK_TITLE')) !!} | 
                    {!! link_to('/privacy-policy',trans('footer.PRIVACY_LINK_TITLE')) !!} | 
                    {!! link_to('/contact-us',trans('footer.CONTACT_LINK_TITLE')) !!}
        		</p>
            	<p>Copyright © 2016  |  ScriptReports - All Rights Reserved</p>
            </div> 
            </div>
        </div>
    </footer>
    
    <div class="uk-offcanvas uk-active" id="offcanvas">
        <div class="uk-offcanvas-bar uk-offcanvas-bar-show">
        	<ul class="uk-nav uk-nav-offcanvas" >
	            <li>
                   <a class="page-scroll" href="{{ URL::to('/directory') }}">Directory</a>
                </li>
                <li>
                    <a class="page-scroll" href="{{ URL::to('/submission-directory') }}">Submissions</a>
                </li>
                <li>
                    <a class="page-scroll" href="javascript:void(0)">Rate Your Script</a>
                </li>
                <li>
                    <a class="page-scroll" href="{{ URL::to('/contact-us') }}">Contact</a>
                </li>
                <li>
                    <a class="page-scroll login" href="{{ URL::to('/login') }}">Log In</a>
                </li>
            </ul>
        </div>
    </div>
 <script>
$(document).ready(function(){
	//fancybox
	$(".fancybox").fancybox({
		padding:0,
	});
});
 </script>
</body>

</html>
