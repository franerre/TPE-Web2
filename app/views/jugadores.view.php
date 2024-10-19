<?php

class JugadoresView {
   
    public function showJugadores($jugadores, $equipos) {
        $count = count($jugadores);
        require 'templates/jugadorList.phtml';
       
    }


    public function showError($error) {
        require 'templates/error.phtml';
    }
    
    public function showEditForm($jugador, $equipos) {
        require_once 'templates/layout/header.phtml';
        require_once 'templates/editJugador.phtml';
        require_once 'templates/layout/footer.phtml';
    }
    

}
