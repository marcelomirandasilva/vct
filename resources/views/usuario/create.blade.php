@extends('gentelella.layouts.app')

@section('htmlheader_title', 'Home')

@section('content')
   <div class="x_panel modal-content ">

	<div class="x_title">
	   <h2> Cadastro de Usuário </h2>
	   <div class="clearfix"></div>
	</div>

	<div class="x_panel ">
	   <div class="x_content">
		   @if( isset($usuario))
			   <form id="frm_usuario" class="form-horizontal form-label-left" method="post" action="{{ url("usuario/$usuario->id") }}">
   				{!! method_field('PUT') !!}
		   @else
   			<form id="frm_usuario" class="form-horizontal form-label-left" method="post" action="{{ route('usuario.store')  }}">
			@endif
      		   
		   {{ csrf_field() }}
      						
  {{--              <input type="hidden" id="id" value="{{ $usuario->id }}"> --}}

      		   <div class="form-group">
      				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nome:</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" id="name" class="form-control" name="name" required="" autofocus
							value="{{ $usuario->name or old('name') }}">
						</div>
      		   </div>

      		   <div class="form-group">
      				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email:</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="email" id="email" class="form-control" name="email" 
							value="{{ $usuario->email or old('email') }}">
						</div>
      		   </div>

      		   <div class="form-group">
      				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="cpf">CPF:</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="cpf" id="cpf" class="form-control" name="cpf" 
							value="{{ $usuario->cpf or old('cpf') }}">
						</div>
      		   </div>

               <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="secretaria_id">Secretaria:</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<select type="text" id="secretaria_id" class="form-control" name="secretaria_id" required="" >
								<option value="">Selecione uma Secretaria...</option>
														
								@if (isset($usuario))
									@foreach($secretarias as $secretaria)
										@if ( $usuario->secretaria == $secretaria)
											<option value="{{ $secretaria->id }}" selected="selected"> {{ $secretaria->nome }} </option>
										@else
											<option value="{{ $secretaria->id }}" > {{ $secretaria->nome }} </option>
										@endif
									@endforeach
								@else
									@foreach($secretarias as $secretaria)
										<option value="{{ $secretaria->id }}"> {{ $secretaria->nome }} </option>
									@endforeach
								@endif
							
							</select>
						</div>
               </div>

      		   <div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="status">acesso:</label>
      				<div class="col-md-3 col-sm-3 col-xs-12">
      					<select type="text" id="role_id" class="form-control" name="role_id" required="" >
      					<option value="">Selecione...</option>
													
							
      						@if (isset($usuario))
      							@foreach($roles as $role)
      								@if ( $usuario->roles[0]->id == $role->id)
      									<option value="{{ $role->id }}" selected="selected"> {{ $role->display_name }} </option>
      								@else
      									<option value="{{ $role->id }}"> {{ $role->display_name }} </option>
      								@endif
      							@endforeach
      					@else
      						@foreach($roles as $role)
      							<option value="{{ $role->id }}"> {{ $role->display_name }} </option>
      						@endforeach
      					@endif
      					
      					</select>
						</div>


						<label class="control-label col-md-1 col-sm-1 col-xs-12" for="status">Status:</label>
      				<div class="col-md-2 col-sm-2 col-xs-12">
      					<select type="text" id="status" class="form-control" name="status" required="" >
      					<option value="">Selecione...</option>
      											
      						@if (isset($usuario))
      							@foreach($statuss as $status)
      								@if ( $usuario->status == $status)
      									<option value="{{ $status }}" selected="selected"> {{ $status }} </option>
      								@else
      									<option value="{{ $status }}"> {{ $status }} </option>
      								@endif
      							@endforeach
      					@else
      						@foreach($statuss as $status)
      							<option value="{{ $status }}"> {{ $status }} </option>
      						@endforeach
      					@endif
      					
      					</select>
						</div>
						

						
      		   </div>

      			<div class="form-group">
      				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="motorista">Motorista:</label>
      				
      				<div class="col-md-1 col-sm-1 col-xs-1">
      					@if (isset($usuario))
      						<input class="form-control" id="motorista" type="checkbox" name="motorista" onchange="habilitar()" @if($usuario->motorista) checked @endif/>
      					@else
      						<input class="form-control" id="motorista" type="checkbox" name="motorista" onchange="habilitar()" 
      						 />
      					@endif
      				</div>
      		   </div>


      		   <div class="form-group">
      				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="celular">Celular:</label>
      				<div class="col-md-6 col-sm-6 col-xs-12">
      					<input type="celular" id="celular" class="form-control" name="celular"
      					value="{{ $usuario->celular or old('celular') }}" disabled>
      				</div>
      		   </div>

      		   <div class="form-group">
      				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="cnh">CNH:</label>
      				<div class="col-md-6 col-sm-6 col-xs-12">
      					<input type="cnh" id="cnh" class="form-control" name="cnh" value="{{ $usuario->cnh or old('cnh') }}" disabled>
      				</div>
      		   </div>
      		   
      		   <div class="form-group">
      				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="categoria_cnh">Categoria:</label>
      				<div class="col-md-6 col-sm-6 col-xs-12">
      					<input type="categoria_cnh" id="categoria_cnh" class="form-control" name="categoria_cnh" value="{{ $usuario->categoria_cnh or old('categoria_cnh') }}" disabled>
      				</div>
      		   </div>

      		   <div class="form-group">
      				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="validade_cnh">Validade:</label>
      				<div class="col-md-6 col-sm-6 col-xs-12">
                     @if(isset($usuario))
      			         <input type="validade_cnh" id="validade_cnh" class="form-control" name="validade_cnh" 
      					    @if($usuario->motorista) value="{{ date("d-m-Y", strtotime($usuario->validade_cnh)) }}" @endif disabled />
                     @else
                        <input type="validade_cnh" id="validade_cnh" class="form-control" name="validade_cnh" value="" disabled />
                     @endif
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

@endsection

@push("scripts")

   {{-- Vanilla Masker --}}
   <script src="{{ asset('js/vanillaMasker.min.js') }}"></script>


   <script>

   	//Habilitar MOTORISTA
   	function habilitar(){
        if(document.getElementById('motorista').checked){
            document.getElementById('celular').removeAttribute("disabled");
            document.getElementById('cnh').removeAttribute("disabled");
            document.getElementById('categoria_cnh').removeAttribute("disabled");
            document.getElementById('validade_cnh').removeAttribute("disabled");
        }
        else {
            document.getElementById('celular').setAttribute("disabled", "disabled");
            document.getElementById('cnh').setAttribute("disabled", "disabled");
            document.getElementById('categoria_cnh').setAttribute("disabled", "disabled");
            document.getElementById('validade_cnh').setAttribute("disabled", "disabled");
        }
    	}
	$(document).ready(function(){

	   
	   //mascaras dos inputs
	   VMasker ($("#validade_cnh")).maskPattern("99/99/9999");
	   VMasker ($("#categoria_cnh")).maskPattern("AA");
	   VMasker ($("#cnh")).maskPattern("99.999.999.999");
	   VMasker ($("#celular")).maskPattern("99999-9999");
	   VMasker ($("#cpf")).maskPattern("999.999.999-99");
	   //foco no 1º input
	   $("input#nome").focus();
	   //transforma todas as letras do input em MAIÚSCULAS
	   $('input').keyup(function() {
		this.value = this.value.toLocaleUpperCase();
	   });
	   //botão de cancelar
	   $("#btn_cancelar").click(function(){
		event.preventDefault();
		window.history.back();
	   });
	});
   </script>

@endpush