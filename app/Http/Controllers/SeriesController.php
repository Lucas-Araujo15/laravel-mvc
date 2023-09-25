<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller
{
    public function index() {
        $series = DB::select('select * from series', []);

        return view('series.index')->with('series', $series);
    }

    public function create() {
        return view('series.create');
    }

    public function store(Request $request) {
        //filter var / filter input
        $nomeSerie = $request->input('nome');

        if (DB::insert('insert into series (nome) values (?)', [$nomeSerie])) {
            return "OK";
        } else {
            return "Deu Erro";
        }
    }
}
