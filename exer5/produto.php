<?php
class Produto {
    private string $nome;
    private int $estoque;
    private float $valorUnitario;

    public function __construct($nome, $estoque, $valorUnitario) {
        $this->nome = $nome;
        $this->estoque = $estoque;
        $this->valorUnitario = $valorUnitario;
    }

    // Entrada no estoque
    public function entrada(int $quantidade) {
        $this->estoque += $quantidade;
    }

    // Saída do estoque
    public function saida(int $quantidade) {
        if ($quantidade > $this->estoque) {
            return "Estoque insuficiente!";
        }
        $this->estoque -= $quantidade;
        return "Saída realizada com sucesso!";
    }

    // Valor total em estoque
    public function valorTotal() {
        return $this->estoque * $this->valorUnitario;
    }

    // Exibir dados
    public function exibir() {
        return "
        <ul>
            <li>Produto: {$this->nome}</li>
            <li>Estoque atual: {$this->estoque}</li>
            <li>Valor unitário: R$ " . number_format($this->valorUnitario, 2, ',', '.') . "</li>
            <li><strong>Valor total em estoque: R$ " . number_format($this->valorTotal(), 2, ',', '.') . "</strong></li>
        </ul>
        ";
    }
}
?>