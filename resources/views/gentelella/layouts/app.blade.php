<!DOCTYPE html>
<html lang="pt-br">
	@include('gentelella.layouts.partials.htmlheader')

	<body class="nav-md">
		<div class="container body" >

			<div class="main_container">
				<div class="col-md-3 left_col">
					<div class="left_col scroll-view">
						<div class="navbar nav_title" style="border: 0;">
							<a href="{{ route('home')}}" class="site_title">
								<img class="" src="{{ asset("img/globo.png") }}" style="width:19%">
								<span>Vendas</span>
								<span style="font-size: 10px">V1.1</span>
							</a>
						</div>

						<div class="clearfix"></div>

						<!-- menu profile quick info -->
						{{-- @include('gentelella.layouts.partials.htmlprofile') --}}
						<!-- /menu profile quick info -->
						
						<!-- sidebar menu -->
						@include('gentelella.layouts.partials.sidebar')
						<!-- /sidebar menu -->

						<!-- /menu footer buttons -->

						{{-- @include('gentelella.layouts.partials.footerbuttons') --}}

						<!-- /menu footer buttons -->
					</div>
				</div>
				<!-- top navigation -->
				@include('gentelella.layouts.partials.mainheader')
				<!-- /top navigation -->
				
				<div id="app">
					<!-- page content -->
					<div class="right_col" role="main" style="min-height: 585px;">
						<div class="">
							<div class="page-title">
								<div class="title_left">
									<h3>@yield('page_title')</h3>
								</div>

								{{-- @include('gentelella.layouts.partials.htmlsearch') --}}
							</div>
							<div class="clearfix"></div>

							<div class="row">
								<div class="col-md-12 col-sm-12 col-xs-12">

									@yield('content')
									
								</div>
							</div>           
						</div>
					</div>
					<!-- /page content -->
				
				</div>
				<!-- footer content -->
				@include('gentelella.layouts.partials.htmlfooter')
				<!-- /footer content -->
			</div>
		</div>

		<script>
			//variáveis globais ao sistema
			let url_base       = "{{ url("/") }}"; 
		</script>   
		
		<!-- scripts -->
		<script src="{{ asset('/js/app.js')}}"></script>
		<script src="{{ asset('/js/components.js')}}"></script>

		<script src="{{ asset('/timepicker/jquery.timepicker.min.js')}}"></script>
		<script src="{{ asset('/Datepair/datepair.js')}}"></script>
		<script src="{{ asset('/Datepair/jquery.datepair.js')}}"></script>
		
	
		
		<script src="{{ asset('/SmartWizard/dist/js/jquery.smartWizard.min.js')}}"></script>
		
		<script> 
			//mensagens de sucesso
			@if (session('sucesso'))
				$.notify("{{ session('sucesso') }}", "success");
			@endif

			//mensagem para os erros de acesso pela ACL
			@if (session('erro_seguranca'))
				funcoes.notificationRight("top", "right", "danger", "{{ session('erro_seguranca') }}"); 
			@endif
			

			// Testar se há algum erro, e mostrar a notificação 
			var tempo = 0;
			var incremento = 500;
			@if ($errors->any())
				@foreach ($errors->all() as $error)
					setTimeout(function(){funcoes.notificationRight("top", "right", "danger", "{{ $error }}"); }, tempo);
					tempo += incremento;
				@endforeach
			@endif
		</script>

		@stack('scripts')

		
	</body>
</html>
