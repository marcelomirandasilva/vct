@extends('gentelella.layouts.pdf')
@section('title')
	Relatório Geral
@endsection
@section('conteudo')
	{{-------------------------- Cabeçalho --------------------------}}
	<page size="A4">
		<div class="box">
			<div class="float">
				<img src="{{ url("img/brasao.png") }}" alt="">
			</div>
			<div class="data-hora"> 
				<?php echo date("d/m/Y H:i ") ?>
			</div>       
			<div class="head">
				<div class="titulo1">
					Prefeitura Municipal de Mesquita
				</div>
				<div class="titulo2">
					Secretaria Municipal de Governo, Administração, Planejamento e Fazenda
				</div>
				<div class="box">
					<h3 style="text-align: center">{{$titulo}}</h3>
				</div>
			</div>
			<div class="clear-fix"></div>
		</div>

		<div class="box">
			<table class="table table-hover table-striped compact">
				<thead>
					<tr>
						<th>Nome @if ($seta == 'name') &darr; @endif </th>
						<th>CPF	@if ($seta == 'cpf') &darr; @endif</th>
						<th>Sigla	@if ($seta == 'secretaria') &darr; @endif</th>
						<th>Status	@if ($seta == 'status') &darr; @endif</th>
						<th>Email	@if ($seta == 'email') &darr; @endif</th>
						<th>Celular	@if ($seta == 'celular') &darr; @endif</th>
						<th>CNH	@if ($seta == 'cnh') &darr; @endif</th>
						<th>Catego.	@if ($seta == 'categoria_cnh') &darr; @endif</th>
						<th>Validade	@if ($seta == 'validade_cnh') &darr; @endif</th>
					</tr>						
				</thead>
				
				<tbody>
					@foreach($dados as $dado)
						<tr>		
							<td> {{ $dado->name }} </td> 
							<td> {{ formataCPF_CNPJ($dado->cpf) }} </td> 
							<td> {{ $dado->sigla }} </td> 
							<td> {{ $dado->status }} </td> 
							<td> @if ($dado->email) {{ $dado->email }} @else ---- @endif </td> 
							<td> @if($dado->celular) {{ formataTelefone($dado->celular) }} @else ---- @endif </td>
							<td> @if($dado->cnh) {{ $dado->cnh }} @else ---- @endif </td> 
							<td> @if($dado->categoria_cnh) {{ $dado->categoria_cnh }} @else ---- @endif </td> 
							<td> @if($dado->validade_cnh) {{date('d/m/Y', strtotime($dado->validade_cnh))}} @else ---- @endif </td> 
						</tr>
					@endforeach
					<tr style="font-weight: bold;">
						<td style="text-align: left"> TOTAL </td>
						<td style="text-align: left"> </td>
						<td style="text-align: left"> </td>
						<td style="text-align: left"> </td>
						<td style="text-align: left"> </td>
						<td style="text-align: left"> </td>
						<td style="text-align: right"></td>
						<td style="text-align: right"></td>
						<td style="text-align: left"> {{$sum_usuarios}} Usuários</td>
						
						</tr>
				</tbody>
			</table>
		</div>

		<h3 class="pag pag1"></h3>
	<div class="insert"></div>
	</page>
@endsection