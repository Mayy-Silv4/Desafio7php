<?php
class Hotel {
    private string $nome;
    private int $noites;
    private string $quarto;

    public function __construct($nome, $noites, $quarto) {
        $this->nome = $nome;
        $this->noites = $noites;
        $this->quarto = $quarto;
    }

    // Valor da diária
    private function getPrecoQuarto() {
        switch ($this->quarto) {
            case "simples": return 120;
            case "luxo": return 200;
            case "suite": return 350;
            default: return 0;
        }
    }

    // Total sem desconto
    public function calcularTotal() {
        return $this->noites * $this->getPrecoQuarto();
    }

    // Desconto (10% se mais de 5 noites)
    public function calcularDesconto() {
        if ($this->noites > 5) {
            return $this->calcularTotal() * 0.10;
        }
        return 0;
    }

    // Total final
    public function calcularTotalFinal() {
        return $this->calcularTotal() - $this->calcularDesconto();
    }

    // Mensagem de boas-vindas
    public function mensagem() {
        return "Bem-vindo(a), {$this->nome}! Aproveite sua estadia.";
    }

    // Exibir resultados
    public function exibir() {
        return "
        <ul>
            <li>{$this->mensagem()}</li>
            <li>Tipo de quarto: {$this->quarto}</li>
            <li>Noites: {$this->noites}</li>
            <li>Valor da diária: R$ " . number_format($this->getPrecoQuarto(), 2, ',', '.') . "</li>
            <li>Total sem desconto: R$ " . number_format($this->calcularTotal(), 2, ',', '.') . "</li>
            <li>Desconto: R$ " . number_format($this->calcularDesconto(), 2, ',', '.') . "</li>
            <li><strong>Total final: R$ " . number_format($this->calcularTotalFinal(), 2, ',', '.') . "</strong></li>
        </ul>
        ";
    }
}
?>