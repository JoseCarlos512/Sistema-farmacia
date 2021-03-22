<?php 
require_once 'models/venta.php';

class VentaController{

	public function registrar_venta(){
		
		require_once 'views/venta/registroVenta.php';

	}

	public function visualizarVenta(){
		if($_GET['id']){

			$id_venta = $_GET['id'];
			$venta = new Venta();
			$venta->setId_venta($id_venta);

			$encabezado = $venta->obtenerEncabezadoBoleta();
			$rege = $encabezado->fetch_object();

			$detalle = $venta->obtenerDetalleBoleta();

			$igvventa = $rege->igv_venta;
			$subtotalventa = $rege->subtotal_venta;

			$igvcalc = round($igvventa*$subtotalventa/100, 2);

			require_once 'views/venta/descripcionVenta.php';
		}
	}

	public function listar_ventas(){

		$ventaEspecifica = isset($_GET['id']) && $_GET['id'] == 1?true:false;

		if(!$ventaEspecifica){
			echo $ventaEspecifica;
			$ventas = new Venta();
			$ventas = $ventas->obtenerVentas();
			require_once 'views/venta/listarVentas.php';

		}else{
			echo $ventaEspecifica;
			$ventas = new Venta();
			$ventas = $ventas->obtenerVentas();
			require_once 'views/venta/listarVentas.php';
		}
		
	}

	public function listarPorFechas(){
		$fecha_inicio = $_POST['fecha_inicio'];
		$fecha_fin = $_POST['fecha_fin'];

		$ventaEspecifica= true;


		$ventas = new Venta();
			$ventas = $ventas->obtenerVentasPorFechas($fecha_inicio, $fecha_fin);

			require_once 'views/venta/listarVentas.php';
	}

	public function generarBoleta(){

		if(isset($_GET['id'])){

			$id_venta = $_GET['id'];
			$venta = new Venta();
			$venta->setId_venta($id_venta);

			$encabezado = $venta->obtenerEncabezadoBoleta();
			//$rege = $encabezado->fetch_object();

			$detalle = $venta->obtenerDetalleBoleta();
			/*while($regd = $detalle->fetch_object()){
				var_dump($regd);
			}
			*/
			// Requerir la boleta de reportes/exBoleta
			require_once 'reportes/exFactura.php';

		}

	}

}

