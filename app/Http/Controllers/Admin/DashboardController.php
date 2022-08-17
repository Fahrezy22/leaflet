<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jalan;
use App\Models\Kasus;
use Illuminate\Http\Request;

class DashboardController extends Controller
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
        return view('admin.dashboard')->with(['data' => $data, 'total' => $total]);
    }
}
