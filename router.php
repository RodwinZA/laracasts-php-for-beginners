<?php

$routes = require "routes.php";

function routeToController($uri, $routes){
    if (array_key_exists($uri, $routes)){
        require $routes[$uri];
    } else {
        abort();
    }
}

function abort($code = 404){ // sets a default code to be passed to func
    http_response_code($code);
    require "views/{$code}.php";
    die();
}

// parse the url and extract it from any query that might follow
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

routeToController($uri, $routes);