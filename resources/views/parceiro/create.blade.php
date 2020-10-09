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
					<form id="frm_parceiro" class="form-horizontal form-label-left" method="post" action="{{url("parceiro/$parceiro->id")}}">
					{!! method_field('PUT') !!}

				@else
					<form id="frm_parceiro" class="form-horizontal form-label-left" method="post" action="{{route('parceiro.store') }}">
				@endif
					
					{{csrf_field()}}
												
					<div class="form-group">
						<label class="control-label col-md-1 col-sm-1 col-xs-12" for="nome">Nome</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" id="nome" class="form-control" name="nome" 
							value="{{isset($parceiro) ? $parceiro->nome : old('nome')}}" autofocus>
						</div>

						<label class="control-label col-md-1 col-sm-2 col-xs-12" for="email">Email</label>
						<div class="col-md-4 col-sm-4 col-xs-12">
							<input type="email" id="email" class="form-control" name="email" 
							value="{{isset($parceiro) ? $parceiro->email : old('email')}}">
						</div>
					</div>

	

					<div class="form-group">
							<label class="control-label col-md-1 col-sm-1 col-xs-12" for="telefone1">Telefone 1</label>
							<div class="col-md-3 col-sm-3 col-xs-12">
								<input type="text" id="telefone1" class="form-control" name="telefone1" 
								value="{{isset($parceiro) ? $parceiro->telefone1 : old('telefone1')}}">
							</div>
	
							<label class="control-label col-md-1 col-sm-1 col-xs-12" for="telefone2">Telefone 2</label>
							<div class="col-md-3 col-sm-3 col-xs-12">
								<input type="text" id="telefone2" class="form-control" name="telefone2" 
								value="{{isset($parceiro) ? $parceiro->telefone2 : old('telefone2')}}">
							</div>
	
							<label class="control-label col-md-1 col-sm-1 col-xs-12" for="telefone3">Telefone 3</label>
							<div class="col-md-3 col-sm-3 col-xs-12">
								<input type="text" id="telefone3" class="form-control" name="telefone3" 
								value="{{isset($parceiro) ? $parceiro->telefone3 : old('telefone3')}}">
							</div>
						</div>

					<div class="form-group">
						<label class="control-label col-md-1 col-sm-1 col-xs-12 " for="pais">Pais</label>
						<div class="col-md-2 col-sm-2 col-xs-12">
							<input type="text" id="pais" class="form-control" name="pais" 
							value="{{isset($parceiro) ? $parceiro->pais : old('pais')}}">
						</div> 
		
						<label class="control-label col-md-1 col-sm-1 col-xs-12" for="cep">CEP</label>
						<div class="col-md-2 col-sm-2 col-xs-12">
							<input id="cep" name="cep" type="text" placeholder="99.999-999" class="form-control input-md cep" 
								value="{{isset($parceiro) ? $parceiro->cep : old('cep')}}" >
						</div>
						<label class="control-label col-md-1 col-sm-1 col-xs-12" for="uf">UF</label>
						<div class="col-md-1 col-sm-1 col-xs-12">
							<input id="uf" name="uf" type="text"  class="form-control input-md uf"
								value="{{isset($parceiro) ? $parceiro->uf : old('uf')}}" >
						</div>
						<label class="control-label col-md-1 col-sm-1 col-xs-12" for="municipio">Município</label>
						<div class="col-md-3 col-sm-3 col-xs-12">
							<input id="municipio" name="municipio" type="text" class="form-control input-md" 
								value="{{isset($parceiro) ? $parceiro->municipio : old('municipio')}}" >
						</div>
					</div>

					<div class="item form-group">
	
						<label class="control-label col-md-1 col-sm-1 col-xs-12" for="bairro">Bairro</label>
						<div class="col-md-3 col-sm-3 col-xs-12">
							<input id="bairro" name="bairro" type="text" placeholder="Centro" class="form-control input-md"
									value="{{isset($parceiro) ? $parceiro->bairro : old('bairro')}}" >
						</div>
						<label class="control-label col-md-1 col-sm-1 col-xs-12" for="logradouro">Logradouro</label>
						<div class="col-md-4 col-sm-4 col-xs-12">
							<input id="logradouro" name="logradouro" type="text" placeholder="Av, Rua, Travessa..." class="form-control input-md"
								value="{{isset($parceiro) ? $parceiro->logradouro : old('logradouro')}}" >
						</div>
						<label class="control-label col-md-1 col-sm-1 col-xs-12" for="numero">Numero</label>
						<div class="col-md-2 col-sm-2 col-xs-12">
							<input id="numero" name="numero" type="text" placeholder="999" class="form-control input-md"
								value="{{isset($parceiro) ? $parceiro->numero : old('numero')}}" >
						</div>
					</div>

					<div class="ln_solid"> </div>

					<div class="item form-group">
						<i class="control-label col-md-1 col-sm-1 col-xs-12 fab fa-chrome" style="font-size: 18pt"> </i>
						<div class="col-md-10 col-sm-10 col-xs-12">
							<input id="site" name="site" type="url" class="form-control input-md"
									value="{{isset($parceiro) ? $parceiro->site : old('site')}}" >
						</div>
					</div>

					<div class="item form-group">
						<i class="control-label col-md-1 col-sm-1 col-xs-12 fab fa-facebook" style="font-size: 18pt"> </i>
						<div class="col-md-10 col-sm-10 col-xs-12">
							<input id="facebook" name="facebook" type="url" class="form-control input-md"
									value="{{isset($parceiro) ? $parceiro->facebook : old('facebook')}}" >
						</div>
					</div>

					<div class="item form-group">
							<i class="control-label col-md-1 col-sm-1 col-xs-12 fab fa-instagram" style="font-size: 18pt"> </i>
							<div class="col-md-10 col-sm-10 col-xs-12">
								<input id="instagram" name="instagram" type="url" class="form-control input-md"
										value="{{isset($parceiro) ? $parceiro->instagram : old('instagram')}}" >
							</div>
						</div>

					<div class="ln_solid"> </div>

					<div class="item form-group">
						<label class="control-label col-md-1 col-sm-1 col-xs-12" for="tipo_cadastro"> Cadastro </label>
						<div class="col-md-2 col-sm-2 col-xs-12">
							<select name="tipo_cadastro" id="tipo_cadastro" class="form-control col-md-1" >
								@if (isset($parceiro)) <!-- variavel para verificar se foi chamado pela edição -->
									@foreach($tipos_cadastro as $tipo_cadastro)
										@if ( $parceiro->tipo_cadastro == $tipo_cadastro)
											<option value="{{$tipo_cadastro}}" selected="selected">{{$tipo_cadastro}}</option>
										@else
											<option value="{{$tipo_cadastro}}">{{$tipo_cadastro}}</option>  
										@endif
									@endforeach
								@else
									@foreach($tipos_cadastro as $tipo_cadastro)
										<option value="{{$tipo_cadastro}}"> {{$tipo_cadastro}} </option>    
									@endforeach
								@endif
							</select>
						</div>

						<div class="col-md-3 col-sm-3 col-xs-12">
							<input id="cadastro" name="cadastro" type="text" class="form-control input-md"
								value="{{isset($parceiro) ? $parceiro->cadastro : old('cadastro')}}" >
						</div>
					</div>

					<div class="item form-group">
						<label class="control-label col-md-1 col-sm-1 col-xs-12" for="banco_id"> Banco </label>
						<div class="col-md-5 col-sm-5 col-xs-12">
							<select name="banco_id" id="banco_id" class="form-control col-md-1" >
								<option value=""> ... </option>
								@if (isset($parceiro)) <!-- variavel para verificar se foi chamado pela edição -->
									@foreach($bancos as $banco)
										@if ( $parceiro->banco == $banco)
											<option value="{{$banco->id}}" selected="selected">{{$banco->nome}} - {{$banco->codigo}}</option>
										@else
											<option value="{{$banco->id}}">{{$banco->nome}} - {{$banco->codigo}}</option>  
										@endif
									@endforeach
								@else
									@foreach($bancos as $banco)
										<option value="{{$banco->id}}"> {{$banco->nome}} - {{$banco->codigo}} </option>    
									@endforeach
								@endif
							</select>
						</div>

						<label class="control-label col-md-1 col-sm-1 col-xs-12" for="agencia">Agência</label>
						<div class="col-md-2 col-sm-2 col-xs-12">
							<input id="agencia" name="agencia" type="text" placeholder="Centro" class="form-control input-md"
									value="{{isset($parceiro) ? $parceiro->agencia : old('agencia')}}" >
						</div>

						<label class="control-label col-md-1 col-sm-1 col-xs-12" for="conta">Conta</label>
						<div class="col-md-2 col-sm-2 col-xs-12">
							<input id="conta" name="conta" type="text" placeholder="Centro" class="form-control input-md"
									value="{{isset($parceiro) ? $parceiro->conta : old('conta')}}" >
						</div>
					</div>
					
					
					{{-- BOTÕES --}}
					<div class="ln_solid"> </div>
					<div class="footer text-center"> {{-- col-md-3 col-md-offset-9 --}}
						<button type="cancel" id="btn_cancelar" class="botoes-acao btn btn-round btn-primary" >
							<span class="icone-botoes-acao mdi mdi-backburger"></span>   
							<span class="texto-botoes-acao"> CANCELAR </span>
						</button>
					
						<button type="submit" id="btn_salvar" class="botoes-acao btn btn-round btn-success ">
							<span class="icone-botoes-acao mdi mdi-send"></span>
							<span class="texto-botoes-acao"> SALVAR </span>
						</button>
					</div>
					
				</form>

			</div>
		</div>
	</div>
