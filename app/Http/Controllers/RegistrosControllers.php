<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registro;

class RegistrosControllers extends Controller
{
    public function index() {
        $receita = Registro::where('tipo', 'receita')->sum('valor');
        $despesa = Registro::where('tipo', 'despesa')->sum('valor');

        $statusFinanceiro;
        $saldo = $receita - $despesa;

        if($saldo > 0){
            $statusFinanceiro = 1; /* 1 == Rico */
        } elseif($saldo == 0) {
            $statusFinanceiro = 2;  /* 2 == Zerado */
        } else {
            $statusFinanceiro = 3;  /* 3 == Negativado */ 
        }

        $registros = Registro::all();

        return view('index', compact('receita', 'despesa', 'saldo', 'statusFinanceiro', 'registros'));
    }

    public function store(Request $request) {
        Registro::create([
            'data' => $request->data,
            'tipo' => $request->tipo,
            'descricao' => $request->descricao,
            'categoria' => $request->categoria,
            'valor' => $request->valor,
        ]);     
        return redirect()->route('user-index');
    }

    public function delete() {
        Registro::truncate();
        return redirect()->route('user-index');    
    }

    public function buscar() {
        $registros = Registro::all(); 
        return view('buscar', compact('registros'));
    }

    public function show(Request $request) {

        $filtro = $request->input('filtro');
        $busca = $request->input('busca');

        $query = Registro::query();

        if ($filtro == 'data') {
            $query->whereDate('data', $busca);
        } elseif ($filtro == 'categoria') {
            $query->where('categoria', 'LIKE', "%{$busca}%");
        }

        $registros = $query->get();

        return view('buscar', compact('registros'));
    }
}
