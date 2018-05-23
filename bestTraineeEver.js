'use strict'
$(function() {


$('#userForm .btn').click(function(e){
	e.preventDefault();

	var $data;

	$data = $(this).parent('form').serializeArray();

	$.ajax({
		url: $(this).parent('form').attr('action'),
		type: 'POST',
		data: $data,
		 success: function(result) {
		 	$('#form_result').html(result);
		 }	
	})

	});

});




