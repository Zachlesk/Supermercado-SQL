<?php

require_once("../config.php");

class Proveedores extends PDOCnx{
    
    private $proveedorId;
    private $nombre;
    private $telefono;
    private $ciudad;
    

    public function __construct($proveedorId= 0, $nombre= "", $telefono=0, $ciudad=""){
        $this->proveedorId = $proveedorId;
        $this->nombre = $nombre;
        $this->telefono = $telefono;
        $this->ciudad = $ciudad;
        parent::__construct();
    }
    
    //Getters
    public function getProveedorId(){
        return $this->proveedorId;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getTelefono(){
        return $this->telefono;
    }

    public function getCiudad(){
        return $this->ciudad;
    }



    //Setters
    public function setProveedorId($proveedorId){
        $this->proveedorId =$proveedorId;
    }

    public function setNombre($nombre){
        $this->nombre =$nombre;
    }

    public function setTelefono($telefono){
        $this->telefono =$telefono;
    }

    public function setCiudad($ciudad){
        $this->ciudad =$ciudad;
    }



    public function insertData(){
        try {
            $stm = $this-> dbCnx -> prepare("INSERT INTO proveedores(nombre,telefono,ciudad) 
            VALUES (?,?,?)");
            $stm -> execute ([$this->nombre, $this->telefono, $this->ciudad]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function obtainAll(){
        try {
            $stm = $this-> dbCnx -> prepare("SELECT * FROM proveedores");
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    
    public function delete(){
        try {
            $stm = $this-> dbCnx -> prepare("DELETE FROM proveedores WHERE proveedorId = ?");
            $stm -> execute([$this->proveedorId]);
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    
    public function selectOne(){
        try {
            $stm = $this-> dbCnx -> prepare("SELECT * FROM proveedores WHERE proveedorId = ?");
            $stm -> execute([$this->proveedorId]);
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function update(){
        try {
            $stm = $this-> dbCnx -> prepare("UPDATE proveedores SET nombre = ?, telefono = ? , ciudad = ? WHERE proveedorId = ?");
            $stm -> execute([$this->nombre, $this->telefono, $this->ciudad,$this->proveedorId]);
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
?>