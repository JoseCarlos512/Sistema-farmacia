<?php 

require_once 'models/cliente.php';

class ClienteController{

	public function index(){

		header("Location: ".base_url."Cliente/listarClientes");
		//require_once 'views/cliente/listaClientes.php';
	}

	public function registroCliente(){

		require_once 'views/cliente/registroCliente.php';

	}

	public function modificacionCliente(){

		if(isset($_GET['id'])){

			$cliente = new Cliente();
			$id_modificar = $_GET['id'];
			$cliente->setId_cli($id_modificar);
			$datos_cli = $cliente->obtenerClientePorId();
			$cliente = $datos_cli->fetch_object();

			require_once 'views/cliente/modificacionCliente.php';
		}else{
			header("Location:".base_url."Cliente/listarClientes");
		}
	}

	public function listarClientes(){

		$cliente = new Cliente();
		$clientes = $cliente->obtenerClientes();
		require_once 'views/cliente/listaClientes.php';

	}

	public function eliminarCliente(){

		$id_cliente = $_GET['id'];
        $cliente = new Cliente();
        $cliente->setId_cli($id_cliente);

        $estado = $cliente->eliminarCliente();

        if(isset($estado) && $estado == true){
            $_SESSION['correct'] = "Cliente eliminado correctamente";
        }else{
            $_SESSION['failed'] = "Error al eliminar el cliente";
        }

        header("Location:".base_url."Cliente/listarClientes");
	}

	public function registrarCliente(){

        $db = Database::connect();
        $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, trim($_POST['nombre'])) : false;
        $apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($db, trim($_POST['apellidos'])) : false;
        $dni = isset($_POST['dni']) ? mysqli_real_escape_string($db, trim($_POST['dni'])) : false;
        $celular = isset($_POST['celular']) ? mysqli_real_escape_string($db, trim($_POST['celular'])) : false;
		$direccion = isset($_POST['direccion']) ? mysqli_real_escape_string($db, trim($_POST['direccion'])) : false;

		if (is_numeric($nombre) || preg_match("/[0-9]/", $nombre) || strlen($nombre) > 50) {
            $_SESSION['error']['nombre'] = "Ingrese valores validos en el campo nombres(max. 30 caracteres)";
        } elseif (!$nombre) {
            $_SESSION['error']['nombre'] = "Rellene el campo Nombre";
        }

        if (is_numeric($apellidos) || preg_match("/[0-9]/", $apellidos) || strlen($apellidos) > 50) {
            $_SESSION['error']['apellidos'] = "Ingrese valores validos en el campo apellidos(max. 50 caracteres)";
        } elseif (!$apellidos) {
            $_SESSION['error']['apellidos'] = "Rellene el campo Apellidos";
        }

        if (preg_match("/[a-zA-Z]/", $dni) || strlen($dni) > 9) {
            $_SESSION['error']['dni'] = "Ingrese un numero de dni valido";
        } elseif (!$dni) {
            $_SESSION['error']['dni'] = "Rellene el campo dni";
        }

        if (preg_match("/[a-zA-Z]/", $celular) || strlen($celular) > 10) {
            $_SESSION['error']['celular'] = "Ingrese un numero de celular valido";
        } elseif (!$celular) {
            $_SESSION['error']['celular'] = "Rellene el campo celular";
        }

        if (strlen($direccion) > 100) {
				$_SESSION['error']['direccion'] = "Ingrese valores validos en el campo Direccion(max. 100 caracteres)";
		} elseif (!$direccion) {
			$_SESSION['error']['direccion'] = "Rellene el campo Direccion";
		}


        // Validar si hay algun error antes de guardar

		if (!isset($_SESSION['error']) || count($_SESSION['error']) == 0) {

	        // Registro de administrativo
				$cliente = new Cliente();
				$cliente->setNombre_cli($nombre);
				$cliente->setApellido_cli($apellidos);
				$cliente->setDni_cli($dni);
				$cliente->setCelular($celular);
				$cliente->setDireccion($direccion);


				$registrarCliente = $cliente->registrarCliente();

				if ($registrarCliente) {

					$_SESSION['completed'] = "Se registraron los datos correctamente";

					

				}

		} else {
			$_SESSION['failed'] = "Hubo un error al registrar los datos del cliente";

		}

		header("Location:" . base_url . 'Cliente/listarClientes');

	}

	public function modificarCliente(){

		$db = Database::connect();
		$id_modificar = isset($_POST['id_modificar']) ? mysqli_real_escape_string($db, trim($_POST['id_modificar'])) : false;
        $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, trim($_POST['nombre'])) : false;
        $apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($db, trim($_POST['apellidos'])) : false;
        $dni = isset($_POST['dni']) ? mysqli_real_escape_string($db, trim($_POST['dni'])) : false;
        $celular = isset($_POST['celular']) ? mysqli_real_escape_string($db, trim($_POST['celular'])) : false;
		$direccion = isset($_POST['direccion']) ? mysqli_real_escape_string($db, trim($_POST['direccion'])) : false;

		if (is_numeric($nombre) || preg_match("/[0-9]/", $nombre) || strlen($nombre) > 50) {
            $_SESSION['error']['nombre'] = "Ingrese valores validos en el campo nombres(max. 30 caracteres)";
        } elseif (!$nombre) {
            $_SESSION['error']['nombre'] = "Rellene el campo Nombre";
        }

        if (is_numeric($apellidos) || preg_match("/[0-9]/", $apellidos) || strlen($apellidos) > 50) {
            $_SESSION['error']['apellidos'] = "Ingrese valores validos en el campo apellidos(max. 50 caracteres)";
        } elseif (!$apellidos) {
            $_SESSION['error']['apellidos'] = "Rellene el campo Apellidos";
        }

        if (preg_match("/[a-zA-Z]/", $dni) || strlen($dni) > 9) {
            $_SESSION['error']['dni'] = "Ingrese un numero de dni valido";
        } elseif (!$dni) {
            $_SESSION['error']['dni'] = "Rellene el campo dni";
        }

        if (preg_match("/[a-zA-Z]/", $celular) || strlen($celular) > 10) {
            $_SESSION['error']['celular'] = "Ingrese un numero de celular valido";
        } elseif (!$celular) {
            $_SESSION['error']['celular'] = "Rellene el campo celular";
        }

        if (strlen($direccion) > 100) {
				$_SESSION['error']['direccion'] = "Ingrese valores validos en el campo Direccion(max. 100 caracteres)";
		} elseif (!$direccion) {
			$_SESSION['error']['direccion'] = "Rellene el campo Direccion";
		}


        // Validar si hay algun error antes de guardar

		if (!isset($_SESSION['error']) || count($_SESSION['error']) == 0) {

	        // Registro de administrativo
				$cliente = new Cliente();
				$cliente->setId_cli($id_modificar);
				$cliente->setNombre_cli($nombre);
				$cliente->setApellido_cli($apellidos);
				$cliente->setDni_cli($dni);
				$cliente->setCelular($celular);
				$cliente->setDireccion($direccion);


				$modificarCliente = $cliente->modificarCliente();

				if ($modificarCliente) {

					$_SESSION['completed'] = "Se actualizaron los datos correctamente";

				}

		} else {
			$_SESSION['failed'] = "Hubo un error al actualizar los datos del cliente";

		}

		header("Location:" . base_url . 'Cliente/modificacionCliente&id='.$id_modificar);

	}

}