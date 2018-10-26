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
		$pais 				= 'BRASIL';
		$tipos_cadastro   = pegaValorEnum('parceiros', 'tipo_cadastro');
		$bancos   			= pegaValorEnum('parceiros', 'banco');

		return view('parceiro.create',compact('pais','tipos_cadastro','bancos'));
		
	}

	public function store(Request $request)
	{
		$request->merge(['telefone1' => retiraMascaraTelefone($request->telefone1)]);
		$request->merge(['telefone2' => retiraMascaraTelefone($request->telefone2)]);
		$request->merge(['telefone3' => retiraMascaraTelefone($request->telefone3)]);

		$request->merge(['cadastro' => retiraMascaraCPF($request->cadastro)]);

		$this->validate($request,[
			'nome'      => 'required|min:5|max:100',
		]);
		
		//dd($request->all());

		//inicia sessão de banco
		DB::beginTransaction();
		
			
		// Criar um nova BAse
		$novoParceiro = Parceiro::create($request->all());

		if($novoParceiro){
			DB::commit();
			return redirect('parceiro')->with('sucesso', 'Parceiro criado com sucesso!');
		} else {
			//Fail, desfaz as alterações no banco de dados
			DB::rollBack();
			return back()->withInput()->with('error', 'Falha ao criar o Parceiro.');    
		}

	
	}


	public function show(Parceiro $parceiro)
	{
		//
	}

	public function edit(Parceiro $parceiro)
	{
		//dd($parceiro);
		$pais 				= 'BRASIL';
		$tipos_cadastro   = pegaValorEnum('parceiros', 'tipo_cadastro');
		$bancos   			= pegaValorEnum('parceiros', 'banco');

		return view('parceiro.create',compact('parceiro','pais','tipos_cadastro','bancos'));
	}


	public function update(Request $request, Parceiro $parceiro)
	{
		$request->merge(['telefone1' => retiraMascaraTelefone($request->telefone1)]);
		$request->merge(['telefone2' => retiraMascaraTelefone($request->telefone2)]);
		$request->merge(['telefone3' => retiraMascaraTelefone($request->telefone3)]);

		$request->merge(['cadastro' => retiraMascaraCPF($request->cadastro)]);

		$this->validate($request,[
			'nome'      => 'required|min:5|max:100',
		]);
		
		//dd($request->all());

		//inicia sessão de banco
		DB::beginTransaction();
		
			
		// Criar um nova BAse
		$parceiro->fill($request->all());

		$salvou = $parceiro->save();

		if($salvou){
			DB::commit();
			return redirect('parceiro')->with('sucesso', 'Parceiro alterado com sucesso!');
		} else {
			//Fail, desfaz as alterações no banco de dados
			DB::rollBack();
			return back()->withInput()->with('error', 'Falha ao alterar o Parceiro.');    
		}

			
	}

	public function destroy($id)
	{

		//inicia sessão de banco
		DB::beginTransaction();
		//deleta
		
		$apagou_Parceiro = Parceiro::find($id)->delete();
		
		if($apagou_Parceiro){
			DB::commit();
			return response('ok', 200);
		} else {
			//Fail, desfaz as alterações no banco de dados
			DB::rollBack();
			return response('erro', 500);
		}

		
	}
}
