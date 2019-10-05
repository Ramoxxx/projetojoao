<?php
include "questoesDAO.php";

$acao = $_GET["acao"];

switch ($acao){
    case'inserir':
        $questao = new questaoDAO();
        $questao->titulo = $_POST["titulo"];
        $questao->questao = $_POST["questao"];
        $questao->tipo = $_POST["tipo"];
        $questao->inserirQ();
        break;
    case 'apagar':
        $questao = new questaoDAO();
        $id = $_GET ["id"];
        $questao->apagar($id);
        break;
    case 'trocarsenha':
        $questao = new questaoDAO();
        $id= $_GET["id"];
        $senha = $_POST ["senha"];
        $questaoo-> trocarsenha($id, $senha);
        break;


}




?>