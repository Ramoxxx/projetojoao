<?php

class UsuarioDAO{
    public $nome;
    public $email;
    public $senha;

    private $con;
    function __construct(){
        $this->con = mysqli_connect("localhost", "root", "", "projetopw");
    }

    public function inserir(){

        $sql = "INSERT INTO usuarios VALUES (0,'$this->nome', '$this->email','$this->senha')";
        $rs = $this->con->query($sql);
        if ($rs) {
            header("Location: User.php");
        }
        else echo $this->con->error;
    }
    public function buscar(){

        $sql = "SELECT * FROM usuarios";
        $rs = $this->con->query($sql);
        print_r($rs);
        while ($linha = $rs->fetch_object()){
            $listadeusuarios[] = $linha;

        }
        return $listadeusuarios;
    }
    public function apagar($id){
        $sql="DELETE FROM usuarios WHERE id_usuario = $id";
        $rs = $this->con->query($sql);
        if ($rs) header("Location: User.php");
        else echo $this->con->error;

    }
    public function trocarsenha($id, $senha)  {
        $sql = "UPDATE usuarios SET senha=md5($senha) WHERE id_usuario = $id";
        $rs =  $this->con->query($sql);
        if ($rs)
            header("Location: usuario.php");
        else echo  $this->con->error;
    }
}




?>