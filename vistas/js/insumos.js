/*Data Table*/
$(".tablaInsumos").DataTable({
	"responsive":true,
	"language": {

		"sProcessing":     "Procesando...",
		"sLengthMenu":     "Mostrar _MENU_ registros",
		"sZeroRecords":    "No se encontraron resultados",
		"sEmptyTable":     "Ningún dato disponible en esta tabla",
		"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
		"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
		"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
		"sInfoPostFix":    "",
		"sSearch":         "Buscar:",
		"sUrl":            "",
		"sInfoThousands":  ",",
		"sLoadingRecords": "Cargando...",
		"oPaginate": {
		"sFirst":    "Primero",
		"sLast":     "Último",
		"sNext":     "Siguiente",
		"sPrevious": "Anterior"
		},
		"oAria": {
			"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
			"sSortDescending": ": Activar para ordenar la columna de manera descendente"
		}

	}
});

// Editar Insumo

$(document).on('click', '.btnEditarInsumo', function(event) {
	var idInsumo = $(this).attr('idInsumo');
	
	var data = new FormData();
	data.append('idEditarInsumo',idInsumo);
	
	$.ajax({
		url:"ajax/insumos.ajax.php",
		method:"POST",
		data: data,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(reply){
			console.log("reply", reply);
			$("#idInsumo").val(reply["id_insumo"]);
			$("#editarDescripcionInsumo").val(reply["descripcion"]);
			$("#editarUnidad").val(reply["unidad"]);
			$("#editarCantidad").val(reply["cant_unidad"]);
		}
	});

});

// Eliminar Insumo
$(document).on('click', '.btnEliminarInsumo', function(event) {

	var idInsumo = $(this).attr('idInsumo');
	
	Swal.fire({
		type: 'warning',
		title: 'Estas seguro de eliminar al insumo?',
		text:'Puedes cancelar, usando el boton Cancelar',
		showCancelButton:true,
		confirmButtonColor:'#3085d6',
		cancelButtonColor:'d33',
		cancelButtonText:'Cancelar',
		confirmButtonText: 'Si, eliminar insumo!',
	}).then(function(result){

		if(result.value){

			window.location = "index.php?ruta=insumos&idInsumoEliminar="+idInsumo;

		}

	});
});