@extends('gentelella.layouts.app')

@section('htmlheader_title', 'Home')

@section('content')
	<div class="x_panel modal-content ">
		<div class="x_title">
			<h2> Cadastro de Parceiros </h2>
			<div class="clearfix"></div>
		</div>

		<div class="x_panel ">
			<div class="x_content">
				@if( isset($parceiro))
					<form id="frm_parceiro" class="form-horizontal form-label-left" method="post" action="{{ url("parceiro/$parceiro->id") }}">
					{!! method_field('PUT') !!}

				@else
					<form id="frm_parceiro" class="form-horizontal form-label-left" method="post" action="{{ route('parceiro.store')  }}">
				@endif
					
					{{ csrf_field() }}
												
					<div class="form-group">
						<label class="control-label col-md-1 col-sm-1 col-xs-12" for="nome">Nome</label>
						<div class="col-md-5 col-sm-5 col-xs-12">
							<input type="text" id="nome" class="form-control" name="nome" 
							value=" {{ $parceiro->nome or old('nome') }} ">
						</div>

						<label class="control-label col-md-1 col-sm-1 col-xs-12" for="email">Email</label>
						<div class="col-md-5 col-sm-5 col-xs-12">
							<input type="email" id="email" class="form-control" name="email" 
							value="{{ $parceiro->email or old('email') }}">
						</div>
					</div>

	

					<div class="form-group">
						<label class="control-label col-md-1 col-sm-1 col-xs-12" for="telefone1">Telefone 1</label>
						<div class="col-md-2 col-sm-2 col-xs-12">
							<input type="text" id="telefone1" class="form-control" name="telefone1" 
							value=" {{ $parceiro->telefone1 or old('telefone1') }} ">
						</div>

						<label class="control-label col-md-2 col-sm-2 col-xs-12" for="telefone2">Telefone 2</label>
						<div class="col-md-2 col-sm-2 col-xs-12">
							<input type="text" id="telefone2" class="form-control" name="telefone2" 
							value=" {{ $parceiro->telefone2 or old('telefone2') }} ">
						</div>

						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="telefone3">Telefone 3</label>
						<div class="col-md-2 col-sm-2 col-xs-12">
							<input type="text" id="telefone3" class="form-control" name="telefone3" 
							value=" {{ $parceiro->telefone3 or old('telefone3') }} ">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-1 col-sm-1 col-xs-12 " for="pais">Pais</label>
						<div class="col-md-2 col-sm-2 col-xs-12">
							<input type="text" id="pais" class="form-control" name="pais" 
							value=" {{ $parceiro->pais or old('pais') }} ">
						</div> 
		
						<label class="control-label col-md-2 col-sm-2 col-xs-12" for="cep">CEP</label>
						<div class="col-md-2 col-sm-2 col-xs-12">
							<input id="cep" name="cep" type="text" placeholder="99.999-999" class="form-control input-md cep" 
								value="{{$loja->endereco->cep or old('cep')}}" >
						</div>
					</div>

					<div class="item form-group">
						<label class="control-label col-md-1 col-sm-1 col-xs-12" for="uf">UF</label>
						<div class="col-md-1 col-sm-1 col-xs-12">
							<input id="uf" name="uf" type="text"  class="form-control input-md uf"
								value="{{$loja->endereco->uf or old('uf')}}" >
						</div>
	
						<label class="control-label col-md-2 col-sm-2 col-xs-12" for="municipio">Município</label>
						<div class="col-md-3 col-sm-3 col-xs-12">
							<input id="municipio" name="municipio" type="text" class="form-control input-md" 
								value="{{$loja->endereco->municipio or old('municipio')}}" >
						</div>

						<label class="control-label col-md-2 col-sm-2 col-xs-12" for="bairro">Bairro</label>
						<div class="col-md-3 col-sm-3 col-xs-12">
							<input id="bairro" name="bairro" type="text" placeholder="Centro" class="form-control input-md"
									value="{{$loja->endereco->bairro or old('bairro')}}" >
						</div>
					</div>
					
					<div class="item form-group">
						<label class="col-md-1 control-label" for="logradouro">Logradouro</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input id="logradouro" name="logradouro" type="text" placeholder="Av, Rua, Travessa..." class="form-control input-md"
								value="{{$loja->endereco->logradouro or old('logradouro')}}" >
						</div>
	
						<label class="col-md-2 control-label" for="numero">Numero</label>
						<div class="col-md-2 col-sm-2 col-xs-12">
							<input id="numero" name="numero" type="text" placeholder="999" class="form-control input-md"
								value="{{$loja->endereco->numero or old('numero')}}" >
						</div>
					</div>
					
					<div class="item form-group">
						<label class="col-md-1 control-label" for="complemento">Complemento</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input id="complemento" name="complemento" type="text" placeholder="Ap., Fundos,..." 
								class="form-control input-md"
								value="{{$loja->endereco->complemento or old('complemento')}}" >
						</div>
					</div>

					
					
					{{-- BOTÕES --}}
					<div class="ln_solid"> </div>
					<div class="footer text-center"> {{-- col-md-3 col-md-offset-9 --}}
						<button id="btn_cancelar" class="botoes-acao btn btn-round btn-primary" >
							<span class="icone-botoes-acao mdi mdi-backburger"></span>   
							<span class="texto-botoes-acao"> CANCELAR </span>
							<div class="ripple-container"></div>
						</button>
					
						<button type="submit" id="btn_salvar" class="botoes-acao btn btn-round btn-success ">
							<span class="icone-botoes-acao mdi mdi-send"></span>
							<span class="texto-botoes-acao"> SALVAR </span>
							<div class="ripple-container"></div>
						</button>
					</div>
					
				</form>

			</div>
		</div>
	</div>
@endsection

@push("scripts")


	<script>
		$(document).ready(function(){

			//transforma todas as letras do input em MAIÚSCULAS
			$('input').keyup(function() {
        		this.value = this.value.toLocaleUpperCase();
			});

			//botão de cancelar
			$("#btn_cancelar").click(function(){
		      event.preventDefault();
				window.history.back();
	      });



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
						$("#logradouro").val("...");
						$("#bairro").val("...");
						$("#municipio").val("...");
						$("#uf").val("...");

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
								$("#logradouro").val("");
								$("#bairro").val("");
								$("#municipio").val("");
								$("#uf").val("");
								$("#ibge").val("");
								alert("CEP não encontrado.");
							}
						});
					} //end if.
					else {
						//cep é inválido.
						$("#logradouro").val("");
						$("#bairro").val("");
						$("#municipio").val("");
						$("#uf").val("");
						$("#ibge").val("");
						alert("Formato de CEP inválido.");
					}
				} //end if.
				else {
					//cep sem valor, limpa formulário.
					$("#logradouro").val("");
						$("#bairro").val("");
						$("#municipio").val("");
						$("#uf").val("");
						$("#ibge").val("");
				}
				});
		});
	</script>

@endpush