<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Jalan;
use App\Models\Kasus;
use Illuminate\Http\Request;

class Dashboardcontroller extends Controller
{
    public function index()
    {
        $data = [
            'tkp' => Jalan::count(),
            'kasus_selesai' => Kasus::sum('jumlah_selesai'),
            'kasus_terlapor' => Kasus::sum('jumlah_laporan'),
            'kasus' => Kasus::all(),
        ];
        $total = $data['kasus_selesai'] + $data['kasus_terlapor'];
        return view('layouts.User.base')->with(['data' => $data, 'total' => $total]);
    }
}
