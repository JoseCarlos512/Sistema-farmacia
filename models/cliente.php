<?php 

class Cliente{

	private $id_cli;
	private $nombre_cli;
	private $apellido_cli;
	private $dni_cli;
	private $celular;
	private $direccion;
	private $db;

	public function __construct(){
		$this->db = Database::connect();
	}

	public function getId_cli(){
		return $this->id_cli;
	}

	public function getNombre_cli(){
		return $this->nombre_cli;
	}

	public function getApellido_cli(){
		return $this->apellido_cli;
	}

	public function getDni_cli(){
		return $this->dni_cli;
	}

	public function getCelular(){
		return $this->celular;
	}

	public function getDireccion(){
		return $this->direccion;
	}

	public function setId_cli($id_cli){
		$this->id_cli = $id_cli;
	}

	public function setNombre_cli($nombre_cli){
		$this->nombre_cli = $this->db->real_escape_string($nombre_cli);
	}

	public function setApellido_cli($apellido_cli){
		$this->apellido_cli = $this->db->real_escape_string($apellido_cli);
	}

	public function setDni_cli($dni_cli){
		$this->dni_cli = $dni_cli;
	}

	public function setCelular($celular){
		$this->celular = $celular;
	}

	public function setDireccion($direccion){
		$this->direccion = $this->db->real_escape_string($direccion);
	}

	public function obtenerClientes(){

		$result = false;
		$sql = "SELECT * FROM clientes;";
		$query = $this->db->query($sql);

		if($query){
			$result = $query;
		}

		return $result;

	}

	public function registrarCliente(){

		$result = false;
		$sql = "INSERT INTO clientes VALUES(null, '{$this->getNombre_cli()}', '{$this->getApellido_cli()}', {$this->getDni_cli()}, {$this->getCelular()}, '{$this->getDireccion()}');";

		$query = $this->db->query($sql);
		if($query){
			$result = true;
		}

		return $result;

	}

	public function obtenerClientePorId(){

		$result = false;
		$sql = "SELECT * FROM clientes WHERE id_cli={$this->getId_cli()};";
		$query = $this->db->query($sql);

		if($query){
			$result = $query;
		}

		return $result;

	}

	public function modificarCliente(){

		$result = false;
		$sql = "UPDATE clientes SET nombre_cli='{$this->getNombre_cli()}', apellido_cli='{$this->getApellido_cli()}', dni_cli={$this->getDni_cli()}, celular={$this->getCelular()}, direccion='{$this->getDireccion()}' WHERE id_cli={$this->getId_cli()};";

		$query = $this->db->query($sql);
		if($query){
			$result = true;
		}

		return $result;

	}

	public function eliminarCliente(){

		$result = false;
		$sql = "DELETE FROM clientes WHERE id_cli={$this->getId_cli()};";

		$query = $this->db->query($sql);
		if($query){
			$result = true;
		}

		return $result;
	}

}