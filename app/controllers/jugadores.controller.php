<?php
require_once './app/models/jugadores.model.php';
require_once './app/views/jugadores.view.php';
require_once './app/middlewares/auth.helper.php';

class JugadoresController {
    private $model;
    private $view;

    public function __construct() {
        
        AuthHelper::verify();
        
        $this->model = new JugadoresModel();
        $this->view = new JugadoresView();
        
    }

    
    public function showJugadores() {
        $jugadoresModel = new JugadoresModel();
        $equiposModel = new EquiposModel();
        $jugadores = $jugadoresModel->getJugadores();
        $equipos = $equiposModel->getEquipos();
        $this->view->showJugadores($jugadores, $equipos); 
        
    }
  

    public function addJugadores() {

       
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $id_equipo = $_POST['id_equipo'];
        $imagen_jugador = $_POST['imagen_jugador'];
        
        
        if (empty($nombre)) {
            $this->view->showError("Debe completar todos los campos");
            return;
        }

        $id = $this->model->insertJugadores($nombre, $apellido, $id_equipo, $imagen_jugador);
        if ($id) {
            header('Location: ' . BASE_URL);
        } else {
            $this->view->showError("Error al insertar el jugador");
        }
    }

    


    function removeJugadores($id) {
        $this->model->deleteJugadores($id);
        header('Location: ' . BASE_URL);
    }
   

    public function editJugadores($id) {
        $jugador = $this->model->getJugadoresById($id);
        $equiposModel = new EquiposModel();
        $equipos = $equiposModel->getEquipos();
        $this->view->showEditForm($jugador, $equipos);
    }
    
    public function updateJugadores($id) {
        if (isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['id_equipo']) && isset($_POST['imagen_jugador'])) {
            if (!empty($_POST['id']) && !empty($_POST['nombre']) && !empty($_POST['apellido']) && $_POST['id_equipo'] !== "" && ($_POST['imagen_jugador'])) {
                $id = $_POST['id'];
                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido'];
                $id_equipo = $_POST['id_equipo'];
                $imagen_jugador = $_POST['imagen_jugador'];
    
                
    
                $this->model->updateJugadoresData($id, $nombre, $apellido, $id_equipo, $imagen_jugador);
    
                header("Location: " . BASE_URL . "jugadores");
            } else {
               
                $this->view->showError("Debe completar todos los campos");
            }
        }
    }
    
    
    

  
    }
    
    
    

   

   
