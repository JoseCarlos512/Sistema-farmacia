var tabla;

function init(){
	listarArticulos();

	$("#calcular_vuelto").on('click', function(evento){
		calcularvuelto(evento);
	});
	
	$("#formulario").on("submit",function(e)
	{
		guardaryeditar(e);	
	});

	//Cargamos los items al select cliente
	$.post("/farmacia/controllers/ProductoController.php?op=selectCliente", function(r){
		$("#idcliente").html(r);
		$('#idcliente').selectpicker('refresh');
	});
	limpiar();
}

function calcularvuelto(evento){
	evento.preventDefault();
	var efectivo = $("#efectivo_venta").val();
	var total = $("#total_venta").val();

	var vuelto = efectivo-total;
	vuelto = vuelto.toFixed(2);
	$("#vuelto_venta").val(vuelto);
}


//Función para guardar o editar
function guardaryeditar(e)
{
	
	e.preventDefault(); //No se activará la acción predeterminada del evento
	//$("#btnGuardar").prop("disabled",true);
	
	var formData = new FormData($("#formulario")[0]);

	$.ajax({
		url: "../../../farmacia/controllers/ProductoController.php?op=guardaryeditar",
	    type: "POST",
	    data: formData,
	    contentType: false,
	    processData: false,

	    success: function(datos)
	    {                    
			
	          alert("Venta registrada");
	          window.open("http://localhost/farmacia/Venta/generarBoleta&id='"+datos+"'", "Boleta de venta", "width=800, height=800");	          
	          
	    }

	});
	limpiar();
	
}


//Función ListarArticulos
function listarArticulos()
{
	tabla=$('#tabla_venta_modal').dataTable(
	{
		"aProcessing": true,//Activamos el procesamiento del datatables
	    "aServerSide": true,//Paginación y filtrado realizados por el servidor
	    dom: 'Bfrtip',//Definimos los elementos del control de tabla
	    buttons: [		          
		            
		        ],
		"ajax":
				{
					url: "/farmacia/controllers/ProductoController.php?op=listarArticulosVenta",
					type : "get",
					dataType : "json",						
					error: function(e){
						console.log(e.responseText);	
					}
				},
		"bDestroy": true,
		"iDisplayLength": 5,//Paginación
	    "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
	}).DataTable();

}

var cont = 0;
var detalles=0;
var impuesto=18;
function agregarDetalle(idproducto,producto,precio_venta)
  {
  	var cantidad=1;
    var descuento=0;

	
    if (idproducto!="")
    {
    	var subtotal=cantidad*precio_venta;
    	var fila='<tr class="filas" id="fila'+cont+'">'+
    	'<td><button type="button" class="btn btn-danger" onclick="eliminarDetalle('+cont+')">X</button></td>'+
    	'<td><input type="text" readonly name="idproducto[]" value="'+idproducto+'"></td>'+
    	'<td><input type="text" readonly name="producto[]" value="'+producto+'"></td>'+
    	'<td><input type="number" onchange="modificarSubototales()" name="cantidad[]" id="cantidad[]" value="'+cantidad+'"></td>'+
    	'<td><input type="number"  name="precio_venta[]" id="precio_venta[]" value="'+precio_venta+'"></td>'+
    	'<td><span name="subtotal" id="subtotal'+cont+'">'+subtotal+'</span></td>'+
    	'<td><button type="button" onclick="modificarSubototales()" class="btn btn-info"><i class="fas fa-sync-alt"></i></button></td>'+
    	'</tr>';
    	cont++;
    	detalles=detalles+1;
    	$('#tabla_venta').append(fila);
    	modificarSubototales();
    }
    else
    {
    	alert("Error al ingresar el detalle, revisar los datos del artículo");
    }
  }

  //Función limpiar
function limpiar()
{
	$("#idcliente").val("");
	$("#cliente").val("");
	$("#num_comprobante").val("000");
	$("#impuesto").val("18");

	$("#total_venta").val("");
	$(".filas").remove();
	$("#total").html("0");

	$("#igv_venta").val("");
	$("#igv_calculado").html("0");

	//Obtenemos la fecha actual
	var now = new Date();
	var day = ("0" + now.getDate()).slice(-2);
	var month = ("0" + (now.getMonth() + 1)).slice(-2);
	var today = now.getFullYear()+"-"+(month)+"-"+(day) ;
    $('#fecha_hora').val(today);

    //Marcamos el primer tipo_documento
    $("#tipo_comprobante").val("Boleta");
	$("#tipo_comprobante").selectpicker('refresh');
}



function modificarSubototales(){

	var cant = document.getElementsByName("cantidad[]");
	var prec = document.getElementsByName("precio_venta[]");
	var sub = document.getElementsByName("subtotal");

	for (var i = 0; i <cant.length; i++) {
		var inpC=cant[i];
		var inpP=prec[i];
		var inpS=sub[i];

		inpS.value=(inpC.value * inpP.value);
		document.getElementsByName("subtotal")[i].innerHTML = inpS.value;
	}
	calcularTotales();

	}
function calcularTotales(){

	var sub = document.getElementsByName("subtotal");
	var sub_total = 0.0;

	for (var i = 0; i <sub.length; i++) {
		sub_total += document.getElementsByName("subtotal")[i].value;
	}

	var igv = $("#impuesto").val();
	var igvc = (sub_total*igv/100);

	total_mas_igv = sub_total+igvc;

	$("#subtotal_calculado").html("S/. " + sub_total);
	$("#subtotal_venta").val(sub_total);

	$("#igv_calculado").html("S/. " + igvc);
	$("#igv_venta").val(igvc);

	$("#total").html("S/. " + total_mas_igv);
	$("#total_venta").val(total_mas_igv);
	evaluar();
}

function evaluar(){
	if (detalles>0)
	{
	  //$("#btnGuardar").show();
	}
	else
	{
	  //$("#btnGuardar").hide(); 
	  cont=0;
	}
}

 function eliminarDetalle(indice){
  	$("#fila" + indice).remove();
  	calcularTotales();
  	detalles=detalles-1;
  	evaluar()
 }


$("#btnAgregarArt").onClick = init();

