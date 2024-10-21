<?php
require_once './app/models/equiposIni.model.php';
require_once './app/views/equiposIni.view.php';

class EquiposIniController {
    private $model;
    private $view;
    

    public function __construct() {
        
        $this->model = new equiposIniModel();
        $this->view = new equiposIniView();
    }

    public function showEquiposIni() {
        $equipos = $this->model->getAllEquipos();
        $jugadores = $this->model->getAllJugadores();
        
        $this->view->showEquiposIni($equipos, $jugadores);
        
    }

    public function showJugadoresEquipo($id_equipo) {
        if (is_numeric($id_equipo)) {
            $jugadores = $this->model->getJugadoresByEquipo($id_equipo);
            $this->view->showJugadoresEquipo($jugadores);
        } else {
            
        }
    }
    

}