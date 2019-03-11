$("#deg").change(event => {
	$.get(`c/${event.target.value}`, function(res,deg){
		$("#mat").empty();
		res.forEach(element => {
			$("#mat").append(`<option value=${element.id}> ${element.nombre} </option>`);
		});
	});
});






