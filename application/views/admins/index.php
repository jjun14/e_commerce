<html>
  <head>
    <meta charset="utf-8">
    <title>Admin Login Page</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <style type="text/css">
      body
      {
        text-align: center;
        padding: 50px;
      }
    </style>
  </head>
  <body>
    <div class="container-fluid">
      <div class="row-fluid">
        <div class="col-md-12">
          Admin Login Page
        </div>
        <div class="">
          <!-- REMOVE BRS LATER -->
          <form action="/admin/login" method='post'>
            Email: <input type="text" name="name">
            <br>
            Password: <input type="password" name="password">
            <br>
            <input class="btn btn-success" type="submit" value="Login">
          </form>
        </div>
      </div>
    </div>
  </body>
</html>