<html>
  <head>
    <meta charset="utf-8">
    <title>Shopping Cart | Dojo eCommerce</title>
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
      .total p
      {
        text-align: right;
      }
      .exp {
        width:60px;
      }
      th {
        background-color:lightgrey;
      }
    </style>
    <script type="text/javascript">

    $(document).ready(function(){

      // Disables billing inputs when checked
      $('#checkbox').on('change', function() {
        $('.billing').attr('disabled','disabled');
      });

    });

    </script>
  </head>
  <body>
    <!-- <?php //var_dump($products) ?> -->
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
            <li><a href="/carts/index">Shopping Cart (5)</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid">
      <!-- Begining of Item Table -->
      <div class="row-fluid">
        <div class="col-md-12">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Item</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody>
              <?php



              $total = 0;

              foreach($products as $key => $value)
              {
                // displaying each row of cart data
                echo 
                "<tr><td>".$value['name']."</td><td>$".
                $value['price']."</td><td>".
                $value['product_qty']."<button class='btn-link'>update</button>
                <span class='glyphicon glyphicon-trash'></span></td><td>$".
                ($value['price']*$value['product_qty'])."</td></tr>"; 

                // increment total
                $total += ($value['price']*$value['product_qty']);

                ?>
                
                                
        <?php } ?>
            </tbody>
          </table>
        </div><!-- .col-md-12 -->
      </div><!-- .row-fluid -->
      <div class="row-fluid">
        <div class="col-md-2 col-md-offset-10 total">
          <p>Total: $<?= $total ?></p>
          <div class="row-fluid">
            <div class="col-md-2 col-md-offset-4">
              <a class="btn btn-success" href="/products/index">Continue Shopping</a>
            </div>
          </div>
        </div>
      </div>
      <!-- End of Item Table -->
      <!-- REMOVE BR TAGS LATER -->
      <div class="row-fluid">
        <div class="col-md-4">
          <h2>Shipping Information</h2>
          <form action="/carts/checkout" method="post">
            First Name: <input type="text" name="shipping_first_name" value="Matt">
            <br>
            Last Name: <input type="text" name="shipping_last_name" value="Rutledge">
            <br>
            Address: <input type="text" name="shipping_address_1" value="1631 Mercy St">
            <br>
            Address 2: <input type="text" name="shipping_address_2" value="Unit A">
            <br>
            City: <input type="text" name="shipping_city" value="Mountain View">
            <br>
            State: <input type="text" name="shipping_state" value="CA">
            <br>
            Zipcode: <input type="text" name="shipping_zipcode" value="94041">
          <h2>Billing Information</h2>
          <label>
            <input id="checkbox" type="checkbox" name="same_as" value="checked">
            Same as Shipping
          </label>
          <br>
            First Name: <input class="billing" type="text" name="billing_first_name">
            <br>
            Last Name: <input class="billing" type="text" name="billing_last_name">
            <br>
            Address: <input class="billing" type="text" name="billing_address_1">
            <br>
            Address 2: <input class="billing" type="text" name="billing_address_2">
            <br>
            City: <input class="billing" type="text" name="billing_city">
            <br>
            State: <input class="billing" type="text" name="billing_state">
            <br>
            Zipcode: <input class="billing" type="text" name="billing_zipcode">
            <br>
            Card: <input class="card" type="text" name="billing_card">
            <br>
            Security Code: <input class="card" type="text" name="billing_security_code">
            <br>
            Expiration: <input class="exp" type="text" name="month" placeholder="(mm)"> /
            <input class="exp" type="text" name="year" placeholder="(year)">
            <br>
            <input type="hidden" name="total" value= <?= '"'.$total.'"' ?>>
            <input class="btn btn-primary" type="submit" value="Pay">
          </form>
        </div><!-- .col-md-3 -->
      </div><!-- .row-fluid -->
    </div><!-- .container-fluid -->
  </body>
</html>