<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jalan;
use App\Models\Kasus;
use App\Models\KategoriKasus;
use Illuminate\Http\Request;

class KasusController extends Controller
{
    public function index()
    {
        $data = [
            'kasus' => Kasus::all(),
            'kategori' => KategoriKasus::all(),
            'jalan' => Jalan::all(),
        ];
        return view('admin.kasus')->with('data' , $data);
    }

    public function store(Request $request)
    {
        $data =  Kasus::updateOrCreate(['id' => $request->id],
                [
                    'id_kategori_kasus' => $request->id_kategori_kasus,
                    'id_jalan' => $request->id_jalan,
                    'jumlah_laporan' => $request->jumlah_laporan,
                    'jumlah_selesai' => $request->jumlah_selesai,
                    'keterangan' => $request->keterangan,
                    'cara' => $request->cara,
                ]
        );
        return response()->json($data);
    }

    public function edit($id)
    {
        $item = Kasus::find($id);
        return response()->json($item);
    }

    public function destroy($id)
    {
        $name = Kasus::find($id);
        $names = $name['kategori_rol']['nama_kategori'];
        $delete = Kasus::find($id)->delete();
        if ($delete == 1) {
            $success = true;
            $message = "Data ($names) berhasil di hapus";
        } else {
            $success = true;
            $message = "User not found";
        }
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }
}
