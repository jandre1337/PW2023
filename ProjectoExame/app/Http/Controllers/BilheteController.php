<?php

namespace App\Http\Controllers;



use App\Models\Bilhete;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class BilheteController extends Controller
{

    public function create()
    {
        return view('bilhete');
    }

    public function store(Request $request)
    {
        request()->validate([
            'nome' => 'required',
            'localizacao' => 'required'
        ]);

        $bilhete = new Bilhete();

        $bilhete->fill([
            'nome' => $request->nome,
            'localizacao' => $request->localizacao,
            'estado' => $request->estado?1:0
        ])->save();

        return redirect("/bilhete");
    }
}
