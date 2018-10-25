@extends('gentelella.layouts.app')

{{--  Page Content  --}}
@section('content')


	<div class="row tile_count">
		<caixa 
			numero=10 icone="fa fa-car" titulo="Total de Veículos" >
		</caixa>

		<caixa 
			numero=10 icone="fas fa-gas-pump" titulo="QTD de Abastecimentos" 
			{{-- cor_percent="red" --}} percent="10" descricao=" da semana passada">
		</caixa>
		
		<caixa 
			numero=10 icone="fas fa-dollar-sign" titulo="Gasto na Semana" 
			{{-- cor_percent="green" --}} percent="10" descricao="da semana passada">
		</caixa>
		
		<caixa 
			numero=10 icone="fas fa-dollar-sign" titulo="Gasto no Mês" 
			{{-- cor_percent="green" --}} percent="10" descricao="do mês passado">
		</caixa>
	</div>


	
	

@endsection

@push('scripts')
	{{-- <script src="{{ asset('js/Chart.min.js') }}"></script> --}}
	{{-- <script src="{{ asset('js/echarts.min.js') }}"></script> --}}
	
	<script type="text/javascript">

		
	
	</script>
@endpush