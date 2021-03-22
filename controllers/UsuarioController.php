<?php
require_once 'models/usuario.php';
require_once 'models/producto.php';
require_once 'models/venta.php';

class usuarioController {

    public function index() {

        require_once 'views/usuario/login.php';
    }

    public function login() {

        
        $usuario = new Usuario();
        $usuario->setUsuario($_POST["usuario"]);
        $usuario->setPassword($_POST["clave"]);
        
        $identity = $usuario->login();

       
        if ($identity && is_object($identity)) {

            $_SESSION['identity'] = $identity;
            if ($identity->id_tipo_usu == 1) {
                $_SESSION['admin'] = true;
            }else{
                $_SESSION['vendedor'] = true;
            }
            
            
            header("Location: " . base_url . "Usuario/dashboard");
        } else {
            $_SESSION['error_login'] = "Identificacion fallida";
            header("Location: " . base_url);
        }
    }

    public function logout() {
        session_destroy();
        header("Location: " . base_url);
    }

    public function dashboard() {

        if(isset($_SESSION['admin'])  ||  isset($_SESSION['vendedor'])){

            $usuario = new Usuario();
            $ventas = new Venta();

            $cantidadClientes= $usuario->CantidadClientes()->cantidadClientes;
            $cantidadUsuarios= $usuario->CantidadUsuarios()->cantidadUsuarios;
            $cantidadProductos= $usuario->CantidadProductos()->cantidadProductos;
            $cantidadVentas= $ventas->CantidadVentas()->cantidadVentas;

            // Traer productos con stock <7 (crear metodo)
            $producto = new Producto();
            $lista = $producto->obtenerPorStockMenor();


            // Identidad del Usuario (para la bienvenida)
            $nombre = $_SESSION['identity']->nombre_usu;
            $apellido = $_SESSION['identity']->apellido_usu;
            $rol = isset($_SESSION['admin'])? 'Administrador' : 'Vendedor';

            require_once 'views/dashboard.php';
        } else {
            header("Location: " . base_url);
        }
    }

    public function listarUsuarios(){
        
        if(isset($_SESSION['admin'])){
            
            $usuario = new Usuario();
            $lista = $usuario->listaUsuarios();
            require_once 'views/usuario/listaUsuarios.php';
        }else{
            header("Location: " . base_url);
        }
    }
    
    public function editarUsuario() {
        $id_usuario = $_GET['id'];
        if(isset($_SESSION['admin'])){
            $usuario = new Usuario();
            $usuario->setId($id_usuario);
            $row = $usuario->getOneUsuario();

            $lista_tipo_usuario = $usuario->getAllTiposUsuario();
            require_once 'views/usuario/RegistrarUsuario.php';
        }else{
            header("Location: " . base_url);
        }
        
    }
    
    public function agregarUsuario() {
        if(isset($_SESSION['admin'])){
            $usuario = new Usuario();
            $lista_tipo_usuario = $usuario->getAllTiposUsuario();
            
            require_once 'views/usuario/RegistrarUsuario.php';
        }else{
            header("Location: " . base_url);
        }
    }
    
    public function registrarUsuario() {
    
        //Reacer con todos los campos , "" String, null Int
        $id_usuario = isset($_POST['id_usuario'])?$_POST['id_usuario']:0;
        $nombre = isset($_POST['nombre'])? $_POST['nombre']: "";
        $apellidos = isset($_POST['apellidos'])? $_POST['apellidos']: "";
        $dni = isset($_POST['dni'])?$_POST['dni']:null;
        $movil = isset($_POST['movil'])?$_POST['movil']:null;
        $correo = isset($_POST['correo'])?$_POST['correo']:"";
        $nick = isset($_POST['nick'])?$_POST['nick']:"";
        $password = isset($_POST['password'])?$_POST['password']:"";
        $tipo_usuario = isset($_POST['tipo_usuario'])?$_POST['tipo_usuario']:null;
        $estado = isset($_POST['estado'])?$_POST['estado']:null;

        $usuario = new Usuario();
        $usuario->setId($id_usuario);
        $usuario->setNombre($nombre);
        $usuario->setApellidos($apellidos);
        $usuario->setDni($dni);
        $usuario->setCelular($movil);
        $usuario->setEmail($correo);
        $usuario->setUsuario($nick);
        $usuario->setPassword($password);
        $usuario->setRol($tipo_usuario);
        $usuario->setEstado($estado);
     
        if($id_usuario == 0){
            $estadoRegistro = $usuario->registrarUsuario();
        }else{
            $estadoRegistro = $usuario->actualizarUsuario();
        }
        
        
        if(isset($estadoRegistro)){
            $_SESSION['mensaje']='correct';
        }else{
            $_SESSION['mensaje']='failed';
        }
        header("Location: " . base_url. "Usuario/listarUsuarios");

    }

    public function deleteUsuario(){
        if(isset($_SESSION['admin'])){
            
            $id_usuario = $_GET['id'];
            $usuario = new Usuario();
            $usuario->setId($id_usuario);

            $estado = $usuario->eliminarUsuario();
            if(isset($estado)){
                $_SESSION['mensaje'] = "Usuario eliminado";
            }else{
                $_SESSION['mensaje'] = "Problemas, Usuario no eliminado";
            }

            header("Location: " . base_url . "Usuario/listarUsuarios");
        }
    }

    public function listarRoles(){
        if(isset($_SESSION['admin'])){
            $usuario = new Usuario();
            $listaRoles = $usuario->getAllTiposUsuario();
            
            require_once "views/usuario/listaRoles.php";
        }else{
            header("Location: " . base_url);
        }
    }

}
