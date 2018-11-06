@extends('gentelella.layouts.app')

@section('content')

	<!-- page content -->
   <div class="x_panel modal-content ">
      <div class="x_title">
         <h2> Listagem de Vendas </h2>
         <a href="{{ url('venda/create') }}" 
            class="btn-circulo btn btn-primary btn-md   pull-right " 
            data-toggle="tooltip"  
            data-placement="bottom" 
            title="Adiciona um Venda">
            <span class="fa fa-plus">  </span>
         </a>
         <div class="clearfix"></div>
      </div>
      <div class="x_panel ">
         <div class="x_content">
                  
            <table class="table table-hover table-striped compact" id="tb_vendas">
               <thead>
                  <tr>
                     <th>Cliente</th> 
                     <th>Data Entrega</th>
                     <th>Pagou</th>
                     <th>Transporte</th>
                     <th>Ações</th>
                  </tr>						
               </thead>

               <tbody>
                  @foreach($vendas as $key=> $venda)
                     <tr>
                        <td>{{ $venda->cliente->nome }}</td> 
                        <td>{{ $venda->dt_entrega }}</td>
                        <td> @if($venda->pg_recebido) SIM @else NÃO @endif</td>
                        <td>{{ $venda->transporte }}</td>
   

                        <td class="actions">
                              
                         
                              
                           <a href="{{ url("venda/$venda->id/edit") }}" 
                              class="btn btn-warning btn-xs action botao_acao " 
                              data-toggle="tooltip" 
                              data-venda = {{ $venda->id }}
                              data-placement="bottom" 
                              title="Edita essa venda">  
                              <i class="glyphicon glyphicon-pencil "></i>
                           </a>
                           <a href="{{ url("venda/$venda->id") }}" 
                              id="btn_exclui_venda"
                              class="btn btn-danger btn-xs  action botao_acao  "  
                              data-toggle="tooltip" 
                              data-venda = {{ $venda->id }}
                              data-placement="bottom" 
                              title="Exclui esse venda"> 
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

@endsection





@push("scripts")
   <!-- Datatables -->
   <script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.18/af-2.3.0/b-1.5.2/b-flash-1.5.2/b-html5-1.5.2/b-print-1.5.2/cr-1.5.0/fc-3.2.5/fh-3.1.4/kt-2.4.0/r-2.2.2/rg-1.0.3/rr-1.2.4/sc-1.5.0/sl-1.2.6/datatables.min.js"></script>

   <script src="http://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js" type="text/javascript"></script>
   <script src="http://cdn.datatables.net/plug-ins/1.10.19/sorting/datetime-moment.js" type="text/javascript"></script>

   <script>
		$(document).ready(function(){
         
			$("#tb_vendas").DataTable({
				language : {
					'url' : '{{ asset('js/portugues.json') }}',
					"decimal": ",",
					"thousands": "."
				}, 
				stateSave: true,
				stateDuration: -1,
				responsive : true,
            "columnDefs": 
				[
					{
						render: function ( data, type, row )             
						{
							return (moment(data).format("DD/MM/YYYY"));
						},
						targets: 1
					},  
            ]
            		  		
         });
         

         //botão de exclusão
			$("table#tb_vendas").on("click", "#btn_exclui_venda",function(){
				event.preventDefault();
				

				let id_venda = $(this).data('venda');
				let btn = $(this);

				swal({
					title: 'Confirma a EXCLUSÃO deste Venda?',
					type: 'question',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Sim',
					cancelButtonText: 'Não'
				}).then((result) => {
					if (result.value) {
						$.post("{{ url('venda/') }}/"+id_venda, {
							_token  : "{{ csrf_token() }}",
							_method : 'DELETE',
							id: 			id_venda,
							},function(data){
								if(data =="ok"){

									//exclui a linha no datatables
									$("table#tb_vendas").DataTable().row( btn.parents('tr') ).remove().draw();
									
									swal(
										'Venda EXCLUÍDO',
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
	</script>

@endpush



