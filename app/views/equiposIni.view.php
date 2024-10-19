<?php



class EquiposIniView {
    
    public function showEquiposIni($equipos, $jugadores) {
        $count = count($equipos);

      
        require 'templates/categoria_equipos.phtml';
        
      
    }
    public function showJugadoresEquipo($jugadores) {
        $count = count($jugadores);
        require 'templates/jugadores.phtml';
    }
    

}