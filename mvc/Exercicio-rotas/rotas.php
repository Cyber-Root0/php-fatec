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
        if($metodo == "POST"){
            $n1 = (int) $_POST['n1'];
            $n2 = (int) $_POST['n2'];
            return $n1 > $n2 ? " $n2 $n1 " : ( $n2 > $n1 ? " $n1 $n2" : "Número ".$n2 .' iguais' ) ;
        }else{
            require_once __DIR__.'/src/view/6.html';
        }
    },
    "/exer7" => function($params)use ($metodo){
        if($metodo == "POST"){
            $n1 = (int) $_POST['n1'];
            return "$n1 metros, são ".(100*$n1).' centimetros';
        }else{
            require_once __DIR__.'/src/view/7.html';
        }
    },
    "/exer8" => function($params)use ($metodo){
        if($metodo == "POST"){
            $n1 = (int) $_POST['n1'];
            return (
             function($qtdM2){
                $qty_litros = $qtdM2 % 3 == 0 ? $qtdM2 / 3 : (int) ($qtdM2 / 3) +1;
                $qtd_latas = $qty_litros % 18 == 0 ? $qty_litros/18 :  (int) ($qty_litros/18) + 1;
                return 'Qtd Latas: '.$qtd_latas.'<br>'.
                'Preço: R$'.$qtd_latas*80;
                ;
             }   
            )($n1);
        }else{
            require_once __DIR__.'/src/view/8.html';
        }
    },
    "/exer9" => function($params)use ($metodo){
         define("YEAR", 2015);
        if($metodo == "POST"){
            $n1 = (int) $_POST['n1'];
            return (
                function($anonascimento, $referenceYear){
                    $idade = $referenceYear-$anonascimento;
                    $dias = $idade * 365;
                    $future = 2025 - $anonascimento;
                    return "
                    Idade Atual: $idade <br>
                    Dias Vividos: $dias <br>
                    Idade no ano de 2025: $future <br>
                    ";
                }
            )($n1, YEAR);
        }else{
            require_once __DIR__.'/src/view/9.html';
        }
    },
    "/exer10" => function($params)use ($metodo){
        if($metodo == "POST"){
            require_once __DIR__.'/src/view/10.html';
            $peso = (float) $_POST['peso'];
            $altura = (float) $_POST['altura'];
            $status = 'Bom';
            $imc = $peso / ($altura*$altura);
            return $imc < 18.5 ? 'Abaixo do Peso' : ( $imc > 34.9 ? 'Acima do Peso': 'Grau normal' );
        }else{
            require_once __DIR__.'/src/view/10.html';
        }
    }
];
#ROTAS
foreach($functions as $route => $callback){
    $r->get($route, $callback );
    $r->post($route, $callback);
}