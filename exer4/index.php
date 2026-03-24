<?php require_once(__DIR__ . "/Carro.php"); ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Carro</title>

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
            width: 360px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
        }

        h2 {
            text-align: center;
            margin-bottom: 15px;
            color: #1e3c72;
        }

        label {
            display: block;
            font-size: 14px;
            margin-bottom: 10px;
        }

        input, select {
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

        ul {
            margin-top: 10px;
            padding: 12px;
            background: #f4f6f9;
            border-radius: 10px;
            list-style: none;
        }

        li {
            margin-bottom: 6px;
            font-size: 14px;
        }

        li strong {
            color: green;
        }
    </style>

</head>
<body>

<div class="container">

    <h2>Cadastro de Carro</h2>

    <form method="post">
        <label>Modelo:
            <input type="text" name="modelo" required>
        </label>

        <label>Combustível:
            <select name="combustivel">
                <option value="gasolina">Gasolina</option>
                <option value="etanol">Etanol</option>
            </select>
        </label>

        <label>Litros no tanque:
            <input type="number" step="0.1" name="litros" required>
        </label>

        <label>Km por litro:
            <input type="number" step="0.1" name="km" required>
        </label>

        <button type="submit">Calcular</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $carro = new Carro(
            $_POST['modelo'],
            $_POST['combustivel'],
            (float)$_POST['litros'],
            (float)$_POST['km']
        );

        echo "<h3>Resultado:</h3>";
        echo $carro->exibir();
        echo '<button type="button" class="voltar" onclick="history.back()">⬅ Voltar</button>';
    }
    ?>

</div>

</body>
</html>