<?php

    include_once('/config.php');
    include_once('db.php');

    spl_autoload_register(function($class){
        if(file_exists('/controller/'.$class.'.php')){
            require '/controller/'.$class.'.php';
        }

        if(file_exists('/model/'.$class.'.php')){
            require '/model/'.$class.'.php';
        }
    });

    $db = Connection::connect($config);

    include_once('/routes/route.php');

    if(!empty($route)){
        $routes = explode('@', $route);
        $controller = ucfirst($route[0]);
        $model = ucfirst(str_replace("controller", '', $route[0])).'Model';
        $action = lcfirst($routes[1]);

    }else {

        $controller = 'HomeController';
        $model = 'HomeModel';
        $action = 'indexAction';
    }
        $load_new = new $controller();
        $model = new model();
        $load_new->model=$model;
        $model->db = $db;
        $index = $load_new->$action();

    

    