<?php 

class View {

    public function render($viewPath){
        $this->view = $viewPath;
        require 'Views/layout.php';
    }

}