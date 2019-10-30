<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <script src='/assets/jquery-2.2.1.min.js'></script>
  
  <script src='/assets/popper.js'></script>
  <script src='/assets/bootstrap.min.js'></script>
  <link rel="stylesheet" href="/assets/bootstrap.min.css" >
</head>
<body style = 'overflow-x: hidden;' >
  <div class = 'row'>
    <div class = 'col' >
    <div class="container" >
            <div class="card mt-3">
                <div class="card-header">
                    <b>Regsitration</b>
                </div>
                <form action='AddNewRecord' method='post' enctype='multipart/form-data'>
                    <div class="card-body register">
                        <p class="card-text"><b>Please fill your details here</b></p>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Restaurant Name </label>
                            <input required class="form-control" type='text' name='rname'>
                        </div>
                        <div class="form-group">
                          <label for="formGroupExampleInput">Address</label>
                          <input required class="form-control" type='text' name='address'>
                        </div>
                          
                        <!-- <div class="form-group">
                          <label for="formGroupExampleInput">Locaion : </label>
                          <input class="form-control" type='text' name='location'>
                        </div> -->

                        <!-- <div class="form-group">
                          <label for="formGroupExampleInput">State : </label>
                          <select class="form-control" name='state' id='state'>
                          </select>
                        </div>

                       

                        <div class="form-group">
                          <label for="formGroupExampleInput">City : </label>
                          <select class="form-control" name='city' id='city'>
                          </select>
                        </div>
                         -->

                       
                          
                        <div class="form-group">
                          <label for="formGroupExampleInput">Phone : </label>
                          <input required type='text' class = "form-control" name='phone'>
                        </div>

                        <div class="form-group">
                          <label for="formGroupExampleInput">Email : </label>
                          <input required type='email' class = "form-control" name='email'>
                        </div>

                        <div class="form-group">
                          <label for="formGroupExampleInput">Password : </label>
                          <input required type='password' class = "form-control" name='password'>
                        </div>
<!--                      
                        <div class="form-group">
                          <div class="custom-file">
                            <input type="file" name = "logo" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                        </div>
                        </div> -->
                        

                        <div class="form-group">
                          <input type="submit" style = "width : 100%" class="btn btn-primary" >
                        </div>

                    </div>
                </form>
           
        </div>
    </div>

    </div>
    <div class = 'col'   >
      <div class = "container" >
      <div class="card mt-3"  >
        <div class="card-header">
          <b>Restaurant Login</b>
        </div>
        <form  action="checkLogin" method="post">
        <div class="card-body">
          <div class="form-group">
              <label for="formGroupExampleInput">Email </label>
              <input required class="form-control" type='email' name='email'>
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput">Password</label>
            <input required class="form-control" type='password' name='password'>
          </div>
          <div class="form-group">
          <input type="submit" style = "width : 100%" class="btn btn-primary" >
        </div>
        </div>
        
        <h5 style = "color : red"><?php echo $msg; ?></h5>
      </form>
      </div>
      
      </div>
    </div>
  </div>
</body>
</html>