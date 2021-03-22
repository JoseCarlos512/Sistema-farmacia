<?php

if(!isset($_GET['op'])){
    require_once "models/producto.php";
}

class productoController {
    
    public function index() {
        $producto = new Producto();
        $lista = $producto->getAll();
        require_once "views/producto/listaProductos.php";
    }

    public function registrarProducto() {
        
        require_once "views/producto/registrarProducto.php";
    }

    public function getDatosProducto(){
        $id_producto = $_GET['id'];
        $producto = new Producto();
        $producto->setId($id_producto);
        
        $row = $producto->getOneProducto();


        require_once "views/producto/registrarProducto.php";
    }

    public function deleteProducto(){
        $id_producto = $_GET['id'];
        $producto = new Producto();
        $producto->setId($id_producto);

        $estado = $producto->deleteProducto();

        if(isset($estado) && $estado == true){
            $_SESSION['correct'] = "Producto eliminado correctamente";
        }else{
            $_SESSION['failed'] = "Error al eliminar el producto";
        }

        header("Location:".base_url."Producto/index");
    }

    public function saveProducto(){
        
        $accion = $_POST['id_producto']==0?$_POST['id_producto']:1; 

        $id_producto = isset($_POST['id_producto'])?$_POST['id_producto']:null;
        $nombre = isset($_POST['descripcion'])?$_POST['descripcion']:"";
        $fecha_vencimiento = isset($_POST['fecha_vencimiento'])?$_POST['fecha_vencimiento']:"";
        $stock_minimo = isset($_POST['stock_minimo'])?$_POST['stock_minimo']:null;
        $stock = $_POST['stock'];
        $precio_compra = $_POST['precio_compra'];
        $precio = $_POST['precio'];
        $numero_producto= $_POST['numero_producto'];
        $estado = $_POST['estado'];

        $producto = new producto();
        $producto->setNombre($nombre);
        $producto->setEstado($estado);
        $producto->setFecha_vencimiento($fecha_vencimiento);
        $producto->setNumero_producto($numero_producto);
        $producto->setPrecio_compra($precio_compra);
        $producto->setPrecio($precio);
        $producto->setStock_minimo($stock_minimo);
        $producto->setStock($stock);

        if($accion != 0){
            $producto->setId($id_producto);
            $estadoRegistro = $producto->update();
        }else{
            $estadoRegistro = $producto->save();
        }

        if(isset($estadoRegistro)&& $estadoRegistro== true){
            $_SESSION['mensaje'] = "correct";
        }else{
            $_SESSION['mensaje'] = "failed";
        }

        header("Location:".base_url."Producto/index");
    }

 
}


// ------ Ajax Controller -----------//




if(isset($_GET['op'])){
    session_start();
    require_once "../models/producto.php";
    require_once "../config/db.php";
    require_once "../models/venta.php";
    $venta=new Venta();

    switch ($_GET["op"]){

        case 'guardaryeditar':

        
            $idventa=isset($_POST["idventa"])? $_POST["idventa"]:"";
            $idcliente=isset($_POST["idcliente"])? $_POST["idcliente"]:"";
            $idusuario=$_SESSION['identity']->id_usuario;
            $tipo_comprobante=isset($_POST["tipo_comprobante"])? $_POST["tipo_comprobante"]:"";
            $num_comprobante=isset($_POST["num_comprobante"])? $_POST["num_comprobante"]:"";
            $fecha_hora=isset($_POST["fecha_hora"])? $_POST["fecha_hora"]:"";
            $impuesto=isset($_POST["impuesto"])? $_POST["impuesto"]:"";
            $total_venta=isset($_POST["total_venta"])? $_POST["total_venta"]:"";
            $subtotal_venta = isset($_POST["subtotal_venta"])? $_POST["subtotal_venta"]:"";

            $efectivo_venta = isset($_POST["efectivo_venta"])? $_POST["efectivo_venta"]:"";
            $vuelto_venta = isset($_POST["vuelto_venta"])? $_POST["vuelto_venta"]:"";
            
            if (empty($idventa)){
                $rspta=$venta->insertar($idcliente,$idusuario,$tipo_comprobante,
                                    $num_comprobante,$fecha_hora,$impuesto,$total_venta,$_POST["idproducto"],
                                    $_POST["cantidad"],$_POST["precio_venta"], $efectivo_venta, $vuelto_venta, $subtotal_venta);
                echo $rspta ? $rspta : "No se pudieron registrar todos los datos de la venta";
            }
            else {
            }
        break;

        case 'selectCliente':
            require_once "../models/cliente.php";
            $cliente = new Cliente();

            $rspta = $cliente->obtenerClientes();
    
            while ($reg = $rspta->fetch_object())
                    {
                    echo '<option value=' . $reg->id_cli . '>' . $reg->nombre_cli . " " . $reg->apellido_cli . '</option>';
                    }
        break;

      
        case 'listarArticulosVenta':

            $producto = new Producto();

            $rspta = $producto->getAllActivos();
            //Vamos a declarar un array
            $data= Array();

            while ($reg=$rspta->fetch_object()){
                $data[]=array(
                    "0"=>'<button class="btn btn-warning" onclick="agregarDetalle('.$reg->id_producto.',\''.$reg->descripcion_pro.'\',\''.$reg->preciov_pro.'\')"><span class="fa fa-plus"></span></button>',
                    "1"=>$reg->id_producto,
                    "2"=>$reg->num_pro,
                    "3"=>$reg->descripcion_pro,
                    "4"=>$reg->stock_pro,
                    "5"=>$reg->preciov_pro,
                    "6"=>$reg->estado_pro == 0? '<div class="btn btn-danger">Inactivo</div>' : '<div class="btn btn-success">Activo</div>'                    
                    );
            }
            $results = array(
                "sEcho"=>1, //Información para el datatables
                "iTotalRecords"=>count($data), //enviamos el total registros al datatable
                "iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
                "aaData"=>$data);
            echo json_encode($results);
        break;

    }
}

?>