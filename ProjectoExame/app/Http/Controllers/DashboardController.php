<?php

namespace App\Http\Controllers;



use App\Http\Services\FrotaService;
use App\Models\Bilhete;
use App\Models\Frota;
use App\Models\Pagamento;
use App\Models\Parque;
use App\Models\User;
use App\Models\Veiculo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $count_clients = User::all()->count();
        $receitas = Pagamento::all()->sum('preco_final');
        $count_veiculos = Veiculo::all()->count();
        $count_frotas = Frota::all()->count();

        $parques = Parque::all();
        $bilhetes_por_parque = [];
        foreach ($parques as $parque) {
            $contador = 0;
            foreach ($parque->pisos as $pisos) {
                foreach ($pisos->zonas as $zona) {
                    $contador += $zona->bilhetes->count();
                }
            }
            $bilhetes_por_parque =array_merge($bilhetes_por_parque, [['nome_parque'=>$parque->nome, 'count'=>$contador]]);
        }




        $weekOfdays = [];
        for($i = 1; $i <= 7; ++$i){
            $date = Carbon::now()->subDays($i);
            $bilhetes = Bilhete::where('data_entrada', '<=', $date)
                ->where('data_saida', '>=', $date)
                ->get();
            $timestamp= strtotime($date)*1000;
            $weekOfdays = array_merge($weekOfdays,[[ $timestamp , $bilhetes->count()]]);
        }


        return view('dashboard',
            [
                'count_clients' => $count_clients,
                'count_veiculos' => $count_veiculos,
                'count_frotas' => $count_frotas,
                'receitas' => $receitas,
                'bilhetes_por_parque' => $bilhetes_por_parque,
                'weekOfdays' => $weekOfdays
            ]);
    }
}
