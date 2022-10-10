<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kondisi;
use App\Models\JadwalPakan;

class DashboardController extends Controller
{
    public function index(Request $request){
        $dataLatest = Kondisi::all()->last();
        if(!isset($_SESSION['username'])){
            return redirect('/');
        }

        return $dataLatest ? 
            view('dashboard', [
                "nh3" => $dataLatest->nh3,
                "h2s" => $dataLatest->h2s,
                "suhu" => $dataLatest->suhu,
                "kelembapan" => $dataLatest->kelembapan,
                "jadwalPakans" => JadwalPakan::orderBy('time', 'ASC')->get(),
            ]):        
            view('dashboard', [
                "nh3" => 0,
                "h2s" => 0,
                "suhu" => 0,
                "kelembapan" => 0,
                "jadwalPakans" => JadwalPakan::orderBy('time', 'ASC')->get(),
            ]);
    }
}
