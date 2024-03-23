<?Php

#ROTAS

$r->get('/', function (){
    return "pagina contendo redirect p/ exercicios";
} );

$functions = [
    "/exer1" => function($params) use ($metodo){
       if ($metodo == "POST"){
            $n = (int) $_POST['n1'];
            return $n == 0 ? 'Número igual a 0' : ($n > 0 ? 'Número maior que 0' : ' número menor que 0'); 
       }else{
        require_once __DIR__."/src/view/1.html";
       } 
    },
    "/exer2" => function($params) use ($metodo) {
        if ($metodo == "POST"){
            $min = min($_POST['n1']);
            $temp = 'O menor valor é: '.$min.PHP_EOL;
            $temp.= 'E sua posição é: '.array_search($min, $_POST['n1']); 
            return $temp; 
       }else{
        require_once __DIR__."/src/view/2.phtml";
       } 
    },
    "/exer3" => function($params) use ($metodo){
        if($metodo == "POST"){
            $n1 = (int) $_POST['n1'];
            $n2 = (int) $_POST['n2'];
            return $n2 == $n1 ? 'O triplo da soma é: '. ( ($n2+$n1) *3 ) : 'A soma dos 2 números é: '. ($n1+$n2);
        }else{
            require_once __DIR__.'/src/view/3.html';
        }
    }, 
    "/exer4" => function($params) use ($metodo){ 
        if($metodo == "POST"){
            $n1 = (int) $_POST['n1'];
            $template = (
                function($n1){
                    $t = '';
                    for($i = 1; $i<=10; $i++){
                        $t.= "{$n1} x {$i} = ".$i*$n1.'<br>';
                    }
                    return '<h1>Tabuada: </h1>'.$t;
                }
            )($n1);
            return $template;
        }else{
            require_once __DIR__.'/src/view/4.html';
        }
    },
    "/exer5" => function($params)use ($metodo){
        if($metodo == "POST"){
            $n1 = (int) $_POST['n1'];
            $fatorial = 1;
            $calculo_f = function(int $n){
                $f = 1;
                if ($n == 0 || $n == 1){
                    return $n;
                }
                if ($n <0){
                    throw new InvalidArgumentException('Não existe fatorial p/ numero negativo');
                }
                for($i = $n; $i > 1; $i--){
                    $f = $f*$i; 
                }
                return $f;
            };
            return 'O fatorial é: '.$calculo_f($n1);
        }else{
            require_once __DIR__.'/src/view/5.html';
        }
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
    $r->post($route, $callback);
}