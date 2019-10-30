$(document).ready(() => {
	let fid = null;
	let temp_event = null;
	$('.edit').click(e => {
		$('#loader').addClass('spinner-border text-primary');
		fid = e.target.attributes.foodid.value;
		$.getJSON(
			'/index.php/RestaurantsCtrl/foodEditDelete',
			{ fid: fid },
			data => {
				$('#price').val(data.price);
				$('#loader').removeClass('spinner-border text-primary');
			}
		);
	});

	$('#updateButton').click(() => {
        $('#msg').html('');
        if($('#price').val() == '' || parseInt($('#price').val()) <= 0){
            $('#msg').html(`<b style = 'color:red' >Price Must Be Greater than zero </b>`);
        }else{
            $('#loader').addClass('spinner-border text-primary');
            $.getJSON(
                '/index.php/RestaurantsCtrl/foodEditById',
                { fid: fid, price: $('#price').val() },
                data => {
                    $('#price').val(data.price);
                    $('#loader').removeClass('spinner-border text-primary');
                    location.reload();
                }
            );
        }
	});

	$('.delete').click(e => {
		fid = e.target.attributes.foodid.value;
		temp_event = e;
		e.preventDefault();
	});

	$('#yes_button').click(() => {
		window.location.href = `/index.php/RestaurantsCtrl/deleteFoodItem?fid=${fid}`;
	});
});
