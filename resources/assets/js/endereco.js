function limpa_formulário_cep() {
	// Limpa valores do formulário de cep.
	$("#logradouro").val("");
	$("#bairro").val("");
	$("#municipio").val("");
	$("#uf").val("");
	$("#ibge").val("");
}

$(document).ready(function() {

	//Quando o campo cep perde o foco.
	$("#cep").blur(function() {

		//Nova variável "cep" somente com dígitos.
		var cep = $(this).val().replace(/\D/g, '');

		//Verifica se campo cep possui valor informado.
		if (cep != "") {

			//Expressão regular para validar o CEP.
			var validacep = /^[0-9]{8}$/;

			//Valida o formato do CEP.
			if(validacep.test(cep)) {

				//Preenche os campos com "..." enquanto consulta webservice.
				/* $("#logradouro").val("...");
				$("#bairro").val("...");
				$("#municipio").val("...");
				$("#uf").val("..."); */
 
				//Consulta o webservice viacep.com.br/
				$.getJSON("//viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

					if (!("erro" in dados)) {
						//Atualiza os campos com os valores da consulta.
						$("#logradouro").val(dados.logradouro.toLocaleUpperCase());
						$("#bairro").val(dados.bairro.toLocaleUpperCase());
						$("#municipio").val(dados.localidade.toLocaleUpperCase());
						$("#uf").val(dados.uf.toLocaleUpperCase());
					} //end if.
					else {
						//CEP pesquisado não foi encontrado.
						//limpa_formulário_cep()
						//alert("CEP não encontrado.");
						funcoes.notificationRight("top", "right", "warning", "CEP não encontrado!");
					}
				});
			} //end if.
			else {
				//cep é inválido.
				//limpa_formulário_cep()
				funcoes.notificationRight("top", "right", "warning", "CEP inválido!");
				
			}
		} //end if.
		else {
			//cep sem valor, limpa formulário.
			//limpa_formulário_cep()
		}
	});

});
