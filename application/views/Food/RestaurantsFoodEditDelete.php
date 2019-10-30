<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Restaurant</title>
  <script src='/assets/jquery-2.2.1.min.js'></script>
    
    <script src='/assets/popper.js'></script>
    <script src='/assets/bootstrap.min.js'></script>
    <link rel="stylesheet" href="/assets/bootstrap.min.css" >
</head>
<body>
  
<div class="navbar navbar-expand-sm bg-dark fixed-top navbar-dark">
  <a class="navbar-brand" style = "color : white" ><?php echo $_SESSION['restaurant']['rname'] ?></a>
  <ul class="navbar-nav mr-auto">
    <li class="nav-item ">
      <a class="nav-link" href="showMenu" >Menu </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="addFoodItem">Add  Food Item </a>
    </li>
    <li class="nav-item active">
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
  <div class = "container" style = 'padding-top:8%'>
    <table class="table table-bordered table-dark">
      <thead>
        <tr>
          <th scope="col">S.No.</th>
          <th scope="col">Name</th>
          <th scope="col">Price</th>
          <th scope="col">Type</th>
          <th scope="col">Edit Price </th>
          <th scope="col">Delete</th>
        </tr>
      </thead>
      <tbody>
      <?php
      $sn=1;
      foreach($foods as $row)
      {
      echo "<tr>
              <th scope='row'>$sn</th>
              <td>$row->foodname</td>
              <td>$row->price</td>
              <td>$row->type</td>
              <td><a      style = 'width:70%' ><button type='button'  class='edit btn btn-warning' foodid = '$row->foodid' data-toggle='modal' data-target='#exampleModalCenter1'>
                 Edit Price
            </button></a></td>
              <td><a href = 'deleteFoodItem?fid=$row->foodid'  style = 'width:50%'><button type='button' foodid = '$row->foodid' class = 'btn btn-danger'   data-toggle='modal' data-target='#exampleModalCenter2'>
              Delete
         </button></a></td>
          </tr>";
          $sn++;
      }

      ?>
     </tbody>
    </table>
  </div>
  
  <div class="modal fade"  id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Price </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="" id = 'loader' role="status">
        <span class="sr-only">Loading...</span>
      </div>
      <div class="form-group">
          <label for="formGroupExampleInput">Price </label>
          <input type="text" class = "form-control" id="price" placeholder="Enter Food Price">
          <label id = 'msg'></label>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id = 'updateButton' >Save changes</button>
      </div>
    </div>
  </div>
  
</div>
</body>
<script src='/assets/foodedit.js'></script>
</html>