<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jalan;
use Illuminate\Http\Request;

class JalanController extends Controller
{
    public function index()
    {
        $data = Jalan::all();
        return view('admin.jalan')->with('data' , $data);
    }

    public function store(Request $request)
    {
        $data =  Jalan::updateOrCreate(['id' => $request->id],
                ['nama_jalan' => $request->nama_jalan, 'koordinat' => $request->koordinat]
        );
        return response()->json($data);
    }

    public function edit($id)
    {
        $item = Jalan::find($id);
        return response()->json($item);
    }

    public function destroy($id)
    {
        $name = Jalan::find($id);
        $names = $name['nama_jalan'];
        $delete = Jalan::find($id)->delete();
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
