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
							<li><a href="#step-2"><span class="step_no">2</span><span class="step_descr"> Adicione os produtos</span></a></li>
							<li><a href="#step-3"><span class="step_no">3</span><span class="step_descr"> Entrega</span></a></li>
							<li><a href="#step-4"><span class="step_no">4</span><span class="step_descr"> Pagamento</span></a></li>
						</ul>
					  
						<div>
							<div id="step-1" class="">
								<br>
								<div class="form-group">
									<label class="control-label col-md-1 col-sm-1 col-xs-12" for="cliente_id"> Cliente </label>
									<div class="col-md-5 col-sm-5 col-xs-12">
										<select name="cliente_id" id="cliente_id" class="form-control col-md-1" autofocus>
											<option value=""> Selecione... </option>

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

								<div class="col-md-12 col-sm-12 col-xs-12 ">
									<table class="table table-striped table-bordered compact col-md-12 col-sm-12 col-xs-12 " id="tb_cliente">
										<thead>
											<tr>
												<th>Telefone </th>
												<th>Email</th>
												<th>Nascimento</th>
												<th>Endereço</th>
												<th>Municipio</th>
											</tr>						
										</thead>
										<tbody>
										</tbody>
									</table>
								</div>
							</div>
							<div id="step-2" class="">
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
							</div>
							
							<div id="step-3" class="">
								Step Content3
							</div>
							<div id="step-4" class="">
								Step Content4
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
	


	{{-- Vanilla Masker --}}
	<script src="{{asset('js/vanillaMasker.min.js')}}"></script>

	{{-- Atualiza os campos do endereço de acordo com o cep digitado --}}
	<script src="{{asset("js/endereco.js")}}"></script>
	
	<script>
	
		let tabela_venda = [];

		$(document).ready(function(){

			let produto_selecionado;
			let cliente_selecionado;

			$('#smartwizard').smartWizard({
				selected: 0,
				theme: 'arrows',
				autoAdjustHeight: false,
				lang: {  // Language variables
					next: 'Próximo',
					previous:'Anterior',
				},
				/* toolbarSettings: {
					toolbarExtraButtons: [
						$('<button></button>').text('Cancelar').addClass('botoes-acao btn btn-round btn-primary').on('click', function(){ 
							alert('Cancel button click');                            
						}),

						$('<button></button>').text('Salvar').addClass('botoes-acao btn btn-round btn-success').on('click', function(){ 
							alert('Finsih button click');                            
						}),
					]
				}, */
				
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
				console.log(v_unidade);
			});

			$("input#quantidade").focusout(function() {

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

				v_parceiro_id		= produto_selecionado['parceiro']['id'],
				v_parceiro_nome	= produto_selecionado['parceiro']['nome'],

				v_produto_id		= produto_selecionado['id'],
				v_produto_nome		= produto_selecionado['nome'],

				v_unidade 			= $("select#unidade option:selected").val();
				v_quantidade 		= $("input#quantidade").val();
				v_venda 				= $("input#v_venda").val();


				//tabela_venda.push(v_produto);
			

				$("#tb_venda").DataTable().row.add( [

					v_parceiro_nome,
					v_produto_nome,
					v_unidade,
					v_quantidade,
					v_venda,
				] ).draw( false );
		
  			})


			//botão de cancelar
			$("#btn_cancelar").click(function(){
		      event.preventDefault();
				window.history.back();
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








