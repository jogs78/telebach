$("#deg").change(event => {
	$.get(`c/${event.target.value}`, function(res,deg){
		$("#matter").empty();
		res.forEach(element => {
			$("#matter").append(`<option value=${element.id}> ${element.name} </option>`);
		});
	});
});