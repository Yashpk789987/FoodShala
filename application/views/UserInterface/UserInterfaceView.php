<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>User</title>
	<script src='/assets/jquery-2.2.1.min.js'></script>
	<script src='/assets/popper.js'></script>
	<script src='/assets/bootstrap.min.js'></script>
	<script src='/assets/userInterface.js'></script>
  <link rel="stylesheet" href="/assets/bootstrap.min.css" >
</head>
<body>

  <div  class="navbar navbar-expand-sm bg-dark fixed-top navbar-dark">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item active">
				<a class="nav-link" >Search Food </a>
			</li>
		
			
		</ul>
		<ul class="navbar-nav">
		    <li>
						<div class="btn-nav" ><a id = 'sign_up_button' class="nav-link" href="">Signup </a>
						</div>
				</li>
				<li>
						<div class="btn-nav"  ><a id = 'login_button' class="nav-link" href="">Login </a>
						</div>
				</li>
				<li>
						<div class="btn-nav"  ><a id = 'cart_button' class="nav-link" href="">My Cart </a>
						</div>
				</li>
		</ul>
  </div>

  
  

	<form id = 'test'>
  <div class ="container" style = "padding-top : 8%">
	  <div class = 'row'>
			<div class = 'col'>
				<div class="form-group">
					<label for=""><b>Search Food Item</b></label>
					<input class="form-control" value = '' id = 'search' type="text" placeholder="Search" aria-label="Search">
				</div>
			</div>
			<div class = 'col'>
				<div class ='row'>
					<div class = 'col'>
				  	<label for=""><b>Price Ranges : </b>From</label>
						<input class="form-control" value = '' id = 'from' type="number" placeholder="From" aria-label="Search">
					</div>
          <div class = 'col'>
					  <label for="">To</label>
						<input class="form-control" value = '' id = 'to' type="number" placeholder="To" aria-label="Search">
					</div>
        </div>	
			</div>
			
			<div class = 'col'>
				<div class = 'row'></div>
				<div class ='row'>
				
					<div class = 'col'>
						<br/>
						<br/>
				  	<label for="">ALL : </label>
						<input  id = 'all' name = 'type' checked value = 'all' type="radio"  >
					</div>
          <div class = 'col'>
						<br/>
						<br/>
					  <label for="">Veg</label>
						<input   id = 'veg' name = 'type' value = 'VEG' type="radio"  >
					</div>
					<div class = 'col'>
						<br/>
						<br/>
					  <label for="">Non Veg</label>
						<input id = 'non_veg' name = 'type' value = 'NONVEG' type="radio" >
					</div>
				</div>
        
			</div>
		
		</div>
		
		<br>
		<center>
			<div id= 'loader' class=""   role="status">
				
			</div>
		</center>	

		<br/>
		<div id = 'root'>
		  
		</div>
		<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id = 'modal_body' class="modal-body">
		
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
	</div>
</form>
</body>
</html>