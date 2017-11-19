<?php
/**
* Programador: Vijay Lopes Kapoor
* Data: 10/05/2017
**/
ini_set("display_errors","on");
date_default_timezone_set("America/Sao_Paulo");

require_once "Conexao.php";

session_start();

class ControleAcesso{


    public function verificarLogado(){
        if(!isset($_SESSION["logado"])){
            header("Location: ../index.php?logout=2");
            exit();
        }
    }

    public function login($nm_email_usuario, $nr_senha_usuario){
        $sql = "
        SELECT * FROM USUARIO WHERE NM_EMAIL_USUARIO = '{$nm_email_usuario}' and NR_SENHA_USUARIO = MD5('{$nr_senha_usuario}')   
        ";

        try{
            $conexao = new Conexao();
            $conexao->conectar();
            $stmt = mysqli_query($conexao->conexao, $sql);
            if(mysqli_num_rows($stmt) === 1){
                $rs = mysqli_fetch_array($stmt);
                if($rs["nr_senha_usuario"] == md5($nr_senha_usuario)){
                    $_SESSION["id_usuario"] = $rs["id_usuario"];
                    $_SESSION["logado"] = true;
                    header("Location: ../home.php");
                }else{
                    header("Location: ../index.php/logout=1");
                }
            }else{
                header("Location: ../index.php/logout=1");
            }
        }catch(Exception $e){

        }
    }

    public function getIdUsuario(){
        return $_SESSION["id_usuario"];
    }

    public function logout(){
        session_unset();
        session_destroy();
        header("Location: ../index.php?logout=2");
        exit();
    }


}

if(isset($_GET["acao"]) && is_string($_GET["acao"]) && ($_GET["acao"] == "login")){
    $ca = new ControleAcesso();
    $ca->login($_POST["nm_email_usuario"], $_POST["nr_senha_usuario"]);
}
if(isset($_GET["acao"]) && is_string($_GET["acao"]) && ($_GET["acao"] == "logout")){
    $ca = new ControleAcesso();
    $ca->logout();
}

?>