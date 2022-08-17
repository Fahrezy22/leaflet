<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriKasus;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $data = KategoriKasus::all();
        return view('admin.kategori-kasus')->with('data' , $data);
    }

    public function store(Request $request)
    {
        $data =  KategoriKasus::updateOrCreate(['id' => $request->id],
                ['nama_kategori' => $request->nama_kategori]
        );
        return response()->json($data);
    }

    public function edit($id)
    {
        $item = KategoriKasus::find($id);
        return response()->json($item);
    }

    public function destroy($id)
    {
        $name = KategoriKasus::find($id);
        $names = $name['nama_kategori'];
        $delete = KategoriKasus::find($id)->delete();
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
