$(document).on('click', '.btnImprimir', function(event) {

	idTransInsumo = $(this).attr('idTransInsumo');
	console.log("idTransInsumo", idTransInsumo);
	
	window.open("extensiones/pdf/index.php","_blank");

});