<?php
include_once "util/cabecalho.php";

//TODO: divider para o ultimo item do sidebar
?>
<style>
    .sidebar{
        position: fixed;
        left:0;
        height: 100%;
    }
    .sidebar ul{
        list-style: none;
        padding-left: 10px;
        padding-right: 10px;
    }
    .sidebar ul li{
        padding-top: 5px;
    }
    .sidebar-bottom{
        position: absolute;
        bottom: 0;
        border-top: 1px solid #FFFFFF;
        padding-top: 5px;
    }
    .menu{
        display: block;
        border-bottom: 1px solid #EEEEEE;
    }
    .movimentacao-list{
        width: 100%;
        border-bottom: 1px solid #EEEEEE;
        overflow: scroll;
    }
    .movimentacao-list table{
        width: 100%;
    }
    .movimentacao-list table td{
        padding: 10px;
    }
    .dropdown-categorias{
        height: 250px;
        overflow: scroll;
    }
    .bg-renda{
        background-color: #C8E6C9;
    }
    .bg-despesa{
        background-color: #FFCDD2;
    }
    .bg-pink{
        background-color: #F48FB1;
    }
    .f-24{
        font-size: 24px;
    }
    .f-22{
        font-size: 22px;
    }
    .f-20{
        font-size: 20px;
    }
</style>
<div class="sidebar bg-pink">
    <ul>
        <li><a href="javascript: void(0);" id="btn-home" class="f-24"><i class="fa fa-home text-light"></i></a></li>
        <li><a href="javascript: void(0);" id="btn-acompanhamento" class="f-22 pt-5"><i class="fa fa-bar-chart text-light"></i></a></li>
    </ul>
    <ul class="sidebar-bottom">
        <li><a href="javascript: void(0);" id="btn-sair" class="f-22"><i class="fa fa-sign-out text-light"></i></a></li>
    </ul>
</div>
<div class="container">
    <nav class="nav months">
    </nav>
    <div class="movimentacao">
        <div class="menu pt-5">
            <ul class="nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-secondary" data-toggle="dropdown" href="javascript: void(0);" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-plus"></i></a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="javascript: void(0);" id="link-modal-conta">Conta</a>
                        <a class="dropdown-item" href="javascript: void(0);" id="link-modal-movimentacao">Movimentação</a>
                    </div>
                </li>
            </ul>
        </div>
        <div class="movimentacao-list">
            <table class="table-striped">
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <?php
    include_once "util/modalMovimentacao.php";
    ?>
</div>
<?php
include_once "util/rodape.php";
?>