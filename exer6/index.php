<?php require_once(__DIR__ . "/ConversorMoeda.php"); ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Conversor de Moeda</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #1e3c72, #2a5298);
        }

        .container {
            background: #fff;
            padding: 25px;
            border-radius: 12px;
            width: 350px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
        }

        h2 {
            text-align: center;
            margin-bottom: 15px;
            color: #1e3c72;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-size: 14px;
        }

        input {
            width: 100%;
            padding: 7px;
            margin-top: 4px;
            border-radius: 6px;
            border: 1px solid #ccc;
        }

        button {
            width: 100%;
            margin-top: 10px;
            padding: 9px;
            border: none;
            border-radius: 6px;
            background: #1e3c72;
            color: white;
            font-size: 15px;
            cursor: pointer;
        }

        button:hover {
            background: #2a5298;
        }

        .voltar {
            background: #555;
        }

        .voltar:hover {
            background: #777;
        }

        h3 {
            margin-top: 15px;
            text-align: center;
            color: #1e3c72;
        }

        .resultado {
            margin-top: 10px;
            padding: 12px;
            background: #f4f6f9;
            border-radius: 10px;
            text-align: center;
            font-size: 15px;
        }
    </style>

</head>
<body>

<div class="container">

    <h2>Conversor de Moeda</h2>

    <form method="post">
        <label>Valor em Reais:
            <input type="number" step="0.01" name="valor" required>
        </label>

        <label>Cotação da Moeda:
            <input type="number" step="0.01" name="cotacao" required>
        </label>

        <button type="submit">Converter</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $conv = new Conversor();

        $resultado = $conv->converter(
            (float)$_POST['valor'],
            (float)$_POST['cotacao']
        );

        echo "<h3>Resultado:</h3>";
        echo "<div class='resultado'>Valor convertido: <strong>" . number_format($resultado, 2, ',', '.') . "</strong></div>";
        echo '<button type="button" class="voltar" onclick="history.back()">⬅ Voltar</button>';
    }
    ?>

</div>

</body>
</html>