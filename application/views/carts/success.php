<html>
  <head>
    <meta charset="utf-8">
    <title>Success | Dojo eCommerce</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <style type="text/css">
		.navbar-custom 
		{
			background-color: black;
			  color:#ffffff;
			  border-radius:0;
		}
		.navbar-custom .navbar-nav > li > a 
		{
			color:#fff;
			padding-left:20px;
			padding-right:20px;
		}
		.navbar-custom .navbar-nav > .active > a, .navbar-nav > .active > a:hover, .navbar-nav > .active > a:focus 
		{
			color: #ffffff;
			background-color:transparent;
		}
		.navbar-custom .navbar-nav > li > a:hover, .nav > li > a:focus 
		{
			text-decoration: none;
			background-color: black;
		}
		.navbar-custom .navbar-brand 
		{
			color:#eeeeee;
		}
		.navbar-custom .navbar-toggle 
		{
			background-color:#eeeeee;
		}
		.navbar-custom .icon-bar 
		{
			background-color:black;
		}
		#wrap{
			position:fixed;; 
			z-index:-1; 
			top:0; 
			left:0; 
			background-color:black
		}
		#wrap img.bgfade{
		    position:absolute;
		    top:0;
		    display:none;
		    width:100%;
		    height:100%;
			z-index:-1
		}
		.btn-twitter {
		    background: #00acee;
		    border-radius: 0;
		    color: #fff
		}
		.btn-twitter:link, .btn-twitter:visited {
		    color: #fff
		}
		.btn-twitter:active, .btn-twitter:hover {
		    background: #0087bd;
		    color: #fff
		}
		.btn-facebook {
		    background: #3b5998;
		    border-radius: 0;
		    color: #fff
		}
		.btn-facebook:link, .btn-facebook:visited {
		    color: #fff
		}
		.btn-facebook:active, .btn-facebook:hover {
		    background: #30477a;
		    color: #fff
		}
		.btn-googleplus {
		    background: #e93f2e;
		    border-radius: 0;
		    color: #fff
		}
		.btn-googleplus:link, .btn-googleplus:visited {
		    color: #fff
		}
		.btn-googleplus:active, .btn-googleplus:hover {
		    background: #ba3225;
		    color: #fff
		}
		.btn-stumbleupon {
		    background: #f74425;
		    border-radius: 0;
		    color: #fff
		}
		.btn-stumbleupon:link, .btn-stumbleupon:visited {
		    color: #fff
		}
		.btn-stumbleupon:active, .btn-stumbleupon:hover {
		    background: #c7371e;
		    color: #fff
		}
		.btn-linkedin {
		    background: #0e76a8;
		    border-radius: 0;
		    color: #fff
		}
		.btn-linkedin:link, .btn-linkedin:visited {
		    color: #fff
		}
		.btn-linkedin:active, .btn-linkedin:hover {
		    background: #0b6087;
		    color: #fff
		}
		.center-block {
			margin:17px 45px;
		}
		.black {
			color:grey;
		}
    </style>
    <script type="text/javascript">
		$(window).load(function(){
		$('img.bgfade').hide();
		var dg_H = $(window).height();
		var dg_W = $(window).width();
		$('#wrap').css({'height':dg_H,'width':dg_W});
		function anim() {
		    $("#wrap img.bgfade").first().appendTo('#wrap').fadeOut(2400);
		    $("#wrap img").first().fadeIn(2400);
		    setTimeout(anim, 4800);
		}
		anim();})
		$(window).resize(function(){window.location.href=window.location.href})
	</script>
  </head>
  <body>
  	<!-- Navbar -->
    <nav class="navbar navbar-custom">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Dojo eCommerce</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="/carts/index">Shopping Cart (5)</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
    <!-- End Navbar -->
    <div id="wrap">
		<img class="bgfade" src="http://3.bp.blogspot.com/-2ZeGRB5d5d8/UAkNNSYiPZI/AAAAAAAAAJg/XaNH9y61sRY/s1600/openskies4.jpg">
		<img class="bgfade" src="http://blogs.discovermagazine.com/intersection/files/2010/11/Rock-Stars-of-Science-Spread-final_Page_2.jpg">
		<img class="bgfade" src="http://blog.photoshelter.com/wp-content/uploads/2011/10/LamboSpread.jpg">
		<img class="bgfade" src="https://s-media-cache-ak0.pinimg.com/originals/2e/e7/33/2ee7339517c6041a128831ff11218c75.jpg">
	</div>

 <!-- Begin modal -->

	<div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
	  <div class="modal-dialog">
	  <div class="modal-content">
	      <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><a href="/products/index">×</a></button>
	          <h1 class="text-center">Thanks for your order!</h1>
	      </div>
	      <div class="modal-body">
	          <form class="form col-md-12 center-block">
	                
				<!-- Twitter -->
				<a href="http://twitter.com/home?status=" title="Share on Twitter" target="_blank" class="btn btn-twitter"><i class="fa fa-twitter"></i> Twitter</a>
				 <!-- Facebook -->
				<a href="https://www.facebook.com/sharer/sharer.php?u=" title="Share on Facebook" target="_blank" class="btn btn-facebook"><i class="fa fa-facebook"></i> Facebook</a>
				<!-- Google+ -->
				<a href="https://plus.google.com/share?url=" title="Share on Google+" target="_blank" class="btn btn-googleplus"><i class="fa fa-google-plus"></i> Google+</a>
				<!-- StumbleUpon -->
				<a href="http://www.stumbleupon.com/submit?url=" title="Share on StumbleUpon" target="_blank" data-placement="top" class="btn btn-stumbleupon"><i class="fa fa-stumbleupon"></i> Stumbleupon</a>
				<!-- LinkedIn --> 
				<a href="http://www.linkedin.com/shareArticle?mini=true&url=&title=&summary=" title="Share on LinkedIn" target="_blank" class="btn btn-linkedin"><i class="fa fa-linkedin"></i> LinkedIn</a>
	            
	          </form>
	      </div>
	      <div class="modal-footer">
	          <div class="col-md-12">
	          <button class="btn" data-dismiss="modal" aria-hidden="true"><a class="black" href="/products/index">Back</a></button>
			  </div>	
	      </div>
	  </div>
	  </div>
	</div>
  </body>
</html>