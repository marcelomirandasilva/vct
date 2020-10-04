<br>
<div class="row ">
	<div class="form-group">
		<label class="control-label col-md-1 col-sm-1 col-xs-12" for="cliente_id"> Cliente </label>
		<div class="col-md-5 col-sm-5 col-xs-12">
			<select name="cliente_id" id="cliente_id" class="form-control col-md-1" autofocus required>
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