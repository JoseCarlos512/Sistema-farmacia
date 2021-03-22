<?php 

class Venta{

	private $id_venta;
	private $num_venta;
	private $efectivo_venta;
	private $total_venta;
	private $subtotal_venta;
	private $igv_venta;
	private $vuelto_venta;
	private $fecha_venta;
	private $id_usuario;
	private $id_cli;
	private $db;

	public function __construct(){
		$this->db = Database::connect();
	}

	public function getId_venta(){
		return $this->id_venta;
	}

	public function getNum_venta(){
		return $this->num_venta;
	}

	public function getEfectivo_venta(){
		return $this->efectivo_venta;
	}

	public function getTotal_venta(){
		return $this->total_venta;
	}

	public function getSubtotal_venta(){
		return $this->subtotal_venta;
	}

	public function getIgv_venta(){
		return $this->igv_venta;
	}

	public function getVuelto_venta(){
		return $this->vuelto_venta;
	}

	public function getFecha_venta(){
		return $this->fecha_venta;
	}

	public function getId_usuario(){
		return $this->id_usuario;
	}

	public function getId_cli(){
		return $this->id_cli;
	}

	public function setId_venta($id_venta){
		$this->id_venta = $id_venta;
	}

	public function setNum_venta($num_venta){
		$this->num_venta = $num_venta;
	}

	public function setEfectivo_venta($efectivo_venta){
		$this->efectivo_venta = $efectivo_venta;
	}

	public function setTotal_venta($total_venta){
		$this->total_venta = $total_venta;
	}

	public function setSubtotal_venta($subtotal_venta){
		$this->subtotal_venta = $subtotal_venta;
	}

	public function setIgv_venta($igv_venta){
		$this->igv_venta = $igv_venta;
	}

	public function setVuelto_venta($vuelto_venta){
		$this->vuelto_venta = $vuelto_venta;
	}

	public function setFecha_venta($fecha_venta){
		$this->fecha_venta = $fecha_venta;
	}

	public function setId_usuario($id_usuario){
		$this->id_usuario = $id_usuario;
	}

	public function setId_cli($id_cli){
		$this->id_cli = $id_cli;
	}


	//Implementamos un método para insertar registros
	public function insertar($idcliente,$idusuario,$tipo_comprobante,$num_comprobante,$fecha_hora,$impuesto,
	$total_venta,$idarticulo,$cantidad,$precio_venta, $efectivo_venta, $vuelto_venta, $subtotal_venta)
	{
		
		$sql="INSERT INTO comprobantes_ventas(id_venta,num_venta,efectivo_venta,total_venta,subtotal_venta,igv_venta,vuelto_venta,fecha_venta,id_usuario,id_cli) VALUES (null,'$num_comprobante', $efectivo_venta, '$total_venta', $subtotal_venta, '$impuesto', $vuelto_venta, '$fecha_hora', '$idusuario', '$idcliente')";

		

		//return ejecutarConsulta($sql);
		$query = $this->db->query($sql);
		$id_venta = $this->db->insert_id;

			$num_elementos=0;
			$sw=true;

			

			while ($num_elementos < count($idarticulo))
			{
				$sql_detalle =  "INSERT INTO detalles_comprobantes(id_detalle, cantidad, importe, precio, subtotal, id_producto, id_venta) VALUES (null, $cantidad[$num_elementos], null, $precio_venta[$num_elementos], $precio_venta[$num_elementos]*$cantidad[$num_elementos], $idarticulo[$num_elementos], $id_venta)";
				$query = $this->db->query($sql_detalle);

				$sql_cantidad_actual = "SELECT stock_pro FROM productos_farmaceuticos WHERE id_producto =  $idarticulo[$num_elementos]";
				$query_cantidad_actual  = $this->db->query($sql_cantidad_actual)->fetch_object()->stock_pro;

				$resultado = $query_cantidad_actual - $cantidad[$num_elementos];
				$sql_update_cantidad = "UPDATE productos_farmaceuticos SET stock_pro = $resultado WHERE id_producto =  $idarticulo[$num_elementos]";
				$resultado = $this->db->query($sql_update_cantidad);
				//var_dump($sql_detalle);
				
				$num_elementos=$num_elementos + 1;
			}



			//die();
			//return $sw;
			return $id_venta;
		
		
	}

	public function obtenerVentas(){

		$result = false;
		$sql = "SELECT 
		cv.id_venta, cv.fecha_venta, cl.nombre_cli, cl.apellido_cli, us.nombre_usu, cv.num_venta, cv.total_venta
		FROM comprobantes_ventas cv
		inner join clientes cl
		on cl.id_cli = cv.id_cli
		inner join usuarios us 
		on us.id_usuario = cv.id_usuario";
		$query = $this->db->query($sql);

		if($query){
			$result = $query;
		}

		return $result;

	}

	public function obtenerVentasPorFechas($fecha_inicio, $fecha_fin){

		$result = false;
		$sql = "SELECT 
		cv.id_venta, cv.fecha_venta, cl.nombre_cli, us.nombre_usu, cv.num_venta, cv.total_venta, cl.apellido_cli 
		FROM comprobantes_ventas cv
		inner join clientes cl
		on cl.id_cli = cv.id_cli
		inner join usuarios us 
		on us.id_usuario = cv.id_usuario 
		where cv.fecha_venta between '$fecha_inicio' and '$fecha_fin'";

	
		$query = $this->db->query($sql);

		if($query){
			$result = $query;
		}

		return $result;

	}

	public function obtenerEncabezadoBoleta(){

		$result = false;

		$sql = "SELECT cv.num_venta, cv.fecha_venta, cv.igv_venta, cl.nombre_cli, cl.apellido_cli, cl.direccion, cl.dni_cli, cl.celular, cv.igv_venta, cv.total_venta, cv.subtotal_venta   
		FROM comprobantes_ventas cv 
		INNER JOIN clientes cl
		ON cl.id_cli = cv.id_cli 
		WHERE cv.id_venta = {$this->getId_venta()};
		";

		$query = $this->db->query($sql);

		if($query){
			$result = $query;
		}

		return $result;

	}

	public function obtenerDetalleBoleta(){

		$result = false;

		$sql = "SELECT pf.num_pro, pf.descripcion_pro, dc.cantidad, dc.precio, dc.subtotal 
		FROM detalles_comprobantes dc 
		INNER JOIN productos_farmaceuticos pf 
		ON pf.id_producto = dc.id_producto 
		WHERE id_venta = {$this->getId_venta()};";

		$query = $this->db->query($sql);

		if($query){
			$result = $query;
		}

		return $result;

	}

	public function CantidadVentas(){
        $query = "SELECT COUNT(*) cantidadVentas FROM comprobantes_ventas";
        $resultado = $this->db->query($query)->fetch_object();
        return $resultado;
    }


}