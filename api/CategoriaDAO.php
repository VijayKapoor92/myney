<?php
/**
* Programador: Vijay Lopes Kapoor
* Data: 29/03/2017
**/
ini_set("display_errors","on");
date_default_timezone_set("America/Sao_Paulo");

require_once "../util/Conexao.php";

class CategoriaDAO{

    private $database;

    function __construct(){
        $this->database = new Conexao();
        $this->database->conectar();
    }

    public static function findAll(){
        $sql = "
        select
          cat.id_categoria,
          cat.nm_categoria,
          cat.categoria_grupo_id_categoria_grupo,
          ctg.nm_categoria_grupo
        from
          categoria cat,
          categoria_grupo ctg
        where
          cat.categoria_grupo_id_categoria_grupo = ctg.id_categoria_grupo
        ";

        try{

            $rs = mysqli_query((new self)->database->conexao,$sql);
            $json = array();

            while($data = mysqli_fetch_assoc($rs)){
//                array_walk($data, function(&$entry){
//                    if($entry!=null){
//                        $entry = utf8_encode($entry);
//                    }
//                });
                $json[] = $data;
            }

            return json_encode($json);
        }catch(Exception $e){

        }
    }

    public function adicionar($id_restaurante, $nm_categoria, $nm_produto, $vl_produto, $nm_descricao_produto, $qt_produto){

        $id_categoria = self::getIdCategoria($id_restaurante, $nm_categoria);

        $sql = "
        INSERT INTO PRODUTO
        (NM_PRODUTO, VL_PRODUTO, NM_DESCRICAO_PRODUTO, QT_PRODUTO, ID_RESTAURANTE, ID_CATEGORIA)
        VALUES
        ('{$nm_produto}', {$vl_produto}, '{$nm_descricao_produto}', {$qt_produto}, {$id_restaurante}, {$id_categoria})
        ";

        try{
            $conexao = new Conexao();
            $conexao->conectar();

            if(mysqli_query($conexao->conexao, $sql)){
                return "Produto {$nm_produto} adicionado com sucesso";
            }else{
                return "Produto {$nm_produto} não foi adicionado";
            }
            $rs = null;
            $conexao->desconectar();
        }catch(Exception $e){

        }

    }

    public function deletar($id_produto){
        $retorno = false;
        $sql = "
        DELETE FROM PRODUTO 
        WHERE ID_PRODUTO = {$id_produto} 
        ";

        try{
            $conexao = new Conexao();
            $conexao->conectar();

            mysqli_query($conexao->conexao, $sql);
            $retorno = true;
            if($retorno){
                return "Produto excluído com sucesso";
            }
        }catch(Exception $e){

        }
    }

    private function deletarRestauranteProduto($id_produto){

        $sql = "
        DELETE FROM RESTAURANTEXPRODUTO WHERE ID_PRODUTO = {$id_produto}
        ";

        try{
            $conexao = new Conexao();
            $conexao->conectar();

            mysqli_query($conexao->conexao, $sql);
        }catch(Exception $e){

        }

    }

    private function getIdCategoria($id_restaurante, $nm_categoria){

        $sql = "
        SELECT 
            ID_CATEGORIA
        FROM
          CATEGORIA
        WHERE
          NM_CATEGORIA = '{$nm_categoria}'
        AND 
          ID_RESTAURANTE = {$id_restaurante}
        ";

        try{
            $conexao = new Conexao();
            $conexao->conectar();

            $stmt = mysqli_query($conexao->conexao, $sql);
            $rs = mysqli_fetch_array($stmt);
            return $rs[0];
        }catch(Exception $e){

        }

    }
}

?>