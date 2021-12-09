<?php

class View{

    private $_file;
    private $_titlePage;

    public function __construct($action){
        $this->_file = 'views/view'.$action.'.php';
    }

    //* ==========|  Génére et affiche la VUE |==========
    public function generate($data){

        //* ==========|  Content |==========
        // permet d'afficher la view avec les datas choisi
        // partie spécifique de la vue sans le header et le footer
        $content = $this->generateFile($this->_file, $data);

        //* ==========|  Template |==========
        // partie de la vue qui contint le header et le footer
        $view = $this->generateFile('views/template.php', array('titlePage' => $this->_titlePage, 'content' => $content));

        echo $view;
    }

    //* ==========|  Génére un fichier Vue et le retourne |==========
    // Génére un fichier vue et renvoie le résultat produit
    private function generateFile($file, $data){
        if(file_exists($file)){
            extract($data);

            ob_start();
            // Inclut le fichier Vue
            require $file;
            return ob_get_clean();
        }else {
            throw new Exception('File '.$file.' is not found');
        }
    }
}