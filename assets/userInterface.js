var makeFoodTable = data => {
	let innerHtml = `<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">s.no.</th>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col">Restaurant </th>
      <th scope="col">Type</th>
      <th scope="col">Add To Cart</th>
    </tr>
  </thead>
  <tbody>
	`;
	let cart = localStorage.getItem('cart');
	if (cart !== null) {
		cart = JSON.parse(cart);
	} else {
		cart = [];
	}
	$.each(data, (i, item) => {
		innerHtml += `<tr>
                    <th scope="row">${i + 1}</th>
                    <td>${item.foodname}</td>
                    <td>₹&nbsp;&nbsp;${item.price}</td>
                    <td>${item.rname}</td>
										<td>${item.type}</td>`;
		if (cart.includes(parseInt(item.foodid))) {
			innerHtml += `<td><button onclick='event.preventDefault();' class = 'remove_from_cart btn btn-danger' food_id = '${item.foodid}' value = '${item.foodid}' >Remove From  Cart</button></td> `;
		} else {
			innerHtml += `<td><button onclick='event.preventDefault();' class = 'add_to_cart btn btn-success' food_id = '${item.foodid}' value = '${item.foodid}' >Add To Cart</button></td> `;
		}

		innerHtml += `	</tr>`;
	});
	innerHtml =
		innerHtml +
		`</tbody>
  </table>`;
	return innerHtml;
};

var searchData = sendData => {
	$('#loader').addClass('spinner-border text-primary');
	$.getJSON(
		'/index.php/UserInterfaceCtrl/getAllFoodsByName',
		sendData,
		data => {
			$('#root').html(makeFoodTable(data));
			$('#loader').removeClass('spinner-border text-primary');
		}
	);
};

var signupHtml = () => {
	let innerHtml = `	
		<div class="container">
		
		<p class="card-text"><b>Please fill your details here</b></p>
		<div class="form-group">
				<label for="formGroupExampleInput">Your Name </label>
				<input type="text" class = "form-control" id = 'name' name="name" placeholder="Enter  Name">
		</div>
		<div class="form-group">
			<label for="formGroupExampleInput">Mobile Number </label>
			<input type="text" class = "form-control" id = 'mobile' name="mobile" placeholder="Enter Mobile NUmber ">
		</div>
		<div class="form-group">
			<label for="formGroupExampleInput">Email : </label>
			<input type="email" class = "form-control" id = 'email' name="email" placeholder="Enter Mail">
		</div>
		<div class="form-group">
			<label for="formGroupExampleInput">Password : </label>
			<input type="password" class = "form-control" id = 'password' name="password" placeholder="Enter Password">
		</div>
		<div class="form-group">
			<button  id = 'sign_up_submit' style = "width : 100%" class="btn btn-primary" > Submit </button>
		</div>
        <div class="form-group">
			<label id = 'sign_up_msg' style = 'color:red' ></label>
		</div>
		
	</div>
	`;
	return innerHtml;
};

var makeOrderLayout = data => {
	let totalPrice = 0;
	let innerHtml = `<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">s.no.</th>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col">Restaurant </th>
      <th scope="col">Type</th>
    </tr>
  </thead>
	<tbody>
	`;
	$.each(data, (i, item) => {
		totalPrice = totalPrice + parseInt(item.price);
		innerHtml += `<tr>`;
		innerHtml += `
			<th scope="row">${i + 1}</th>
			<td>${item.foodname}</td>
			<td>${item.price}</td>
			<td>${item.rname}</td>
			<td>${item.type}</td> `;
		innerHtml += `</tr></tbody>`;
	});
	innerHtml += `</table>`;
	innerHtml += `<center><b>Total Price:</b>&nbsp;&nbsp;&nbsp;${totalPrice}</center>`;
	innerHtml += `<br/><button class = 'btn btn-primary' value = '${totalPrice}' id = 'place_order_button' style = 'width : 100%'>Place Order</button>`;
	innerHtml += `<div class="form-group" >
	<label for="formGroupExampleInput" style = 'color:red' id = 'msg'></label>
	</div>`;
	return innerHtml;
};

var loginHtml = () => {
	let innerHtml = `	
		<div class="container">
		
		<p class="card-text"><b>Login Details</b></p>
		<div class="form-group">
			<label for="formGroupExampleInput">Email / Mobile : </label>
			<input type="text" class = "form-control" id = 'email' name="email" placeholder="Enter Mail / Mobile">
		</div>
		<div class="form-group">
			<label for="formGroupExampleInput">Password : </label>
			<input type="password" class = "form-control" id = 'password' name="password" placeholder="Enter Password">
		</div>
		<div class="form-group">
			<button  id = 'log_in_submit' style = "width : 100%" class="btn btn-primary" > Submit </button>
		</div>
        <div class="form-group">
			<button  id = 'do_sign_up' style = "width : 100%" class="btn btn-primary" > New Customer ? Sign Up </button>
		</div>
		<div class="form-group" >
		   <label for="formGroupExampleInput" style = 'color:red' id = 'msg'></label>
		</div>
		
	</div>
	`;
	return innerHtml;
};

