@extends('gentelella.layouts.app')

@section('htmlheader_title', 'Home')

@section('content')
	<div class="x_panel modal-content ">
		<div class="x_title">
			<h2> Cadastro de Produtos </h2>
			<div class="clearfix"></div>
		</div>

		<div class="x_panel ">
			<div class="x_content">
				@if( isset($produto))
					<form id="frm_produto" class="form-horizontal form-label-left" method="post" action="{{url("produto/$produto->id")}}">
					{!! method_field('PUT') !!}

				@else
					<form id="frm_produto" class="form-horizontal form-label-left" method="post" action="{{route('produto.store') }}">
				@endif
					 
					{{csrf_field()}}
												
					<div class="form-group">
						<label class="control-label col-md-1 col-sm-1 col-xs-12" for="nome">Nome</label>
						<div class="col-md-5 col-sm-5 col-xs-12">
							<input type="text" id="nome" class="form-control" name="nome" 
							value="{{isset($produto) ? $produto->nome : old('nome')}}" autofocus>
						</div>

						<label class="control-label col-md-1 col-sm-1 col-xs-12" for="parceiro_id"> Parceiro </label>
						<div class="col-md-5 col-sm-5 col-xs-12">
							<select name="parceiro_id" id="parceiro_id" class="form-control col-md-1" >
								@if (isset($produto)) <!-- variavel para verificar se foi chamado pela edição -->
									@foreach($parceiros as $parceiro)
										@if ( $produto->parceiro_id == $parceiro->id)
											<option value="{{$parceiro->id}}" selected="selected">{{$parceiro->nome}}</option>
										@else
											<option value="{{$parceiro->id}}">{{$parceiro->nome}}</option>  
										@endif
									@endforeach
								@else
									@foreach($parceiros as $parceiro)
										<option value="{{$parceiro->id}}"> {{$parceiro->nome}} </option>    
									@endforeach
								@endif
							</select>
						</div>
					</div>

	

					<div class="form-group">
						<label class="control-label col-md-1 col-sm-1 col-xs-12" for="unidade"> Unidade </label>
						<div class="col-md-2 col-sm-2 col-xs-12">
							<select name="unidade" id="unidade" class="form-control col-md-1" >
								@if (isset($produto)) <!-- variavel para verificar se foi chamado pela edição -->
									@foreach($unidades as $unidade)
										@if ( $produto->unidade == $unidade)
											<option value="{{$unidade}}" selected="selected">{{$unidade}}</option>
										@else
											<option value="{{$unidade}}">{{$unidade}}</option>  
										@endif
									@endforeach
								@else
									@foreach($unidades as $unidade)
										<option value="{{$unidade}}"> {{$unidade}} </option>    
									@endforeach
								@endif
							</select>
						</div>

						<label class="control-label col-md-1 col-sm-1 col-xs-12" for="quantidade">Quantidade</label>
						<div class="col-md-2 col-sm-2 col-xs-12">
							<input type="number" id="quantidade" class="form-control" name="quantidade" 
							value="{{isset($produto) ? $produto->quantidade : old('quantidade')}}">
						</div>
						
						<label class="control-label col-md-1 col-sm-1 col-xs-12 " for="valor_compra">V.Compra</label>
						<div class="col-md-2 col-sm-2 col-xs-12">
							<input type="text"   id="valor_compra" class="form-control money"name="valor_compra"  
								value="{{isset($produto) ? $produto->valor_compra : old('valor_compra')}}">
						</div> 
						<label class="control-label col-md-1 col-sm-1 col-xs-12 " for="valor_venda">V.Venda</label>
						<div class="col-md-2 col-sm-2 col-xs-12">
							<input type="text"   id="valor_venda" class="form-control money" name="valor_venda"  
							value="{{isset($produto) ? $produto->valor_venda : old('valor_venda')}}">
						</div> 
						
					</div>
				
					<div class="ln_solid"> </div>

					<div class="form-group">
						<label class="control-label col-md-2 col-sm-2 col-xs-12 " id="lbl_dif_percentual" for="dif_percentual">
								Diferença
						</label>
						<div class="col-md-2 col-sm-2 col-xs-12">
							<input type="text" class="form-control" id="dif_percentual" disabled value="">
						</div>

						<label class="control-label col-md-2 col-sm-2 col-xs-12 " id="lbl_dif_real" for="dif_real">
								Lucro
						</label>
						<div class="col-md-2 col-sm-2 col-xs-12">
							<input type="text" class="form-control" id="dif_real" disabled value="">
						</div>

					</div>
					
					<div class="ln_solid"> </div>

					<div class="form-group">

						<label class="control-label col-md-2 col-sm-2 col-xs-12 " id="lbl_compra_unidade" for="compra_unidade">
							Valor de compra do Grama
						</label>
						<div class="col-md-2 col-sm-2 col-xs-12">
							<input type="text" id="compra_unidade" class="form-control " disabled 
								value=" {{ isset($produto) ? $produto->valor_compra_unidade : old('valor_compra_unidade') }} ">
						</div>


						<label class="control-label col-md-2 col-sm-2 col-xs-12 " id="lbl_venda_unidade" for="venda_unidade">
							Valor de venda do Grama
						</label>
						<div class="col-md-2 col-sm-2 col-xs-12">
							<input type="text"  id="venda_unidade" class="form-control " disabled 
								value=" {{ isset($produto) ? $produto->valor_venda_unidade : old('valor_venda_unidade') }} ">
								
						</div>

						
						<input type="hidden" id="valor_compra_unidade" name="valor_compra_unidade" >
						
						<input type="hidden" id="valor_venda_unidade"  name="valor_venda_unidade" >
					</div>

					


					<div class="ln_solid"> </div>

				
					
					{{-- BOTÕES --}}
					<div class="ln_solid"> </div>
					<div class="footer text-center"> {{-- col-md-3 col-md-offset-9 --}}
						<button type="button" id="btn_cancelar" 
							onclick="window.location='{{ URL::previous() }}'"
							class="botoes-acao btn btn-round btn-primary" >

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
	
	<!-- <script src="{{asset('js/maskmoney/dist/jquery.maskMoney.min.js')}}" type="text/javascript"></script> -->
	
	<script src="{{asset('js/vanillaMasker.min.js')}}"></script>
	
	<script>

		if( {{ isset($produto) ? 'true' : 'false'  }}){
			
			
			let V1 =  converteMoedaFloat (  $("input#valor_compra").val() );
			let V2 =  converteMoedaFloat (  $("input#valor_venda").val());
			
			diferenca_per = (( V2 - V1 ) / V1 * 100);
			diferenca_rea = ( V2 - V1 ) ;


			$("input#dif_percentual").val(diferenca_per.toLocaleString('pt-br',{maximumFractionDigits: 2}) +" %");

			$("input#dif_real").val(diferenca_rea.toLocaleString('pt-br',{style: 'currency', currency: 'BRL', maximumFractionDigits: 6}));

		}
		
			$( "#produto" ).focus();
	
		$(document).ready(function(){

			
			//transforma todas as letras do input em MAIÚSCULAS
				$('input').keyup(function() {
				this.value = this.value.toLocaleUpperCase();
			});
			
/* 			//botão de cancelar
			$("#btn_cancelar").click(function(){
		      event.preventDefault();
				window.history.back();
	      }); */

 			VMasker($(".money")).maskMoney({
				// Decimal precision -> "900"
				precision: 2,
				// Decimal separator -> ",90"
				separator: ',',
				// Number delimiter -> "12.345.678"
				delimiter: '.',
				// Money unit -> "R$ 12.345.678,90"
				unit: 'R$',
				// Force type only number instead decimal,
				// masking decimals with ",00"
				// Zero cents -> "R$ 1.234.567.890,00"
				//zeroCents: true
			});


			$("select#unidade").change(function() {
				
				$v_unidade = $("select#unidade option:selected").val();
				console.log($v_unidade);
				switch ($v_unidade) {
		
					case 'kg':
						$("label#lbl_compra_unidade").html("Valor de compra do Grama");
						$("label#lbl_venda_unidade").html("Valor de venda do Grama");

						//$("input#compra_unidade").val(res['gasolina'].toFixed(3).replace(".",","));
						break;

					case 'g':
						$("label#lbl_compra_unidade").html("Valor de compra do Grama");
						$("label#lbl_venda_unidade").html("Valor de venda do Grama");
						break;

					case 'l':
						$("label#lbl_compra_unidade").html("Valor de compra do Mililitro");
						$("label#lbl_venda_unidade").html("Valor de venda do Mililitro");
						break;

					case 'ml':
						$("label#lbl_compra_unidade").html("Valor de compra do Mililitro");
						$("label#lbl_venda_unidade").html("Valor de venda do Mililitro");
						break;

					case 'un':
						$("label#lbl_compra_unidade").html("Valor de compra da Unidade");
						$("label#lbl_venda_unidade").html("Valor de venda da Unidade");
						break;

					case 'cx':
						$("label#lbl_compra_unidade").html("Valor de compra da Caixa");
						$("label#lbl_venda_unidade").html("Valor de venda da Caixa");
						break;

					case 'dz':
						$("label#lbl_compra_unidade").html("Valor de compra da Unidade");
						$("label#lbl_venda_unidade").html("Valor de venda da Unidade");
						break;

					case '1/2 dz':
						$("label#lbl_compra_unidade").html("Valor de compra da Unidade");
						$("label#lbl_venda_unidade").html("Valor de venda da Unidade");
						break;
					
					case 'maço':
						$("label#lbl_compra_unidade").html("Valor de compra do Maço");
						$("label#lbl_venda_unidade").html("Valor de venda do Maço");
						break;
					
				}
			
  			})

			$("input#valor_compra").focusout(function() {
				let divisor			= 1;
				let unidade 		= $("select#unidade option:selected").val();
				//let valor_compra 	= parseInt(  $("input#valor_compra").val().replace(/[\D]+/g,'') ) ;
				let valor_compra 	= parseFloat( $("input#valor_compra").val().replace("R$ ", "").replace(",", ".") );
				let qtd   			= $("input#quantidade").val();

				let compra = valor_compra / qtd;

				switch (unidade) {
					case 'kg':		divisor = 1000; 	break;
					case 'g':		divisor = 1; 		break;
					case 'l':		divisor = 1000; 	break;
					case 'ml':		divisor = 1; 		break;
					case 'un':		divisor = 1; 		break;
					case 'cx':		divisor = 1; 		break;
					case 'dz':		divisor = 12; 	break;
					case '1/2 dz':	divisor = 6; 		break;
					case 'maço':	divisor = 1; 		break;
				}


				let compra_unidade = compra / divisor;
				
				$("input#compra_unidade").val(compra_unidade.toLocaleString('pt-br',{style: 'currency', currency: 'BRL', maximumFractionDigits: 6}));
				$("input#valor_compra_unidade").val(compra_unidade);

				console.log("compra: ",compra);
				console.log("compra unidade: ",compra_unidade);

			});

			$("input#valor_venda").focusout(function() {
				let divisor			= 1;
				let unidade 		= $("select#unidade option:selected").val();

				//let valor_venda 	= parseFloat(  $("input#valor_venda").val().replace(/[\D]+/g,'') );
				let valor_venda 	= parseFloat( $("input#valor_venda").val().replace("R$ ", "").replace(",", ".") );

				let qtd   			= $("input#quantidade").val();

				let venda = valor_venda / qtd;



				switch (unidade) {
					case 'kg':		divisor = 1000; 	break;
					case 'g':		divisor = 1; 		break;
					case 'l':		divisor = 1000; 	break;
					case 'ml':		divisor = 1; 		break;
					case 'un':		divisor = 1; 		break;
					case 'cx':		divisor = 1; 		break;
					case 'dz':		divisor = 12; 	break;
					case '1/2 dz':	divisor = 6; 		break;
					case 'maço':	divisor = 1; 		break;
				}

				let venda_unidade = venda / divisor;

				console.log("venda: ",venda);
				console.log("venda unidade: ",venda_unidade);

				$("input#venda_unidade").val(venda_unidade.toLocaleString('pt-br',{style: 'currency', currency: 'BRL', maximumFractionDigits: 6}));
				

				$("input#valor_venda_unidade").val(venda_unidade);

				let V1 = converteMoedaFloat(  $("input#valor_compra").val() );
				let V2 = converteMoedaFloat(  $("input#valor_venda").val());
				
				diferenca_per = (( V2 - V1 ) / V1 * 100);
				diferenca_rea = ( V2 - V1 ) ;

				//$("input#dif_percentual").val( diferenca_per.toFixed(2) );				

				$("input#dif_percentual").val(diferenca_per.toLocaleString('pt-br',{maximumFractionDigits: 2}) +" %");

				$("input#dif_real").val(diferenca_rea.toLocaleString('pt-br',{style: 'currency', currency: 'BRL', maximumFractionDigits: 6}));
			});

	
						


			
		});

		function converteMoedaFloat(valor){
      
			if(valor === ""){
				valor =  0;
			}else{
				valor = valor.replace("R$ ","");
				valor = valor.replace(".","");
				valor = valor.replace(",",".");
				valor = parseFloat(valor);
			}
			return valor;

		}
	</script>

@endpush