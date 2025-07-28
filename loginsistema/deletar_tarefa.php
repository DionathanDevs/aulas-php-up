<?php require_once 'lock.php';

if(!isset($_GET['id'])){
    header('location:restrita.php');
    exit;
}

$id_task = (int)$_GET['id'];

require_once 'conexao.php';

$conn = conectar_banco();

$id_user = $_SESSION['id'];

$sql = "DELETE FROM tbtasks WHERE id = $id_task AND user_id = $id_user";

mysqli_query($conn,$sql);

$linhas = mysqli_affected_rows($conn);

 if($linhas < 0){
        header('location:restrita.php?codigo=4');
        exit;
    }

    if($linhas == 0){
        header('location:restrita.php?codigo=5');
        exit;

    }

header('location:restrita.php');
?>