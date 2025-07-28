<?php 

require_once 'functions.php'; 

if(form_nao_enviado()){
    header('location:index.php?codigo=1');
    exit;
}

if(form_em_branco()){
    header('location:index.php?codigo=2');
    exit;
}

require_once 'conexao.php';

$user = $_POST['user'];

$senha = $_POST['pass'];

$conn = conectar_banco();

$sql = "SELECT * FROM tbusers WHERE user = ? AND pass = ?";

$stmt = mysqli_prepare($conn, $sql);

if(!$stmt){
    header("location:index.php?codigo=4");
    exit;
}

mysqli_stmt_bind_param($stmt, "ss", $user, $senha);

if(!mysqli_stmt_execute($stmt)){
    header("location:index.php?codigo=4");
    exit;
}



mysqli_stmt_store_result($stmt);

$linhas = mysqli_stmt_affected_rows($stmt);

if($linhas <= 0){
header('location:index.php?codigo=3');
exit;
}

mysqli_stmt_bind_result($stmt, $id, $usuario, $senha);

mysqli_stmt_fetch($stmt);

session_start();

$_SESSION['id'] = $id;

$_SESSION['user'] = $user;

$_SESSION['pass'] = $senha;

header('location:restrita.php');

?>