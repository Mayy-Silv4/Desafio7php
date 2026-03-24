<?php require_once(__DIR__ . "/Aluno.php");?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Aluno</title>

    <style>
        /* Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        /* Fundo */
        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #1e3c72, #2a5298);
        }

        /* Container */
        .container {
            background: #fff;
            padding: 25px;
            border-radius: 12px;
            width: 350px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
        }

        /* Título */
        h2 {
            text-align: center;
            margin-bottom: 15px;
            color: #1e3c72;
        }

        /* Labels */
        label {
            display: block;
            font-size: 14px;
            margin-bottom: 10px;
            color: #333;
        }

        /* Inputs */
        input {
            width: 100%;
            padding: 7px;
            margin-top: 4px;
            border-radius: 6px;
            border: 1px solid #ccc;
        }

        /* Botão */
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

        /* Resultado */
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

    <h2>Informações do Aluno</h2>

    <form method="post">
        <label>Nome: <input type="text" name="nome" required></label>
        <label>Disciplina: <input type="text" name="disciplina" required></label>
        <label>Nota 1: <input type="number" step="0.1" name="nota1" required></label>
        <label>Nota 2: <input type="number" step="0.1" name="nota2" required></label>
        <label>Nota 3: <input type="number" step="0.1" name="nota3" required></label>

        <button type="submit">Calcular</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $func = new Aluno(
            $_POST['nome'],
            $_POST['disciplina'],
            (float)$_POST['nota1'],
            (float)$_POST['nota2'],
            (float)$_POST['nota3']
        );

        echo "<h3>Resultado:</h3>";
        echo $func->exibir();
    }
    ?>

</div>

</body>
</html>
