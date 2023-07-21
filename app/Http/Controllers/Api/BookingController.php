<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Http\Resources\BookingResource;
use App\Models\Booking;

class BookingController extends Controller
{
    public function index(){
        $data = Booking::all();
        // $data_awal = Booking::with('pengunjung', 'kamar')->get();
        // $data = BookingResource::collection($data_awal);
        return response()->json($data, 200);
    }

    public function show($id){
        $data = Booking::where('id', $id)->with('pengunjung','kamar')->first();
        // $data_awal = Booking::with('kamar')->get();
        // $data = BookingResource::collection($data_awal);
        return response()->json($data, 200);
        
    }

    public function store(Request $request){
        $validate = Validator::make($request->all(), [
            'kamar_id' => 'required|integer',
            'pengunjung_id' => 'required|integer',
            'mulai' => 'required|date',
            'selesai' => 'required|date',
        ]);

        if ($validate->fails()) {
            return $validate->errors();
        }

        $data = Booking::create($request->all());
        return response()->json([
            'pesan' => 'Data berhasil disimpan',
            'data' => $data
        ], 201);
    }

    public function destroy($id){
        $data = Booking::where('id', $id)->first();
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
        $data = Booking::where('id', $id)->first();
        if (empty($data)) {
            return response()->json([
                'pesan' => 'Data tidak ditemukan',
                'data' => $data
            ], 404);
        }

        $validate = Validator::make($request->all(), [
            'kamar_id' => 'required|integer',
            'pengunjung_id' => 'required|integer',
            'mulai' => 'required|date',
            'selesai' => 'required|date',
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
