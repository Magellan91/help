
	$(function(){
		var availableTags=  <?php echo json_encode($doc); ?>;
		$("#invoicing-invoicing_info-namber_contract").autocomplete({
			source:availableTags
		});
	});
	//Где док это массив с комплитом