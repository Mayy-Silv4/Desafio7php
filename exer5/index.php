<?php require_once(__DIR__ . "/Produto.php"); ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Controle de Estoque</title>

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

        .msg {
            margin-top: 10px;
            font-size: 14px;
            text-align: center;
            color: red;
        }
    </style>

</head>
<body>

<div class="container">

    <h2>Controle de Estoque</h2>

    <form method="post">
        <label>Nome do Produto:
            <input type="text" name="nome" required>
        </label>

        <label>Quantidade em Estoque:
            <input type="number" name="estoque" required>
        </label>

        <label>Valor Unitário:
            <input type="number" step="0.01" name="valor" required>
        </label>

        <label>Operação:
            <select name="operacao">
                <option value="entrada">Entrada</option>
                <option value="saida">Saída</option>
            </select>
        </label>

        <label>Quantidade da Operação:
            <input type="number" name="quantidade" required>
        </label>

        <button type="submit">Executar</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $produto = new Produto(
            $_POST['nome'],
            (int)$_POST['estoque'],
            (float)$_POST['valor']
        );

        $mensagem = "";

        if ($_POST['operacao'] == "entrada") {
            $produto->entrada((int)$_POST['quantidade']);
            $mensagem = "Entrada realizada com sucesso!";
        } else {
            $mensagem = $produto->saida((int)$_POST['quantidade']);
        }

        echo "<h3>Resultado:</h3>";
        echo "<p class='msg'>$mensagem</p>";
        echo $produto->exibir();
        echo '<button type="button" class="voltar" onclick="history.back()">⬅ Voltar</button>';
    }
    ?>

</div>

</body>
</html>