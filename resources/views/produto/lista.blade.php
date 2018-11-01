@extends('gentelella.layouts.app')

@section('content')

	<!-- page content -->
   <div class="x_panel modal-content ">
      <div class="x_title">
         <h2> Listagem de Produtos </h2>
         <a href="{{ url('produto/create') }}" 
            class="btn-circulo btn btn-primary btn-md   pull-right " 
            data-toggle="tooltip"  
            data-placement="bottom" 
            title="Adiciona um Parceiro">
            <span class="fa fa-plus">  </span>
         </a>
         <div class="clearfix"></div>
      </div>
      <div class="x_panel ">
         <div class="x_content">
                  
            <table class="table table-hover table-striped compact" id="tb_produtos">
               <thead>
                  <tr>
                     <th>Nome</th> 
                     <th>Quantidade</th>
                     <th>Unidade</th>
                     <th>Compra</th>
                     <th>Venda</th>
                     <th>Ações</th>
                  </tr>						
               </thead>

               <tbody>
                  @foreach($produtos as $key=> $produto)
                     <tr>
                        <td>{{$produto->nome}}</td> 
                        <td>{{$produto->quantidade}}</td> 
                        <td>{{$produto->unidade}}</td> 
                        <td>{{$produto->valor_compra}}</td> 
                        <td>{{$produto->valor_venda}}</td> 
                        

                        <td class="actions">
                             
                           <a href="{{ url("produto/$produto->id/edit") }}" 
                              class="btn btn-warning btn-xs action botao_acao " 
                              data-toggle="tooltip" 
                              data-produto = {{ $produto->id }}
                              data-placement="bottom" 
                              title="Edita essa produto">  
                              <i class="glyphicon glyphicon-pencil "></i>
                           </a>
                           <a href="{{ url("produto/$produto->id") }}" 
                              id="btn_exclui_produto"
                              class="btn btn-danger btn-xs  action botao_acao  "  
                              data-toggle="tooltip" 
                              data-produto = {{ $produto->id }}
                              data-placement="bottom" 
                              title="Exclui esse produto"> 
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

   {{-- <script src="http://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js" type="text/javascript"></script> --}}
   {{-- <script src="http://cdn.datatables.net/plug-ins/1.10.19/sorting/datetime-moment.js" type="text/javascript"></script>
 --}}

   <script>
		$(document).ready(function(){
         
			$("#tb_produtos").DataTable({
				language : {
					url : '{{ asset('js/portugues.json') }}',
					
				}, 
				stateSave: true,
				stateDuration: -1,
				responsive : true,

				"columnDefs": 
				[
					{
						render: $.fn.dataTable.render.number( '.', ',', 2, 'R$ ' ),
						targets: [3,4]
					},
				], 
 
            		  		
         });
         

         //botão de exclusão
			$("table#tb_produtos").on("click", "#btn_exclui_produto",function(){
				event.preventDefault();
				

				let id_produto = $(this).data('produto');
				let btn = $(this);

				swal({
					title: 'Confirma a EXCLUSÃO deste Parceiro?',
					type: 'question',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Sim',
					cancelButtonText: 'Não'
				}).then((result) => {
					if (result.value) {
						$.post("{{ url('produto/') }}/"+id_produto, {
							_token  : "{{ csrf_token() }}",
							_method : 'DELETE',
							id: 			id_produto,
							},function(data){
								if(data =="ok"){

									//exclui a linha no datatables
									$("table#tb_produtos").DataTable().row( btn.parents('tr') ).remove().draw();
									
									swal(
										'Parceiro EXCLUÍDO',
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



