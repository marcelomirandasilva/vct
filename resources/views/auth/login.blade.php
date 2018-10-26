<!DOCTYPE html>
<html lang="pt-br">
	@section('htmlheader_title', 'Login')
	@include('gentelella.layouts.partials.htmlheader')

	<body class="login cor_fundo_login">

		<div id="app"> 
			<a class="hiddenanchor" id="signup"></a>
			<a class="hiddenanchor" id="signin"></a>
			<div class="cor_fundo_login" style="width:100%; height:150px; text-align: center;">
				<img class="logo_topo" src="{{ asset("img/logo.png") }}" style="width:19%">
			</div>

			<div class="login_wrapper">
				{{--  login  --}}
				<div class="animate form login_form ">
					<section class="login_content">
						<form method="POST" action="{{ route('login') }}">
							{{ csrf_field() }}
							
							<div>
								
								
								<label for="rb_escolhe_login_email">Email</label>
								<input type="email" name="email" id="email_fake" autocomplete="off" style="display: none;" />
  								
								<input id="email" type="email" placeholder="Email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
								
								
								@if ($errors->has('email'))
									<span class="invalid-feedback">
										<strong>{{ $errors->first('email') }}</strong>
									</span>
								@endif
							</div>
							<div>
								<label for="password" class="form-group">Senha</label>
								<input id="password" type="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required autocomplete="off">
								
								@if ($errors->has('password'))
								<span class="invalid-feedback">
									<strong>{{ $errors->first('password') }}</strong>
								</span>
								@endif
							</div>
							<div>
								<button type="submit" class="btn btn-default submit">
									Login
								</button>               
								
								
							</div>
							
							<div class="clearfix"></div>
							
							<div class="separator">
								
								<div class="clearfix"></div>
								<br />
								
							
							</div>
						</form>
					</section>
				</div>
		
			</div>
		</div>

		<script src="{{ asset('/js/app.js')}}"></script>
		<script src="{{ asset('/js/components.js')}}"></script>

		{{-- <script src="{{ asset('js/sweetalert2.js') }}"></script> --}}

		{{-- Vanilla Masker --}}
		<script src="{{ asset('js/vanillaMasker.min.js') }}"></script>


		<script>

			$().ready(function() {
			
				@if ($errors->any())
					@foreach ($errors->all() as $error)
						new PNotify({
							title: 'Oh No!',
							text: "{{ $error }}",
							type: "error",
							styling: 'fontawesome',
							desktop: {
								desktop: true,
							}
						});
					@endforeach
				@endif

				$('#rb_escolhe_login_email').change(function(){
					console.log('email')
					$('#email').attr('type', 'email');
					$('#email').attr('placeholder', 'email');

					VMasker ($("#email")).unMask();
				}); 
				$('#rb_escolhe_login_cpf').change(function(){
					console.log('cpg')
					$('#email').attr('type', 'text');
					$('#email').attr('placeholder', 'cpf');


					VMasker ($("#email")).unMask();
					VMasker ($("#email")).maskPattern("999.999.999-99");
				}); 
			});
			
		</script>


		
		

	</body>
</html>


