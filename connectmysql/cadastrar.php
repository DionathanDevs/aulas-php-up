<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 08 - Cadastrar Cliente</title>
</head>
<body>
    <h1>
        Aula 08 - Cadastrar Cliente 
    </h1>  
    <p><a href="index.php">Voltar a home</a></p>
    <?php
    
    require_once 'validacoes.php';

    if(form_nao_enviado()){
        exit("<h3>Formulário não enviado. Por favor, retorne à Home</h3>");
    }



    if(ha_campos_em_branco($_POST)){
        exit("<h3>Há campos em branco, preencha todos os campos!</h3>");
    }
    
    $nome = $_POST['nome'];
    $fone = $_POST['fone'];
    $email = $_POST['email'];

    require_once 'conexao.php';

    $conn = conectar_banco();

    $sql = "INSERT INTO tb_clientes(nome,fone,email) VALUES(?,?,?)";

    $stmt = mysqli_prepare($conn, $sql);

    // verificar se houve erro no preparo deste stmt

    if(!$stmt){
        exit("<h3>Erro na preparação da consulta </h3>");
    }

    mysqli_stmt_bind_param($stmt, "sss", $nome, $fone, $email);

    if(!mysqli_stmt_execute($stmt)){
        exit("<h3>Erro ao cadastrar . Verifique o erro e tente novamente: " . mysqli_stmt_error($stmt) . "</h3>");
    }

    echo "<h3>Cliente cadastrado com sucesso!</h3>";


    

    
   
    
    
    
    
    
    ?>
</body>
</html>