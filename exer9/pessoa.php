<?php
class Pessoa {
    private string $nome;
    private float $peso;
    private float $altura;

    public function __construct($nome, $peso, $altura) {
        $this->nome = $nome;
        $this->peso = $peso;
        $this->altura = $altura;
    }

    // Calcular IMC
    public function calcularIMC() {
        return $this->peso / pow($this->altura, 2);
    }

    // Classificação do IMC
    public function classificarIMC() {
        $imc = $this->calcularIMC();

        if ($imc < 18.5) {
            return "Abaixo do peso";
        } elseif ($imc < 25) {
            return "Peso normal";
        } elseif ($imc < 30) {
            return "Sobrepeso";
        } else {
            return "Obesidade";
        }
    }

    // Exibir resultados
    public function exibir() {
        return "
        <ul>
            <li>Nome: {$this->nome}</li>
            <li>Peso: {$this->peso} kg</li>
            <li>Altura: {$this->altura} m</li>
            <li>IMC: " . number_format($this->calcularIMC(), 2, ',', '.') . "</li>
            <li><strong>Classificação: {$this->classificarIMC()}</strong></li>
        </ul>
        ";
    }
}
?>