@endsection

@push("scripts")

	{{-- Vanilla Masker --}}
	<script src="{{asset('js/vanillaMasker.min.js')}}"></script>

	{{-- Atualiza os campos do endereço de acordo com o cep digitado --}}
	<script src="{{asset("js/endereco.js")}}"></script>
	
	<script>
		VMasker ($("#cadastro")).maskPattern("99.999.999/9999-99");

		if( $('#tipo_cadastro option:selected').val() == 'CPF' ){
			VMasker ($("#cadastro")).maskPattern("999.999.999-99");
		}else{
			VMasker ($("#cadastro")).maskPattern("99.999.999/9999-99");
		}

		$(document).ready(function(){

		/* 	var SPMaskBehavior = function (val) {
				return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
			},
			spOptions = {
				onKeyPress: function(val, e, field, options) {
					field.mask(SPMaskBehavior.apply({}, arguments), options);
				}
			};

			$('#telefone1').mask(SPMaskBehavior, spOptions);
			$('#telefone2').mask(SPMaskBehavior, spOptions);
			$('#telefone3').mask(SPMaskBehavior, spOptions); */

			$('#telefone1, #telefone2, #telefone3').mask("+99 (99) 9999-9999Z", {
				translation: {
					'Z': {
						pattern: /[0-9]/, optional: true
					}
				}
			});

			//transforma todas as letras do input em MAIÚSCULAS
			/* $('input').keyup(function() {
        		this.value = this.value.toLocaleUpperCase();
			}); */

			//botão de cancelar
			$("#btn_cancelar").click(function(){
		      event.preventDefault();
				window.history.back();
	      });

			//altera mascara
			$('#tipo_cadastro').change(function(){
				
				if( $('#tipo_cadastro option:selected').val() == 'CPF' ){
					VMasker ($("#cadastro")).maskPattern("999.999.999-99");
				}else{
					VMasker ($("#cadastro")).maskPattern("99.999.999/9999-99");
				}
			}); 

			
		});
	</script>

@endpush