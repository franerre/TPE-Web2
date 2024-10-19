<?php
require_once 'app/models/model.php';
class EquiposIniModel {

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

    public function getJugadoresByEquipo($id_equipo) {
        $sql = "SELECT * FROM jugadores WHERE id_equipo = :id_equipo";
        $consulta = $this->db->prepare($sql);
        $consulta->bindParam(':id_equipo', $id_equipo, PDO::PARAM_INT);
        $consulta->execute();
        $jugadores = $consulta->fetchAll(PDO::FETCH_OBJ);
        return $jugadores;
    }
    


}