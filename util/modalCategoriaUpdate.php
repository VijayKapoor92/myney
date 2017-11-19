<?php
/**
 * Created by PhpStorm.
 * User: Vijay
 * Date: 26/06/17
 * Time: 19:08
 */
?>
<div class="modal fade modal-categoria-update" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Categoria</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" name="formCategoria" id="formCategoria" method="post" action="../api/index.php/categorias/adicionar">
                    <input type="hidden" name="id_restaurante" value="<?= $_SESSION["id_restaurante"]?>">
                    <div class="form-group">
                        <label for="nm_categoria_update">Nome:</label>
                        <input type="text" class="form-control" id="nm_categoria_update" value="">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-success" id="btn-update-categoria">Salvar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
