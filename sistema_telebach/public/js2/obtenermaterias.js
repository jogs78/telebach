$("#carre").change(event => {
	$.get(`get-matters/${event.target.value}`, function(res, car){
		$("#mate").empty();
		res.forEach(element => {
			$("#mate").append(`<option value=${element.id}> ${element.name} </option>`);
		});
	});
});