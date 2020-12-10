@extends('gentelella.layouts.app')

{{--  Page Content  --}}
@section('content')


	<div class="row tile_count">
		<caixa 
			numero={{$qtdParceiros}} icone="fas fa-handshake" titulo="Total de Parceiros" >
		</caixa>
		
		<caixa 
			numero={{$qtdProdutos}} icone="fas fa-leaf" titulo="Total de Produtos" >
		</caixa>
				
		<caixa 
			numero={{$qtdClientes}} icone="fas fa-hand-holding-heart" titulo="Total de Clientes" >
		</caixa>
		

		
	</div>


	
	

@endsection

@push('scripts')
	{{-- <script src="{{ asset('js/Chart.min.js') }}"></script> --}}
	{{-- <script src="{{ asset('js/echarts.min.js') }}"></script> --}}
	
	<script type="text/javascript">

		
	
	</script>
@endpush