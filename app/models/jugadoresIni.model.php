<?php
require_once 'app/models/model.php';
class JugadoresIniModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=db_futbol;charset=utf8', 'root', '');
    }

   
    
     public function getAllEquipos() {

       
        $consulta = $this->db->prepare("SELECT * FROM equipos");
        $consulta->execute();

       
        $equipos = $consulta->fetchAll(PDO::FETCH_OBJ); 
        
        return $equipos;
    }

    public function getAlljugadores() {

        
        $consulta = $this->db->prepare("SELECT * FROM jugadores");
        $consulta->execute();

      
        $jugadores = $consulta->fetchAll(PDO::FETCH_OBJ); 
        
        return $jugadores;
    }

   // Obtener jugadores por id_equipo
public function getJugadoresByEquipo($id_equipo) {
    $query = $this->db->prepare("SELECT * FROM jugadores WHERE id_equipo = ?");
    $query->execute([$id_equipo]);
    return $query->fetchAll(PDO::FETCH_OBJ);
}

// Obtener el equipo por su ID
public function getEquipoById($id_equipo) {
    $query = $this->db->prepare("SELECT * FROM equipos WHERE id = ?");
    $query->execute([$id_equipo]);
    return $query->fetch(PDO::FETCH_OBJ);
}


    
    


}