<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Restaurant</title>
  <script src='/assets/jquery-2.2.1.min.js'></script>
    <!-- <script src='/assets/statecity.js'></script> -->
    <script src='/assets/popper.js'></script>
    <script src='/assets/bootstrap.min.js'></script>
    <link rel="stylesheet" href="/assets/bootstrap.min.css" >
</head>
<body>
<div class="navbar navbar-expand-sm bg-dark fixed-top navbar-dark">
  <a class="navbar-brand" style = "color : white" ><?php echo $_SESSION['restaurant']['rname'] ?></a>
  <ul class="navbar-nav mr-auto">
    <li class="nav-item ">
      <a class="nav-link"  href="showMenu">Menu </a>
    </li>
    <li class="nav-item active">
      <a class="nav-link" href="addFoodItem">Add  Food Item </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="showEditDelete">Edit Menu </a>
    </li>
    <li class="nav-item ">
      <a class="nav-link" href="showOrders">View Orders </a>
    </li>
  </ul>
  <ul class="navbar-nav">
    <li>
        <div class="btn-nav" ><a class="nav-link" href="logout">Logout</a>
        </div>
    </li>
		</ul>
  </div>
  <br>
  <div class="container" style = 'padding-top : 8%'>
        <div class="col-md-6">
            <div class="card mt-4">
                <div class="card-header">
                    <b>Add Food Item</b>
                </div>
                <form action='insertFoodItem' method='post'>
                    <input type="text" name = "rid" hidden value = "<?php echo $_SESSION['restaurant']['rid'] ?>" >
                    <div class="card-body register">
                        <p class="card-text"><b>Please fill your details here</b></p>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Food Name </label>
                            <input type="text" required class = "form-control" name="foodname" placeholder="Enter Food Name">
                        </div>
                        <div class="form-group">
                          <label for="formGroupExampleInput">Price </label>
                          <input type="text" required class = "form-control" name="price" placeholder="Enter Food Price">
                        </div>
                          
                        <div class="form-group">
                          <label for="formGroupExampleInput">Type : </label>
													<td>VEG <input type="radio" required name="type" value="VEG"> &nbsp;&nbsp;&nbsp;&nbsp;NONVEG <input type="radio" required name="type" value="NONVEG"></td></tr>
                        </div>
                       

                        <div class="form-group">
                          <input type="submit" style = "width : 100%" class="btn btn-primary" >
                        </div>
                        <?php echo $msg;?>
                    </div>
                </form>
            </div>
        </div>
    </div>
	
	
  
</body>
</html>