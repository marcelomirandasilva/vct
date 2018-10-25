@extends('gentelella.layouts.app')

@section('content')

	<!-- page content -->
   <div class="x_panel modal-content ">
      <div class="x_title">
         <h2> Listagem de Parceiros </h2>
         <a href="{{ url('parceiro/create') }}" 
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
                  
            <table class="table table-hover table-striped compact" id="tb_parceiros">
               <thead>
                  <tr>
                     <th>Nome</th> 
                     <th>Telefone</th>
                     <th>Email</th>
                     <th>Ações</th>
                  </tr>						
               </thead>

               <tbody>
                  @foreach($parceiros as $key=> $parceiro)
                     <tr>
                        <td>{{ $parceiro->nome }}</td> 
                        <td>{{ formataTelefone($parceiro->telefone1) }}</td>
                        <td>{{ $parceiro->email }}</td>
   

                        <td class="actions">
                              
                         
                              
                           <a href="{{ url("parceiro/$parceiro->id/edit") }}" 
                              class="btn btn-warning btn-xs action botao_acao " 
                              data-toggle="tooltip" 
                              data-parceiro = {{ $parceiro->id }}
                              data-placement="bottom" 
                              title="Edita essa parceiro">  
                              <i class="glyphicon glyphicon-pencil "></i>
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
         
			$("#tb_parceiros").DataTable({
				language : {
					'url' : '{{ asset('js/portugues.json') }}',
					"decimal": ",",
					"thousands": "."
				}, 
				stateSave: true,
				stateDuration: -1,
				responsive : true,
            		  		
			});
		});
	</script>

@endpush



