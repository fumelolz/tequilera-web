/*Data Table*/
$(".tablas").DataTable({
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

// Obtener medianta ajax ventas por mes

meses = ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Noviembre','Diciembre'];
datos = [];

var data = new FormData();
data.append('ventasPorMes',1);

$.ajax({
    url:"ajax/ventas.ajax.php",
    method:"POST",
    data: data,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(reply){

        for (var i = 0; i < reply.length; i++) {
            datos[i] = reply[i]["total"]
        }

        // Chartjs
        var ctx = $('#myChart');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: meses,
                datasets: [{
                    label: 'Total de dinero vendido este mes',
                    data: datos,
                    borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 3,
                    fill: false
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: false,
                        }
                    }]
                }
            }
        });
    }
});

// 10 productos más vendidos

// Obtener medianta ajax ventas por mes

nombres = [];
productos = [];

var data = new FormData();
data.append('productosVendidos',1);

$.ajax({
    url:"ajax/ventas.ajax.php",
    method:"POST",
    data: data,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function(reply){

        for (var i = 0; i < reply.length; i++) {

            var data2 = new FormData();
            data2.append('idProductoEditar',reply[i]["id_producto"]);

            $.ajax({
                url:"ajax/productos.ajax.php",
                method:"POST",
                data: data2,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function(reply2){
                    nombres.push(reply2[1]);
                    // Chartjs
                    var ctx = $('#productosMasVendidos');
                    var myChart = new Chart(ctx, {
                        type: 'doughnut',
                        data: {
                            labels: nombres,
                            datasets: [{
                                label: 'total de productos',
                                data: productos,
                                borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)'
                                ],
                                backgroundColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)'
                                ],
                                borderWidth: 3
                            }]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: false,
                                    }
                                }]
                            }
                        }
                    });
                }
            });

            productos[i] = reply[i]["total_salida"]
        }

    }
});


