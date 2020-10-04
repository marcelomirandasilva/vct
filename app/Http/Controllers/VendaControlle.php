<?php

namespace App\Http\Controllers;

use App\Models\Parceiro;
use App\Models\Produto;
use App\Models\Cliente;
use App\Models\Venda;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Faker\Generator as Faker;


class VendaController extends Controller
{
	public function __construct()
	{
	  $this->middleware('auth');
	}


	public function index()
	{
		$vendas = Venda::all();  

		return view('venda.lista',compact('vendas'));

	}

	public function create()
	{

		$parceiros 		= Parceiro::orderBy('nome')->get();
		$clientes 		= Cliente::orderBy('nome')->get();
		$produtos 		= Produto::orderBy('nome')->get();
		$unidades  		= pegaValorEnum('produtos', 'unidade');
		$transportes  	= pegaValorEnum('vendas', 'transporte');
		$tp_pagamentos	= pegaValorEnum('vendas', 'tp_pagamento');

		
		return view('venda.create',compact('parceiros','clientes','produtos','unidades','transportes','tp_pagamentos'));
		
	}

	public function store(Request $request)
	{
		
		$request->merge(['valor_compra' => 
		str_replace('R$ ', '', str_replace(',', '.', str_replace('.', '', $request->valor_compra))) ]);
		
		$request->merge(['valor_venda'  => 
		str_replace('R$ ', '', str_replace(',', '.', str_replace('.', '', $request->valor_venda))) ]);


		//cria as itens_venda 
		if(isset($request->itens_venda))
		{
			foreach($request->itens_venda as $key => $item)
			{
				$cg = json_decode($item) ;
				$novaItem->itens()->attach($cg->membro_id, ['cargo_id' => $cg->cargo_id]);
			}
		}
		
		dd($request->all());

		//inicia sessão de banco
		DB::beginTransaction();
		
			
		// Criar um nova BAse
		$novoVenda = Venda::create($request->all());

		if($novoVenda){
			DB::commit();
			return redirect('venda')->with('sucesso', 'Venda criado com sucesso!');
		} else {
			//Fail, desfaz as alterações no banco de dados
			DB::rollBack();
			return back()->withInput()->with('error', 'Falha ao criar o Venda.');    
		}

	
	}


	public function show(Venda $venda)
	{
		//
	}


	public function edit(Venda $venda)
	{

		$venda->valor_venda = number_format($venda->valor_venda, 2, ',', ' ');
		$venda->valor_compra = number_format($venda->valor_compra, 2, ',', ' ');

		$venda->valor_venda_unidade = "R$ " .number_format($venda->valor_venda_unidade, 6, ',', ' ');
		$venda->valor_compra_unidade = "R$ " .number_format($venda->valor_compra_unidade, 6, ',', ' ');

		//dd($venda);//
		
		$parceiros = Parceiro::orderBy('nome')->get();
		$unidades  = pegaValorEnum('vendas', 'unidade');
		
		return view('venda.create',compact('venda','parceiros','unidades'));
	}
	
	
	public function update(Request $request, Venda $venda)
	{
		
		$request->merge(['valor_compra' => 
		str_replace('R$ ', '', str_replace(',', '.', str_replace('.', '', $request->valor_compra))) ]);
		
		$request->merge(['valor_venda'  => 
		str_replace('R$ ', '', str_replace(',', '.', str_replace('.', '', $request->valor_venda))) ]);
		
		
		//dd($request->all());

		//inicia sessão de banco
		DB::beginTransaction();
		
			
		// Criar um nova BAse
		$venda->fill($request->all());

		$salvou = $venda->save();

		if($salvou){
			DB::commit();
			return redirect('venda')->with('sucesso', 'Venda alterado com sucesso!');
		} else {
			//Fail, desfaz as alterações no banco de dados
			DB::rollBack();
			return back()->withInput()->with('error', 'Falha ao alterar o Venda.');    
		}

			
	}

	public function destroy($id)
	{

		//inicia sessão de banco
		DB::beginTransaction();
		//deleta
		
		$apagou_Venda = Venda::find($id)->delete();
		
		if($apagou_Venda){
			DB::commit();
			return response('ok', 200);
		} else {
			//Fail, desfaz as alterações no banco de dados
			DB::rollBack();
			return response('erro', 500);
		}

		
	}
}
