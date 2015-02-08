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
      p 
      {
        display: inline-block;
      }
      form div
      {
        display: inline-block;
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
    <div class="container-fluid">
    <!-- Start Search and Filter Form -->
      <div class="row">
        <div class="col-md-2 col-md-offset-1">
          <form action="">
            <div class="input-group">
                <span class="input-group-addon glyphicon glyphicon-search"></span>
                <input class="form-control" name="search" type="text" placeholder="Search...">
            </div>
            <div class="input-group">
              <select class="form-control" name="filter">
                <option>Show All</option>
                <option>Order In Process</option>
                <option>Shipped</option>
              </select>            
            </div>
          </form>        
        </div>
      </div>
    <!-- End Search and Filter Form -->
      <div class="row">
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
              <tr>
                <td><a href="">100</a></td>
                <td>Michael Choi</td>
                <td>2/7/2015</td>
                <td>1982 Zanker Road San Jose, CA 95112</td>
                <td>$149.99</td>
                <td>
                  <form action="">
                    <div class="input-group">
                      <select class="form-control" name="order_status">
                        <option>Shipped</option>
                        <option>Order In Process</option>
                        <option>Cancelled</option>
                      </select>            
                    </div>
                  </form>
                </td>
              </tr>
              <tr>
                <td><a href="">4</a></td>
                <td>Jimmy Jun</td>
                <td>2/8/2015</td>
                <td>1 Zanker Road San Jose, CA 95112</td>
                <td>$9.99</td>
                <td>
                  <form action="">
                    <div class="input-group">
                      <select class="form-control" name="order_status">
                        <option>Shipped</option>
                        <option>Order In Process</option>
                        <option>Cancelled</option>
                      </select>            
                    </div>
                  </form>
                </td>
              </tr>
              <tr>
                <td><a href="">6</a></td>
                <td>Matt Rutledge</td>
                <td>2/9/2015</td>
                <td>2 Zanker Road San Jose, CA 95112</td>
                <td>$159.99</td>
                <td>
                  <form action="">
                    <div class="input-group">
                      <select class="form-control" name="order_status">
                        <option>Shipped</option>
                        <option>Order In Process</option>
                        <option>Cancelled</option>
                      </select>            
                    </div>
                  </form>
                </td>
              </tr>
              <tr>
                <td><a href="">46</a></td>
                <td>Andrew Lee</td>
                <td>2/10/2015</td>
                <td>82 Zanker Road San Jose, CA 95112</td>
                <td>$249.99</td>
                <td>
                  <form action="">
                    <div class="input-group">
                      <select class="form-control" name="order_status">
                        <option>Shipped</option>
                        <option>Order In Process</option>
                        <option>Cancelled</option>
                      </select>            
                    </div>
                  </form>
                </td>
              </tr>
              <tr>
                <td><a href="">99</a></td>
                <td>Rory Pasley</td>
                <td>2/11/2015</td>
                <td>98 Zanker Road San Jose, CA 95112</td>
                <td>$49.99</td>
                <td>
                  <form action="">
                    <div class="input-group">
                      <select class="form-control" name="order_status">
                        <option>Shipped</option>
                        <option>Order In Process</option>
                        <option>Cancelled</option>
                      </select>            
                    </div>
                  </form>
                </td>
              </tr>                           
            </tbody>
          </table>
        </div>
        <div class="col-md-1"></div>
      </div><!-- row -->
      <div class="row">
        <div class="col-md-4 col-md-offset-4">
          <p>&lt- |</p>
          <p>1 |</p>
          <p>2 |</p>
          <p>3 |</p>
          <p>4 |</p>
          <p>5 |</p>
          <p>6 |</p>
          <p>7 |</p>
          <p>8 |</p>
          <p>9 |</p>
          <p>10 |</p>
          <p>-&gt</p>
        </div>
        <div class="col-md-4"></div>
      </div><!-- row -->
    </div><!-- container-fluid -->
  </body>
</html>


<!-- test -->
