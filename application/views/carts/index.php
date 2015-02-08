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
              <tr>
                <td>Black Belt for Staff</td>
                <td>$19.99</td>
                <td>
                  1
                  <button class="btn-link">update</button>
                  <span class="glyphicon glyphicon-trash"></span>
                </td>
                <td>$19.99</td>
              </tr>              
              <tr>
                <td>CodingDojo Cups</td>
                <td>$9.99</td>
                <td>
                  3
                  <button class="btn-link">update</button>
                  <span class="glyphicon glyphicon-trash"></span>
                </td>
                <td>$29.97</td>
              </tr>                       
            </tbody>
          </table>
        </div><!-- .col-md-12 -->
      </div><!-- .row-fluid -->
      <div class="row-fluid">
        <div class="col-md-2 col-md-offset-10 total">
          <p>Total: $49.96</p>
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
          <form action="">
            First Name: <input type="text" name="shipping_first_name">
            <br>
            Last Name: <input type="text" name="shipping_last_name">
            <br>
            Address: <input type="text" name="shipping_address_1">
            <br>
            Address 2: <input type="text" name="shipping_address_2">
            <br>
            City: <input type="text" name="shipping_city">
            <br>
            State: <input type="text" name="shipping_state">
            <br>
            Zipcode: <input type="text" name="shipping_zipcode">
          <h2>Billing Information</h2>
            First Name: <input type="text" name="billing_first_name">
            <br>
            Last Name: <input type="text" name="billing_last_name">
            <br>
            Address: <input type="text" name="billing_address_1">
            <br>
            Address 2: <input type="text" name="billing_address_2">
            <br>
            City: <input type="text" name="billing_city">
            <br>
            State: <input type="text" name="billing_state">
            <br>
            Zipcode: <input type="text" name="billing_zipcode">
            <br>
            Card: <input type="text" name="billing_card">
            <br>
            Security Code: <input type="text" name="billing_security_code">
            <br>
            Card: <input type="text" name="billing_card">
            <br>
            <input class="btn btn-primary" type="submit" value="Pay">
          </form>
        </div><!-- .col-md-3 -->
      </div><!-- .row-fluid -->
    </div><!-- .container-fluid -->
  </body>
</html>