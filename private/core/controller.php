<?php
class Controller
{
    public function view($view, $data = array())
    {
        extract($data);
        if (file_exists("../private/core/views/" . $view . ".view.php")) {
            require("../private/core/views/" . $view . ".view.php");
        } else {
            require("../private/core/views/404.view.php");
        }
    }
    public function load_model($model)
    {
        if (file_exists("../private/core/models/" . ucfirst($model) . ".php")) {
            require("../private/core/models/" . ucfirst($model) . ".php");
            return $model = new $model();
        }
        return false;
    }
    public function redirect($link){
        header("Location: ".ROOT. "/" .trim($link,"/"));
        die;
    }
};
