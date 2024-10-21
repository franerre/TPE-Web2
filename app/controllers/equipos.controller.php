<?php
require_once './app/models/equipos.model.php';
require_once './app/views/equipos.view.php';
require_once './app/middlewares/auth.helper.php';


class EquiposController {
    private $model;
    private $view;

    public function __construct() {
        // verifico logueado
        AuthHelper::verify();
        
        $this->model = new EquiposModel();
        $this->view = new EquiposView();
        
    }

    public function verJugadores($id_equipo) {
        // Lógica para obtener los jugadores asociados al equipo con el ID $id_equipo
        $jugadoresModel = new JugadoresModel();
        $jugadores = $jugadoresModel->getJugadoresByEquipo($id_equipo);
        
        // muestro la vista que contiene la lista de jugadores
        $this->view->showJugadores($jugadores, $equipos);
    }


    public function showEquipos() {
        $equiposModel = new EquiposModel();
        $equipos = $equiposModel->getEquipos();
        $this->view->showEquipos($equipos);
    }
    

    public function addEquipos() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $equipo = $_POST['equipo'];
            $liga = $_POST['liga'];
            $pais = $_POST['pais'];
    
            
            if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
                $imagen = $_FILES['imagen']['name'];
                $tmp_name = $_FILES['imagen']['tmp_name'];
    
               
                move_uploaded_file($tmp_name, "./imagenes/$imagen");
            } else {
                $imagen = null;  
            }
    
            if (empty($equipo) || empty($liga) || empty($pais) || empty($imagen)) {
                $this->view->showError("Debe completar todos los campos");
                return;
            }
    
            $id = $this->model->insertEquipos($equipo, $liga, $pais, $imagen);
    
            if ($id) {
                header('Location: ' . BASE_URL . 'equipos');
            } else {
                $this->view->showError("Error al insertar el equipo");
            }
        }
    }
    
    


    function removeEquipos($id) {
        $this->model->deleteEquipos($id);
        header('Location: ' . BASE_URL . 'equipos');
    }

    public function editEquipos($id) {
        $equipo = $this->model->getEquiposById($id);
        $this->view->showEditForm($equipo);
    }

    public function updateEquipos() {
        if (isset($_POST['id']) && isset($_POST['equipo']) && isset($_POST['liga']) && isset($_POST['pais'])) {
            $id = $_POST['id']; 
            $equipo = $_POST['equipo'];
            $liga = $_POST['liga'];
            $pais = $_POST['pais'];
    
            // imagen 
            if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
                $imagen = $_FILES['imagen']['name'];
                $tmp_name = $_FILES['imagen']['tmp_name'];
                move_uploaded_file($tmp_name, "./imagenes/$imagen");
            } else {

            // Si no subo una nueva imagen, mantiene la misma

                $imagen = $_POST['imagen_actual']; 
            }
    
            
            $this->model->updateEquiposData($id, $equipo, $liga, $pais, $imagen);
    
            header("Location: " . BASE_URL . "equipos");
            exit();
        } 
    }
    
    
    
    

  
    }
    
    
    

   
