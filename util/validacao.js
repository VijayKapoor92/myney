/**
* Programador: Vijay Lopes Kapoor
* Objetivo: Validar campos
* Data: 20/01/2017
*
* Quando passar o id, passar com o simbolo '#';
* Javascript(Jquery);
**/

var validacaoFormularioCadastroPessoa = function(){

	var bo = true;
	$("input,select").css({"border":"none"});

	if($("#nome").val() == ""){
		$("#nome").css("border","1px solid #D32F2F");
		$("#nome").effect("shake",{
   		direction:"right",
   		distance:"10",
   		times:"3"
		});
		bo = false;
	}

	if($("#sobrenome").val() == ""){
		$("#sobrenome").css("border","1px solid #D32F2F");
		$("#sobrenome").effect("shake",{
   		direction:"right",
   		distance:"10",
   		times:"3"
		});
		bo = false;
	}

	if($("#email").val() == ""){
		$("#email").css("border","1px solid #D32F2F");
		$("#email").effect("shake",{
   		direction:"right",
   		distance:"10",
   		times:"3"
		});
		bo = false;
	}

	if($("#senha").val() == ""){
		$("#senha").css("border","1px solid #D32F2F");
		$("#senha").effect("shake",{
   		direction:"right",
   		distance:"10",
   		times:"3"
		});
		bo = false;
	}

	if($("#senha2").val() == ""){ 
		$("#senha2").css("border","1px solid #D32F2F");
		$("#senha2").effect("shake",{
   		direction:"right",
   		distance:"10",
   		times:"3"
		});
		bo = false;
	}

	if($("#cep").val() == ""){
		$("#cep").css("border","1px solid #D32F2F");
		$("#cep").effect("shake",{
   		direction:"right",
   		distance:"10",
   		times:"3"
		});	
		bo = false;
	}

	if($("#endereco").val() == ""){
		$("#senha2").css("border","1px solid #D32F2F");
		$("#senha2").effect("shake",{
   		direction:"right",
   		distance:"10",
   		times:"3"
		});
		bo = false;
	}

	if($("#numero").val() == ""){
		$("#numero").css("border","1px solid #D32F2F");
		$("#numero").effect("shake",{
   		direction:"right",
   		distance:"10",
   		times:"3"
		});
		bo = false;
	}

	if($("#pais").val() == 0){
		$("#pais").css("border","1px solid #D32F2F");
		$("#pais").effect("shake",{
   		direction:"right",
   		distance:"10",
   		times:"3"
		});
		bo = false;
	}

	if($("#estado").val() == 0){
		$("#estado").css("border","1px solid #D32F2F");
		$("#estado").effect("shake",{
   		direction:"right",
   		distance:"10",
   		times:"3"
		});
		bo = false;
	}

	if($("#cidade").val() == 0){
		$("#cidade").css("border","1px solid #D32F2F");
		$("#cidade").effect("shake",{
   		direction:"right",
   		distance:"10",
   		times:"3"
		});
		bo = false;
	}

}