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
        $('.page-nav').on('click', function(){
          var current_page = parseInt($('.page_number').attr('value'));
          if($(this).text() == 'first')
          {
            $('.page_number').attr('value', 1);
          }
          else if($(this).text() == 'next')
          {
            if(!($(".pagination li").length - 2 < current_page + 1))
            {
              $('.page_number').attr('value', current_page + 1);
            }
          }
          else if($(this).text() == 'prev')
          {
            if(!(current_page - 1 < 1))
            {
              $('.page_number').attr('value', current_page - 1);
            }
          }
          else 
          {
            $('.page_number').attr('value', current_page);
          }
        });

        $(document).on('click', '.page_num', function(){
          $('.page_number').attr('value', $(this).text());
        });

        $(document).on('click', '.category', function(){
          console.log($(this));
          if($(this).text() == "Show All")
          {
            $('#category').attr('value', 'show_all');
          }
          else
          {
            $('#category').attr('value', $(this).text().split(" ")[0]);
          }
          $('.page_number').attr('value', 1);   
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
    .page-nav, .page-num, li, .category
    {
      cursor: pointer;
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
      <div class="col-md-3">
        <div id="sidebar" class="col-md-3">
          <form action="/products/get_products/" method="post">
            <input type="text" name="search" placeholder="product name.">
            <input type="submit" value="?">
            <input class="page_number" type="hidden" name="page_num" value="<?= $page_num; ?>">
          </form>
          <h5>Categories</h5>
<?php 
            foreach($categories_count as $category_count)
            {
?>             <p class='category'><?= $category_count['name']; ?> (<?= $category_count['count']; ?>)</p>
<?php       }
?>
          <!-- </ul> -->
          <p class='category'>Show All</p>
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
                  <option value="Price">Price</option>
                  <option value="Most Popular">Most Popular</option>
                </select>
              </p>
              <input class="page_number" type="hidden" name="page_num" value="<?= $page_num; ?>">
              <input id="category" type="hidden" name="category" value="<?= $category; ?>">
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
                <a href="/products/show/<?= $product['id']; ?>"><img src="<?= $product['url']; ?>" alt="item_image"></a>
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
