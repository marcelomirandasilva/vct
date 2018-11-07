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

				
					<div id="wizard" class="form_wizard wizard_horizontal">
					  <ul class="wizard_steps">
						 	<li>
								<a href="#step-1">
							  		<span class="step_no">1</span>
							  		<span class="step_descr"> Escolha o Cliente </span>
								</a>
						 	</li>
						 	<li>
								<a href="#step-2">
							  		<span class="step_no">2</span>
							  		<span class="step_descr"> Adicione os produtos</span>
								</a>
						 	</li>
						 	<li>
								<a href="#step-3">
								  <span class="step_no">3</span>
								  <span class="step_descr">Entrega</span>
								</a>
							</li>
						 	<li>
								<a href="#step-4">
							  		<span class="step_no">4</span>
							  		<span class="step_descr">Pagamento</span>
								</a>
						 	</li>
					  	</ul>
						<div id="step-1">
							<br>
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
					  </div>
					  <div id="step-2">
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
									<table class="table table-striped table-bordered compact" id="tb_produto">
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
	
							<div class="form-group">
							
								<div class="col-md-2 col-sm-2 col-xs-12">
									<label class="control-label col-md-1 col-sm-1 col-xs-12" for="unidade"> Unidade </label>
									<select name="unidade" id="unidade" class="form-control col-md-1" >
										@foreach($unidades as $unidade)
											<option value="{{$unidade}}"> {{$unidade}} </option>    
										@endforeach
									</select>
								</div>
								<div class="col-md-2 col-sm-2 col-xs-12">
									<label class="control-label col-md-1 col-sm-1 col-xs-12" for="quantidade">Quantidade</label>
									<input type="number" id="quantidade" class="form-control" name="quantidade" 
									value="{{$produto->quantidade or old('quantidade')}}">
								</div>
			
								<div class="col-md-2 col-sm-2 col-xs-12">
									<label class="control-label " >Valor Unitário</label>
									<input type="number" id="v_unitario" class="form-control" name="quantidade" 
									value="{{$produto->valor_venda}}">
								</div>
								
	
								<div class="col-md-2 col-sm-2 col-xs-12">
									<label class="control-label col-md-1 col-sm-1 col-xs-12" >V. Unitário</label>
									<input type="number" id="v_unitario" class="form-control" name="quantidade" 
									value="{{$produto->valor_venda}}">
								</div>
							</div>

							<div class="form-group">
								<div class="col-md-12 col-sm-12 col-xs-12 ">
									<table class="table table-striped table-bordered compact" id="tb_produto">
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

					  <div id="step-3">

						</div>

					  <div id="step-4">

					  </div>

					</div>
	
				
					
				

						
						
						
					</form>
				</div>
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
	
		$(document).ready(function(){

			
			$('#wizard').smartWizard({

				labelNext: 'Próximo',
				labelPrevious:'Anterior',
				labelFinish:'Finalizar', 
			});
			
			
			$("#tb_produto").DataTable({
				language : {
					'url' : '{{ asset('js/portugues.json') }}',
					"decimal": ",",
					"thousands": "."
				}, 
				"paging":   false,
				"ordering": false,
				"info":     false,
				"searching":false,
				responsive: true
            		  		
         });

			$("select#produto").change(function() {
				
				$v_produto = $("select#produto option:selected").val();
				$("#tb_produto").DataTable().row().remove().draw();
				console.log($v_produto);

				
				$.get(url_base+'/buscaProduto/'+$("select#produto option:selected").val(), function(resposta){
					console.log(resposta);
					

					$("#tb_produto").DataTable().row.add( [
							resposta['parceiro']['nome'],
							resposta['quantidade'],
							resposta['unidade'],
							resposta['valor_venda'],
							resposta['valor_venda_unidade'],
							

					] ).draw( false );
				});
		
  			})



			//botão de cancelar
			$("#btn_cancelar").click(function(){
		      event.preventDefault();
				window.history.back();
	      });

			
		});
	</script>

@endpush








