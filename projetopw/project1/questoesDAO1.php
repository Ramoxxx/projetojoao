<?php

class questaoDAO{
    public $titulo;
    public $questao;
    public $tipo;

    private $con;
    function __construct(){
        $this->con = mysqli_connect("localhost", "root", "", "projetopw");
    }

    public function inserirQ(){

        $sql = "INSERT INTO questao VALUES (0,'$this->titulo', '$this->questao','$this->tipo')";
        $rs = $this->con->query($sql);
        if ($rs) {
            header("Location: questoes.php");
        }
        else echo $this->con->error;
    }
    public function buscar(){

        $sql = "SELECT * FROM questao";
        $rs = $this->con->query($sql);
        print_r($rs);
        while ($linha = $rs->fetch_object()){
            $listadequestoes[] = $linha;

        }
        return $listadequestoes;
    }
    public function apagar($id){
        $sql="DELETE FROM questao WHERE id_questao = $id";
        $rs = $this->con->query($sql);
        if ($rs) header("Location: User.php");
        else echo $this->con->error;

    }
    }