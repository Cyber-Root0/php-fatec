<?php
abstract class Telefone{
    abstract public function __construct(
        string $ddd,
        string $number,
    );
    abstract public function calculaCusto(int $time) : float;
}
abstract class Celular extends Telefone{
    abstract public function __construct(
        string $ddd,
        string $number,
        float $custo,
        string $operadora
    );
}
class Fixo extends Telefone{
    public function __construct(
        private string $ddd, 
        private string $number,
        private float $custo
    ){

    }
    public function calculaCusto(int $time) : float{
        return $time * $this->getCusto();
    }
    public function getCusto(){
        return $this->custo;
    }
}
class Prepago extends Celular{
     public function __construct(
        private string $ddd,
        private $number,
        private $custo,
        private $operadora
    ){

    }
    public function calculaCusto(int $time){
        return  $time * $this->getCusto();
    }
    public function getCusto(){
        return $this->custo + (40/100 * $this->custo );
    }
}
class Pospago extends Prepago{
    public function getCusto(){
        return $this->custo - (10/100 * $this->custo );
    }   
}