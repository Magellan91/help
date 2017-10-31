$('#invoicing-invoicing_info-summ').change(function(){
		var row=$(this).val();
		$.post('/bpm/invoicing',{kost:row}).done(function(text){
			var temp=JSON.parse(text);
			$('#invoicing-invoicing_info-summ-utf').val(temp);
			console.log(temp);
		});

	});