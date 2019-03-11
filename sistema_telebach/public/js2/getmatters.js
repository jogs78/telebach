$("#carrera").change(event => {
	$.get(`obtener-materias/${event.target.value}`, function(res, car){
		$("#materia").empty();
		res.forEach(element => {
			$("#materia").append(`<option value=${element.id}> ${element.name} </option>`);
		});
	});
});