var placeOrder = (cart, user) => {
	let sendData = {
		user_id: JSON.parse(user)._id,
		total_price: $('#place_order_button').val(),
		food_ids: makeFoodIdString(cart)
	};

	$.getJSON(
		'/index.php/UserInterfaceCtrl/placeOrder',
		sendData,
		data => {
			if (data.code == 'success') {
				$('#modal_body').html(
					`<center><img src = '/images/order_success.gif' />
					<br><b style = 'color : green'>Order Placed ... </b><br>
					<button class = 'btn btn-primary' id = 'ok_button' style = 'width : 100%'>OK</button>
					</center>`
				);
				window.name = '';
				localStorage.setItem('cart', JSON.stringify([]));
				//location.reload();
			} else if (data.code == 'failed') {
				$('#msg').html(data.msg);
			}
		}
	);
};

makeLogin = () => {
    $('#msg').html('');
	let sendData = {
		email: $('#email').val(),
		password: $('#password').val()
	};

    if($('#email').val() == '' || $('#password').val() == '' ){
        $('#msg').html('please fill all fields....');
    }else{

	$.getJSON(
		'/index.php/UserInterfaceCtrl/checklogin',
		sendData,
		data => {
			if (data.length === 0) {
				$('#msg').html('Invalid Details...');
			} else {
				if (localStorage.getItem('user') === null) {
					localStorage.setItem('user', JSON.stringify(data[0]));
				}
				$('#modal').modal('toggle');
				if ($('#modal_body').find('#place_order').length === 1) {
					window.name = 'order_placed';
				} else {
					window.name = '';
				}
				location.reload();
			}
		}
	);
    }
};

var reload = () => {
	var form = document.getElementById('test');
	let sendData = {
		from: $('#from').val() != '' ? parseInt($('#from').val()) : 0,
		to: $('#to').val() != '' ? parseInt($('#to').val()) : 10000,
		fname: $('#search').val(),
		type: form.elements['type'].value
	};
	searchData(sendData);
};

var makeFoodIdString = cart => {
	food_ids_string = '';
	cart = JSON.parse(cart);
	food_ids_string += `(${cart[0]}`;
	for (let i = 1; i < cart.length; i++) {
		food_ids_string += `,${cart[i]}`;
	}
	food_ids_string += `)`;
	return food_ids_string;
};

