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
    	margin: 5px 20px 5px 0px;
    	display: inline-block;
      vertical-align: top;
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

      $(document).on('submit','#add_to_cart', function(){
        alert('submitted!');
        $.ajax({
          url: $(this).attr('action'),
          type: 'post',
          data: $(this).serialize(),
          datatype: "JSON"
        }).done(function(){
          $('#fade').append("Added to cart!");
        })
        return false;
      });


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
          <a class="navbar-brand" href="/products/index">Dojo eCommerce</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="/carts/index">Shopping Cart <?= "(".$this->session->userdata('cart_qty').")" ?> </a></li>
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
      <h3 class="col-md-offset-1"><?= $product[0]['name']; ?></h3>
      <div class="row">
        <div class="col-md-3 col-md-offset-1">
          <img id="main" src="<?= $product[0]['url']; ?>">
          <div class="row">



            <?php
            // echo "<h1>Product:</h1>";
            // var_dump($product);
            // echo "<h1>Similar:</h1>";
            // var_dump($similar);

            for ($i=0;$i<count($product);$i++)
            {
              if ($product[$i]['image_type_id'])
              {
                echo '<img class="secondary" src="'.$product[$i]['url'].'">';                
              }
            }

            ?>

  		     </div>
        </div>
      	<div class="col-md-6">
          <?= $product[0]['description']; ?>
        </div>
      </div>
      <div class="row">
        <div class="dropdown">
          <form id="add_to_cart" action="/carts/add_to_cart" method="post">
            <select name="quantity">
            	<?php
            		for ($i=1;$i<20;$i++)
            		{
            			echo "<option value='$i'>$i ($".($i*19.99).")</option>";
            		}
            	?>
            </select>
            <input type="submit" value="Buy">
            <input type="hidden" name="product_id" value= '<?= $product['id']; ?>'>
          </form>
          <div id="fade">
          </div>
    	  </div>
      </div>
      <div class="row">
        <div class="col-md-9 col-md-offset-1">
          <h4>Similar Items</h4>
  <?php     foreach($similar as $item)
            { 
  ?>          <div class="similar">
                <a href="/products/show/<?= $item['id']; ?>"><img class="similar" src="<?= $item['url']; ?>" alt=""></a>
                <p><?= $item['name']; ?></p>
              </div>
  <?php     }
  ?>
        </div>
      </div>
    </div><!-- container-fluid -->
  </body>
</html>
