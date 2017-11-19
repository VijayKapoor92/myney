<?php
/**
 * Created by PhpStorm.
 * User: vijaylopeskapoor
 * Date: 19/11/17
 * Time: 13:45
 */

class Movimentacao {

    private $tp_movimentacao;
    private $id_categoria;
    private $tp_pagamento;
    private $nm_movimentacao;
    private $vl_movimentacao;
    private $dt_movimentacao;

    public function __construct($tp_movimentacao, $id_categoria, $tp_pagamento, $nm_movimentacao, $vl_movimentacao, $dt_movimentacao){
        $this->tp_movimentacao = $tp_movimentacao;
        $this->id_categoria = $id_categoria;
        $this->tp_pagamento = $tp_pagamento;
        $this->nm_movimentacao = $nm_movimentacao;
        $this->vl_movimentacao = $vl_movimentacao;
        $this->dt_movimentacao = $dt_movimentacao;
    }

    /**
     * @return mixed
     */
    public function getTpMovimentacao() {
        return $this->tp_movimentacao;
    }

    /**
     * @return mixed
     */
    public function getIdCategoria() {
        return $this->id_categoria;
    }

    /**
     * @return mixed
     */
    public function getTpPagamento() {
        return $this->tp_pagamento;
    }

    /**
     * @return mixed
     */
    public function getNmMovimentacao() {
        return $this->nm_movimentacao;
    }

    /**
     * @return mixed
     */
    public function getVlMovimentacao() {
        return $this->vl_movimentacao;
    }

    /**
     * @return mixed
     */
    public function getDtMovimentacao() {
        return $this->dt_movimentacao;
    }

    /**
     * @param mixed $id_categoria
     */
    public function setIdCategoria($id_categoria) {
        $this->id_categoria = $id_categoria;
    }

    /**
     * @param mixed $dt_movimentacao
     */
    public function setDtMovimentacao($dt_movimentacao) {
        $this->dt_movimentacao = $dt_movimentacao;
    }

    /**
     * @param mixed $nm_movimentacao
     */
    public function setNmMovimentacao($nm_movimentacao) {
        $this->nm_movimentacao = $nm_movimentacao;
    }

    /**
     * @param mixed $tp_categoria
     */
    public function setTpCategoria($tp_categoria) {
        $this->tp_categoria = $tp_categoria;
    }

    /**
     * @param mixed $tp_pagamento
     */
    public function setTpPagamento($tp_pagamento) {
        $this->tp_pagamento = $tp_pagamento;
    }

    /**
     * @param mixed $vl_movimentacao
     */
    public function setVlMovimentacao($vl_movimentacao) {
        $this->vl_movimentacao = $vl_movimentacao;
    }

}