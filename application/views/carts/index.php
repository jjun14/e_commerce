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
      #addresses {
        text-align: right;
        width:300px;
      }
      label {
        display: block;
        font-weight: normal;
      }
      .red {
        border:2px #FF3333 solid;
      }
      .green {
        color:lightgreen;
      }
      .stripe-button-el {
        visibility:hidden;
      }

    </style>

    <script type="text/javascript">

      function validation(name, value)
      {

        console.log("name = " + name + " | value = " + value);
        var name2 = name.replace(/_/g, " ");
        console.log(name2);
        var check = "&#10003";

        if (value == "")
        {
          return false;
        }
        else
        {
          return true;
        }
      }

      $(document).ready(function(){

        // Validate inputs on blur
        $(document).on('blur', 'input', function() { 
            console.log($(this).val()); // get the current value of the input field.
            test = validation($(this).attr('name'), $(this).val());

            // Show pass or fail
            if (!test)
            {
              console.log('failed');
              $(this).addClass('red');
            }
            else
            {
              console.log('success');
              $(this).removeClass('red');
              $(this).parent().prepend('<span class="green">&#x2713;</span>')
            }

            // Find number of empty inputs remaining
            var emptyShipping = $('#addresses').find(".shipping").filter(function() {
              return this.value === "";
            });
            var emptyBilling = $('#addresses').find(".billing").filter(function() {
              return this.value === "";
            });

            // If no shipping inputs are empty...
            if(emptyShipping.length == 0) {
              // If "same as shipping" box is checked...
              if ($('input:checkbox:checked').val()){
                // Show stripe button
                $('.stripe-button-el').removeAttr('disabled', 'disabled');
              }
              else if (emptyBilling.length == 0) 
              {
                $('.stripe-button-el').removeAttr('disabled', 'disabled');        
              }
            }           
        }); // End input blur function

        // Disables billing inputs when checked
        $('#checkbox').on('change', function() {
          $('.billing').toggle('slow');
        });

      }); // End document ready function

      // Disables stripe button on load
      $(window).load(function(){
        $('button').attr('disabled', 'disabled');
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


              // to sum total cost
              $total = 0;
              // to display order summary on stripe modal
              $names = "";

              foreach($products as $key => $value)
              {
                // displaying each row of cart data
                echo 
                "<tr><td>".$value['name']."</td><td>$".
                $value['price']."</td><td>".
                $value['product_qty']."<button class='btn-link'>update</button>
                <span class='glyphicon glyphicon-trash'></span></td><td>$".
                ($value['price']*$value['product_qty'])."</td></tr>"; 

                $total += ($value['price']*$value['product_qty']);
                $names .= "- ".$value['name']." -";

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
        <div class="col-md-12">
          <h2>Shipping Information</h2>
          <form id="addresses" action="/carts/checkout" method="post">
            <label>First Name: <input class="shipping" type="text" name="shipping_first_name"></label>
            <label>Last Name: <input class="shipping" type="text" name="shipping_last_name"></label>
            <label>Address: <input class="shipping" type="text" name="shipping_address_1"></label>
            <label>Address 2: <input class="shipping" type="text" name="shipping_address_2"></label>
            <label>City: <input class="shipping" type="text" name="shipping_city"></label>
            <label>State: <input class="shipping" type="text" name="shipping_state"></label>
            <label>Zipcode: <input class="shipping" type="text" name="shipping_zipcode"></label>
          <h2>Billing Information</h2>
          <label>
            <input id="checkbox" type="checkbox" name="same_as" value="checked">
            Same as Shipping
          </label>
          <br>
            <label class="billing" >First Name: <input class="billing" type="text" name="billing_first_name"></label>
            <label class="billing" >Last Name: <input class="billing" type="text" name="billing_last_name"></label>
            <label class="billing" >Address: <input class="billing" type="text" name="billing_address_1"></label>
            <label class="billing" >Address 2: <input class="billing" type="text" name="billing_address_2"></label>
            <label class="billing" >City: <input class="billing" type="text" name="billing_city"></label>
            <label class="billing" >State: <input class="billing" type="text" name="billing_state"></label>
            <label class="billing" >Zipcode: <input type="text" name="billing_zipcode"></label>
            <input type="hidden" name="total" value= <?= '"'.$total.'"' ?>>
          </form>
        </div><!-- .col-md-3 -->
      </div><!-- .row-fluid -->
      <div class="row">
        <div class="col-md-2 ">
          <form action="" method="POST">
            <script
              src="https://checkout.stripe.com/checkout.js" class="stripe-button"
              data-key="pk_test_4cxxj2bkbtLeFbO7ITBmJF0s"
              data-amount=<?= '"'.($total*100).'"'; ?>
              data-name="Dojo Magazines"
              data-description=<?= '"'.$names.'"'; ?>
              data-image="http://print4vets.com/wp-content/uploads/entrepreneur-magazine-march-2013.jpg">
            </script>
          </form>
        </div>
      </div>
    </div><!-- .container-fluid -->
  </body>
</html>