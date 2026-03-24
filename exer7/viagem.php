<?php
class Viagem {
    private string $origem;
    private string $destino;
    private float $distancia;
    private float $tempo;
    private string $veiculo;

    public function __construct($origem, $destino, $distancia, $tempo, $veiculo) {
        $this->origem = $origem;
        $this->destino = $destino;
        $this->distancia = $distancia;
        $this->tempo = $tempo;
        $this->veiculo = $veiculo;
    }

    // Consumo médio por tipo de veículo (km/l)
    private function getConsumoVeiculo() {
        switch ($this->veiculo) {
            case "carro": return 12;
            case "moto": return 25;
            case "caminhao": return 6;
            default: return 10;
        }
    }

    // Preço do combustível
    private function getPrecoCombustivel() {
        return 5.50; // valor fixo (simulação)
    }

    // Velocidade média
    public function calcularVelocidadeMedia() {
        return $this->distancia / $this->tempo;
    }

    // Consumo estimado (litros)
    public function calcularConsumo() {
        return $this->distancia / $this->getConsumoVeiculo();
    }

    // Custo da viagem
    public function calcularCusto() {
        return $this->calcularConsumo() * $this->getPrecoCombustivel();
    }

    // Exibir resultados
    public function exibir() {
        return "
        <ul>
            <li>Origem: {$this->origem}</li>
            <li>Destino: {$this->destino}</li>
            <li>Distância: {$this->distancia} km</li>
            <li>Tempo: {$this->tempo} horas</li>
            <li>Veículo: {$this->veiculo}</li>
            <li>Velocidade média: " . number_format($this->calcularVelocidadeMedia(), 2, ',', '.') . " km/h</li>
            <li>Consumo estimado: " . number_format($this->calcularConsumo(), 2, ',', '.') . " L</li>
            <li><strong>Custo da viagem: R$ " . number_format($this->calcularCusto(), 2, ',', '.') . "</strong></li>
        </ul>
        ";
    }
}
?>