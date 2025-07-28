<?php require_once 'lock.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Restrita</title>
</head>
<body>
    <h1>Aula de Login</h1>

     <nav>
        <ul>
            <li>
                <a href="index.php">Home</a>
            </li>
            <li>
                 <a href="restrita.php">Página Restrita</a>
            </li>
            <li>
                <a href="logout.php">Logout</a>
            </li>
        </ul>
    </nav>
    
    <h2>Bem vindo, <?= $_SESSION['user']; ?></h2>
    <?php require_once 'functions.php';
    
    validar_codigo();
    
    ?>
    <form action="cadastrar_tarefa.php" method='POST'>
        <label for="task">Nome da Tarefa</label>
        <input type="text" name="task" id="task" placeholder="Preencha sua tarefa">
        <button type="submit">Adicionar</button>
    </form>
    <?php 
    require_once 'conexao.php';
  

    $conn = conectar_banco();

    $id = $_SESSION['id'];

    $sql = "SELECT id, task FROM tbtasks
    WHERE user_id = $id";
    
    $resultado = mysqli_query($conn,$sql);

    $linhas = mysqli_affected_rows($conn);
    if($linhas < 0){
        exit("<h3>Erro ao buscar suas tarefas.  
        Acione o suporte ou tente novamente mais tarde</h3>");
    }

    if($linhas == 0){
        exit("<h3>Não existe nenhum registro de tarefa cadastrada ainda</h3>");

    }

    echo '<table>';
    while($tarefa_atual = mysqli_fetch_assoc($resultado)){
        $id_tarefa = $tarefa_atual['id'];
        echo '<tr>';
        echo "<td>Tarefa: " . $tarefa_atual['task'] . "<a href=" . "'deletar_tarefa.php?id=" . $id_tarefa ."'>[X]</a>" . "</td>";

        echo '</tr>';
    }
    echo '</table>';
    ?>

    




</body>
</html>

