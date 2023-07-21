<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Http\Resources\HotelResource;
use App\Models\Hotel;

class HotelController extends Controller
{
    public function index(){
        // $data_awal = Hotel::with('pengunjungs')->get();
        // $data = HotelResource::collection($data_awal);
        $data = Hotel::all();
        return response()->json($data, 200);
    }

    public function show($id){
        $data = Hotel::where('id', $id)->with('pengunjungs')->first();
        return response()->json($data, 200);
    }

    public function store(Request $request){
        $validate = Validator::make($request->all(), [
            'nama' => 'required|min:5',
            'alamat' => 'required|min:5',
            'harga' => 'required|numeric',
            'deskripsi' => 'required|min:5',
        ]);

        if ($validate->fails()) {
            return $validate->errors();
        }

        $data = Hotel::create($request->all());
        return response()->json([
            'pesan' => 'Data berhasil disimpan',
            'data' => $data
        ], 201);
    }

    public function destroy($id){
        $data = Hotel::where('id', $id)->first();
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
        $data = Hotel::where('id', $id)->first();
        if (empty($data)) {
            return response()->json([
                'pesan' => 'Data tidak ditemukan',
                'data' => $data
            ], 404);
        }

        $validate = Validator::make($request->all(), [
            'nama' => 'required|min:5',
            'alamat' => 'required|min:5',
            'harga' => 'required|numeric',
            'deskripsi' => 'required|min:5',
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
