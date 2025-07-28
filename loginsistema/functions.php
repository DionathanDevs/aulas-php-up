<?php

function form_nao_enviado(){
    return $_SERVER['REQUEST_METHOD'] !== 'POST';
}

function form_em_branco(){
    return empty($_POST['user'] || empty($_POST['pass']));
}

function tarefa_em_branco(){
    return empty($_POST['task']);
}

function validar_codigo(){

    if(!isset($_GET['codigo'])){
        return;
    }

    $codigo = (int)$_GET['codigo'];

    switch($codigo){


       switch($ms){
    case 0:
        $msg = "<p class='card-alert'>Erro: A requisição deve ser feita via formulário.</p>";
        break;
    case 1:
        $msg = "<p class='card-alert'>Erro: As senhas não coincidem.</p>";
        break;
    case 2:
        $msg = "<p class='card-alert'>Erro: Falha ao preparar a consulta SQL.</p>";
        break;
    case 3:
        $msg = "<p class='card-alert'>Erro: Falha ao vincular parâmetros à consulta.</p>";
        break;
    case 4:
        $msg = "<p class='card-alert'>Erro: Campos obrigatórios não preenchidos.</p>";
        break;
    case 5:
        $msg = "<p class='card-alert'>Erro: Falha ao executar a operação no banco de dados.</p>";
        break;
    case 6:
        $msg = "<p class='card-alert'>Cadastro realizado com sucesso!</p>";
        break;
    case 7:
        $msg = "<p class='card-alert'>Erro: Nenhum usuário encontrado com essas credenciais.</p>";
        break;
    case 8:
        $msg = "<p class='card-alert'>Erro: Preencha todos os campos do formulário.</p>";
        break;
    default:
        $msg = "";
        break;

    }

    echo $ms;
}


?>