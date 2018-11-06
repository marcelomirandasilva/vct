@extends('gentelella.layouts.app')

@section('htmlheader_title', 'Home')

@section('content')
	<div class="x_panel modal-content ">
		<div class="x_title">
			<h2> Cadastro de Vendas </h2>
			<div class="clearfix"></div>
		</div>

		<div class="x_panel ">
			<div class="x_content">
				@if( isset($venda))
					<form id="frm_venda" class="form-horizontal form-label-left" method="post" action="{{url("venda/$venda->id")}}">
					{!! method_field('PUT') !!}

				@else
					<form id="frm_venda" class="form-horizontal form-label-left" method="post" action="{{route('venda.store') }}">
				@endif
					
					{{csrf_field()}}
												
					<div class="form-group">
						<label class="control-label col-md-1 col-sm-1 col-xs-12" for="cliente_id"> Cliente </label>
						<div class="col-md-5 col-sm-5 col-xs-12">
							<select name="cliente_id" id="cliente_id" class="form-control col-md-1" autofocus>
								@if (isset($venda)) <!-- variavel para verificar se foi chamado pela edição -->
									@foreach($clientes as $cliente)
										@if ( $venda->cliente == $cliente)
											<option value="{{$cliente->id}}" selected="selected">{{$cliente->nome}} </option>
										@else
											<option value="{{$cliente->id}}">{{$cliente->nome}} </option>  
										@endif
									@endforeach
								@else
									@foreach($clientes as $cliente)
										<option value="{{$cliente->id}}"> {{$cliente->nome}}  </option>    
									@endforeach
								@endif
							</select>
						</div>

						
					</div>

					<div class="form-group">
						<label class="control-label col-md-1 col-sm-1 col-xs-12" for="produto"> Produto </label>
						<div class="col-md-5 col-sm-5 col-xs-12">
							<select name="produto" id="produto" class="form-control col-md-1" >
								@foreach($produtos as $produto)
									<option value="{{$produto->id}}">{{$produto->nome}} </option>  
								@endforeach
							</select>
						</div>

						<label class="control-label col-md-1 col-sm-1 col-xs-12" >V. Unitário</label>
						<div class="col-md-2 col-sm-2 col-xs-12">
							<input type="number" id="v_unitario" class="form-control" name="quantidade" 
							value="{{$produto->valor_venda}}">
						</div>
					</div>

					<div class="form-group">

						<label class="control-label col-md-1 col-sm-1 col-xs-12" for="quantidade">Quantidade</label>
						<div class="col-md-2 col-sm-2 col-xs-12">
							<input type="number" id="quantidade" class="form-control" name="quantidade" 
							value="{{$produto->quantidade or old('quantidade')}}">
						</div>

						<label class="control-label col-md-1 col-sm-1 col-xs-12" >V. Unitário</label>
						<div class="col-md-2 col-sm-2 col-xs-12">
							<input type="number" id="v_unitario" class="form-control" name="quantidade" 
							value="{{$produto->valor_venda}}">
						</div>

						





						<button id="btn_incluir" class="botoes-acao btn btn-round btn-success ">
							<span class="icone-botoes-acao mdi mdi-send"></span>
							<span class="texto-botoes-acao"> INCLUIR </span>
							<div class="ripple-container"></div>
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

		if( $('#cpf option:selected').val() == 'CPF' ){
			VMasker ($("#cadastro")).maskPattern("999.999.999-99");
		}else{
			VMasker ($("#cadastro")).maskPattern("99.999.999/9999-99");
		}

		$(document).ready(function(){

	/* 		var SPMaskBehavior = function (val) {
				return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
			},
			spOptions = {
				onKeyPress: function(val, e, field, options) {
					field.mask(SPMaskBehavior.apply({}, arguments), options);
				}
			}; */

			//$('#telefone1').mask(SPMaskBehavior, spOptions);
			$('#telefone1, #telefone2, #telefone3').mask("+99 (99) 9999-9999Z", {
				translation: {
					'Z': {
						pattern: /[0-9]/, optional: true
					}
				}
			});

			//$('#telefone2').mask(SPMaskBehavior, spOptions);
			//$('#telefone3').mask(SPMaskBehavior, spOptions);

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
			$('#cpf').change(function(){
				
				if( $('#cpf option:selected').val() == 'CPF' ){
					VMasker ($("#cadastro")).maskPattern("999.999.999-99");
				}else{
					VMasker ($("#cadastro")).maskPattern("99.999.999/9999-99");
				}
			}); 

			
		});
	</script>

@endpush