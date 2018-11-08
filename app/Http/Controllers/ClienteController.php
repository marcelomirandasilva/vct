<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Banco;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Faker\Generator as Faker;


class ClienteController extends Controller
{
	public function __construct()
	{
	  $this->middleware('auth');
	}


	public function index()
	{
		$clientes = Cliente::orderBy('nome')->get();  
		return view('cliente.lista',compact('clientes'));

	}

	public function create()
	{
		$pais 				= 'BRASIL';
		$bancos   			= Banco::orderBy('nome')->get();

		return view('cliente.create',compact('pais','bancos'));
		
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
		$novoCliente = Cliente::create($request->all());

		if($novoCliente){
			DB::commit();
			return redirect('cliente')->with('sucesso', 'Cliente criado com sucesso!');
		} else {
			//Fail, desfaz as alterações no banco de dados
			DB::rollBack();
			return back()->withInput()->with('error', 'Falha ao criar o Cliente.');    
		}

	
	}


	public function show(Cliente $cliente)
	{
		//
	}

	public function edit(Cliente $cliente)
	{
		$pais 				= 'BRASIL';
		
		$bancos   			= Banco::orderBy('nome')->get();
		
		return view('cliente.create',compact('cliente','pais','bancos'));
	}
	
	
	public function update(Request $request, Cliente $cliente)
	{
		//dd($request->all());
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
		$cliente->fill($request->all());

		$salvou = $cliente->save();

		if($salvou){
			DB::commit();
			return redirect('cliente')->with('sucesso', 'Cliente alterado com sucesso!');
		} else {
			//Fail, desfaz as alterações no banco de dados
			DB::rollBack();
			return back()->withInput()->with('error', 'Falha ao alterar o Cliente.');    
		}

			
	}

	public function destroy($id)
	{

		//inicia sessão de banco
		DB::beginTransaction();
		//deleta
		
		$apagou_Cliente = Cliente::find($id)->delete();
		
		if($apagou_Cliente){
			DB::commit();
			return response('ok', 200);
		} else {
			//Fail, desfaz as alterações no banco de dados
			DB::rollBack();
			return response('erro', 500);
		}
	}

	public function buscaCliente($id)
	{
		$cliente = Cliente::with('banco')->find($id);

		return response($cliente);
		
	}
}
