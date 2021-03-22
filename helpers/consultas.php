<?php

class Consultas {
    
    private $db;

    function __construct() {
        $this->db = Database::connect();
    }
    
    public function metasHoy() {
        $query = "SELECT IFNULL(COUNT(*),0) as total_venta FROM meta_departamento ";
        $resultado = $this->db->query($query);
        return $resultado;
    }
    
    public function metasUltimos12meses() {
        $query = "SELECT DATE_FORMAT(fecha_fin,'%M') as fecha,COUNT(*) as total FROM meta_departamento GROUP by MONTH(fecha_fin)"
                . " ORDER BY fecha_fin DESC limit 0,10";
        $resultado = $this->db->query($query);
        return $resultado;
    }
    
    public function metasUltimos12mesesEmpleado() {
        $query = "SELECT DATE_FORMAT(fecha_fin,'%M') as fecha,COUNT(*) as total FROM meta_empleado GROUP by MONTH(fecha_fin)"
                . " ORDER BY fecha_fin DESC limit 0,10";
        $resultado = $this->db->query($query);
        return $resultado;
    }
    
    public function metasUltimos12mesesEmpresa() {
        $query = "SELECT DATE_FORMAT(fecha_fin,'%M') as fecha,COUNT(*) as total FROM meta_empresa GROUP by MONTH(fecha_fin)"
                . " ORDER BY fecha_fin DESC limit 0,10";
        $resultado = $this->db->query($query);
        return $resultado;
    }
    
    public function metasHoyEmpresa() {
        $query = "SELECT IFNULL(COUNT(*),0) as total_venta FROM meta_empresa ";
        $resultado = $this->db->query($query);
        return $resultado;
    }
    
    public function metasHoyEmpleado() {
        $query = "SELECT IFNULL(COUNT(*),0) as total_venta FROM meta_empleado ";
        $resultado = $this->db->query($query);
        return $resultado;
    }
}