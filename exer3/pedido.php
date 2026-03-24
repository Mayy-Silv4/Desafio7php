<?php 

class Pedido {

 private string $produto;
    private int $quantidade;
    private float $precoUnitario;
    private string $tipoCliente;

    public function __construct($produto, $quantidade, $precoUnitario, $tipoCliente) {
        $this->produto = $produto;
        $this->quantidade = $quantidade;
        $this->precoUnitario = $precoUnitario;
        $this->tipoCliente = $tipoCliente;
    }

    // Total bruto
    public function calcularTotalBruto() {
        return $this->quantidade * $this->precoUnitario;
    }

    // Desconto (10% se premium)
    public function calcularDesconto() {
        if ($this->tipoCliente === "premium") {
            return $this->calcularTotalBruto() * 0.10;
        }
        return 0;
    }

    // Imposto (8%)
    public function calcularImposto() {
        return $this->calcularTotalBruto() * 0.08;
    }

    // Total final
    public function calcularTotalFinal() {
        return $this->calcularTotalBruto()
             - $this->calcularDesconto()
             + $this->calcularImposto();
    }

    // Exibir tudo formatado
    public function exibirResumo() {
        return "
        <ul>
            <li>Produto: {$this->produto}</li>
            <li>Quantidade: {$this->quantidade}</li>
            <li>Preço unitário: R$ " . number_format($this->precoUnitario, 2, ',', '.') . "</li>
            <li>Total bruto: R$ " . number_format($this->calcularTotalBruto(), 2, ',', '.') . "</li>
            <li>Desconto: R$ " . number_format($this->calcularDesconto(), 2, ',', '.') . "</li>
            <li>Imposto (8%): R$ " . number_format($this->calcularImposto(), 2, ',', '.') . "</li>
            <li><strong>Total final: R$ " . number_format($this->calcularTotalFinal(), 2, ',', '.') . "</strong></li>
        </ul>
        ";
    }

}
?>