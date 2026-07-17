<?php
namespace App;

class Controller
{
    public function model($model)
    {
        $modelName = "Models\\$model";
        return new $modelName();
    }

    public function view($view, $data = [])
    {
        if (file_exists(APPROOT . '/views/' . $view . '.php')) {
            require_once APPROOT . '/views/' . $view . '.php';
        } else {
            die('View does not exist');
        }
    }
}
