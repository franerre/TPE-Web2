<?php

class EquiposView {
    public function showEquipos($equipos) {
        $count = count($equipos);

        
        require 'templates/equiposList.phtml';
    }

    public function showError($error) {
        require 'templates/error.phtml';
    }

    public function showEditForm($equipo) {
        require_once 'templates/layout/header.phtml';
        require_once 'templates/editEquipo.phtml';
        require_once 'templates/layout/footer.phtml';
    }
}
?>
