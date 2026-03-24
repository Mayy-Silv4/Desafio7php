<?php
class ConversorMoeda {

    public function converter($valor, $cotacao, $moeda) {

        $convertido = $valor / $cotacao;

        if ($moeda == "USD") {
            return "US$ " . number_format($convertido, 2, '.', ',');
        } elseif ($moeda == "EUR") {
            return "€ " . number_format($convertido, 2, ',', '.');
        } else {
            return "Moeda inválida!";
        }
    }
}
?>