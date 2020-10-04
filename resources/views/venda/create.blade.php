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

					<div id="smartwizard">
						<ul>
							<li><a href="#step-1"><span class="step_no">1</span><span class="step_descr"> Escolha o Cliente </span></a></li>
							<li><a href="#step-2"><span class="step_no">2</span><span class="step_descr"> Defina a Entrega </span></a></li>
							<li><a href="#step-3"><span class="step_no">3</span><span class="step_descr"> Adicione os produtos</span></a></li>
							<li><a href="#step-4"><span class="step_no">4</span><span class="step_descr"> Pagamento</span></a></li>
						</ul>
					  
						<div>
							<div id="step-1" class="" data-toggle="validator">
								@include('venda.cliente')
							</div>
							<div id="step-2" class="" data-toggle="validator">
	 								@include('venda.entrega')
								</div>							
							<div id="step-3" class="" data-toggle="validator">
								<br>
								<div class="form-group">
									<div class="col-md-5 col-sm-5 col-xs-12 ">
										<label class="control-label col-md-1 col-sm-1 col-xs-12" for="produto"> Produto </label>
										<select name="produto" id="produto" class="form-control col-md-1" >
											<option value=""> Selecione... </option>
											@foreach($produtos as $produto)
												<option value="{{$produto->id}}">{{$produto->nome}} </option>  
											@endforeach
										</select>
									</div>
										
									<div class="col-md-7 col-sm-7 col-xs-12 ">
										<table class="table table-striped table-bordered compact col-md-12 col-sm-12 col-xs-12" id="tb_produto">
											<thead>
												<tr>
													<th>Parceiro</th>
													<th>Quantidade</th>
													<th>Unidade</th>
													<th>Venda</th>
													<th>Venda (g/ml/u)</th>
												</tr>						
											</thead>
											<tbody>
											</tbody>
										</table>
									</div>
								</div>

								<div class="ln_solid"> </div>
							
								<div class="form-group">
									<div class="col-md-2 col-sm-2 col-xs-12">
										<label class="control-label col-md-1 col-sm-1 col-xs-12" for="unidade"> Unidade </label>
										<select name="unidade" id="unidade" class="form-control col-md-1" >
											{{-- @foreach($unidades as $unidade)
												<option value="{{$unidade}}"> {{$unidade}} </option>    
											@endforeach --}}
										</select>
									</div>
									<div class="col-md-2 col-sm-2 col-xs-12">
										<label class="control-label col-md-1 col-sm-1 col-xs-12" for="quantidade">Quantidade</label>
										<input type="number" id="quantidade" class="form-control" name="quantidade" 
										value="0">
									</div>
						
									<div class="col-md-2 col-sm-2 col-xs-12">
										<label class="control-label " >Valor Venda</label>
										<input type="text" id="v_venda" class="form-control" name="v_venda" value="0" disabled>
									</div>

									<div class="col-md-2 col-sm-2 col-xs-12">
										<button type="" id="btn_inserir" class="botoes-acao btn btn-round btn-success"
										style="margin-top: 27px;margin-bottom: 0px;">
											<span class="icone-botoes-acao mdi mdi-send"></span>
											<span class="texto-botoes-acao"> INSERIR </span>
										</button>
									</div>
						
								
								</div>

								<div class="ln_solid"> </div>
						
								<div class="form-group">
									<div class="col-md-12 col-sm-12 col-xs-12 ">
										<table class="table table-striped table-bordered compact" id="tb_venda">
											<thead>
												<tr>
													<th>Parceiro</th>
													<th>Produto</th>
													<th>Quantidade</th>
													<th>Unidade</th>
													<th>Venda</th>
													<th>Venda (g/ml/u)</th>
													<th>Excluir</th>
												</tr>						
											</thead>
											<tbody>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							
							<div id="step-4" class="" data-toggle="validator">
								@include('venda.pagamento')
							</div>
						</div>
					</div>

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
   <!-- Datatables -->
   <script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.18/af-2.3.0/b-1.5.2/b-flash-1.5.2/b-html5-1.5.2/b-print-1.5.2/cr-1.5.0/fc-3.2.5/fh-3.1.4/kt-2.4.0/r-2.2.2/rg-1.0.3/rr-1.2.4/sc-1.5.0/sl-1.2.6/datatables.min.js"></script>

   <script src="http://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js" type="text/javascript"></script>
	<script src="http://cdn.datatables.net/plug-ins/1.10.19/sorting/datetime-moment.js" type="text/javascript"></script>
	
	<script async defer
	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDcdW2PsrS1fbsXKmZ6P9Ii8zub5FDu3WQ&callback=initMap">
	</script>

	{{-- Vanilla Masker --}}
	<script src="{{asset('js/vanillaMasker.min.js')}}"></script>

	{{-- Atualiza os campos do endereço de acordo com o cep digitado --}}
	<script src="{{asset("js/endereco.js")}}"></script>

	<!-- Include jQuery Validator plugin -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js"></script>

	
	<script>
	
		let itens_venda = [];

		$('#datepairExample .time').timepicker({
			'showDuration': true,
			'timeFormat': 'g:ia'
		});

		// initialize datepair
		$('#datepairExample').datepair();

		$('#hh_inicio_entrega').timepicker({ 'timeFormat': 'H:i' });
		$('#hh_termino_entrega').timepicker({ 'timeFormat': 'H:i' });



		function initMap(destino) {
			var bounds = new google.maps.LatLngBounds;
			var service = new google.maps.DistanceMatrixService;
		};




		$(document).ready(function(){



			let produto_selecionado;
			let cliente_selecionado;

			/* var Auto_Complete_Link = "https://maps.googleapis.com/maps/api/distancematrix/json?units=metric&origins='rua do trabalho, 295 - nova iguaçu'&destinations=nilópolis&key=AIzaSyDcdW2PsrS1fbsXKmZ6P9Ii8zub5FDu3WQ";
 */
			
			
			$("#btn_frete").click(function() { 

				var bounds = new google.maps.LatLngBounds;
				var markersArray = [];

				var origin1 = 'Rua do Trabalho, 295, Nova Iguaçu';
				var destinationA = $("input#logradouro").val()  +"," + $("input#numero").val() +"," + $("input#municipio").val() ; 

				var service = new google.maps.DistanceMatrixService;
				service.getDistanceMatrix({
					origins: [origin1],
					destinations: [destinationA],
					travelMode: 'DRIVING',
					unitSystem: google.maps.UnitSystem.METRIC,
					avoidHighways: false,
					avoidTolls: false
				}, function(response, status) {
					if (status !== 'OK') {
					alert('Error was: ' + status);
					} else {
						let recebe_distancia = response['rows'][0]['elements'][0]['distance']['text'];
						let recebe_duracao 	= response['rows'][0]['elements'][0]['duration']['text'];

						let distancia 			= recebe_distancia.replace(" km","").replace(",",".");
						let valor_frete 		= distancia * 2;   /* R$2,00 é o valor do KM de frete */ 
						
						if( valor_frete < 10 )
						{
							valor_frete = 10;
							$("label#texto_frete").text(recebe_distancia +" (frete mínimo)" +" -  Aproximadamente " +recebe_duracao) ; 
						}else{
							$("label#texto_frete").text(recebe_distancia +" " +" -  Aproximadamente " +recebe_duracao) ; 
						}
						
						let mostra_frete		= valor_frete.toFixed(2).toLocaleString('pt-BR');

						$("input#frete").val("R$ " + mostra_frete );
						
						
						
						console.log(response);
					  console.log(distancia);
					  console.log(valor_frete);
					}
				});

			});


			$('#smartwizard').smartWizard({
				selected: 0,
				theme: 'arrows',
				autoAdjustHeight: false,
				lang: { previous:'Anterior', next: 'Próximo' },
				
			});

			$("#smartwizard").on("leaveStep", function(e, anchorObject, stepNumber, stepDirection) {
				var passo = stepNumber + 1;
				var elmForm = $("#step-" + passo);
				console.log("#step-" + passo);
				// stepDirection === 'forward' :- this condition allows to do the form validation
				// only on forward navigation, that makes easy navigation on backwards still do the validation when going next
				if(stepDirection === 'forward' && elmForm){
					elmForm.validator('validate');
					var elmErr = elmForm.children('.has-error');
					console.log(elmErr);
					if(elmErr && elmErr.length > 0){
						// Form validation failed
						return false;
					}
				}
				return true;
				
			});


			
			$("#tb_produto").DataTable({
				language : {'url' : '{{ asset('js/portugues.json') }}',"decimal": ",","thousands": "."}, 
				"paging": false,"ordering": false,"info": false,"searching":false, responsive: true
			});
			
			$("#tb_cliente").DataTable({
				language : {'url' : '{{ asset('js/portugues.json') }}',"decimal": ",","thousands": "."}, 
				"paging": false,"ordering": false,"info": false,"searching":false, responsive: true
         });

			$("#tb_venda").DataTable({
				language : {'url' : '{{ asset('js/portugues.json') }}',"decimal": ",","thousands": "."}, 
				"paging": false,"ordering": false,"info": false,"searching":false, responsive: true
         });


			/*  select de CLIENTES */
			$("select#cliente_id").change(function() {
				$v_cliente = $("select#cliente_id option:selected").val();
				$("#tb_cliente").DataTable().row().remove().draw();
				
				$.get(url_base+'/buscaCliente/'+$("select#cliente_id option:selected").val(), function(resposta){
					//coloca o cliente selecionado na variável global
					cliente_selecionado = resposta;

					$("input#pais").val(resposta['pais']);
					$("input#cep").val(resposta['cep']);
					$("input#uf").val(resposta['uf']);
					$("input#municipio").val(resposta['municipio']);
					$("input#bairro").val(resposta['bairro']);
					$("input#logradouro").val(resposta['logradouro']);
					$("input#numero").val(resposta['numero']);
					$("input#complemento").val(resposta['complemento']);
					$("input#referencia").val(resposta['referencia']);
					


					$("#tb_cliente").DataTable().row.add( [


						telefone(resposta['telefone1']),
						resposta['email'],
						resposta['nascimento'],
						resposta['logradouro'] + ' - Nº ' + resposta['numero'],
						resposta['municipio'], 
					] ).draw( false );
				});
		
  			})


			/*  select de PRODUTOS */
			$("select#produto").change(function() {
				v_produto = $("select#produto option:selected").val();
				$("#tb_produto").DataTable().row().remove().draw();

				$.get(url_base+'/buscaProduto/'+$("select#produto option:selected").val(), function(resposta){

					//coloca o produto selecionado na variável global
					produto_selecionado = resposta;

					//coloca o valor e a quantidade nos inputs 
					$("input#quantidade").val(produto_selecionado['quantidade']);
					$("input#v_venda").val(produto_selecionado['valor_venda']);

					$("#tb_produto").DataTable().row.add( [
						resposta['parceiro']['nome'],
						resposta['quantidade'],
						resposta['unidade'],
						resposta['valor_venda'],
						resposta['valor_venda_unidade'],
					] ).draw( false );
					
					//remove as options dentro do select
					$('#unidade option').remove();
					//adiciona o 1º valor
					$('#unidade').append('<option value="">Selecione...</option>');

					// 'g','kg','ml','l','un','maço','cx','dz','1/2 dz'

					//adiciona no select de unidade as unidades que podem ser utilizadas de acordo com o produto selecionado
					switch ( resposta['unidade'] ) {
						case 'g':
							$('#unidade').append('<option value="g" selected>g</option>');
							break;

						case 'kg':
							$('#unidade').append('<option value="g">g</option>');
							$('#unidade').append('<option value="kg" selected>kg</option>');
							break;
					
						case 'ml':
							$('#unidade').append('<option value="ml" selected>ml</option>');
							break;

						case 'l':
							$('#unidade').append('<option value="ml">ml</option>');
							$('#unidade').append('<option value="l" selected>l</option>');
							break;
						
						case 'un':
							$('#unidade').append('<option value="un" selected>un</option>');
							$('#unidade').append('<option value="1/2 dz">1/2 dz</option>');
							$('#unidade').append('<option value="dz">dz</option>');
							break;
						
						case 'cx': $('#unidade').append('<option value="cx" selected>cx</option>'); break;
						case 'maço': $('#unidade').append('<option value="maço" selected>maço</option>'); break;

						case 'dz':
							$('#unidade').append('<option value="un">un</option>');
							$('#unidade').append('<option value="1/2 dz">1/2 dz</option>');
							$('#unidade').append('<option value="dz" selected>dz</option>');
							break;
						
						case '1/2 dz':
							$('#unidade').append('<option value="un">un</option>');
							$('#unidade').append('<option value="1/2 dz" selected>1/2 dz</option>');
							$('#unidade').append('<option value="dz">dz</option>');
							break;

						default:
							console.log("não entrou")	;
						break;
					}



				});


		
  			})


			/*  select de UNIDADE */
			$("select#unidade").change(function() {
				v_unidade = $("select#unidade option:selected").val();
				$("input#quantidade").change();
				console.log(v_unidade);
			});

			$("input#quantidade").change(function() {

				console.log(cliente_selecionado);
				console.log(produto_selecionado);

				var venda				= 0;
				let unidade 			= $("select#unidade option:selected").val();
				let qtd   				= $("input#quantidade").val();
				let valor_produto 	= produto_selecionado['valor_venda'];

				console.log('valor_produto', valor_produto);

				switch ( produto_selecionado['unidade'] ) {
					case 'g': 		if (unidade == 'g')	{ 
											venda = ( valor_produto / 1) 		* qtd ; 
										}; 	
										break;

					case 'kg':		if (unidade == 'g')	{ 
											venda = ( valor_produto / 1000)   * qtd ; 
										} else if (unidade == 'kg')	{ 
											venda = ( valor_produto / 1)   * qtd ; 
										};	
										break;


					case 'ml': 		if (unidade == 'l')	{ 
											venda = ( valor_produto / 1000)   * qtd ; 
										} else if (unidade == 'ml')	{ 
											venda = ( valor_produto / 1)   * qtd ; 
										};	
										break;

					case 'l': 		if (unidade == 'ml')	{ 
											venda = ( valor_produto / 1) 		* qtd ; 
										} else if (unidade == 'l')	{ 
											venda = ( valor_produto / 1)   * qtd ; 
										};	
										break;

					case 'un':		if (unidade == 'un')	{ 
											venda = ( valor_produto / 1)   * qtd ; 
										}else if (unidade == '1/2 dz')	{
											venda = ( valor_produto * 6)   * qtd ;
										}else if (unidade == 'dz')	{
											venda = ( valor_produto * 12)   * qtd ;
										};	
										break;

					
					case '1/2 dz':	if (unidade == '1/2 dz')	{ 
											venda = ( valor_produto / 1)   * qtd ; 
										}else if (unidade == 'un')	{
											venda = ( valor_produto / 6)   * qtd ;
										}else if (unidade == 'dz')	{
											venda = ( valor_produto * 2)   * qtd ;
										};	
										break;

					case 'dz':		if (unidade == 'dz')	{ 
											venda = ( valor_produto / 1)   * qtd ; 
										}else if (unidade == 'un')	{
											venda = ( valor_produto / 12)   * qtd ;
										}else if (unidade == '1/2 dz')	{
											venda = ( valor_produto / 2)   * qtd ;
										};	
										break;
					
					case 'cx': 		if (unidade == 'cx')	{ venda = ( valor_produto / 1) 		* qtd ; }; 	break;
					case 'maço': 	if (unidade == 'maço')	{ venda = ( valor_produto / 1) 		* qtd ; }; 	break;
				}

				

				console.log('venda',venda);
				
				$("input#v_venda").val(venda);

				//let v_venda 		= parseFloat( $("input#valor_venda").val().replace("R$ ", "").replace(",", ".") );



			});


			$("#btn_inserir").click(function() {
				event.preventDefault();

				v_parceiro_id			= produto_selecionado['parceiro']['id'],
				v_parceiro_nome		= produto_selecionado['parceiro']['nome'],

				v_produto_id			= produto_selecionado['id'],
				v_produto_nome			= produto_selecionado['nome'],
				v_valor_venda_unidade= produto_selecionado['valor_venda_unidade'],

				v_unidade 				= $("select#unidade option:selected").val();
				v_quantidade 			= $("input#quantidade").val();
				v_venda 					= $("input#v_venda").val();

				v_btn_excluir=
					"<a class='btn btn-warning btn-xs action btn_tb_membro_remove' data-toggle='tooltip' data-placement='bottom' title='Remove esse Item' style='margin-bottom: 0px;'> <i class='glyphicon glyphicon-remove'></i></a>";
				

				itens_venda.push([
					v_parceiro_id, v_produto_id, v_produto_nome, v_valor_venda_unidade, v_unidade, v_quantidade, v_venda
				]);
				
				$("#tb_venda").DataTable().row.add( [

					v_parceiro_nome,
					v_produto_nome,
					v_quantidade,
					v_unidade,
					v_venda,
					v_valor_venda_unidade,
					v_btn_excluir
				] ).draw( false );
		
				console.log(itens_venda);
  			})


			//botão de cancelar
			$("#btn_cancelar").click(function(){
		      event.preventDefault();
				window.history.back();
	      });

			//enviar o formulario
			$("#frm_venda").submit(function(){

				for(i=0; i<tabela_membros_id.length; i++){
	
					// Stringificar os campos
					let presencas_em_string = JSON.stringify({
						membro_id:  tabela_membros_id[i],
						cargo_id:   tabela_cargos_id[i]
					});

					// Adicionar o novo cargo no formulário
					$("#form_pressenca_sessao").append("<input type='hidden' class='presencas' name='presencas[]' value='"+presencas_em_string+"'>");
				}

				//Adicionar o novo cargo no formulário
				$("#frm_venda").append("<input type='hidden' class='itens_venda' name='itens_venda[]' value='"+itens_venda+"'>");
			});
			
		});


		function telefone(v){
			
			

			v1 = v;
			tam = v1.length;
			
			if (tam == 13) { // COM CÓDIGO DE ÁREA NACIONAL E DO PAIS e 9 dígitos
				v = v.replace(/(\d{2})(\d{2})(\d{5})(\d{4})/, "+$1 ($2) $3-$4");
			}
			if (tam == 12) { // COM CÓDIGO DE ÁREA NACIONAL E DO PAIS
				v = v.replace(/(\d{2})(\d{2})(\d{4})(\d{4})/, "+$1 ($2) $3-$4");
			}
			if (tam == 11) { // COM CÓDIGO DE ÁREA NACIONAL e 9 dígitos
				v = v.replace(/(\d{2})(\d{5})(\d{4})/, "($1) $2-$3");
			}
			if (tam == 10) { // COM CÓDIGO DE ÁREA NACIONAL
				v = v.replace(/(\d{2})(\d{4})(\d{4})/, "($1) $2-$3");
			}
			
			if (tam <= 9) { // SEM CÓDIGO DE ÁREA
				v = v.replace(/(\d{5})(\d{4})/, "$1-$2");
			}
		


			return v
		}
	</script>

@endpush
