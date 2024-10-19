<?php
require_once 'config.php';
require_once './app/controllers/jugadores.controller.php';
require_once './app/controllers/jugadoresIni.controller.php';
require_once './app/controllers/equipos.controller.php';
require_once './app/controllers/equiposIni.controller.php';
require_once './app/controllers/auth.controller.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'listar'; 
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}



$params = explode('/', $action);

switch ($params[0]) {
    
    case 'equiposini':
        $equiposIniController = new EquiposIniController();
        $equiposIniController->showEquiposIni();
        break;

        case 'jugadoresini':
            $JugadoresIniController = new JugadoresIniController();
            $JugadoresIniController->showJugadoresIni();
            break;
      

    case 'verjugadores':
        $controller = new EquiposIniController();
        $controller->showJugadoresEquipo($params[1]);
        break;

    case 'verequipos':
        $JugadoresIniController = new JugadoresIniController();
        $JugadoresIniController->showJugadoresEquipo($params[1]);
        break;
        
        
    case 'jugadores':
        $controller = new JugadoresController();
        $controller->showJugadores();
        break;
    

    case 'listar':
        $controller = new JugadoresController();
        $controller->showJugadores();
        break;
    case 'agregar':
        $controller = new JugadoresController();
        $controller->addJugadores();
        break;
    case 'eliminar':
        $controller = new JugadoresController();
        $controller->removeJugadores($params[1]);
        break;

    
    case 'listarequipos':
        $controller = new EquiposController();
        $controller->showEquipos();
        break;
    case 'agregarequipos':
        $controller = new EquiposController();
        $controller->addEquipos();
        break;
    case 'eliminarequipo':
        $controller = new EquiposController();
        $controller->removeEquipos($params[1]);
        break;
    case 'equipos':
        $controller = new EquiposController();
        $controller->showEquipos();
        break;
    case 'login':
        $controller = new AuthController();
        $controller->showLogin();
        break;
    case 'auth':
        $controller = new AuthController();
        $controller->auth();
        break;
    case 'logout':
        $controller = new AuthController();
        $controller->logout();
        break;
        case 'editar':
            $controller = new JugadoresController();
            $controller->editJugadores($params[1]);
            break;
        case 'actualizar':
            $controller = new JugadoresController();
            $controller->updateJugadores($params[1]);
            break;
        case 'actualizarequipos':
            $controller = new EquiposController();
            $controller->updateEquipos();
            break;

        case 'editarEquipos':
            $controller = new EquiposController();
            $controller->editEquipos($params[1]);
            break;
        case 'actualizarEqui':
            $controller = new EquiposController();
            $controller->updateEquipos($params[1]);
            break;
            
            
    default: 
        echo "404 Page Not Found";
        break;
}
