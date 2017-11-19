<?php
/**
 * Created by PhpStorm.
 * User: Vijay
 * Date: 22/06/17
 * Time: 17:47
 */
?>
<div class="modal fade modal-produto" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Adicionar produto</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" name="formProduto" id="formProduto" method="post" action="../api/produtos/adicionar/<?=$_SESSION["id_restaurante"];?>">
                    <div class="form-group">
                        <label for="">Categoria:</label>
                        <select id="categoria"></select>
                        <div class="alert alert-danger" role="alert">
                            <span class="glyphicon glyphicon-exclamation-sign"></span>
                            Não há nenhuma categoria adicionada, adicione antes de cadastrar algum produto
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nm_produto">Nome:</label>
                        <input type="text" class="form-control" id="nm_produto" name="nm_produto" placeholder="Coca-Cola" value="">
                    </div>
                    <div class="form-group">
                        <label for="qt_produto">Quantidade</label>
                        <input type="text" class="form-control" id="qt_produto" name="qt_produto" placeholder="100" value="">
                    </div>
                    <div class="form-group">
                        <label for="vl_produto">Valor:</label>
                        <input type="text" class="form-control" id="vl_produto" name="vl_produto" placeholder="4,50" value="">
                    </div>
                    <div class="form-group">
                        <label for="nm_descricao_produto">Descrição:</label>
                        <textarea type="text" class="form-control" id="nm_descricao_produto" name="nm_descricao_produto" placeholder="Sempre gelado para os clientes" value=""></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-success" id="btn-adicionar-produto" data-loading-text="Adionando..." autocomplete="off">Adicionar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
