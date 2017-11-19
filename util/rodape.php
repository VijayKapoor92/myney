<script src="library/jquery/jquery-1.11.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<!--<script src="library/popper/dist/dist/popper.js"></script>-->
<script src="library/bootstrap4/js/bootstrap.min.js"></script>
<script src="library/maskmoney/jquery.maskMoney.min.js"></script>
<script>
    $(document).ready(function(){

        System.init();
        $(".movimentacao-list").css({
            "height" : $(window).height() - 200 + "px"
        });
        $("#vl_movimentacao").maskMoney({thousands:".", decimal:",", allowZero:true, preffix: "R$ "});
        $.ajax({
            method : "GET",
            url : "api/index.php/Categoria/"
        }).success(function(data){
            var json = $.parseJSON(data);
            $(".dropdown-categorias").append($("<option>").attr("value",-1).html("Escolher..."));
            for(var i = 0, total = json.length;i < total;i++){
                $(".dropdown-categorias").append(
//                    $("<a>").attr({href:"javascript:void(0);", class:"dropdown-item"}).html(json[i].nm_categoria)
                    $("<option>").attr("value",json[i].id_categoria).html(json[i].nm_categoria)
                )
            }
        });
        $("#btn-adicionar-movimentacao").on("click", function(){
            console.log($("#tp_movimentacao").val() + ", " +
                        $("#tp_pagamento").val() + ", " +
                        $("#nm_movimentacao").val() + ", " +
                        $("#id_categoria").val() + ", " +
                        $("#vl_movimentacao").val().replace(",", ".") + ", " +
                        $("#dt_movimentacao").val()
            );
            $.ajax({
                method : "POST",
                url : "api/index.php/Movimentacao/adicionar",
                data : {
                    tp_movimentacao : $("#tp_movimentacao").val(),
                    tp_pagamento : $("#tp_pagamento").val(),
                    nm_movimentacao : $("#nm_movimentacao").val(),
                    id_categoria : $("#id_categoria").val(),
                    vl_movimentacao : $("#vl_movimentacao").val().replace(",", "."),
                    dt_movimentacao : $("#dt_movimentacao").val()
                }
            }).success(function (data) {
                console.log("sucesso: " + data);
            }).fail(function(data){
                console.log("erro: " + $.parseJSON(data));
            });
        })
    });

    var System = {
        months : ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
        daysOfWeek : ["Domingo", "Segunda-feira", "Terça-feira", "Quarta-feira", "Quinta-feira", "Sexta-feira", "Sábado"],
        init : function(){
            System.Events.load();
            System.Date.load();
            System.Movimentacao.load();
        },
        Movimentacao : {
            load : function(){
                System.Movimentacao.getByMonth();
            },
            getByMonth : function(){
                $.ajax({
                    method : "GET",
                    url : "api/index.php/Movimentacao/" + System.Date.getMonth()
                }).done(function(data){
                    System.Movimentacao.lista($.parseJSON(data));
                }).fail(function(data){
                    console.log("erro: " + data);
                });
            },
            lista : function(json){
                for(var i = 0, total = json.length;i < total;i++) {
                    var image = (parseInt(json[i].tp_pagamento) === 1) ? "fa fa-money" : "fa fa-credit-card";
                    var txtcolor = (parseInt(json[i].tp_movimentacao) === 1) ? "text-success" : "text-danger";
                    var bgcolor = ((parseInt(json[i].tp_movimentacao) === 1)) ? "bg-renda" : "bg-despesa";

                    $(".movimentacao-list table tbody").append(
                        $("<tr>").append(
                            $("<td>").addClass(txtcolor).append(
                                $("<i>").addClass(image)
                            ).css("width","10%")
                        ).append(
                            $("<td>").addClass("text-center").html(json[i].nm_movimentacao).css("width","20%")
                        ).append(
                            $("<td>").addClass("text-center").html(json[i].nm_categoria).css("width","30%")
                        ).append(
                            $("<td>").addClass("text-center").html(json[i].dt_movimentacao).css("width","20%")
                        ).append(
                            $("<td>").addClass("text-center").html("R$ " + json[i].vl_movimentacao.replace(".",",")).css("width","20%")
                        ).mouseenter(function(){
                            $(this).addClass(bgcolor)
                        }).mouseleave(function(){
                            $(this).removeClass(bgcolor)
                        })
                    )
                }
            }
        },
        Date : {
            load : function(){
                System.Date.months();
            },
            months : function(){
                var mes = System.Date.getMonth();
                for(var i = 0, total = System.months.length;i < total;i++) {
                    $(".months").append(
                        $("<a>").attr({href:"javascript:void(0);", class:"nav-link month-link text-secondary"}).html(System.months[i])
                    );
                    if(System.months[i] === System.months[mes]){
                        $(".month-link").eq(mes-1).addClass("ativo").css({
                            "border-bottom":"1px solid #F48FB1"
                        }).removeClass("text-secondary").addClass("text-dark");
                    }
                }
            },
            getArrayDate : function(){
                var data = new Date(),
                    dia = data.getDate(),
                    mes = data.getMonth() + 1,
                    ano = data.getFullYear();
                return [dia,mes,ano];
            },
            getDay : function(){
                return System.Date.getArrayDate()[0];
            },
            getMonth : function(){
                return System.Date.getArrayDate()[1];
            },
            getYear : function(){
                return System.Date.getArrayDate()[2];
            }
        },
        Events : {

            load : function(){
                System.Events.Click.login();
                System.Events.Click.placeholder();
                System.Events.Click.modalMovimentacao();
            },
            Click : {
                login : function(){
                    $("#btn-login").on("click", function(evt){
                        var obj = System.Validacao.login(evt);

                        if(!obj.erro){
                            alert(obj.msg);
                        }else{
                            System.Events.login();
                        };
                    });
                },
                placeholder : function(){
                    $(".login-field").bind({
                        "focus" : function(){
                            sessionStorage.setItem("placeholder", $(this).attr("placeholder"));
                            $(this).attr({placeholder : ""});
                        },
                        "blur" : function(){
                            $(this).attr({placeholder : sessionStorage.getItem("placeholder")});
                        }
                    })
                },
                modalMovimentacao : function(){
                    $("#link-modal-movimentacao").on("click", function(){
                        $("#modal-movimentacao").modal();
                    });
                }
            },
            login : function(){
                $("#formLogin").submit();
//                $.ajax({
//                    url : "util/ControleAcesso.php?acao=login",
//                    method : "POST",
//                    data : {
//                        nm_email_usuario : $("#nm_email_usuario").val(),
//                        nr_senha_usuario : $("#nr_senha_usuario").val()
//                    }
//                }).done(function(data){
//                    console.log("sucesso: " + data);
//                }).fail(function(data){
//                    console.log("erro: " + data);
//                });
            }

        },
        Storage : {
            parseJSON : function(data){
                return $.parseJSON(data);
            }
        },
        Validacao : {

            login : function(evt){
                var boErroUsuario = false,
                    boErroSenha = false,
                    oRetorno = { msg:"" , erro:true};

                if($("#nm_email_usuario").val() == ""){
                    boErroUsuario= true;
                }

                if($("#nr_senha_usuario").val() == ""){
                    boErroSenha = true;
                }

                if(boErroUsuario || boErroSenha){
                    oRetorno.msg = "Algum campo está vazio";
                    oRetorno.erro = false;
                }

                return oRetorno;
            }

        }

    }
</script>
</body>
</html>