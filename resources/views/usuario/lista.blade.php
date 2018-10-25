@extends('gentelella.layouts.app')

@section('content')

	<!-- page content -->
	 <div class="x_panel modal-content ">
			<div class="x_title">
			<h2> Listagem de Usuários </h2>
				 <a href="{{ url('usuario/create') }}" 
						class="btn-circulo btn btn-primary btn-md   pull-right " 
						data-toggle="tooltip"  
						data-placement="bottom" 
						title="Adiciona um usuario">
						<span class="fa fa-plus">  </span>
				 </a>
				 <div class="clearfix"></div>
			</div>
			<div class="x_panel ">
				<div class="x_content">
						<table class="table table-hover table-striped compact" id="tb_usuarios">
							 <thead>
									<tr>
										 <th>Nome</th> 
										 <th>Status</th>
										 <th>Secretaria</th>
										 <th>Motorista</th>
										 <th>Acesso</th>
										 <th>Ações</th>
									</tr>						
							 </thead>

					<tbody>
						@foreach($usuarios as $key=> $usuario)
						
							<tr>
								<td>{{ $usuario->name }}</td> 
								<td>{{ $usuario->status }}</td>
								<td>{{ $usuario->secretaria['sigla']}}</td>
								<td> 
									@if($usuario->motorista)
										<i class="fas fa-check"></i>
									@else
									 {{-- aqui (antes desse comentário) tem um ALT+255 para poder ordenar na tabela --}}
									@endif
								</td>
								
								@if( isset($usuario->roles[0]))
									<td>{{ $usuario->roles[0]->display_name }}</td>
								@else
									<td> --- </td>
								@endif


								<td class="actions">

									{{-- se o usuario logado for TI ou DSV habilita a opção de ZERAR a senha --}}
									{{-- @if($logado->role->peso >= 90) --}}
										<button 
											class="btn_email_senha btn btn-info btn-xs action    botao_acao" 
											data-toggle="tooltip" 
											data-usuario = {{ $usuario->id }}
											data-placement="bottom" 
											title="Envia NOVA senha por email ao usuario">  
											<i class="glyphicon glyphicon-envelope "></i>
										</button>
									{{-- @endif --}}

									
										<button
											type="button" 
											class="btn btn-primary btn-xs action botao_acao "  
											data-toggle="modal"
											data-target= "#myModal{{ $usuario->id }}"
											data-placement="bottom"
											title="Visualiza esse usuario"> 
												{{-- onclick="$('#myModal{{ $usuario->id }}').modal('show')" --}}
											<i class="glyphicon glyphicon-eye-open "></i>
										</button>
											
										<a href="{{ url("usuario/$usuario->id/edit") }}"
											class="btn btn-warning btn-xs action botao_acao " 
											data-toggle="tooltip" 
											data-usuario = "{{ $usuario->id }}"
											data-placement="bottom" 
											title="Editar esse usuario">  
											<i class="glyphicon glyphicon-pencil "></i>
										</a>
										
										<a href="{{ url("usuario/$usuario->id") }}" 
											id="btn_exclui_usuario"
											class="btn_email_senha btn btn-danger btn-xs action botao_acao " 
											data-toggle="tooltip" 
											data-usuario = "{{ $usuario->id }}"
											data-placement="bottom" 
											title="Excluir esse usuario">  
											<i class="glyphicon glyphicon-remove "></i>
										</a>   
										
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	 </div>
	<!-- /page content -->

	<!-- Inicio Modal -->
	@if(isset($usuario))
		@foreach($usuarios as $key=> $usuario)
			<div class="modal fade" id="myModal{{ $usuario->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">

						<div class="modal-header" style="background: #342a54; color: #fff;" >
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true" style="color: #fff;">&times;</span>
							</button>
							<h5 class="modal-title text-center " id="myModal">USUÁRIO</h5>
						</div>
						<div class="modal-body">
						<br>
						<div class="form-group">
							<label class="control-label col-md-2 col-sm-2 col-xs-12" for="name">Nome:</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" id="name" class="form-control" name="name" style="margin-top: -6px;" autofocus
									value="{{ $usuario->name or old('name') }} " disabled>
							</div>
						</div>
						<br>
						<br>

						<div class="form-group">
							<label class="control-label col-md-2 col-sm-2 col-xs-12" for="email">Email:</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="email" id="email" class="form-control" name="EMAIL" required="" style="margin-top: -6px;" autofocus
								value="{{ $usuario->email or old('email') }}" disabled>
							</div>
						</div>
						<br>
						<br>

						<div class="form-group">
							<label class="control-label col-md-2 col-sm-2 col-xs-12" for="cpf">CPF:</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="cpf" id="cpf" class="form-control" name="cpf" required="" style="margin-top: -6px;" autofocus
								value="{{ $usuario->cpf or old('cpf') }} " disabled>
							</div>
						</div><br><br>

						<div class="form-group">
			            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="status">Secretaria:</label>
			            <div class="col-md-6 col-sm-6 col-xs-12">
			               <input type="text" id="secretaria_id" class="form-control" name="secretaria_id" required="" style="margin-top: -6px;" auto value="{{ $usuario->secretaria['sigla']}} " disabled>
			              
			            </div>
        				</div><br><br>

               	<div class="form-group">
						<label class="control-label col-md-2 col-sm-3 col-xs-12" for="status">Acesso:</label>
      				<div class="col-md-3 col-sm-2 col-xs-12">
							<input type="text" id="role_id" class="form-control" name="role_id" required="" style="margin-top: -6px;" 
							auto value="{{ $usuario->role['acesso']}} " disabled>
			              
						</div>


						<label class="control-label col-md-1 col-sm-1 col-xs-12" for="status">Status:</label>
      				<div class="col-md-2 col-sm-2 col-xs-12">
      					<input type="text" id="role_id" class="form-control" name="role_id" required="" style="margin-top: -6px;" 
							auto value="{{ $usuario->status}} " disabled>
			              
						</div>
						

						
					</div>
					<br><br>


							<div class="form-group">
								<label class="control-label col-md-2 col-sm-2 col-xs-12" for="motorista">Motorista:</label>
								
								<div class="col-md-1 col-sm-1 col-xs-1">
									@if (isset($usuario))
										<input class="form-control " type="checkbox" name="motorista"  style="margin-top: -6px;" @if($usuario->motorista) checked @endif />
									@else
										<input class="form-control " type="checkbox" name="motorista" />
									@endif
								</div>
						   </div><br><br>

							<div class="form-group">
								<label class="control-label col-md-2 col-sm-2 col-xs-12" for="celular">Celular:</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
										<input type="celular" id="celular" class="form-control" name="celular" style="margin-top: -6px;"  
										value="{{ $usuario->celular or old('celular') }} " disabled>
								</div>
							</div><br><br>

							<div class="form-group">
								<label class="control-label col-md-2 col-sm-2 col-xs-12" for="cnh">CNH:</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
										<input type="cnh" id="cnh" class="form-control" name="cnh" style="margin-top: -6px;" value="{{ $usuario->cnh or old('cnh') }} " disabled>
								</div>
							</div><br><br>
							
							<div class="form-group">
								<label class="control-label col-md-2 col-sm-2 col-xs-12" for="categoria_cnh">Categoria:</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
										<input type="categoria_cnh" id="categoria_cnh" class="form-control" name="categoria_cnh" style="margin-top: -6px;" value="{{ $usuario->categoria_cnh or old('categoria_cnh') }} " disabled>
								</div>
							</div><br><br>

							<div class="form-group">
								<label class="control-label col-md-2 col-sm-2 col-xs-12" for="validade_cnh">Validade:</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
										@if (isset($usuario))
											<input type="validade_cnh" id="validade_cnh" class="form-control" name="validade_cnh" style="margin-top: -6px;" @if($usuario->motorista) 
											value="{{ date("d-m-Y", strtotime($usuario->validade_cnh)) }}" @endif />

										@else

											<input type="validade_cnh" id="validade_cnh" class="form-control" name="validade_cnh" style="margin-top: -6px;" value="" />
										@endif
								</div>
							</div>
					
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
								<a href="{{ url("usuario/$usuario->id/edit") }}" class="btn btn-warning"   data-toggle="tooltip"
								data-usuario = "{{ $usuario->id }}" data-placement="bottom" >Editar</a>
							</div>

						</div>
				</div>
			</div>

		@endforeach
	@endif
	<!-- Fim Modal -->

