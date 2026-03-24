<?php
class Geo {
    private string $figura;
    private float $valor1;
    private float $valor2;

    public function __construct($figura, $valor1, $valor2 = 0) {
        $this->figura = $figura;
        $this->valor1 = $valor1;
        $this->valor2 = $valor2;
    }

    // Calcula a área conforme a figura
    public function calcularArea() {
        switch ($this->figura) {

            case "quadrado":
                return pow($this->valor1, 2);

            case "retangulo":
                return $this->valor1 * $this->valor2;

            case "circulo":
                return pi() * pow($this->valor1, 2);

            default:
                return 0;
        }
    }

    // Retorna nome da figura formatado
    public function getFigura() {
        switch ($this->figura) {
            case "quadrado": return "Quadrado";
            case "retangulo": return "Retângulo";
            case "circulo": return "Círculo";
            default: return "Desconhecida";
        }
    }

    // Exibe resultado final
    public function exibir() {
        return "
        <ul>
            <li>Figura: {$this->getFigura()}</li>
            <li>Área: <strong>" . number_format($this->calcularArea(), 2, ',', '.') . "</strong></li>
        </ul>
        ";
    }
}
?>