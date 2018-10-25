@extends('gentelella.layouts.app')

@section('content')

	<!-- page content -->
	<div class="x_panel modal-content ">
		<div class="x_title">
			<h2> Impressão de Relatórios </h2>
			<div class="clearfix"></div>
		</div>
		<div class="x_panel ">

			<div class="x_content">
				<form action="{{ url('/usuario/imprimerelatorios') }}" method="POST" class="form-horizontal"   id="form_rel_usuario">
						{{ csrf_field() }}

					<div class="form-group">
						<div id="div_secretaria" {{-- style="display: none;" --}}>
							<label class="control-label col-md-1 col-sm-1 col-xs-12" for="secretaria">Secretaria</label>
							<div class="col-md-7 col-sm-7 col-xs-12">
								<select type="text" id="secretaria" class="form-control" name="secretaria"  >
									@if($acesso == "ALL")
										<option value="T">TODAS</option>
									@endif
									@foreach($secretarias as $secretaria)
										<option value="{{ $secretaria->id }}"> {{ $secretaria->nome }} </option>
									@endforeach
								</select>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div id="div_status" >
							<label class="control-label col-md-1 col-sm-1 col-xs-12" for="status">Status</label>
							<div class="col-md-2 col-sm-2 col-xs-12">
								<select type="text" id="status" class="form-control" name="status"  >
										<option value="T">TODOS</option>
										<option value="Ativo">ATIVO</option>
										<option value="Inativo">INATIVO</option>
								</select>
							</div>
						</div>

						<div id="div_motorista" >
							<label class="control-label col-md-1 col-sm-1 col-xs-12" for="motorista">Motorista</label>
							<div class="col-md-2 col-sm-2 col-xs-12">
								<select type="text" id="motorista" class="form-control" name="motorista"  >
										<option value="T">TODOS</option>
										<option value="1">SIM</option>
										<option value="2">NÃO</option>
								</select>
							</div>
						</div>
					</div>

					<div class="form-group" style="margin-top: 25px;">
						<div class="x_title">
								<h5> Ordem </h5>
								<div class="clearfix"></div>
						</div>
						<div class="col-md-9 col-sm-9 col-xs-12">
								<div class="icheck-success icheck-inline">
									<input  value="NAME" type="radio" id="rb_ord0" name="ordem_relatorio" checked/> 
									<label for="rb_ord0">  NOME     </label>
								</div>
								<div class="icheck-success icheck-inline">
									<input  value="SECRETARIA" type="radio" id="rb_ord1" name="ordem_relatorio"/> 
									<label for="rb_ord1">  SECRETÁRIA       </label>
								</div>
								<div class="icheck-success icheck-inline">
									<input  value="STATUS" type="radio" id="rb_ord2" name="ordem_relatorio"/> 
									<label for="rb_ord2">  STATUS </label>
								</div>
								<div class="icheck-success icheck-inline">
									<input  value="CNH" type="radio" id="rb_ord3" name="ordem_relatorio"/> 
									<label for="rb_ord3">  CNH   </label>
								</div>
								<div class="icheck-success icheck-inline">
									<input  value="CATEGORIA_CNH" type="radio" id="rb_ord4" name="ordem_relatorio"/> 
									<label for="rb_ord4">  CATEGORIA CNH   </label>
								</div>
								<div class="icheck-success icheck-inline">
									<input   value="VALIDADE_CNH" type="radio" id="rb_ord5" name="ordem_relatorio"/> 
									<label for="rb_ord5">  VALIDADE CNH   </label>
								</div>
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
					
						<button formtarget="_blank" type="submit" id="btn_gerar" class="botoes-acao btn btn-round btn-success ">
								<span class="icone-botoes-acao mdi mdi-send"></span>
								<span class="texto-botoes-acao"> GERAR </span>
								<div class="ripple-container"></div>
						</button>
					</div>        
				</form>
			</div>
		</div>
	</div>
	<!-- /page content -->

@endsection


@push("scripts")
	<!-- Datatables -->

	<script src="http://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" type="text/javascript"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js" type="text/javascript"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js" type="text/javascript"></script>
	<script src="http://cdn.datatables.net/plug-ins/1.10.15/sorting/datetime-moment.js" type="text/javascript"></script>
	

	<script>
		$(document).ready(function(){
			$("#btn_cancelar").click(function(){
				event.preventDefault();
				//window.history.back();
				window.location.href = "{{ URL::route('home') }}";
			});

			$("select#tipo").change(function() {
		
				$("#div_cnh").css('display','none'); 
				$("#div_secretaria").css('display','none'); 
				$("#div_status").css('display','none'); 


				var escolha = $("select#tipo").find(":selected").text().trim();

				switch (escolha) {
						case "CNH":
							$("#rb_ord4,#rb_ord5").removeAttr("disabled");
							$("#rb_ord0,#rb_ord1,#rb_ord2,#rb_ord3,#rb_ord4,#rb_ord5").removeAttr("checked");
							$("#rb_ord3").attr("checked","true");
							$("#div_cnh").css('display','block');
						break;

						case "SECRETARIA":
							$("#rb_ord4,#rb_ord5").attr("disabled","disabled");
							$("#rb_ord0,#rb_ord1,#rb_ord2,#rb_ord3,#rb_ord4,#rb_ord5").removeAttr("checked");
							$("#rb_ord1").attr("checked","true");
							$("#div_secretaria").css('display','block');
						break;
						
						case "STATUS":
							$("#rb_ord4,#rb_ord5").attr("disabled","disabled");
							$("#rb_ord0,#rb_ord1,#rb_ord2,#rb_ord3,#rb_ord4,#rb_ord5").removeAttr("checked");
							$("#rb_ord2").attr("checked","true");
							$("#div_status").css('display','block');
						break;
						
						case "-COMPLETO-":
							$("#rb_ord4,#rb_ord5").attr("disabled","disabled");
							$("#rb_ord0,#rb_ord1,#rb_ord2,#rb_ord3,#rb_ord4,#rb_ord5").removeAttr("checked");
							$("#rb_ord0").attr("checked","true");
					}
				})

				
		});

		
		
	 </script>

@endpush
