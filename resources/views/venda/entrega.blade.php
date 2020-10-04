
<br>

<div class="form-group">
	<label class="control-label col-md-1 col-sm-1 col-xs-12" for="transporte"> Transporte </label>
	<div class="col-md-2 col-sm-2 col-xs-12">
		<select name="transporte" id="transporte" class="form-control col-md-1" autofocus>
			<option value=""> Selecione... </option>

			@if (isset($venda)) <!-- variavel para verificar se foi chamado pela edição -->
				@foreach($transportes as $transporte)
					@if ( $venda->transporte == $transporte)
						<option value="{{$transporte}}" selected="selected">{{$transporte}} </option>
					@else
						<option value="{{$transporte}}">{{$transporte}} </option>  
					@endif
				@endforeach
			@else
				@foreach($transportes as $transporte)
					<option value="{{$transporte}}"> {{$transporte}}  </option>    
				@endforeach
			@endif
		</select>
	</div>

	<label class="control-label col-md-1 col-sm-1 col-xs-12 " for="dt_entrega">Data</label>
	<div class="col-md-2 col-sm-2 col-xs-12">
		<input type="date" id="dt_entrega" class="form-control input_data" name="dt_entrega" 
		value="{{$venda->dt_entrega or old('dt_entrega')}}">
	</div> 

	<span id="datepairExample">
		<label class="control-label col-md-1 col-sm-1 col-xs-12 " for="hh_inicio_entrega">De</label>
		<div class="col-md-2 col-sm-2 col-xs-12">
			<input type="text" id="hh_inicio_entrega" class="form-control time start " name="hh_inicio_entrega" 
			value="{{$venda->hh_inicio_entrega or old('hh_inicio_entrega')}}">
		</div> 

		<label class="control-label col-md-1 col-sm-1 col-xs-12 " for="hh_termino_entrega">Até</label>
		<div class="col-md-2 col-sm-2 col-xs-12">
			<input type="text" id="hh_termino_entrega" class="form-control time end" name="hh_termino_entrega" 
			value="{{$venda->hh_termino_entrega or old('hh_termino_entrega')}}">
		</div> 
	</span>

</div>

<div class="ln_solid"> </div>

<div class="form-group">
	<label class="control-label col-md-1 col-sm-1 col-xs-12 " for="pais">Pais</label>
	<div class="col-md-2 col-sm-2 col-xs-12">
		<input type="text" id="pais" class="form-control" name="pais" 
		value="{{$venda->pais or old('pais')}}">
	</div> 

	<label class="control-label col-md-1 col-sm-1 col-xs-12" for="cep">CEP</label>
	<div class="col-md-2 col-sm-2 col-xs-12">
		<input id="cep" name="cep" type="text" placeholder="99.999-999" class="form-control input-md cep" 
			value="{{$venda->cep or old('cep')}}" >
	</div>
	<label class="control-label col-md-1 col-sm-1 col-xs-12" for="uf">UF</label>
	<div class="col-md-1 col-sm-1 col-xs-12">
		<input id="uf" name="uf" type="text"  class="form-control input-md uf"
			value="{{$venda->uf or old('uf')}}" >
	</div>
	<label class="control-label col-md-1 col-sm-1 col-xs-12" for="municipio">Município</label>
	<div class="col-md-3 col-sm-3 col-xs-12">
		<input id="municipio" name="municipio" type="text" class="form-control input-md" 
			value="{{$venda->municipio or old('municipio')}}" >
	</div>
</div>

<div class="item form-group">

	<label class="control-label col-md-1 col-sm-1 col-xs-12" for="bairro">Bairro</label>
	<div class="col-md-3 col-sm-3 col-xs-12">
		<input id="bairro" name="bairro" type="text" placeholder="Centro" class="form-control input-md"
				value="{{$venda->bairro or old('bairro')}}" >
	</div>
	<label class="control-label col-md-1 col-sm-1 col-xs-12" for="logradouro">Logradouro</label>
	<div class="col-md-4 col-sm-4 col-xs-12">
		<input id="logradouro" name="logradouro" type="text" placeholder="Av, Rua, Travessa..." class="form-control input-md"
			value="{{$venda->logradouro or old('logradouro')}}" >
	</div>
	<label class="control-label col-md-1 col-sm-1 col-xs-12" for="numero">Numero</label>
	<div class="col-md-2 col-sm-2 col-xs-12">
		<input id="numero" name="numero" type="text" placeholder="999" class="form-control input-md"
			value="{{$venda->numero or old('numero')}}" >
	</div>
</div>
<div class="item form-group">
	<label class="control-label col-md-1 col-sm-1 col-xs-12" for="complemento">Complemento</label>
	<div class="col-md-2 col-sm-2 col-xs-12">
		<input id="complemento" name="complemento" type="text" placeholder="999" class="form-control input-md"
			value="{{$venda->complemento or old('complemento')}}" >
	</div>

	<label class="control-label col-md-2 col-sm-2 col-xs-12" for="referencia">Ponto de referência</label>
	<div class="col-md-7 col-sm-7 col-xs-12">
		<input id="referencia" name="referencia" type="text" placeholder="999" class="form-control input-md"
			value="{{$venda->referencia or old('referencia')}}" >
	</div>
</div>

<div class="ln_solid"> </div>

<div class="item form-group">
	
	<div class="col-md-2 col-sm-2 col-xs-2">
		<button type="button" id="btn_frete" class="btn btn-round btn-primary" >
			<span class="icone-botoes-acao mdi mdi-backburger"></span>   
			<span class="texto-botoes-acao"> Calcular Frete </span>
		</button>
	</div>
	
	<div class="col-md-2 col-sm-2 col-xs-4 .col-xg-offset-3">
		<input id="frete" name="frete" type="text" placeholder="000" class="form-control input-md"
			value="{{$venda->frete or old('frete')}}" >
	</div>
	<label class="control-label col-md-5 col-sm-5 col-xs-12" id="texto_frete" style="
	text-align: left"> </label>
	
</div>
