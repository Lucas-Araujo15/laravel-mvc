<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller
{
    public function index(Request $request) {
        $series = Serie::query()->orderBy('nome')->get();
        $mensagemSucesso = session('mensagem.sucesso');

        return view('series.index')->with('series', $series)->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create() {
        return view('series.create');
    }

    public function store(Request $request) {
        // Mass Assignment
        $request->validate([
            'nome' => ['required', 'min:3']
        ]);
        $serie = Serie::create($request->all());
        return to_route('series.index')->with('mensagem.sucesso', "Série '{$serie->nome}' foi adicionada com sucesso");
    }

    public function destroy(Serie $series) {
        $series->delete();
        return to_route('series.index')->with('mensagem.sucesso', "Série '{$series->nome}' foi removida com sucesso");
    }

    public function edit(Serie $series) {
        return view('series.edit')->with('series', $series);
    }

    public function update(Request $request, Serie $series) {
        $series->nome = $request->nome;
        $series->save();
        return to_route('series.index')->with('mensagem.sucesso', "Série '{$series->nome}' foi alterada com sucesso");
    }
}
