<?php
include_once "util/cabecalho.php";
?>
<style>
    .container{
        padding: 150px;
    }
</style>
<div class="container">
    <form id="formLogin" name="formLogin" class="login" method="post" action="util/ControleAcesso.php?acao=login">
        <div class="login-header text-center mb-5"><h4>Login</h4></div>
        <div class="form-group">
            <input type="email" class="form-control text-center login-field" id="nm_email_usuario" name="nm_email_usuario" placeholder="Email" />
        </div>
        <div class="form-group">
            <input type="password" class="form-control text-center login-field" id="nr_senha_usuario" name="nr_senha_usuario" placeholder="Senha" />
        </div>
        <button class="btn btn-block btn-dark" id="btn-login">Entrar</button>
    </form>
</div>
<?php
include_once "util/rodape.php";
?>
