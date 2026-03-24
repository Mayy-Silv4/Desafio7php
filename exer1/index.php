<?php require_once(__DIR__ . "/Funcionario.php");?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Funcionário</title>

    <style>
        /* Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        /* Fundo azul */
        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #1e3c72, #2a5298);
        }

        /* Caixa principal */
        form {
            background: #fff;
            padding: 20px;
            border-radius: 12px;
            width: 350px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
        }

        /* Título */
        h2 {
            position: absolute;
            top: 40px;
            color: white;
            text-align: center;
            width: 100%;
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
            position: absolute;
            bottom: 120px;
            color: white;
            width: 100%;
            text-align: center;
        }

        ul {
            position: absolute;
            bottom: 20px;
            background: white;
            padding: 15px;
            border-radius: 10px;
            list-style: none;
            width: 320px;
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
  
    <h2>Informações do Funcionário</h2>

    <form method="post">
        <label>Nome: <input type="text" name="nome" required></label>
        <label>Cargo: <input type="text" name="cargo" required></label>
        <label>Salário: <input type="number" step="0.01" name="salario" required></label>
        <label>Carga Horária Semanal: <input type="number" name="carga" required></label>
        <label>Bônus: <input type="number" step="0.01" name="bonus" required></label>
        <label>Horas Extras: <input type="number" name="extras" required></label>
        <button type="submit">Calcular</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $func = new Funcionario(
            $_POST['nome'],
            $_POST['cargo'],
            (float)$_POST['salario'],
            (int)$_POST['carga']
        );

        echo "<h3>Resultado:</h3>";
        echo $func->exibirDetalhes((float)$_POST['bonus'], (int)$_POST['extras']);
    }
    ?>

</body>
</html>
