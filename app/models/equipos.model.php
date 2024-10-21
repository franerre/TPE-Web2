<?php
require_once 'app/models/model.php';
class EquiposModel {
    private $db;

    function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=db_futbol;charset=utf8', 'root', '');
    }

  
    function getEquipos() {
        $query = $this->db->prepare('SELECT * FROM equipos');
        $query->execute();

        
        $equipos = $query->fetchAll(PDO::FETCH_OBJ);

        return $equipos;
    }

   

     function insertEquipos($equipo, $liga, $pais, $imagen) {
       
            
    
            $query = $this->db->prepare('INSERT INTO equipos (equipo, liga, pais, imagen) VALUES(?,?,?,?)');
            $query->execute([$equipo, $liga, $pais, $imagen]);
        
    
        return $this->db->lastInsertId();
    }
    

    
    
    
    

    function deleteEquipos($id) {
        $query = $this->db->prepare('DELETE FROM equipos WHERE id = ?');
        $query->execute([$id]);
    }

 
    
    function getEquiposById($id) {
        $query = $this->db->prepare('SELECT * FROM equipos WHERE id = ?');
        $query->execute([$id]);


        $equipo = $query->fetch(PDO::FETCH_OBJ);

        return $equipo;
    }

    
    
    function updateEquiposData($id, $equipo, $liga, $pais, $imagen) {
        $query = $this->db->prepare('UPDATE equipos SET equipo = ?, liga = ?, pais = ?, imagen = ? WHERE id = ?');
        $query->execute([$equipo, $liga, $pais, $imagen, $id]);
    }
    

   
    }
    
    
   
    
    
