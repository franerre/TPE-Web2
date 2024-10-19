<?php
require_once 'app/models/model.php';
class JugadoresModel {
    private $db;

    function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=db_futbol;charset=utf8', 'root', '');
    }


    function getJugadores() {
        $query = $this->db->prepare('SELECT * FROM jugadores');
        $query->execute();

        
        $jugadores = $query->fetchAll(PDO::FETCH_OBJ);

        return $jugadores;
    }
   

    
    function insertJugadores($nombre, $apellido, $id_equipo, $imagen_jugador) {
        $query = $this->db->prepare('INSERT INTO jugadores (nombre, apellido, id_equipo, imagen_jugador) VALUES(?,?,?,?)');
        $query->execute([$nombre, $apellido, $id_equipo, $imagen_jugador]);

        return $this->db->lastInsertId();
    }
    

   


    function deleteJugadores($id) {
        $query = $this->db->prepare('DELETE FROM jugadores WHERE id = ?');
        $query->execute([$id]);
    }


    function getJugadoresById($id) {
        $query = $this->db->prepare('SELECT * FROM jugadores WHERE id = ?');
        $query->execute([$id]);

        $jugador = $query->fetch(PDO::FETCH_OBJ);

        return $jugador;
    }
    

    function updateJugadoresData($id, $nombre, $apellido, $id_equipo, $imagen_jugador) {
        $query = $this->db->prepare('UPDATE jugadores SET nombre = ?, apellido = ?, id_equipo = ?, imagen_jugador = ? WHERE id = ?');
        $query->execute([$nombre, $apellido, $id_equipo, $imagen_jugador, $id]);
    }
    
    
    
}
