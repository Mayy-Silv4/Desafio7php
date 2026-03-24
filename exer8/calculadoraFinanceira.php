<?php
class CalculadoraFinanceira {
    private float $valor;
    private int $parcelas;
    private float $juros;

    public function __construct($valor, $parcelas, $juros) {
        $this->valor = $valor;
        $this->parcelas = $parcelas;
        $this->juros = $juros;
    }

    // Valor total com juros compostos
    public function calcularTotal() {
        return $this->valor * pow(1 + $this->juros, $this->parcelas);
    }

    // Valor da parcela
    public function calcularParcela() {
        return $this->calcularTotal() / $this->parcelas;
    }

    // Juros pagos
    public function calcularJuros() {
        return $this->calcularTotal() - $this->valor;
    }

    // Exibir
    public function exibir() {
        return "
        <ul>
            <li>Valor inicial: R$ " . number_format($this->valor, 2, ',', '.') . "</li>
            <li>Parcelas: {$this->parcelas}</li>
            <li>Taxa de juros: " . ($this->juros * 100) . "%</li>
            <li>Valor da parcela: R$ " . number_format($this->calcularParcela(), 2, ',', '.') . "</li>
            <li>Total a pagar: R$ " . number_format($this->calcularTotal(), 2, ',', '.') . "</li>
            <li><strong>Juros pagos: R$ " . number_format($this->calcularJuros(), 2, ',', '.') . "</strong></li>
        </ul>
        ";
    }
}
?>