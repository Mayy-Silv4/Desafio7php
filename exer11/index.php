<?php require_once(__DIR__ . "/calculadoraGeometrica.php"); ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cálculo de Área</title>

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
            margin-bottom: 10px;
            font-size: 14px;
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
        }
    </style>

    <script>
        function atualizarCampos() {
            let figura = document.getElementById("figura").value;
            let campo2 = document.getElementById("campo2");

            if (figura === "retangulo") {
                campo2.style.display = "block";
            } else {
                campo2.style.display = "none";
            }
        }
    </script>

</head>
<body>

<div class="container">

    <h2>Cálculo de Área</h2>

    <form method="post">
        <label>Figura:
            <select name="figura" id="figura" onchange="atualizarCampos()">
                <option value="quadrado">Quadrado</option>
                <option value="retangulo">Retângulo</option>
                <option value="circulo">Círculo</option>
            </select>
        </label>

        <label>Valor 1:
            <input type="number" step="0.1" name="valor1" required>
        </label>

        <div id="campo2" style="display:none;">
            <label>Valor 2:
                <input type="number" step="0.1" name="valor2">
            </label>
        </div>

        <button type="submit">Calcular</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $geo = new Geo(
            $_POST['figura'],
            (float)$_POST['valor1'],
            isset($_POST['valor2']) ? (float)$_POST['valor2'] : 0
        );

        echo "<h3>Resultado:</h3>";
        echo $geo->exibir();
        echo '<button type="button" class="voltar" onclick="history.back()">⬅ Voltar</button>';
    }
    ?>

</div>

</body>
</html>