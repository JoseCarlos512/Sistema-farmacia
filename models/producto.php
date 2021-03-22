<?php

class producto {
    private $id;
    private $nombre;
    private $fecha_vencimiento;
    private $numero_producto;
    private $precio_compra;
    private $precio;
    private $stock_minimo;
    private $stock;
    private $estado;
    
    private $db;
    
    function __construct() {
        $this->db = Database::connect();
    }
    
    /* GET DE DATOS */
    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getFecha_vencimiento() {
        return $this->fecha_vencimiento;
    }

    function getNumero_producto() {
        return $this->numero_producto;
    }
    
    function getPrecio_compra() {
        return $this->precio_compra;
    }

    function getPrecio() {
        return $this->precio;
    }

    function getStock_minimo() {
        return $this->stock_minimo;
    }

    function getStock() {
        return $this->stock;
    }

    function getEstado() {
        return $this->estado;
    }

    /*SET DE DATOS*/
    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setFecha_vencimiento($fecha_vencimiento) {
        $this->fecha_vencimiento = $fecha_vencimiento;
    }

    function setNumero_producto($numero_producto) {
        $this->numero_producto = $numero_producto;
    }
    
    function setPrecio_compra($precio_compra) {
        $this->precio_compra = $precio_compra;
    }

    function setPrecio($precio) {
        $this->precio = $precio;
    }

    function setStock_minimo($stock_minimo) {
        $this->stock_minimo = $stock_minimo;
    }

    function setStock($stock) {
        $this->stock = $stock;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    /*METODOS CREADOS */
    public function getAll(){
        $sql = "SELECT * FROM productos_farmaceuticos ORDER BY id_producto DESC";
        $productos = $this->db->query($sql);
        return $productos;
    }

    public function getAllActivos(){
        $sql = "SELECT * FROM productos_farmaceuticos WHERE estado_pro = 1 ORDER BY id_producto DESC";
        $productos = $this->db->query($sql);
        return $productos;
    }
    
    public function getAllCategory(){
        $sql = "SELECT p.*, c.nombre FROM productos p
                INNER JOIN categorias c
                ON c.id = p.categoria_id
                WHERE p.categoria_id ={$this->getCategoria_id()}";
        $productos = $this->db->query($sql);
        return $productos;
    }
    
    public function getOneProducto(){
        $sql = "SELECT productos_farmaceuticos.* FROM productos_farmaceuticos
                WHERE productos_farmaceuticos.id_producto={$this->getId()}";
        $productos = $this->db->query($sql);
        $productos = $productos->fetch_object();
        return $productos;
    }
    
    public function getRandom($cant){
        $sql = "SELECT * FROM productos ORDER BY RAND() LIMIT $cant";
        $productos = $this->db->query($sql);
        return $productos;
    }

    public function save(){
        $sql = "INSERT INTO productos_farmaceuticos VALUES(NULL,'{$this->getNombre()}','{$this->getEstado()}',"
        . "CURDATE(),'{$this->getFecha_vencimiento()}',{$this->getNumero_producto()} ,{$this->getPrecio_compra()},
        {$this->getPrecio()},{$this->getStock_minimo()}, {$this->getStock()});";
        $save = $this->db->query($sql);
        
        $result = false;
        if($save){
            $result  = true;
        }
        return $result;
    }
    
    public function deleteProducto(){
        $sql = "DELETE FROM productos_farmaceuticos WHERE  productos_farmaceuticos.id_producto = '{$this->getId()}'";
        $delete = $this->db->query($sql);
        $result = false;
        if($delete){
            $result = true;
        }
        return $result;
    }
    
    public function update(){
        
        /*  No entiendo acaba de pasar que el stock no podia ir al final, porque me generaba algun tipo de error
         */
        $sql = "UPDATE productos_farmaceuticos SET descripcion_pro='{$this->getNombre()}', estado_pro='{$this->getEstado()}',
                fecha_venci_pro='{$this->getFecha_vencimiento()}', num_pro='{$this->getNumero_producto()}',
                precioc_pro='{$this->getPrecio_compra()}', preciov_pro='{$this->getPrecio()}', 
                stock_min_pro={$this->getStock_minimo()} , stock_pro={$this->getStock()} ";
        
        $sql .= "WHERE id_producto={$this->getId()};";
        $save = $this->db->query($sql);
        
        $result = false;
        if($save){
            $result  = true;
        }
        return $result;
    }

    public function obtenerPorStockMenor(){

        $sql = "SELECT * FROM productos_farmaceuticos WHERE stock_pro<7;";
        $result = false;

        $query = $this->db->query($sql);

        if($query){
            $result = $query;
        }

        return $result;

    }
}