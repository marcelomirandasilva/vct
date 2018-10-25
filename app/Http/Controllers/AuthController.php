<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;


class AuthController extends Controller
{
	/**
	 * Login
	 */

	public function login()
	{
		//testa se o usuário já está logado e redireciona para a home
		if(Auth::user())
		{
			return redirect()->intended('/');
		}
		
		return view('auth.login');
	}

	public function logout()
	{
		Auth::logout();
		return redirect("/");
	}
	

	/**
	 * Gerenciar o login quando for enviado via POST
	 */

	public function entrar(Request $request)
	{

		//dd($request->all());
		$usuario_logado = User::where('email', $request->email)->first();
		
		if(isset($usuario_logado))
		{ 
			
			// Testar a senha
			if(Hash::check($request->password, $usuario_logado->password))
			{

				// Logar o usuário
				if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
				{
					$request->session()->put('usuario_logado', $usuario_logado);
					
					// Redirecionar para o Painel Principal
					return redirect()->intended('/');
				}
			} else {
				return redirect("/login")->withErrors(['erros' => 'Senha não confere']);
			}
		}else{
			return redirect("/login")->withErrors(['erros' => 'Email ou CPF não cadastrado']);    
		} 





	   /*  // Obter o usuário 
		$usuario = User::where('email', $request->email)->first();
		
		dd($usuario);
		
		//verifica se o email existe na base
		if($usuario)
		{ 
			//dd(bcrypt($request->senha), $usuario->password);
			
			// Testar a senha
			if(Hash::check($request->senha, $usuario->password))
			{
				// Logar o usuário
				if(Auth::attempt(['email' => $request->email, 'password' => $request->senha]))
				{
					// Redirecionar para o Painel Principal
					//dd("logou");
					return redirect()->intended('/');
				}

			} else {
				return redirect("/login")->withErrors(['erros' => 'Senha não confere']);
			}
		}else{
			return redirect("/login")->withErrors(['erros' => 'Email não cadastrado']);    
		} */
	}
}
