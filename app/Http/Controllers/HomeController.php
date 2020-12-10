<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Parceiro;
use App\Models\Cliente;
use Carbon\Carbon;
use Datatables;


class HomeController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
 	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{

		$qtdProdutos 	= Produto::count();
		$qtdParceiros 	= Parceiro::count();
		$qtdClientes 	= Cliente::count();

		//		
//		$qtdVeiculos = Veiculo::count();
//
//		
//		//================================================== SEMANAL =====================================
//		
//		/* CRIA AS VARIÁVEIS DE DATA */
//		$sem_passada 			= date('W')-1;
//		$sem_atual 				= date('W')-0;
//
//		$segunda_passada    	= date("Y-m-d", strtotime('monday last week'));
//		$segunda_atual      	= date("Y-m-d", strtotime('monday this week'));
//		$segunda_proxima    	= date("Y-m-d", strtotime('monday next week'));
//
//		
//		/* OBTEM OS ABASTECIMENTOS DA SEMANA PASSADA */
//		$abastecimentos_SP = 
//		DB::table('abastecimentos')->where('created_at', '>=' ,$segunda_passada)
//		->where('created_at', '<=' ,$segunda_atual)->get(); 
//
//		/* POPULA A QUANTIDADE E TOTAL DE ABASTECIMENTOS DA SEMANA PASSADA */
//		$qtd_abast_SP = 0; $sum_abast_SP = 0;
//		foreach($abastecimentos_SP as $a)
//		{
//			$qtd_abast_SP++;
//			$sum_abast_SP = $sum_abast_SP + $a->valor_total;
//		}
//		
//		/* OBTEM OS ABASTECIMENTOS DA SEMANA ATUAL */
//		$abastecimentos_SA = 
//			DB::table('abastecimentos')->where('created_at', '>=' ,$segunda_atual)
//			->where('created_at', '<=' ,$segunda_proxima)->get(); 
//
//		/* POPULA A QUANTIDADE E TOTAL DE ABASTECIMENTOS DA SEMANA ATUAL */
//		$qtd_abast_SA = 0; $sum_abast_SA = 0;
//		foreach($abastecimentos_SA as $a)
//		{
//			$qtd_abast_SA++;
//			$sum_abast_SA = $sum_abast_SP + $a->valor_total;
//		}
//		/* =============================================================================================== */
//
//
//		$vetor['qtd_abast_SP'] = $qtd_abast_SP;
//		$vetor['sum_abast_SP'] = $sum_abast_SP;
//
//		$vetor['qtd_abast_SA'] = $qtd_abast_SA;
//		$vetor['sum_abast_SA'] = $sum_abast_SA;
//
//		$V1 = $qtd_abast_SP;
//		$V2 = $qtd_abast_SA;
//
//		// se o não existir abastecimentos
//		if ($V1 == 0  || $V2 == 0 )
//		{
//			$vetor['perc_qtd_abast'] = 0;
//			$vetor['perc_sum_abast'] = 0; 
//		}else{
//			$vetor['perc_qtd_abast']        = round((( $V2 - $V1 ) / $V1 * 100),3);
//			$V1 = $sum_abast_SP;
//			$V2 = $sum_abast_SA;
//			$vetor['perc_sum_abast']        = round((( $V2 - $V1 ) / $V1 * 100),3); 
//		}
//
//
//		//================================================== MENSAL =====================================
//
//		$ini_mes_atual = date("Y-m-d", strtotime('first day of this month'));
//		$fim_mes_atual = date("Y-m-d", strtotime('first day of next month'));// date("Y-m-d", strtotime('last day of this month')); 
//
//		$ini_mes_ant  = date("Y-m-d", strtotime('first day of last month'));
//		$fim_mes_ant  = date("Y-m-d", strtotime('first day of this month'));// date("Y-m-d", strtotime('last day of this month')); 
//
//		
//		$vetor['atual_mes_sum_abast'] = DB::table('abastecimentos') ->where('created_at', '>=' ,$ini_mes_atual)
//																	->where('created_at', '<'  ,$fim_mes_atual)
//																	->sum('valor_total'); 
//	   
//		$vetor['ant_mes_sum_abast']  = DB::table('abastecimentos')  ->where('created_at', '>=' ,$ini_mes_ant)
//																	->where('created_at', '<'  ,$fim_mes_ant)
//																	->sum('valor_total'); 
//
//																			
//		$V1 = $vetor['atual_mes_sum_abast'];
//		$V2 = $vetor['ant_mes_sum_abast'];
//		
//		// se o não existir abastecimentos
//		if ($V1 == 0  || $V2 == 0 )
//		{
//			$vetor['perc_sum_abast_mes'] = 0; 
//		}else{
//			$vetor['perc_sum_abast_mes'] = round((( $V2 - $V1 ) / $V1 * 100),3);
//		}
//
//		
//
//
//
//		//====================== GRAFICO GASTO ANUAL =====================================
//		$ini_ano_atual = date("Y-m-d", strtotime('first day of this year'));
//		$fim_ano_atual = date("Y-m-d", strtotime('first day of next year'));// date("Y-m-d", strtotime('last day of this month')); 
//
//		$ano = Carbon::now()->year;
//		$data_inicio   = Carbon::createFromFormat('Y-m-d H:i:s', $ano.'-01-01 00:00:00');
//		$data_fim      = Carbon::createFromFormat('Y-m-d H:i:s', $ano.'-12-31 23:59:59');
//
//		//===================================================================================================
//
//	
//		
//		$valor_total_mensal =  DB::table("abastecimentos")
//			->select(DB::raw("MONTH(created_at) as mes") , 
//
//				DB::raw(" round( sum(valor_total) ,3 ) as total"))
//
//				->orderBy(DB::raw("MONTH(created_at)"))
//			->groupBy(DB::raw("MONTH(created_at)"))
//			->get();

//		return view('home', compact('qtdVeiculos','vetor','valor_total_mensal'));
		return view('home', compact('qtdProdutos','qtdParceiros','qtdClientes'));

	}

	public function graf1()
	{
				  
		$valor_total_mensal =  DB::table("abastecimentos")
											->select(DB::raw("MONTH(created_at) as mes") , 

												DB::raw(" round( sum(valor_total) ,3 ) as total"))
							
												->orderBy(DB::raw("MONTH(created_at)"))
											->groupBy(DB::raw("MONTH(created_at)"))
											->get();
		  /* 
		$devlist = DB::table('projects')
							->select(DB::raw('MONTHNAME(updated_at) as month'), 
								DB::raw("DATE_FORMAT(updated_at,'%Y-%m') as monthNum"), 
								DB::raw('count(*) as projects'))
							
								->groupBy('monthNum')
							->get(); */

		
		return json_encode($valor_total_mensal,JSON_NUMERIC_CHECK);
	}



	public function embreve($rotina)
	{
		return view ('embreve');
	}

}
