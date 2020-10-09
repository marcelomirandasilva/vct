<div class="top_nav">
	<div class="nav_menu">
		<nav>
			<div class="nav toggle">
				<a id="menu_toggle"><i class="fa fa-bars"></i></a>
			</div>

			<ul class="nav navbar-nav navbar-right">
				<li class="">
					<a href="#" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
						<img src="{{ Gravatar::get( Auth::user()->email ) }} " > {{Auth::user()->name}}
						<span class=" fa fa-angle-down"></span>
					</a>
					<ul class="dropdown-menu dropdown-usermenu pull-right">
						{{-- <li>
							<a href="#"> 
								<i class="material-icons pull-right">person</i> Editar Perfil
							</a>
						</li> --}}
						<li>
							<a href="{{ url("/alterasenha") }}">
							 	<i class="material-icons pull-right">lock_outline</i> Alterar Senha
							</a>
						</li>

						<li>
							<a class="dropdown-item" href="{{ route('logout') }}" >
								<i class="fa fa-sign-out pull-right"></i> Sair do sistema
							</a>
						</li>
					</ul>
				</li>

				{{-- <li role="presentation" class="dropdown">
					<a href="#" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
						<i class="fa fa-envelope-o"></i>
						<span class="badge bg-green">6</span>
					</a>
					<ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
						<notificacoes></notificacoes>
						<li>
							<div class="text-center">
							<a>
								<strong>See All Alerts</strong>
								<i class="fa fa-angle-right"></i>
							</a>
							</div>
						</li>
					</ul>
				</li> --}}
			</ul>
		</nav>
	</div>
</div>

