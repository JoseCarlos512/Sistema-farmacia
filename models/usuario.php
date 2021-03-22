<?php

class Usuario {

    private $id;
    private $dni;
    private $nombre;
    private $apellidos;
    private $celular;
    private $email;
    private $usuario;
    private $password;
    private $new_password;
    private $conf_new_password;
    private $rol;
    private $estado;
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    function getId() {
        return $this->id;
    }
    function getEstado() {
        return $this->estado;
    }

 
    function getNombre() {
        return $this->nombre;
    }

    function getApellidos() {
        return $this->apellidos;
    }

    function getCelular() {
        return $this->celular;
    }

    function getEmail() {
        return $this->email;
    }

    function getUsuario() {
        return $this->usuario;
    }

//Se cambio el metodo de encriptacion del set al get
    function getPassword() {
        return $this->password;
    }

    function getNew_password() {
        return $this->new_password;
    }

    function getConf_new_password() {
        return $this->conf_new_password;
    }

    function getRol() {
        return $this->rol;
    }
    function getDni() {
        return $this->dni;
    }

    function setDni($dni) {
        $this->dni = $dni;
    }

    
    function setId($id) {
        $this->id = $id;
    }
    function setEstado($estado) {
        $this->estado = $estado;
    }
   
    function setNombre($nombre) {
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    function setApellidos($apellidos) {
        $this->apellidos = $this->db->real_escape_string($apellidos);
    }

    function setCelular($celular) {
        $this->celular = $this->db->real_escape_string($celular);
    }

    function setEmail($email) {
        $this->email = $this->db->real_escape_string($email);
    }

    function setUsuario($usuario) {
        $this->usuario = $this->db->real_escape_string($usuario);
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setNew_password($new_password) {
        $this->new_password = $new_password;
    }

    function setConf_new_password($conf_new_password) {
        $this->conf_new_password = $conf_new_password;
    }

    function setRol($rol) {
        $this->rol = $rol;
    }

    public function login() {
        $result = false;
        $user = $this->usuario;
        $password = $this->getPassword(); /* Password no se encripta */
        $sql = "SELECT usuarios.*"
                . " FROM usuarios"
                . " where nick_usu = '$user' AND estado = 1";
        $login = $this->db->query($sql);


        if ($login && $login->num_rows == 1) {/* Devuelve la cantidad de filas encontradas */
            $usuario = $login->fetch_object(); /* Me da acceso lo que tiene dentro ese rs */
            //Compara cadena con datos encriptados
            $verificacion = password_verify($password, $usuario->password_usu);
            if ($verificacion) { /* Verify , deberia dar true si el usuario es correcto */
                $result = $usuario; /* Guardar el objeto usuario dentro de resultado */
            }
        }

    return $result;
    }
    
    public function listaUsuarios() {
        $query = "SELECT * FROM usuarios";
        $resultado = $this->db->query($query);
        return $resultado;
    }
    
    public function getOneUsuario() {
        $query = "SELECT * FROM usuarios WHERE id_usuario ='{$this->getId()}'";
        $resultado = $this->db->query($query)->fetch_object();
        return $resultado;
    }

    public function getAllTiposUsuario(){
        $query = "SELECT * FROM tipos_usuarios";
        $resultado = $this->db->query($query);
        return $resultado;
    }
    
    public function registrarUsuario() {
        $password = password_hash($this->getPassword(), PASSWORD_BCRYPT, ['cost' => 4]);
        $query = "INSERT INTO usuarios(id_usuario, dni_usu, nombre_usu, apellido_usu, celular, "
                . "correo_usu, nick_usu, password_usu, id_tipo_usu, estado) "
                . "VALUES("
                . "null, '{$this->getDni()}', '{$this->getNombre()}', '{$this->getApellidos()}',"
                . "{$this->getCelular()}, '{$this->email}', '{$this->getUsuario()}', "
                . "'$password', {$this->getRol()}, {$this->getEstado()})";
                
        $save = $this->db->query($query);
		
            $result = false;
            if($save){
                $result = true;
            }
	return $result;
    }

    public function actualizarUsuario(){
        $password = password_hash($this->getPassword(), PASSWORD_BCRYPT, ['cost' => 4]);
        $query = "UPDATE usuarios SET dni_usu = {$this->getDni()},
                  nombre_usu = '{$this->getNombre()}', apellido_usu = '{$this->getApellidos()}', 
                  celular='{$this->getCelular()}', correo_usu = '{$this->getEmail()}', 
                  nick_usu = '{$this->getUsuario()}', password_usu = '$password', id_tipo_usu = '{$this->getRol()}',
                  estado= {$this->getEstado()} WHERE id_usuario = '{$this->getId()}'";
                
        $save = $this->db->query($query);
		
        $result = false;
        if($save){
            $result = true;
        }
	    return $result;
    }

    public function eliminarUsuario(){
    $query = "DELETE FROM usuarios where id_usuario = {$this->getId()}";
        $resultado = $this->db->query($query);
        return $resultado;
    }

    public function CantidadUsuarios(){
        $query = "SELECT COUNT(*) cantidadUsuarios FROM usuarios";
        $resultado = $this->db->query($query)->fetch_object();
        return $resultado;
    }

    public function CantidadProductos(){
        $query = "SELECT COUNT(*) cantidadProductos FROM productos_farmaceuticos";
        $resultado = $this->db->query($query)->fetch_object();
        return $resultado;
    }

    public function CantidadClientes(){
        $query = "SELECT COUNT(*) cantidadClientes FROM productos_farmaceuticos";
        $resultado = $this->db->query($query)->fetch_object();
        return $resultado;
    }
}
