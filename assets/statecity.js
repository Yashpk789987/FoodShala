$(document).ready(function() {
	$.getJSON(
		'/foodorder/index.php/StateCityController/getAllStates',
		{ ajax: true },
		function(data) {
			$('#state').empty();
			$('#state').append($('<option>').text('-States-'));
			$('#city').append($('<option>').text('-City-'));

			$.each(data, function(i, item) {
				$('#state').append(
					$('<option>')
						.text(item.statename)
						.val(item.stateid)
				);
			});
		}
	);

	$('#state').change(function() {
		$.getJSON(
			'/foodorder/index.php/StateCityController/getAllCities',
			{ Cstate: $('#state').val() },
			function(data) {
				$('#city').empty();
				$('#city').append($('<option>').text('-City-'));

				$.each(data, function(i, item) {
					$('#city').append(
						$('<option>')
							.text(item.cityname)
							.val(item.cityid)
					);
				});
			}
		);
	});
});
