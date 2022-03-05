<?php

    if(isset($_GET['action'])){
        $request = $_GET['action'];

        if($request == 'home'){$route = "HomeController@indexAction";}
    }