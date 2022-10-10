<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kondisi;

class KondisiController extends Controller
{
    public function store(Request $request)
    {
        // dd($request);
        Kondisi::create([
            'nh3' => $request->nh3,
            'h2s' => $request->h2s,
            'suhu' => $request->suhu,
            'kelembapan' => $request->kelembapan,
        ]);
        return response()->json(
            [
                'success' => true,
                'pesan' => 'Kondisi Berhasil Diperbarui'
            ],
            201
        )->header('Access-Control-Allow-Origin', '*')->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
    }
    public function view(Request $request){
        if($request->history == "true"){
            return response()->json(
                [
                    'success' => true,
                    'latest' => Kondisi::all()->last(),
                    'history' => Kondisi::all(),
                    'pesan' => ''
                ],
                201
            )->header('Access-Control-Allow-Origin', '*')->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
        }
        else{
            return response()->json(
                [
                    'success' => true,
                    'latest' => Kondisi::all()->last(),
                    'pesan' => ''
                ],
                201
            )->header('Access-Control-Allow-Origin', '*')->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
        }
    }
}
