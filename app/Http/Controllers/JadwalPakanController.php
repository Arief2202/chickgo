<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJadwalPakanRequest;
use App\Http\Requests\UpdateJadwalPakanRequest;
use App\Models\JadwalPakan;
use Illuminate\Http\Request;

class JadwalPakanController extends Controller
{

    public function store(Request $request)
    {
        JadwalPakan::create([
            "time" => $request->time,
            "volume" => $request->volume,
        ]);
        return redirect('/dashboard');
    }

    public function destroy(Request $request)
    {
        JadwalPakan::where('id', '=', $request->id)->delete();   
        return redirect('/dashboard');  
    }
}
