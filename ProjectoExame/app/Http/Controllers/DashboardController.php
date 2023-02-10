<?php

namespace App\Http\Controllers;



use App\Models\Bilhete;
use App\Models\Parque;
use App\Models\User;
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

        $parques = Parque::all();
        $bilhetes_por_parque = [];
        foreach ($parques as $parque) {
            $contador = 0;
            foreach ($parque->pisos as $pisos) {
                foreach ($pisos->zonas as $zona) {
                    $contador += $zona->bilhetes->count();
                }
            }
            $bilhetes_por_parque += [['nome_parque'=>$parque->nome, 'count'=>$contador]];
        }


        $date = date('Y-m-d');
        $weekOfdays = [];

        for($i =0; $i <= 7; $i++){
            $date = strtotime('-'.$i.' day', strtotime($date))*1000;
            $bilhetes = Bilhete::whereDay('data_entrada', $date)->get();
            $weekOfdays += [[ 'date'=> $date , 'count'=>$bilhetes->count()]];
        }


        return view('dashboard',
            [
                'count_clients' => $count_clients,
                'bilhetes_por_parque' => $bilhetes_por_parque,
                'weekOfdays' => $weekOfdays
            ]);
    }
}
