<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Series;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller
{
    public function index(Request $request) {
        $series = Series::all();
        $mensagemSucesso = session('mensagem.sucesso');

        return view('series.index')->with('series', $series)->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create() {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request) {
        // Mass Assignment
        $serie = Series::create($request->all());
        return to_route('series.index')->with('mensagem.sucesso', "Série '{$serie->nome}' foi adicionada com sucesso");
    }

    public function destroy(Series $series) {
        $series->delete();
        return to_route('series.index')->with('mensagem.sucesso', "Série '{$series->nome}' foi removida com sucesso");
    }

    public function edit(Series $series) {
        return view('series.edit')->with('series', $series);
    }

    public function update(SeriesFormRequest $request, Series $series) {
        $series->nome = $request->nome;
        $series->save();
        return to_route('series.index')->with('mensagem.sucesso', "Série '{$series->nome}' foi alterada com sucesso");
    }
}
