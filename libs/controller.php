<?php

class Controller
{

    function __construct()
    {
        $this->view = new View();
    }

    public function loadModel($modelName)
    {
        $path = 'models/' . $modelName . 'Model.php';
        if (file_exists($path)) {
            require $path;
            $className = $modelName . 'Model';
            $this->model = new $className();
        }
    }
}
