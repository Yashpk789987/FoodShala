<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log In</title>
    <script src='/assets/jquery-2.2.1.min.js'></script>
    <script src='/assets/popper.js'></script>
    <script src='/assets/bootstrap.min.js'></script>
    <link rel="stylesheet" href="/assets/bootstrap.min.css" >
</head>
<body>
  <div class = "container">
  <div class="card no-border" style = "padding : 10%" >
    <div class="card-header">
      Restaurant Login
    </div>
    <form  action="checkLogin" method="post">
    <div class="card-body">
      <div class="form-group">
          <label for="formGroupExampleInput">Email </label>
          <input required class="form-control" type='text' name='email'>
      </div>
      <div class="form-group">
        <label for="formGroupExampleInput">Password</label>
        <input required class="form-control" type='password' name='password'>
      </div>
    </div>
    <div class="form-group">
      <input type="submit" style = "width : 100%" class="btn btn-primary" >
    </div>
    <h5 style = "color : red"><?php echo $msg; ?></h5>
  </form>
  </div>
  
  </div>
</body>
</html>