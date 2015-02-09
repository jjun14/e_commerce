<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <style type="text/css">
    .navbar, .navbar a {
      background:black;
      color:white;
    }
    h3, form
    {
      margin-top: 15px;
    }

    form
    {
      text-align: right;
    }
    #sidebar {
      width:90%;
      height:270px;
      margin-left: 10px;
    }
    #categories {
      list-style-type: none;
    }
    #categories a {
      text-decoration: none;
      color: black;
    }
    #display, #sidebar {
      border:3px solid black;
      vertical-align: top;
    }
    img {
      border:3px solid black;
      margin:3px 3px 3px 3px;
      display: inline-block;
      height:115px;
      width:115px;
    }
    .products {
      margin:20px;
      display: inline-block;
      height:115px;
      width: 115px;
    }
    .space {
      height:30px;
    }
    #italics li{
      border-left:solid black 2px;
      padding:0px 10px;
      display: inline-block;
    }
    #italics a {
      text-decoration: underline;
    }
    #pagination {
      text-align: center;
      margin:10px auto;
    }
    #pagination a {
      text-decoration: underline;
    }
    .pages {
      text-align: center;
    }
    </style>
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
      <div class="col-md-3">
        <div id="sidebar" class="col-md-3">
          <form action="#" method="post">
            <input type="text" name="product_name" placeholder="product name.">
            <input type="submit" value="?">
            <input type="hidden" name="action" value="product_search">
          </form>
          <h5>Categories</h5>
          <ul id="categories">
            <li class="btn-link"><a href="#">Tshirts (25)</a></li>
            <li class="btn-link"><a href="#">Shoes (35)</a></li>
            <li class="btn-link"><a href="#">Cups (5)</a></li>
            <li class="btn-link"><a href="#">Fruits (105)</a></li>
            <li class="btn-link"><a style="font-style:italic" href="#">Show All</a></li>
          </ul>
        </div>
      </div>
    <!-- <div id="sidebar"> -->
<!--     </div>sidebar end -->

      <div id="display" class="col-md-9">
        <div class="row">
          <div class="col-md-4">
           <h3>Tshirts (page 2)</h3>
          </div>
          <div class="col-md-4 col-md-offset-3">
            <form action="">
              <ul id="italics">
                <li>first</li>
                <li>prev</li>
                <li>2</li>
                <li>next</li>
              </ul>
              <p>Sorted by 
                <select name="sort_by">
                  <option value="price">Price</option>
                  <option value="most_popular">Most Popular</option>
                </select>
              </p>
            </form>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
<!--             <?php
              for ($i=0;$i<15;$i++)
              {
                if ($i%5 == 0) { ?>
                  <div class="space"></div>
          <?php } ?>

                  <div class="products">
                    <a href="/products/show"><img src="http://questmartialarts.us/questmedia/2012/04/black-belt-club.gif"></a>
                    <p>Black Belt</p>
                  </div>
          <?php }
            ?>  -->           
          </div>
        </div>
        <div class="space"></div>
        <div class="row">
          <div class="col-md-6 col-md-offset-3 pages">
            <nav>
              <ul class="pagination">
                <li>
                  <a href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li>
                  <a href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>


    

    </div><!-- container-fluid -->
  </body>
</html>
