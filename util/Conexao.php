<?php
/*
@author: Vijay Lopes Kapoor
@email: vijaylopeskapoor@gmail.com
@date: 30/12/2016
*/
ini_set("display_errors","on");
// error_reporting(0);
date_default_timezone_set('America/Sao_Paulo');

class Conexao{

	private $db_hostname = "localhost";
	private $db_username = "root";
	private $db_password = "root";
	private $db_database = "mydb";
	public $conexao;


	public function conectar(){

		$conn = mysqli_connect($this->db_hostname,$this->db_username,$this->db_password,$this->db_database);
		
		if(!$conn){
			die("Connection failed: ".mysqli_connect_error());
		}

		$this->conexao = $conn;

	}

	public function desconectar(){
		mysqli_close($this->conexao);
	}

}
/*
#----- TESTE -----#
$conexao = new Conexao();
$conexao->conectar();

$usuario = "Vijay Lopes Kapoor";
$senha = md5("12345678");

$sql = "select ucase(nm_completo) as \"nm_completo\" from clientes where nm_completo=upper('{$usuario}') and nm_senha='{$senha}'";
// print $sql;
// die();
$stmt = mysqli_query($conexao->conexao,$sql);

$rs = mysqli_fetch_array($stmt);
print ucwords($rs["nm_completo"]);

$conexao->desconectar();
#----- FIM TESTE -----#
*/
?>