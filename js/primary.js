function selectCity(city_id)
{
document.getElementById('frm').submit();
}

$(document).ready(function() {
	
	$('#search').keyup(function() {

		var search = $(this).val();
		var city_id = $('#city_id').val();
		$.post("ajax.php",
        {
        search: search,
        city_id: city_id
        },
        function (data) {
        	$('.result').html(data);

        	$('.result li').click(function() {
        		var result_value = $(this).text();
        		$('#search').val(result_value);
        		$('.result').html('');
        	});
        });
	});
});