<?php
require_once 'Controlador.php';

class ControleRemoto implements Controlador {

    // Atributos
    private $volume;
    private $ligado;
    private $tocando;

    // Métodos especiais
    public function __construct()
    {
        $this->volume = 50;
        $this->tocando = false;
        $this->ligado = false;
    }

    // Getters

    private function getVolume()
    {
        return $this->volume;
    }

    private function getLigado()
    {
        return $this->ligado;
    }

    private function getTocando()
    {
        return $this->tocando;
    }

    // Setters  

    private function setVolume($volume)
    {
        $this->volume = $volume;

        return $this;
    }

    private function setLigado($ligado)
    {
        $this->ligado = $ligado;

        return $this;
    }

    private function setTocando($tocando)
    {
        $this->tocando = $tocando;

        return $this;
    }

    // Métodos

    public function ligar(){
        $this->setLigado(true);
    }
    public function desligar(){
        $this->setLigado(false);
        $this->setTocando(false);
        $this->setVolume(0);
        echo "Aparelho desligado.";
    }
    public function abrirMenu(){
        echo "<br>-----MENU------";
        echo "<br>Está ligado?: ". ($this->getLigado()?"Sim":"Não");
        echo "<br>Está tocando?: ". ($this->getTocando()?"Sim":"Não");
        echo "<br>Volume: ". $this->getVolume();
        for($i=0; $i <= $this->getVolume(); $i+=10){
            echo "|";
        }
        echo "<br>";
    }
    public function fecharMenu(){
        echo "Fechando menu...";
    }
    public function maisVolume(){
        if($this->getLigado()){
            $this->setVolume($this->getVolume()+10);
        }else{
            echo "Aparelho desligado.";
        }
    }
    public function menosVolume(){
        if ($this->getLigado()){
            $this->setVolume($this->getVolume()-10);
        }else{
            echo "Aparelho desligado.";
        }
    }
    public function ligarMudo(){
        if ($this->getLigado()and ($this->getVolume() > 0)){
            $this->setVolume(0);
        }else{
            echo "Aparelho desligado.";
        }
    }
    public function desligarMudo(){
        if ($this->getLigado() and ($this->getVolume() == 0)){
            $this->setVolume(50);
        }else{
            echo "Aparelho desligado";
        }
    }
    public function play(){

        if ($this->getLigado() and $this->getTocando() == false){
            $this->setTocando(true);

        }elseif($this->getLigado() and $this->getTocando()){
            echo "Já está tocando...";
        }else{
            echo "Aparelho desligado.";
        }
    }
    public function pause(){
        if ($this->getLigado() and $this->getTocando()){
            $this->setTocando(false);

        }elseif($this->getLigado() and $this->getTocando() == false){
            echo "Já está pausado...";
        }else{
            echo "Aparelho desligado.";
        }
    }

}