<?php

namespace App\Http\Controllers;


use App\Models\Frota;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('cliente-list',
            ['clientes' => User::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cliente-new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'email' => 'required|email|unique:users,email',
            'name' => 'required',
            'cc' => 'required|max:10',
            'password' => 'required|min:6'
        ]);

        $cliente = new User();

        $cliente->fill([
            'name' => $request->name,
            'email' => $request->email,
            'cc' => $request->cc,
            'password' => Hash::make($request->Password)
        ])->save();

        return redirect("/clientes");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $cc
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $cc
     * @return \Illuminate\Http\Response
     */
    public function edit($cc)
    {
        $cliente = User::where('cc', $cc)->first();
        $frotas = Frota::where('user_id', $cc);
        return view('cliente-edit',
            [
                'cliente' => $cliente,
                'frotas' => $frotas
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $cc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $cc)
    {
        request()->validate([
            'email' => 'required|email|unique:users,email',
            'name' => 'required',
            'cc' => 'required|max:10',
            'password' => 'required|min:6'
        ]);

        $cliente = User::where('cc', $cc)->first();
        $cliente->fill([
            'name' => $request->name,
            'email' => $request->email,
            'cc' => $request->cc,
            'Password' => Hash::make($request->Password)
        ])->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $cc
     * @return \Illuminate\Http\Response
     */
    public function destroy($cc)
    {
        $cliente = User::where('cc', $cc)->first();
        $cliente->delete();
        return redirect("/clientes");
    }
}
