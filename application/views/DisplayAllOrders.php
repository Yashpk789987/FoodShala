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
    <li class="nav-item">
      <a class="nav-link" href="showEditDelete">Edit Menu </a>
    </li>
    <li class="nav-item active">
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
  <div class = "container" style = "padding-top : 8%" >
    <table class="table table-bordered table-dark">
      <thead>
        <tr>
          <th scope="col">S.No.</th>
          <th scope="col">Customer Name </th>
          <th scope="col">Customer Contact</th>
          <th scope="col">Food Items</th> 
          <th scope="col">Total Price</th> 
          <th scope="col">Date/Time</th> 
        </tr>
      </thead>
      <tbody>
      <?php
      $orders = $orders_food[0];
      $food_items = $orders_food[1];
      $temp_index = 1;
      foreach($orders as $row){
        echo "
          <tr>
              <th scope='row'>$temp_index</th>
              <td>$row->uname</td>
              <td><b>Mobile No : </b>$row->umobile<br><b>Email : </b>$row->uemail</td><td>";
          foreach($food_items[$temp_index] as $food_row){
                echo "Food Name : ".$food_row->foodname."&nbsp;&nbsp;&nbsp;";
                echo "Price : ".$food_row->price;
                echo "<br>";
          }    
        echo  "</td><td>₹&nbsp;&nbsp;$row->total_price</td>";
        echo  "</td><td>Date : <b>$row->date</b><br>Time : <b>$row->time</b></td></tr>";
        $temp_index++;
      }
      

      ?>
     </tbody>
    </table>
  </div>
</body>
</html>