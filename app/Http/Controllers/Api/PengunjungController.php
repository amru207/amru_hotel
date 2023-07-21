<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Http\Resources\PengunjungResource;
use App\Models\Pengunjung;

class PengunjungController extends Controller
{
    public function index(){
        $data = Pengunjung::all();
        return response()->json($data, 200);
    }

    public function show($id){
        $data = Pengunjung::where('id', $id)->with('kamar')->first();
        return response()->json($data, 200);
    }

    public function store(Request $request){
        $validate = Validator::make($request->all(), [
            'nama' => 'required|min:5',
            'alamat' => 'required|min:5',
            'email' => 'required|min:5',
            'no_hp' => 'required|min:5',
        ]);

        if ($validate->fails()) {
            return $validate->errors();
        }

        $data = Pengunjung::create($request->all());
        return response()->json([
            'pesan' => 'Data berhasil disimpan',
            'data' => $data
        ], 201);
    }

    public function destroy($id){
        $data = Pengunjung::where('id', $id)->first();
        if (empty($data)) {
            return response()->json([
                'pesan' => 'Data tidak ditemukan',
                'data' => $data
            ], 404);
        }

        $data->delete();

        return response()->json([
            'pesan' => 'Data berhasil di hapus',
            'data' => $data
        ], 200);
    }

    public function update(Request $request, $id){
        $data = Pengunjung::where('id', $id)->first();
        if (empty($data)) {
            return response()->json([
                'pesan' => 'Data tidak ditemukan',
                'data' => $data
            ], 404);
        }

        $validate = Validator::make($request->all(), [
            'nama' => 'required|min:5',
            'alamat' => 'required|min:5',
            'email' => 'required|min:5',
            'no_hp' => 'required|min:5',
        ]);

        if ($validate->fails()) {
            return $validate->errors();
        }

        $data->update($request->all());

        return response()->json([
            'pesan' => 'Data berhasil di update',
            'data' => $data
        ], 201);
    }
}
