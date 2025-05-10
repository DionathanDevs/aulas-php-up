<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
    require_once 'conexao.php';


    $conn = conectar_banco();

    $query = "SELECT * FROM tb_clientes";

    $resultado = mysqli_query($conn, $query);
    
    $linha_afetadas = mysqli_affected_rows($conn);



    if($linha_afetadas == 0){
        exit("<h3>Não existe registros no banco de dados</h3>");
    }
    
    if($linha_afetadas < 0){
        exit("<h3>Erro ao executar a query</h3>");
    }

    echo "<h2> Clientes Cadastrados Atualmente </h2>";

    while($cliente = mysqli_fetch_assoc($resultado)){
        echo "ID: " . $cliente['id'] . "<br>";
        echo "Nome: " . $cliente['nome'] . "<br>";
        echo "Fone: " . $cliente['fone'] . "<br>";
        echo "E-mail: " . $cliente['email'] . "<br>";
    }
    
    
    ?>
</body>
</html>