@endsection

@push("scripts")
	<!-- Datatables -->
	 
	<script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.18/af-2.3.0/b-1.5.2/b-flash-1.5.2/b-html5-1.5.2/b-print-1.5.2/cr-1.5.0/fc-3.2.5/fh-3.1.4/kt-2.4.0/r-2.2.2/rg-1.0.3/rr-1.2.4/sc-1.5.0/sl-1.2.6/datatables.min.js"></script>

 	<script src="http://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"    type="text/javascript"></script>
 	<script src="http://cdn.datatables.net/plug-ins/1.10.15/sorting/datetime-moment.js"  type="text/javascript"></script>
	 

 	<script>
		$(document).ready(function(){

			//configuração da tabela       
			$.fn.dataTable.moment( 'DD/MM/YYYY' );
			
			var tabela_usuarios = $("#tb_usuarios").DataTable({
				language : {
					 'url' : '{{ asset('js/portugues.json') }}',
					 "decimal": ",",
					 "thousands": "."
				}, 
				stateSave: true,
				stateDuration: -1,
				responsive: true,
								 
				"columnDefs": 
				[
					{ className: "text-center", "targets": [4] },
				]
			});
			
			//botão de exclusão
			$("table#tb_usuarios").on("click", "#btn_exclui_usuario",function(){
				event.preventDefault();
				let id_usuario = $(this).data('usuario');
				let btn = $(this);
				//console.log("botao btn_desativa -> ", $(this).data('veiculo'));
				swal({
					title: 'Confirma a EXCLUSÃO deste usuario?',
					type: 'question',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Sim',
					cancelButtonText: 'Não'
				}).then((result) => {
					if (result.value) {
						$.post("{{ url('usuario/') }}/"+id_usuario, {
							_token  : "{{ csrf_token() }}",
							_method : 'DELETE',
							id:         id_usuario,
							},function(data){
								if(data =="ok"){
									//exclui a linha no datatables
									$("table#tb_usuarios").DataTable().row( btn.parents('tr') ).remove().draw();
									
									swal(
											'usuario EXCLUÍDO',
											' ',
											'success'
									)
								}
						})         

					} else {
						swal(
							'Exclusão Cancelada',
							' ',
							'error'
						)
					}
				});
			});
		});


		/* RESETAR A SENHA DE UM USUÁRIO */
		$(".btn_email_senha").click(function(){
			let id_usuario = $(this).data('funcionario');

			//console.log("botao btn_email_senha -> ", id_usuario );

	      swal({
	         title: 'Confirma a REINICIALIZAÇÃO da senha do funcionário?',
	         type: 'question',
	         showCancelButton: true,
	         confirmButtonColor: '#3085d6',
	         cancelButtonColor: '#d33',
	         confirmButtonText: 'Sim',
	         cancelButtonText: 'Não',
	      }).then(function () {
      	 
      	 	//chama a rota para zerar a senha e enviar email ao funcionário

   	 	 	$.post('/zerarsenhausuario',{
					_token: 	'{{ csrf_token() }}',
					id: 		id_usuario
   	 	 	},function(data){
					
				funcoes.notificationRight("top", "right", "danger", "Email com nova senha enviado para o funcionário");
					
 					
			 	})

         });
      });

 	</script>

@endpush