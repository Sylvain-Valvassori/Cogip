<?php
//Explication router : https://youtu.be/Q9PZXoe-aAE

// Propriétées -> encapsulation sert a protéger les propriétés
// namespace -> permet de proterger une classe d'une possibilité de doublons

require_once('views/View.php');

class Router {
    private $_ctrl; //controller
    private $_view;
    
    // l'autoloader charge uniquement les classes du dossier "models"
    public function routeRequest(){
        try{
            //* Chargement automatique des classes
            spl_autoload_register(function($class){
                require_once('models/'.$class.'.php'); 
            });

            $url = '';

            //* Le controller est inclus selon l'action de l'utilisateur
            if(isset($_GET['url'])){

                //explose url puis la sanitize
                $url = explode('/', filter_var($_GET['url'], FILTER_SANITIZE_URL));
              
                // controller sera égale au 1er paramètre
                // ucfirst (1er lettre en Majuscule) / strtolower  (tout le reste en miniscule)
                $controller = ucfirst(strtolower($url[0]));
                
                //nom du fichier "Controller" + suite du nom choisi par l'action (exemple:choix de la page)
                $controllerClass = "Controller".$controller;

                //nom du dossier "controllers/" + le du nom fichier choisi  par l'action (exemple:choix de la page)
                $controllerFile  = "controllers/".$controllerClass.".php"; 
                
                //vérifie si le fichier existe, si oui on l'appel
                if(file_exists($controllerFile)){
                    require_once($controllerFile);
                    //pour utiliser l'encapsulation et pour un maximum de sécurité on stock tous ca dans "l'attribut"(variable dans les classes) $_ctrl
                    $this->_ctrl = new $controllerClass($url);
                } else {
                    // on crée une nouvelle exception paramètre
                    throw new Exception('Page not found router');
                }

            }else {
                require_once('controllers/ControllerHome.php');
                $this->_ctrl = new ControllerHome($url);
            } 
        } catch(Exception $e){ 
            $errorMsg = $e->getMessage();
            $this->_view = new View('Error');
            $this->_view->generate(array('errorMsg' => $errorMsg));
        }
    }
}