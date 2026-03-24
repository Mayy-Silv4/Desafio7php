<?php require_once(__DIR__ . "/Pedido.php"); ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Pedido</title>

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
            width: 380px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
        }

        /* Título */
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #1e3c72;
        }

        /* Labels */
        label {
            display: block;
            font-size: 14px;
            margin-bottom: 10px;
            color: #333;
        }

        /* Inputs e select */
        input, select {
            width: 100%;
            padding: 8px;
            margin-top: 4px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 14px;
        }

        /* Botão */
        button {
            width: 100%;
            margin-top: 15px;
            padding: 10px;
            border: none;
            border-radius: 6px;
            background: #1e3c72;
            color: white;
            font-size: 15px;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background: #2a5298;
        }

        /* Resultado */
        h3 {
            margin-top: 20px;
            text-align: center;
            color: #1e3c72;
        }

        /* Lista */
        ul {
            margin-top: 15px;
            padding: 15px;
            background: #f4f6f9;
            border-radius: 10px;
            list-style: none;
        }

        /* Itens */
        li {
            margin-bottom: 8px;
            font-size: 14px;
        }

        /* Destaque total final */
        li strong {
            color: #0a7d2c;
            font-size: 15px;
        }
    </style>

</head>
<body>

<div class="container">

    <h2>Cadastro de Pedido</h2>

    <form method="post">
        <label>Produto:
            <input type="text" name="produto" required>
        </label>

        <label>Quantidade:
            <input type="number" name="quantidade" required>
        </label>

        <label>Preço Unitário:
            <input type="number" step="0.01" name="preco" required>
        </label>

        <label>Tipo de Cliente:
            <select name="tipoCliente">
                <option value="normal">Normal</option>
                <option value="premium">Premium (10% desconto)</option>
            </select>
        </label>

        <button type="submit">Calcular Pedido</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $pedido = new Pedido(
            $_POST['produto'],
            (int)$_POST['quantidade'],
            (float)$_POST['preco'],
            $_POST['tipoCliente']
        );

        echo "<h3>Resumo do Pedido:</h3>";
        echo $pedido->exibirResumo();
    }
    ?>

</div>

</body>
</html>