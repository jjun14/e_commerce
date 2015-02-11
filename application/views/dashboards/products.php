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
      form
      {
        display: inline-block;
      }
      div.picture 
      {
        background-color: black;
        color: white;
        height: 50px;
        width: 100px;
      }
      .pages
      {
        text-align: center;
      }
      .add_new 
      {
        text-align: right;
      }
      div.wrapper 
      {
        margin-top: 40px;
        margin-bottom: 40px;
        padding: 20px;
      }
      h2, #close
      {
        display: inline-block; 
        vertical-align: top;
      }
      h2 
      {
        margin: 0px 0px 15px 0px;
      }
      div.picture_row div, div.picture_row p, div.picture_row form
      {
        display: inline-block;
        margin-right: 10px;
      }
      div.edit_picture
      {
        width: 20px;
        height: 27px;
        background-color: black;
      }

    </style>
    <script type="text/javascript">
    $(document).ready(function(){
      $('#add_new').click(function(){
        ('#modal_title').text('Add New Product');
      });
    });
    </script>
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-custom">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
          </button>
          <a class="navbar-brand" href="#">Dojo eCommerce</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li><a href="/dashboards/orders">Order</a></li>
            <li><a href="/dashboards/products">Products</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="/admin/log_off">Log Off</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid">
    <!-- Start Search and Filter Form -->
      <div class="row-fluid">
        <div class="col-md-2 col-md-offset-1">
          <form action="">
            <div class="input-group">
                <!-- <span class="input-group-addon glyphicon glyphicon-search"></span> -->
                <input class="form-control" name="search" type="text" placeholder="Search...">
            </div>
          </form>
        </div>
        <div class="col-md-2 col-md-offset-6 add_new">
          <button id="add_new" class="btn btn-primary" data-toggle="modal" data-target="#edit_modal" href="">Add new product</button>
        </div>
      </div>
    <!-- End Search and Filter Form -->
    <!-- Start Table -->
      <div class="row-fluid">
        <div class="col-md-10 col-md-offset-1">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Picture</th>
                <th>ID</th>
                <th>Name</th>
                <th>Inventory Count</th>
                <th>Quantity Sold</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><div class="picture"></div></td>
                <td>1</td>
                <td>T-Shirt</td>
                <td>123</td>
                <td>1000</td>
                <td>
                  <p class="btn-link" data-toggle="modal" data-target="#edit_modal">edit</p>
                  <form action="">
                    <input class="btn-link" type="submit" value="delete">
                    <input type="hidden" name="id" value="1">
                  </form>
                </td>
              </tr>
              <tr>
                <td><div class="picture"></div></td>
                <td>2</td>
                <td>Hat</td>
                <td>23</td>
                <td>100</td>
                <td>
                  <p class="btn-link" data-toggle="modal" data-target="#edit_modal">edit</p>
                  <form action="">
                    <input class="btn-link" type="submit" value="delete">
                    <input type="hidden" name="id" value="1">
                  </form>
                </td>
              </tr>              
              <tr>
                <td><div class="picture"></div></td>
                <td>3</td>
                <td>Mug</td>
                <td>12</td>
                <td>11</td>
                <td>
                  <p class="btn-link" data-toggle="modal" data-target="#edit_modal">edit</p>
                  <form action="">
                    <input class="btn-link" type="submit" value="delete">
                    <input type="hidden" name="id" value="1">
                  </form>
                </td>
              </tr>              
              <tr>
                <td><div class="picture"></div></td>
                <td>4</td>
                <td>Pants</td>
                <td>88</td>
                <td>1</td>
                <td>
                  <p class="btn-link" data-toggle="modal" data-target="#edit_modal">edit</p>
                  <form action="">
                    <input class="btn-link" type="submit" value="delete">
                    <input type="hidden" name="id" value="1">
                  </form>
                </td>
              </tr>              
              <tr>
                <td><div class="picture"></div></td>
                <td>5</td>
                <td>Belt</td>
                <td>34</td>
                <td>99</td>
                <td>
                  <p class="btn-link" data-toggle="modal" data-target="#edit_modal">edit</p>
                  <form action="">
                    <input class="btn-link" type="submit" value="delete">
                    <input type="hidden" name="id" value="1">
                  </form>
                </td>
              </tr>

            </tbody>
          </table>
        </div>
        <!-- End Table -->
        <div class="col-md-1"></div>
      </div><!-- row -->
      <!-- pagination start -->
      <div class="row-fluid">
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
        <!-- pagination end -->
      </div><!-- .row-fluid -->
    </div><!-- container-fluid -->
    <!-- Beginning of Modal -->
    <div class="container-fluid modal fade" id="edit_modal">
      <div class="row-fluid">
        <div class="wrapper col-md-6 col-md-offset-3 modal-content">
          <div class="row-fluid">
            <div class="col-md-11">
              <h2>Edit Product - ID 2</h2> 
            </div>
            <div class="col-md-1">
              <button class="close" data-dismiss="modal">x</button>
            </div>
          </div><!-- row-fluid -->
          <div class="row-fluid">
            <div class="col-md-6 col-md-offset-3">
              <form id="editProductForm" action="" method="post">
                <div class="form-group">
                  <label for="name">Name: </label>
                  <input type="text" class="form-control" name="name" id="name" value="Hat">
                </div>
                <div class="form-group">
                  <label for="description">Description: </label>
                  <input type="text" class="form-control" name="description" value="Great Fit, Cool new colors">
                </div>        
                <div class="form-group">
                  <label for="categories">Categories: </label>
                  <select class="form-control" name="categories">
                    <option>Hats</option>
                    <option>Mugs</option>
                    <option>Pants</option>
                    <option>Belt</option>
                  </select> 
                </div>
                <div class="form-group">
                  <label for="add_new_category">Or Add New Category: </label>
                  <input type="text" class="form-control" name="add_new_category">
                </div>
                <div class="form-group" enctype="multipart/form-data">
                  <form action="" method="post">
                   <div class="form-group">
                      <label for="exampleInputFile">Images: </label>
                      <input type="file" id="exampleInputFile" value="Upload">
                    </div>
                  </form>
                  <!-- draggable -->
                  <div class="images">
                    <div class="picture_row">
                      <div class="edit_picture"></div>
                      <p>img.png</p>
                      <form class="deleteImageForm" action="" method="post">
                        <input type="hidden" name="picture_id" value="2">
                        <span class="glyphicon glyphicon-trash"></span>
                      </form>
                      <form class="changeImageMain"action="" method="post">
                        <div class="checkbox">
                          <label>
                            <input type="checkbox">main
                          </label>
                        </div>
                        <input type="hidden" name="picture_id" value="2">
                      </form>
                    </div> <!-- div.picture_row -->          
                    <div class="picture_row">
                      <div class="edit_picture"></div>
                      <p>img.png</p>
                      <form class="deleteImageForm" action="" method="post">
                        <input type="hidden" name="picture_id" value="2">
                        <span class="glyphicon glyphicon-trash"></span>
                      </form>
                      <form class="changeImageMain"action="" method="post">
                        <div class="checkbox">
                          <label>
                            <input type="checkbox">main
                          </label>
                        </div>
                        <input type="hidden" name="picture_id" value="2">
                      </form>
                    </div> <!-- div.picture_row -->          
                    <div class="picture_row">
                      <div class="edit_picture"></div>
                      <p>img.png</p>
                      <form class="deleteImageForm" action="" method="post">
                        <input type="hidden" name="picture_id" value="2">
                        <span class="glyphicon glyphicon-trash"></span>
                      </form>
                      <form class="changeImageMain"action="" method="post">
                        <div class="checkbox">
                          <label>
                            <input type="checkbox">main
                          </label>
                        </div>
                        <input type="hidden" name="picture_id" value="2">
                      </form>
                    </div> <!-- div.picture_row -->
                  </div><!-- div.images -->
                </div>
                <div class="row">
                  <button class="btn btn-danger">Cancel</button>
                  <button class="btn btn-success">Preview</button>
                  <input type="submit" class="btn btn-primary">                  
                </div>
              </form>
            </div><!-- div.col-md-8 col-md-offset-2 -->
          </div><!-- row.fluid -->
        </div><!-- wrapper -->
      </div><!-- row.fluid -->
    </div><!-- .container-fluid modal -->
    <!-- End of Model -->
  </body>
</html>