<?php
class Carro {
    private string $modelo;
    private string $combustivel;
    private float $Litros;
    private float $kmRodados;

    public function __construct($modelo, $combustivel, $Litros, $kmRodados) {
        $this->modelo = $modelo;
        $this->combustivel = $combustivel;
        $this->Litros = $Litros;
        $this->kmRodados = $kmRodados;
    }

    // Autonomia do carro
    public function calcularAutonomia() {
        return $this->Litros * $this->kmRodados;
    }

    // Preço do combustível (simulado)
    private function getPrecoCombustivel() {
        if ($this->combustivel === "gasolina") return 5.50;
        if ($this->combustivel === "etanol") return 3.80;
        return 0;
    }

    // Custo por km
    public function calcularCustoKm() {
        return $this->getPrecoCombustivel() / $this->kmRodados;
    }

    // Verifica revisão (ex: a cada 10.000 km)
    public function verificarRevisao() {
        if ($this->kmRodados >= 10000) {
            return "Hora de fazer revisão!";
        }
        return "Revisão não necessária ainda.";
    }

    // Exibir tudo
    public function exibir() {
        return "
        <ul>
            <li>Modelo: {$this->modelo}</li>
            <li>Combustível: {$this->combustivel}</li>
            <li>Autonomia: " . number_format($this->calcularAutonomia(), 2, ',', '.') . " km</li>
            <li>Custo por km: R$ " . number_format($this->calcularCustoKm(), 2, ',', '.') . "</li>
            <li><strong>{$this->verificarRevisao()}</strong></li>
        </ul>
        ";
    }
}
?>