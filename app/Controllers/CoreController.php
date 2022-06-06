<?php
    namespace App\Controllers;
 


    class CoreController
    {
        /* On créer une méthode show() qui pourra être appellé par les autres controllers */
        protected function show($viewName, $viewData=[]){

            global $router;

            extract($viewData);

            d(get_defined_vars());
            require_once __DIR__ . '/../views/layout/header.tpl.php';
            require_once __DIR__ . '/../views/'.$viewName.'.tpl.php';
            require_once __DIR__ . '/../views/layout/footer.tpl.php';
        }
    }