<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        // page_nav_handler();
        // page_num_handler();
        // filter_form_handler();
        $(document).on('click', '.page-nav', function(){
          var current_page = parseInt($('#page_num').attr('value'));
          if($(this).text() == 'first')
          {
            $('#page_num').attr('value', 1);
          }
          else if($(this).text() == 'next')
          {
            if(!($(".pagination li").length - 2 < current_page + 1))
            {
              $('#page_num').attr('value', current_page + 1);
            }
          }
          else if($(this).text() == 'prev')
          {
            // if(!(current_page - 1 < 1))
            {
              $('#page_num').attr('value', current_page - 1);
            }
          }
          else 
          {
            $('#page_num').attr('value', current_page);
          }
          // $('#filterForm').submit();
        });

        $(document).on('click', '.page_num', function(){
          $('#page_num').attr('value', $(this).text());
          // $('#filterForm').submit();
        });

        $(document).on('submit', '#filterForm', function(){
          $.ajax({
            type: "POST",
            url: "products/get_products",
            data: $(this).serialize(),
            datatype: "JSON"
          })
            .done(function(response){
              $('body').html(response);
            });
          return false;
        });
      });
    </script>
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
      height:150px;
      width:150px;
    }
    .products {
      margin:20px;
      display: inline-block;
      height:115px;
      width: 115px;
    }
    .product
    {
      display: inline-block;
      margin-right: 10px;
    }
    .space {
      height:30px;
    }
    form ul 
    {
      list-style-type: none;
    }
    form ul li{
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
           <h3>All Products(page <?= $page_num; ?>)</h3>
          </div>
          <div class="col-md-4 col-md-offset-3">
            <form id="filterForm" action="/products/get_products/" method="post">
              <ul>
                <li class="btn-link page-nav">first</li>
                <li class="btn-link page-nav">prev</li>
                <li class="btn-link page-nav"><?= $page_num; ?></li>
                <li class="btn-link page-nav">next</li>
              </ul>
              <p>Sorted by 
                <select name="sort_by">
                  <option value="price">Price</option>
                  <option value="most_popular">Most Popular</option>
                </select>
              </p>
              <input id="page_num" type="hidden" name="page_num" value="<?= $page_num; ?>">
              <input type="hidden" name="categories" value="show_all">
              <input type="submit" value="Submit">
            </form>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
<?php
              foreach($all_products[0] as $product)
              { 
?>
              <div class="product">
                <img src="<?= $product['url']; ?>" alt="item_image">
                <p><?= $product['name']; ?></p>
                <p><?= $product['price']; ?></p>
              </div>
<?php         }
?>      
          </div>
        </div>
        <div class="space"></div>
        <div class="row">
          <div class="col-md-6 col-md-offset-3 pages">
            <nav>
              <ul class="pagination">
                <li>
                  <a disabled='true' aria-label="Previous">
                    <span class='page-nav' aria-hidden="true">prev</span>
                  </a>
                </li>
<?php           
                $count = 1;
                for($i = 0; $i < $all_products[1]; $i++)
                {
                  if($i % 15 == 0)
                  { 
?>
                    <li ><a class='page_num' disabled='true'><?= $count; ?></a></li>
<?php             
                    $count++;
                  }
                }
?>
                <li>
                  <a disabled='true' aria-label="Next">
                    <span class='page-nav' aria-hidden="true">next</span>
                  </a>
                </li>
              </ul>
            </nav>
          </div><!-- .col-md-6 .col-md-offset-3 -->
        </div><!-- .row -->
      </div><!-- .col-md-9 -->
    </div><!-- container-fluid -->
  </body>
</html>
