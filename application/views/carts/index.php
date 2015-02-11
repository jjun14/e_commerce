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
      .trash {
        border:none;
        background-color:transparent;
      }

    </style>

    <script type="text/javascript">

      function validation(name, value)
      {
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

        $.ajax({
          url: "/carts/delete",
          method: "post",
          data: $(this).serialize();
        }).done(function(response){
          console.log(response);
        })

        // Disable stripe button
        $('#stripe button').attr('disabled', 'disabled');

        // Disables billing inputs when checked
        $('#checkbox').on('change', function() {
          $('.billing').toggle('slow');
        });

        // Validate inputs on blur
        $(document).on('blur', 'input', function() { 
            console.log($(this).val()); // get the current value of the input field.
            test = validation($(this).attr('name'), $(this).val());

            // Show pass or fail
            if (!test)
            {
              console.log('failed');
              $(this).addClass('red');
              $(this).siblings('span').text("")
            }
            else
            {
              console.log('success');
              $(this).removeClass('red');
              $(this).siblings('span').addClass('green')
              $(this).siblings('span').text("\u2713")
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

      }); // End document ready function

      

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
                $value['product_qty']."<button class='update btn-link'>update</button>"?>
                <form><button class="trash"><span class='glyphicon glyphicon-trash'></span></button><input type="hidden" name="product_id" value=<?= '"'.$value['id'].'"' ?> ></form><?=
                "</td><td>$".
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
            <label><span></span>First Name: <input class="shipping" type="text" name="shipping_first_name"></label>
            <label><span></span>Last Name: <input class="shipping" type="text" name="shipping_last_name"></label>
            <label><span></span>Address: <input class="shipping" type="text" name="shipping_address_1"></label>
            <label><span></span>Address 2: <input class="shipping" type="text" name="shipping_address_2"></label>
            <label><span></span>City: <input class="shipping" type="text" name="shipping_city"></label>
            <label><span></span>State: <input class="shipping" type="text" name="shipping_state"></label>
            <label><span></span>Zipcode: <input class="shipping" type="text" name="shipping_zipcode"></label>
          <h2>Billing Information</h2>
          <label>
            <input id="checkbox" type="checkbox" name="same_as" value="checked">
            Same as Shipping
          </label>
          <br>
            <label><span></span>First Name: <input class="billing" type="text" name="billing_first_name"></label>
            <label><span></span>Last Name: <input class="billing" type="text" name="billing_last_name"></label>
            <label><span></span>Address: <input class="billing" type="text" name="billing_address_1"></label>
            <label><span></span>Address 2: <input class="billing" type="text" name="billing_address_2"></label>
            <label><span></span>City: <input class="billing" type="text" name="billing_city"></label>
            <label><span></span>State: <input class="billing" type="text" name="billing_state"></label>
            <label><span></span>Zipcode: <input class="billing" type="text" name="billing_zipcode"></label>
            <input type="hidden" name="total" value= <?= '"'.$total.'"' ?>>
          </form>
        </div><!-- .col-md-3 -->
      </div><!-- .row-fluid -->
      <div class="row">
        <div class="col-md-2 ">
          <div id="stripe">
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
      </div>
    </div><!-- .container-fluid -->
  </body>
</html>