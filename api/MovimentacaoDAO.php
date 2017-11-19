<?php
/**
* Programador: Vijay Lopes Kapoor
* Data: 29/03/2017
**/
ini_set("display_errors","on");
date_default_timezone_set("America/Sao_Paulo");

require_once "../util/Conexao.php";

class MovimentacaoDAO{

    private $database;

    function __construct(){
        $this->database = new Conexao();
        $this->database->conectar();
    }

    public static function findByMonth($mes){

        $sql = "
        select
          mov.id_movimentacao as \"id_movimentacao\",
          mov.tp_movimentacao as \"tp_movimentacao\",
          mov.tp_pagamento as \"tp_pagamento\",
          mov.nm_movimentacao as \"nm_movimentacao\",
          mov.vl_movimentacao as \"vl_movimentacao\",
          date_format(mov.dt_movimentacao,'%d/%m/%Y') as \"dt_movimentacao\",
          mov.dt_cadastro as \"dt_cadastro\",
          cat.nm_categoria as \"nm_categoria\"
        from
          movimentacao mov,
          categoria cat
        where
          mov.categoria_id_categoria = cat.id_categoria
        group by
          month({$mes})
        ";

        try{

            $rs = mysqli_query((new self)->database->conexao,$sql);
            $json = array();

            while($data = mysqli_fetch_assoc($rs)){
                $json[] = $data;
            }

            return json_encode($json);
        }catch(Exception $e){

        }

    }
      
   public static function adicionar(Movimentacao $movimentacao){

      $sql = "
      insert into movimentacao
      (tp_movimentacao, id_categoria, tp_pagamento, nm_movimentacao, vl_movimentacao, dt_movimentacao, dt_cadastro)
      values
      ({$movimentacao->getTpMovimentacao()}, {$movimentacao->getIdCategoria()}, {$movimentacao->getTpPagamento()}, '{$movimentacao->getNmMovimentacao()}', {$movimentacao->getVlMovimentacao()}, {$movimentacao->getDtMovimentacao()}, sysdate())
      ";

      try{

         mysqli_query((new self)->database->conexao, $sql);

         return array("msg" => "Adicionado com sucesso");
      }catch(Exception $e){

      }

   }

//   public static function deletar($id_categoria){
//
//       $sql = "
//       DELETE FROM CATEGORIA
//       WHERE ID_CATEGORIA = {$id_categoria}
//       ";
//
//       try{
//           $conexao = new Conexao();
//           $conexao->conectar();
//           mysqli_query($conexao->conexao, $sql);
//           return "CategoriaController excluída com sucesso";
//       }catch(Exception $e){
//
//       }
//
//   }

//   private static function updateProduto($id_produto){
//
//       $sql = "
//       UPDATE PRODUTO SET ID_CATEGORIA = NULL WHERE ID_PRODUTO = {$id_produto}
//       ";
//
//       try{
//           $conexao = new Conexao();
//           $conexao->conectar();
//           mysqli_query($conexao->conexao, $sql);
//       }catch(Exception $e){
//
//       }
//   }

}
?>