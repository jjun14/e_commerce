<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <style type="text/css">
    img {
    	border:3px solid black;
    	margin:3px;
    	display: inline-block;
    }
    .secondary{
    	height:40px;
    	width: 40px;
    	display: inline-block;
    }
    .description {
    	margin-top:25px;
    }
    .navbar, .navbar a {
    	background:black;
    	color:white;
    }
    button {
    	background: blue;
    	color: white;
    	border:2px solid black;
    }
    .dropdown {
    	margin-left: 800px;
    	margin-top:40px;
    }
    h4 {
    	margin-top:70px;
    }
    #main {
      height:200px;
      width:200px;
      margin-bottom:10px;
    }
    .similar {
    	margin:5px;
    	display: inline-block;
    	height:100px;
    	width: 100px;
    }
    </style>
    <script type="text/javascript">
    $(document).ready(function(){

      $('.secondary').mouseover(function(){
        $('#main').attr('src', $(this).attr('src'));
      });
      // $('#main')

    });







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
    <div class="container-fluid">
    	<div class="row">
    		<div class="col-md-2 col-md-offset-1">
            	<a style="text-decoration:underline" href="/products/index">Go Back</a>
            </div>
    <!-- Start Search and Filter Form -->
      <h3 class="col-md-offset-1">Black Belt for Staff</h3>
      <div class="row">
        <div class="col-md-3 col-md-offset-1">
          <img id="main" src="http://www.kidsmathgamesonline.com/images/pictures/numbers120/number1.jpg">
          <div class="row">
            <img class="secondary" src="http://www.kidsmathgamesonline.com/images/pictures/numbers120/number1.jpg">
		      	<img class="secondary" src="http://www.kidsmathgamesonline.com/images/pictures/numbers120/number2.jpg">
		      	<img class="secondary" src="http://www.kidsmathgamesonline.com/images/pictures/numbers120/number3.jpg">
		      	<img class="secondary" src="http://www.kidsmathgamesonline.com/images/pictures/numbers120/number4.jpg">
		      	<img class="secondary" src="http://www.kidsmathgamesonline.com/images/pictures/numbers120/number5.jpg">
  		     </div>
        </div>
      	<div class="col-md-6">Description about the product... Description about the product... Description about the product... Description about the product... Description about the product... Description about the product... Description about the product... Description about the product... Description about the product... Description about the product... Description about the product... Description about the product... Description about the product... Description about the product... Description about the product... Description about the product... Description about the product... Description about the product... Description about the product... Description about the product... Description about the product... Description about the product... Description about the product... Description about the product... Description about the product... Description about the product... Description about the product... Description about the product... Description about the product... Description about the product... Description about the product... Description about the product... Description about the product... Description about the product... Description about the product... Description about the product... Description about the product... Description about the product... Description about the product... Description about the product...
        </div>
      </div>
      <div class="row">
        <div class="dropdown">
          <form action="/carts/add_to_cart" method="post">
            <select name="quantity">
            	<?php
            		for ($i=1;$i<20;$i++)
            		{
            			echo "<option value='$i'>$i ($".($i*19.99).")</option>";
            		}
            	?>
            </select>
            <input type="submit" value="Buy">
            <input type="hidden" name="product_id" value= <?= '"'.$product_id.'"' ?> >
          </form>
    	  </div>
      </div>
	  <div class="container col-md-9 col-md-offset-1">
	  <h4>Similar Items</h4>
	  <?php
	  	for ($i=0;$i<7;$i++)
	  	{ ?>
	  		<div class="similar">
	  			<img class="similar" src="http://questmartialarts.us/questmedia/2012/04/black-belt-club.gif">
	  			<p>Black Belt</p>
	  		</div>
  <?php }
	  ?>
	</div>

    </div><!-- container-fluid -->
  </body>
</html>
