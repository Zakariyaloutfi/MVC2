<?php 

// Inclusion des configurations globales
require_once 'config/global.php';

// Si un contrôleur est spécifié dans l'URL (en tant que paramètre GET), chargez ce contrôleur
if(isset($_GET["controller"])){

        $controllerObj = loadController($_GET["controller"]);
        loadAction($controllerObj ); // correction  $controller(CONTROLLER_DEFAULT) --> $controllerObj 
}// Si aucun contrôleur n'est spécifié, chargez le contrôleur par défaut
    else{
    $controllerObj=loadController(CONTROLLER_DEFAULT);
    loadAction($controllerObj);
}

// Fonction pour charger le contrôleur spécifié
function loadController($controller){
    switch ($controller){
        // Si le contrôleur est 'Films', chargez le contrôleur des films
        case 'Films':
            $strFileController='controller/FilmsController.php';
            require_once $strFileController;
            $controllerObj=new FilmsController();
            break;
        
        // Par défaut (si aucun contrôleur ou un contrôleur non reconnu est spécifié), chargez également le contrôleur des films
        default:
            $strFileController='controller/FilmsController.php';
            require_once $strFileController;
            $controllerObj=new FilmsController();
            break; 
    }
    return $controllerObj; // correction ligne manquante
}

// Fonction pour charger et exécuter l'action spécifiée pour un contrôleur donné
function loadAction($controllerObj){

    // Fonction pour charger et exécuter l'action spécifiée pour un contrôleur donné
    if(isset($_GET["action"])){
        $controllerObj->run($_GET["action"]);
    }else{
        // Si aucune action n'est spécifiée, exécutez l'action par défaut
        $controllerObj->run(ACTION_DEFAULT);
    }
}