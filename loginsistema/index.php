<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Aula 11 - Sistema de Login</h1>

    <nav>
        <ul>
            <li>
                <a href="index.php">Home</a>
            </li>
            <li>
                 <a href="restrita.php">Página Restrita</a>
            </li>
        </ul>
    </nav>

    <h2>Para acessar a página restrita, informe seus dados abaixo:</h2>

    <?php 
    require_once 'functions.php';

    validar_codigo();
    
    ?>

    <form action="validar.php" method="post">

        <label for="user">Usuário</label>

        <input type="text" name= "user" id = "user">

        <label for="pass">Senha </label>

        <input type="password" name="pass" id="pass">

        <button type ="submit">Entrar</button>
    </form>
</body>
</html>