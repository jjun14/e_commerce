<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script "text/javascript">
      $(document).ready(function(){
        $(document).on('change', 'select', function(){
          $('.page_number').attr('value', 1);
          $(this).parent().submit();
        });

        $('.page-nav').on('click', function(){
          var current_page = parseInt($('.page_number').attr('value'));
          if($(this).text() == 'next')
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

      });
    </script>
    <style type="text/css">

      .navbar-custom 
      {
        background-color:#930000;
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
          background-color: #770000;
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
          background-color:#930000;
      }
      p 
      {
        display: inline-block;
      }
      .pages
      {
        text-align: center;
      }
      table
      {
        margin: 0px;
        padding: 0px;
      }
      .col-md-10
      {
        padding: 0px;
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
          <ul class="nav navbar-nav">
            <li class="active"><a href="/dashboards/orders">Orders</a></li>
            <li><a href="/dashboards/products">Products</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="/admin/log_off">Log Off</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
    <div class="container-fluid">
      <!-- Start Search and Filter Form -->
      <div class="row-fluid">
        <form class="form-inline" action="/dashboards/filter_orders" method="post">
          <div class="input-group col-md-2 col-md-offset-1">
            <input class="form-control" name="search" type="text" placeholder="search">
          </div>
          <div class="input-group col-md-2 col-md-offset-6">
            <select class="form-control" name="order_status">
              <option value="show_all">Show All</option>
              <option value="Order in process">Order In Process</option>
              <option value="Shipped">Shipped</option>
            </select>  
          </div>
          <input class="page_number" type="hidden" name="page_num" value="<?= $page_num; ?>">
          <input type="submit" value="submit">
        </form>
      </div>
      <!-- End Search and Filter Form -->
      <div class="row-fluid">
        <div class="col-md-10 col-md-offset-1">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Order ID</th>
                <th>Name</th>
                <th>Date</th>
                <th>Billing Address</th>
                <th>Total</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
<?php 
              foreach($orders[0] as $order)
              { 
?>              <tr>
                  <td><?= $order['id']; ?></td>
                  <td><?= $order['name']; ?></td>
                  <td><?= $order['date']; ?></td>
                  <td><?= $order['address']; ?></td>
                  <td><?= $order['total']; ?></td>
                  <td>
                    <form action="/orders/update/" method="post">
                      <select name="status" id="">
                        <option value="" disabled selected><?= $order['status']; ?></option>
                        <option value="Shipped">Shipped</option>
                        <option value="Order in process">Order in process</option>
                        <option value="Cancelled">Cancelled</option>
                      </select>
                      <input type="hidden" name="order_id" value="<?= $order['id']; ?>">
                    </form>
                  </td>
                </tr>
<?php         } 
?>                   
            </tbody>
          </table>
        </div>
      </div><!-- .row-fluid -->
      <div class="row-fluid">
        <div class="col-md-6 col-md-offset-3 pages">
          <nav>
            <ul class="pagination">
              <li>
                <a href="#" aria-label="Previous">
                  <span class="page-nav" aria-hidden="true">prev</span>
                </a>
              </li>
<?php         $count = 1;
              for($i = 0; $i < intval($orders[1]); $i++)
              {
                if($i % 5 == 0)
                {
?>                 <li><a class='page_num' disabled='true'><?= $count; ?></a></li>                          
<?php              $count++;
                } 
              }
?>
              <li>
                <a href="#" aria-label="Next">
                  <span class="page-nav" aria-hidden="true">next</span>
                </a>
              </li>
            </ul>
          </nav>
        </div>
      </div><!-- .row-fluid --> 
      <!-- pagination end -->
    </div><!-- .container-fluid -->
  </body>
</html>
