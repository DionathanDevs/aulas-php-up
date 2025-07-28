<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
require_once 'validacoes.php';

$livro = [];

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $livro = [
        [
            'title' => $_POST['title'],
            'autor' => $_POST['autor'],
            'price' => $_POST['price'],
            'quant' => $_POST['quant']
        ]
        ];

        if(validar_livro(($livro[0])) == true){
            $valorTotal = calcularValorTotalEstoque($livro[0]);
            echo '<div class = " box-resultado">';
            echo "Titulo: " . $livro[0]['title'] . '<br>';
            echo "Autor: " . $livro[0]['autor']. '<br>';
            echo "Preço: " . $livro[0]['price']. '<br>';
            echo "Quantidade: " . $livro[0]['quant']. '<br>';
            echo "Valor total em estoque R$" . number_format($valorTotal, 2, ',', '.');
            echo '</div>';
        
        }else{
            echo '<div class="box-resultado"><p>Os campos não são válidos, por favor verificar se foram preenchidos da forma correta, com Nome, Autor, Preço maior que 0.01 e quantidade maior que 0.</p><br>';
            echo '
            <a class="botao-voltar" href="index.php">Voltar para página principal</a>
            ';
            echo '</div>';
        }
}else{
    echo '<a class="botao-voltar" href="index.php">Voltar para página principal</a>
    ';
}

?>

</body>
</html>