$(document).ready(() => {
	$('#loader').addClass('spinner-border text-primary');
	$.getJSON('/index.php/UserInterfaceCtrl/getAllFoods', data => {
		$('#root').html(makeFoodTable(data));
		$('#loader').removeClass('spinner-border text-primary');
	});

	if (localStorage.getItem('cart') !== null) {
		$('#cart_button').html(
			'My Cart ' + JSON.parse(localStorage.getItem('cart')).length
		);
	}

	if (window.name === 'order_placed') {
		let cart = localStorage.getItem('cart');
		let user = localStorage.getItem('user');
		let food_ids_string = ``;
		if (cart == null) {
			cart = [];
		} else {
			food_ids_string = makeFoodIdString(cart);
			$.getJSON(
				'/index.php/UserInterfaceCtrl/getAllFoodsByIDS',
				{ food_ids_string: food_ids_string },
				data => {
					$('#modal_body').html(makeOrderLayout(data));
					$('#modal').modal('toggle');
				}
			);
		}
	}

	$('#root').on('click', '.add_to_cart', function() {
		let food_id = $(this).attr('food_id');
		let cart = localStorage.getItem('cart');
		if (cart == null) {
			let cart_array = [];
			cart_array.push(parseInt(food_id));
			localStorage.setItem('cart', JSON.stringify(cart_array));
		} else {
			let cart_array = JSON.parse(cart);
			cart_array.push(parseInt(food_id));
			localStorage.setItem('cart', JSON.stringify(cart_array));
		}
		reload();
		$('#cart_button').html(
			'My Cart ' + JSON.parse(localStorage.getItem('cart')).length
		);
	});

	$('#root').on('click', '.remove_from_cart', function() {
		let food_id = $(this).attr('food_id');
		let cart = localStorage.getItem('cart');
		if (cart == null) {
			let cart_array = [];
			cart_array.splice(cart_array.indexOf(parseInt(food_id)), 1);
			localStorage.setItem('cart', JSON.stringify(cart_array));
		} else {
			let cart_array = JSON.parse(cart);
			cart_array.splice(cart_array.indexOf(parseInt(food_id)), 1);
			localStorage.setItem('cart', JSON.stringify(cart_array));
		}
		reload();
		$('#cart_button').html(
			'My Cart ' + JSON.parse(localStorage.getItem('cart')).length
		);
	});

	$('#modal_body').on('click', '#sign_up_submit', e => {
        $('#sign_up_msg').html('');
		e.preventDefault();
		let sendData = {
			name: $('#name').val(),
			mobile: $('#mobile').val(),
			email: $('#email').val(),
			password: $('#password').val()
		};

        if($('#name').val() == '' || $('#mobile').val() == '' || $('#email').val() == '' || $('#password').val() == ''){
            $('#sign_up_msg').html('please fill all fields..');
        }else{
            $.getJSON(
			'/index.php/UserInterfaceCtrl/signup',
			sendData,
			data => {
				if (data.code == 'success') {
	                localStorage.setItem(
                        'user',
                        JSON.stringify({ ...sendData, _id: data._id })
                    );
					$('#modal').modal('toggle');
                    if ($('#modal_body').find('#place_order').length === 1) {
					  window.name = 'order_placed';
				    }else{
					  window.name = '';
				    }
					location.reload();
				}
			}
		    );
        }
	});

    $('#modal_body').on('click','#do_sign_up',(e) => {
        e.preventDefault();
		$('#modal_body').html(signupHtml() + `<b id = 'place_order' style = 'color : red'>Please Login To Place Order </b>`);
    })

	$('#modal_body').on('click', '#place_order_button', e => {
		e.preventDefault();
		let cart = localStorage.getItem('cart');
		let user = localStorage.getItem('user');
		if (user == null) {
			$('#modal_body').html(
				loginHtml() +
					`<b id = 'place_order' style = 'color : red'>Please Login To Place Order </b>`
			);
		} else {
			placeOrder(cart, user);
		}
	});

	$('#modal_body').on('click', '#ok_button', e => {
		e.preventDefault();
		$('#modal').modal('toggle');
        location.reload();
	});

	$('#modal_body').on('click', '#log_in_submit', e => {
		e.preventDefault();
		makeLogin();
	});

	$('#login_button').click((e) => {
        e.preventDefault();
		$('#modal_body').html(loginHtml());
		$('#modal').modal('toggle');
	});

	$('#sign_up_button').click((e) => {
        e.preventDefault();
		$('#modal_body').html(signupHtml());
		$('#modal').modal('toggle');
	});

	$('#logout_button').click(() => {
		localStorage.removeItem('user');
		$.getJSON('/index.php/UserInterfaceCtrl/logout', data => {
			//location.reload();
            window.location.replace('http://foodshala.unaux.com/');
		});
	});

	$('#search').keyup(function() {
        console.log();
		var form = document.getElementById('test');
		let sendData = {
			from: $('#from').val() != '' ? parseInt($('#from').val()) : 0,
			to: $('#to').val() != '' ? parseInt($('#to').val()) : 10000,
			fname: $('#search').val(),
			type: form.elements['type'].value
		};
		searchData(sendData);
	});

	$('#cart_button').click((e) => {
        e.preventDefault();
		let cart = localStorage.getItem('cart');
		let food_ids_string = ``;
		if (cart == null) {
			cart = [];
		} else {
			food_ids_string = makeFoodIdString(cart);
			$.getJSON(
				'/index.php/UserInterfaceCtrl/getAllFoodsByIDS',
				{ food_ids_string: food_ids_string },
				data => {
					$('#modal_body').html(makeOrderLayout(data));
					$('#modal').modal('toggle');
				}
			);
		}
	});

	$('#from').keyup(() => {
		var form = document.getElementById('test');
		let sendData = {
			from: $('#from').val() != '' ? parseInt($('#from').val()) : 0,
			to: $('#to').val() != '' ? parseInt($('#to').val()) : 10000,
			fname: $('#search').val(),
			type: form.elements['type'].value
		};
		searchData(sendData);
	});

	$('#to').keyup(() => {
		var form = document.getElementById('test');
		let sendData = {
			from: $('#from').val() != '' ? parseInt($('#from').val()) : 0,
			to: $('#to').val() != '' ? parseInt($('#to').val()) : 10000,
			fname: $('#search').val(),
			type: form.elements['type'].value
		};
		searchData(sendData);
	});

	$('#all').change(() => {
		var form = document.getElementById('test');
		let sendData = {
			from: $('#from').val() != '' ? parseInt($('#from').val()) : 0,
			to: $('#to').val() != '' ? parseInt($('#to').val()) : 10000,
			fname: $('#search').val(),
			type: form.elements['type'].value
		};
		searchData(sendData);
	});

	$('#veg').change(() => {
		var form = document.getElementById('test');
		let sendData = {
			from: $('#from').val() != '' ? parseInt($('#from').val()) : 0,
			to: $('#to').val() != '' ? parseInt($('#to').val()) : 10000,
			fname: $('#search').val(),
			type: form.elements['type'].value
		};
		searchData(sendData);
	});

	$('#non_veg').change(() => {
		var form = document.getElementById('test');
		let sendData = {
			from: $('#from').val() != '' ? parseInt($('#from').val()) : 0,
			to: $('#to').val() != '' ? parseInt($('#to').val()) : 10000,
			fname: $('#search').val(),
			type: form.elements['type'].value
		};
		searchData(sendData);
	});
});
