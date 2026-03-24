<?php require_once(__DIR__ . "/reservaHotel.php"); ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Hotel</title>

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
            width: 380px;
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
            font-size: 15px;
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

    <h2>Reserva de Hotel</h2>

    <form method="post">
        <label>Nome:
            <input type="text" name="nome" required>
        </label>

        <label>Quantidade de noites:
            <input type="number" name="noites" required>
        </label>

        <label>Tipo de quarto:
            <select name="quarto">
                <option value="simples">Simples</option>
                <option value="luxo">Luxo</option>
                <option value="suite">Suíte</option>
            </select>
        </label>

        <button type="submit">Calcular</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $hotel = new Hotel(
            $_POST['nome'],
            (int)$_POST['noites'],
            $_POST['quarto']
        );

        echo "<h3>Resultado:</h3>";
        echo $hotel->exibir();
        echo '<button type="button" class="voltar" onclick="history.back()">⬅ Voltar</button>';
    }
    ?>

</div>

</body>
</html>