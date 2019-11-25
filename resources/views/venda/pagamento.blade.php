<br>

<div class="form-group">
	<label class="control-label col-md-1 col-sm-1 col-xs-12" for="tp_pagamento"> Modo pgto </label>
	<div class="col-md-3 col-sm-3 col-xs-12">
		<select name="tp_pagamento" id="tp_pagamento" class="form-control col-md-1" autofocus>
			<option value=""> Selecione... </option>

			@if (isset($venda)) <!-- variavel para verificar se foi chamado pela edição -->
				@foreach($tp_pagamentos as $tp_pagamento)
					@if ( $venda->tp_pagamento == $tp_pagamento)
						<option value="{{$tp_pagamento}}" selected="selected">{{$tp_pagamento}} </option>
					@else
						<option value="{{$tp_pagamento}}">{{$tp_pagamento}} </option>  
					@endif
				@endforeach
			@else
				@foreach($tp_pagamentos as $tp_pagamento)
					<option value="{{$tp_pagamento}}"> {{$tp_pagamento}}  </option>    
				@endforeach
			@endif
		</select>
	</div>

	
</div>

<div class="ln_solid"> </div>
