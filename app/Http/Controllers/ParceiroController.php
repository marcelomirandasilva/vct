<?php

namespace App\Http\Controllers;

use App\Models\Parceiro;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Faker\Generator as Faker;


class ParceiroController extends Controller
{
	public function __construct()
	{
	  $this->middleware('auth');
	}


	public function index()
	{
		$parceiros = Parceiro::orderBy('nome')->get();  
		return view('parceiro.lista',compact('parceiros'));

	}

	public function create()
	{
		$pais = 'BRASIL';
		return view('parceiro.create',compact('pais'));
		
	}

	public function store(Request $request)
	{
		//teste de segurança
		$usuario_logado  = Auth::user();
		
		if ( $usuario_logado->can('create_all_bases') ){
			//inicia sessão de banco
			DB::beginTransaction();

			$this->validate($request,[
				'nome'      => 'required|min:5|max:50',
				'endereco'  => 'required|min:7|max:200',
			]);

			// Criar um nova BAse
			$novaBase = Base::create($request->all());

			if($novaBase){
				DB::commit();
				return redirect('base')->with('sucesso', 'Base criada com sucesso!');
			} else {
				//Fail, desfaz as alterações no banco de dados
				DB::rollBack();
				return back()->withInput()->with('error', 'Falha ao criar a Base.');    
			}

		}else{
			return back()->with('erro_seguranca', 'Esse usuário não tem permissão para acessar esse módulo.');    
		};

	}


	public function show(Base $base)
	{
		//
	}

	public function edit(Base $base)
	{
		//teste de segurança
		$usuario_logado  = Auth::user();
		
		if ( $usuario_logado->can('update_all_bases') ){
			return view('base.create', compact('base'));
		}else{
			return back()->with('erro_seguranca', 'Esse usuário não tem permissão para acessar esse módulo.');    
		};
	}


	public function update(Request $request, Base $base)
	{
		//teste de segurança
		$usuario_logado  = Auth::user();
		
		if ( $usuario_logado->can('update_all_bases') ){

			//inicia sessão de banco
			DB::beginTransaction();

			$this->validate($request,[
				'nome'      => 'required|min:5|max:50',
				'endereco'  => 'required|min:7|max:200',
			]);
				
			
			// altera os dados do base
			$base->fill($request->all());
			$salvou_base = $base->save();

			if($salvou_base){
				DB::commit();
				return redirect('base')->with('sucesso', 'Base alterada com sucesso!');
			} else {
				//Fail, desfaz as alterações no banco de dados
				DB::rollBack();
				return back()->withInput()->with('error', 'Falha ao alterar a Base.');    
			}

		}else{
			return back()->with('erro_seguranca', 'Esse usuário não tem permissão para acessar esse módulo.');    
		};
	}

	public function destroy($id)
	{
		//teste de segurança
		$usuario_logado  = Auth::user();
		
		if ( $usuario_logado->can('delete_all_bases') ){

			//inicia sessão de banco
			DB::beginTransaction();
			//deleta
			
			$apagou_base = Base::find($id)->delete();
			if($apagou_base){
				DB::commit();
				return response('ok', 200);
			} else {
				//Fail, desfaz as alterações no banco de dados
				DB::rollBack();
				return response('erro', 500);
			}

		}else{
			return back()->with('erro_seguranca', 'Esse usuário não tem permissão para acessar esse módulo.');    
		};
		

		
	}
}
