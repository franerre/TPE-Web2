<?php
require_once './app/models/jugadoresIni.model.php';
require_once './app/views/jugadoresIni.view.php';

class JugadoresIniController {
    private $model;
    private $view;
    

    public function __construct() {
        $this->model = new JugadoresIniModel();
        $this->view = new JugadoresIniView();
    }

    public function showJugadoresIni() {
        $jugadores = $this->model->getAllJugadores();
        $equipos = $this->model->getAllEquipos();
        $this->view->showJugadoresIni($jugadores, $equipos);
        
    }

    public function showJugadoresEquipo($id_equipo) {
        if (is_numeric($id_equipo)) {
            $equipo = $this->model->getEquipoById($id_equipo);  
            if ($equipo) {
                $this->view->showEquipo($equipo);  
            } else {
                echo "Equipo no encontrado.";
            }
        } else {
            echo "ID de equipo no válido.";
        }
    }
    
    
    
    

}