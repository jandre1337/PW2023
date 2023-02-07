<?php

namespace App\Http\Controllers;



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


        return view('dashboard',
            ['count_clients' => $count_clients]);
    }
}
