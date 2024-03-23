<?php

require __DIR__."/vendor/autoload.php";

$metodo = $_SERVER['REQUEST_METHOD'];
$caminho = $_SERVER['PATH_INFO'] ?? '/';

$r = new Php\Primeiroprojeto\Router($metodo, $caminho);

#ROTAS

$r->get('/', function (){
    return "pagina contendo redirect p/ exercicios";
} );

$functions = [
    "/exer1" => function($params) use ($metodo){
       if ($metodo == "POST"){
            
       }else{
        return require_once __DIR__."/src/view/1.html";
       } 
    },
    "/exer2" => function($params) use ($metodo) {

    },
    "/exer3" => function($params) use ($metodo){

    }, 
    "/exer4" => function($params) use ($metodo){ 

    },
    "/exer5" => function($params)use ($metodo){

    },
    "/exer6" => function($params)use ($metodo){

    },
    "/exer7" => function($params)use ($metodo){

    },
    "/exer8" => function($params)use ($metodo){

    },
    "/exer9" => function($params)use ($metodo){

    },
    "/exer10" => function($params)use ($metodo){

    }
];
#ROTAS
foreach($functions as $route => $callback){
    $r->get($route, $callback );
}

$resultado = $r->handler();

if(!$resultado){
    http_response_code(404);
    echo "Página não encontrada!";
    die();
}

echo $resultado($r->getParams());


