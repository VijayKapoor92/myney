<?php
/**
 * Created by PhpStorm.
 * User: Vijay
 * Date: 22/06/17
 * Time: 17:49
 */
//TODO: DROPDOWN NO LUGAR DOS SELECTS
?>
<div id="modal-movimentacao" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-pink">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" name="formMovimentacao" id="formMovimentacao" method="post" action="../api/index.php/movimentacao/adicionar">
                    <input type="hidden" name="id_usuario" value="<?= $_SESSION["id_usuario"]?>" />
                    <div class="form-group">
                        <label for="tp_movimentacao" class="form-control-label">Tipo:</label>
                        <select class="form-control" id="tp_movimentacao">
                            <option value="-1">Escolher...</option>
                            <option value="0">Despesa</option>
                            <option value="1">Renda</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tp_pagamento" class="form-control-label">Pagamento:</label>
                        <select class="form-control" id="tp_pagamento">
                            <option value="-1">Escolher...</option>
                            <option value="0">Cartão</option>
                            <option value="1">Dinheiro</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nm_movimentacao" class="form-control-label">Nome:</label>
                        <input type="text" class="form-control" id="nm_movimentacao" name="nm_movimentacao" placeholder="Salário" />
                    </div>
                    <div class="form-group">
                        <label for="id_categoria" class="form-control-label">Categoria:</label>
                        <select class="form-control dropdown-categorias" id="id_categoria"></select>
<!--                        <input type="hidden" id="nm_categoria" name="nm_categoria" />-->
<!--                        <div class="dropdown text-left">-->
<!--                            <button class="btn btn-block btn-light" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
<!--                                Escolher...-->
<!--                            </button>-->
<!--                            <div class="dropdown-menu dropdown-categorias" aria-labelledby="dropdownMenuButton">-->
<!--                            </div>-->
<!--                        </div>-->
                    </div>
                    <div class="form-group">
                        <label for="vl_movimentacao" class="form-control-label">Valor:</label>
                        <input class="form-control text-right" name="vl_movimentacao" id="vl_movimentacao" value="0,00" maxlength="12"/>
                    </div>
                    <div class="form-group">
                        <label for="dt_movimentacao" class="form-control-label">Data:</label>
                        <input class="form-control text-center" name="dt_movimentacao" id="dt_movimentacao" placeholder="dd/mm/aaaa" maxlength="12"/>
                    </div>
                </form>
            </div>
            <div class="modal-footer bg-pink">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-outline-success" id="btn-adicionar-movimentacao">Salvar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
