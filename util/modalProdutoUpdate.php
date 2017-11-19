<?php
/**
 * Created by PhpStorm.
 * User: Vijay
 * Date: 27/06/17
 * Time: 22:20
 */
?>
<div class="modal fade modal-produto-update" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            </div>
            <div class="modal-body">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label for="categoria_update">Categoria:</label>
                        <select id="categoria_update"></select>
                    </div>
                    <div class="form-group">
                        <label for="nm_produto_update">Nome:</label>
                        <input type="text" class="form-control" id="nm_produto_update" name="nm_produto_update" value="">
                    </div>
                    <div class="form-group">
                        <label for="qt_produto_upgrade">Quantidade</label>
                        <input type="text" class="form-control" id="qt_produto_update" name="qt_produto_update" value="">
                    </div>
                    <div class="form-group">
                        <label for="vl_produto_upgrade">Valor:</label>
                        <input type="text" class="form-control" id="vl_produto_update" name="vl_produto_update" value="">
                    </div>
                    <div class="form-group">
                        <label for="nm_descricao_produto_upgrade">Descrição:</label>
                        <textarea type="text" class="form-control" id="nm_descricao_produto_update" name="nm_descricao_produto_update" value=""></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-success" id="btn-update-produto" data-loading-text="Adionando..." autocomplete="off">Salvar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
