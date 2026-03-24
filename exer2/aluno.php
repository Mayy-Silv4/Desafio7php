<?php 

class Aluno {

    private string $nome;
    private string $disciplina;
    private float $n1, $n2, $n3;

    public function __construct($nome, $disciplina, $n1, $n2, $n3){
        $this->nome = $nome;
        $this->disciplina = $disciplina;
        $this->n1 = $n1;
        $this->n2 = $n2;
        $this->n3 = $n3;
    }

    public function calcularMedia() {
        return ($this->n1 + $this->n2 + $this->n3) / 3;
    }

    public function getStatus() {
        $media = $this->calcularMedia();

        if ($media >= 7) return "Aprovado";
        if ($media >= 5) return "Recuperação";
        return "Reprovado";
    }

    public function exibir() {
        return "
        <ul>
            <li>Aluno: {$this->nome}</li>
            <li>Disciplina: {$this->disciplina}</li>
            <li>Média: " . number_format($this->calcularMedia(), 2, ',', '.') . "</li>
            <li><strong>Status: {$this->getStatus()}</strong></li>
        </ul>
        ";
    }
}