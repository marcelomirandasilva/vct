<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Parceiro;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Faker\Generator as Faker;


class ProdutoController extends Controller
{
	public function __construct()
	{
	  $this->middleware('auth');
	}


	public function index()
	{
		$produtos = Produto::all();  

		return view('produto.lista',compact('produtos'));

	}

	public function create()
	{

		$parceiros = Parceiro::orderBy('nome')->get();
		$unidades  = pegaValorEnum('produtos', 'unidade');

		return view('produto.create',compact('parceiros','unidades'));
		
	}

	public function store(Request $request)
	{
		
		$request->merge(['valor_compra' => 
		str_replace('R$ ', '', str_replace(',', '.', str_replace('.', '', $request->valor_compra))) ]);
		
		$request->merge(['valor_venda'  => 
		str_replace('R$ ', '', str_replace(',', '.', str_replace('.', '', $request->valor_venda))) ]);
		
		//dd($request->all());

		//inicia sessão de banco
		DB::beginTransaction();
		
			
		// Criar um nova BAse
		$novoProduto = Produto::create($request->all());

		if($novoProduto){
			DB::commit();
			return redirect('produto')->with('sucesso', 'Produto criado com sucesso!');
		} else {
			//Fail, desfaz as alterações no banco de dados
			DB::rollBack();
			return back()->withInput()->with('error', 'Falha ao criar o Produto.');    
		}

	
	}


	public function show(Produto $produto)
	{
		//
	}


	public function edit(Produto $produto)
	{

		//dd($produto);
		$parceiros = Parceiro::orderBy('nome')->get();
		$unidades  = pegaValorEnum('produtos', 'unidade');
		
		return view('produto.create',compact('produto','parceiros','unidades'));
	}
	
	
	public function update(Request $request, Produto $produto)
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
		$produto->fill($request->all());

		$salvou = $produto->save();

		if($salvou){
			DB::commit();
			return redirect('produto')->with('sucesso', 'Produto alterado com sucesso!');
		} else {
			//Fail, desfaz as alterações no banco de dados
			DB::rollBack();
			return back()->withInput()->with('error', 'Falha ao alterar o Produto.');    
		}

			
	}

	public function destroy($id)
	{

		//inicia sessão de banco
		DB::beginTransaction();
		//deleta
		
		$apagou_Produto = Produto::find($id)->delete();
		
		if($apagou_Produto){
			DB::commit();
			return response('ok', 200);
		} else {
			//Fail, desfaz as alterações no banco de dados
			DB::rollBack();
			return response('erro', 500);
		}

		
	}
}
