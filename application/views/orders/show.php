<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
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
      .info 
      {
        border: 3px solid black;
      }
      p
      {
        margin: 0px;
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
            <li><a href="#">Order</a></li>
            <li><a href="#">Products</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Log Off</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid">
      <!-- Start Order Info -->
      <div class="row-fluid">
        <div class="col-md-3 col-md-offset-1 offset info">
          <p>Order ID: 1</p>
          <p>Customer shiping info</p>
          <p>name: bob</p>
          <p>address: 123 Dojo Way</p>
          <p>city: Seattle</p>
          <p>state: WA</p>
          <p>zip: 98133</p>
          <p>Customer billing info</p>
          <p>name: bob</p>
          <p>address: 123 Dojo Way</p>
          <p>city: Seattle</p>
          <p>state: WA</p>
          <p>zip: 98133</p>
        </div>
        <div class="col-md-6 col-md-offset-1">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>Item</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>35</td>
                <td>Cup</td>
                <td>$9.99</td>
                <td>1</td>
                <td>$9.99</td>
              </tr>            
              <tr>
                <td>215</td>
                <td>Shirt</td>
                <td>$19.99</td>
                <td>2</td>
                <td>$39.99</td>
              </tr>
            </tbody>
          </table>
          <div class="row-fluid">
            <div class="col-md-5 info">
              <p>Status: shipped</p>
            </div>            
            <div class="col-md-5 col-md-offset-2 info">
              <p>Sub total: $29.98</p>
              <p>Shipping: $1.00</p>
              <p>Total: $30.98</p>
            </div>
          </div>
        <!-- </div>    -->
      </div><!-- row-fluid --> 
    </div><!-- container-fluid -->
  </body>
</html>
