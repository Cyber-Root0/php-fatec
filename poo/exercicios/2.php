<?php
declare(strict_types=1);
/**
 * Funcionario base class
 */
class Funcionario{    
    /**
     * base constructor
     *
     * @return void
     */
    public function __construct
    (
        private int $codigo, 
        private string $nome, 
        private float $salarioBase
    ) {

    }
    /**
     * get current name
     *
     * @return string
     */
    public function getNome() {
        return $this->nome;
    }
    /**
     * get code
     *
     * @return int
     */
    public function getCodigo() {
        return $this->codigo;
    }
    /**
     * get base salary
     *
     * @return float
     */
    public function getSalarioBase() {
        return $this->salarioBase;
    }
    /**
     * set base salary 
     *
     * @param  float $salarioBase
     * @return self
     */
    public function setSalarioBase($salarioBase) {
        $this->salarioBase = $salarioBase;
        return $this;
    }   
    /**
     * get liquid salary
     *
     * @return float
     */
    public function getSalarioLiquido() {
        $inss = $this->salarioBase * 0.1;
        $ir = 0.0;
        if ($this->salarioBase > 2000.0) {
            $ir = ($this->salarioBase - 2000.0) * 0.12;
        }
        return $this->salarioBase - $inss - $ir;
    }
    /**
     * return all information in string format
     *
     * @return string
     */
    public function __toString() {
        return get_class($this) . "\n Codigo: " . 
        $this->getCodigo() . "\n Nome: " . 
        $this->getNome() . "\n Salario Base: " . 
        $this->getSalarioBase() . "\n Salario liquido: " . 
        $this->getSalarioLiquido();
    }
}
/**
 * Servente class
 */
class Servente extends Funcionario{    
    /**
     * override
     *
     * @return float
     */
    public function getSalarioLiquido(){
        return parent::getSalarioLiquido() + (5/100 * $this->getSalarioBase() );       
    }
}
class Motorista extends Funcionario{
    public function __construct(
        int $codigo, 
        string $nome, 
        float $salarioBase,
        private string $cnh
    ){
        parent::__construct($codigo, $nome, $salarioBase);
    }    
    /**
     * get current cnh
     *
     * @return string
     */
    public function getCnh(){
        return $this->cnh;
    }    
    /**
     * set new cnh
     *
     * @param  string $cnh
     * @return self
     */
    public function setCnh(string $cnh){
        $this->cnh = $cnh;
        return $this;
    }
}
class MestreDeObras extends Servente
{    
    /**
     * __construct
     *
     * @return void
     */
    public function __construct(
        int $codigo, 
        string $nome, 
        float $salarioBase,
        private int $totalteam,
    ){
        parent::__construct($codigo, $nome, $salarioBase);
    }    
    /**
     * set current team qty
     *
     * @param  int $totalteam
     * @return self
     */
    public function setQtdTeam(int $totalteam){
        $this->totalteam = $totalteam;
        return $this;
    }    
    /**
     * get current total in team
     *
     * @return int
     */
    public function getQtdTeam(){
        return $this->totalteam;
    }    
    /**
     * getSalarioLiquido
     *
     * @return float
     */
    public function getSalarioLiquido(){
        if ($this->totalteam >= 10) {
            $base =  (10/100 * parent::getSalarioLiquido()) * (int) $this->totalteam /10;  
            return $base + parent::getSalarioLiquido();
            //return (int) $this->totalteam / 10 * parent::getSalarioLiquido();
        }
        return parent::getSalarioLiquido();
    }
}
function render(Funcionario $functionario){
    echo "===== Apresentação de Salarios  ======= \n";
    echo "Nome: ". $functionario->getNome()."\n";
    echo "Tipo: ". get_class($functionario) ."\n";
    echo "Salario: ". $functionario->getSalarioLiquido()."\n\n";


}

$mestre = new MestreDeObras(2, 'Bruno', 2000, 40);
$motorista = new Funcionario(1, 'Brandao', 100);

render($mestre);
render($motorista);