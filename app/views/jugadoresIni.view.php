<?php



class JugadoresIniView {
    
    public function showJugadoresIni($jugadores, $equipos) {
        $count = count($jugadores);

        require 'templates/producto_jugadores.phtml';
        
    }
    public function showJugadoresEquipo($jugadores) {
        $count = count($jugadores);
        require 'templates/jugadores.phtml';
    }
    public function showEquipo($equipo) {
        require 'templates/equipo_detalle.phtml';  
    }
    
    

}