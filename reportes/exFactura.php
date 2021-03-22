<?php
//Activamos el almacenamiento en el buffer
ob_start();

//Incluímos el archivo Factura.php
require('reportes/Factura.php');

//Establecemos los datos de la empresa
$logo = "reportes/logo2.jpg";
$ext_logo = "jpg";
$empresa = "Botica Goliat";
$documento = "20477157762";
$direccion = "Av Los laureles  N°1714 Lima Este";
$telefono = "999496738/994730086";
$email = "boticagoliat@gmail.com";

// Acá :v (Los datos vienen de VentaController.php)
$rege = $encabezado->fetch_object();

//Establecemos la configuración de la factura
$pdf = new PDF_Invoice( 'P', 'mm', 'A4' );
$pdf->AddPage();

//Enviamos los datos de la empresa al método addSociete de la clase Factura
$pdf->addSociete(utf8_decode($empresa),
                  $documento."\n" .
                  utf8_decode("Dirección: ").utf8_decode($direccion)."\n".
                  utf8_decode("Teléfono: ").$telefono."\n" .
                  "Email : ".$email,$logo,$ext_logo);
$pdf->fact_dev( "BOLETA ", "1-$rege->num_venta" );
$pdf->temporaire( "" );
$pdf->addDate( $rege->fecha_venta);

//Enviamos los datos del cliente al método addClientAdresse de la clase Factura
$pdf->addClientAdresse(utf8_decode($rege->nombre_cli." ".$rege->apellido_cli),"Domicilio: ".utf8_decode($rege->direccion),"DNI: ".$rege->dni_cli,"Email: - ","Telefono: ".$rege->celular);


//Establecemos las columnas que va a tener la sección donde mostramos los detalles de la venta
$cols=array( "CODIGO"=>23,
             "DESCRIPCION"=>78,
             "CANTIDAD"=>22,
             "P.U."=>25,
             "DSCTO"=>20,
             "SUBTOTAL"=>22);
$pdf->addCols( $cols);
$cols=array( "CODIGO"=>"L",
             "DESCRIPCION"=>"L",
             "CANTIDAD"=>"C",
             "P.U."=>"R",
             "DSCTO" =>"R",
             "SUBTOTAL"=>"C");
$pdf->addLineFormat( $cols);
$pdf->addLineFormat($cols);
//Actualizamos el valor de la coordenada "y", que será la ubicación desde donde empezaremos a mostrar los datos
$y= 89;

//Obtenemos todos los detalles de la venta actual (esta en el VentaController.php)

while ($regd = $detalle->fetch_object()) {
  $line = array( "CODIGO"=> "$regd->num_pro",
                "DESCRIPCION"=> utf8_decode("$regd->descripcion_pro"),
                "CANTIDAD"=> "$regd->cantidad",
                "P.U."=> "$regd->precio",
                "DSCTO" => "0",
                "SUBTOTAL"=> "$regd->subtotal");
            $size = $pdf->addLine( $y, $line );
            $y   += $size + 2;
}

//Convertimos el total en letras
require_once "reportes/Letras.php";
$V=new EnLetras(); 
$con_letra=strtoupper($V->ValorEnLetras($rege->total_venta,"NUEVOS SOLES"));
$pdf->addCadreTVAs("---".$con_letra);

//Mostramos el impuesto
$pdf->addTVAs( $rege->igv_venta, $rege->total_venta,"S/ ");
$pdf->addCadreEurosFrancs("IGV"." $rege->igv_venta %");
$pdf->Output('Reporte de Venta','I');


ob_end_flush();
?>