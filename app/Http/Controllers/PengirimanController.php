<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Pengirim;

class PengirimController extends Controller
{
    // Menampilkan semua pengirim
    public function index()
    {
        $pengirims = Pengirim::all();
        return response()->json([
            'status' => 200,
            'message' => 'Pengirims retrieved successfully',
            'data' => $pengirims
        ], 200);
    }

    // Menyimpan pengirim baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_pengirim' => 'required|string|max:255',
            'alamat_pengirim' => 'required|string',
            'telepon_pengirim' => 'required|string|max:20'
        ]);

        $pengirim = Pengirim::create($request->all());

        return response()->json([
            'status' => 201,
            'message' => 'Pengirim created successfully.',
            'data' => $pengirim
        ], 201);
    }

    // Menampilkan detail pengirim berdasarkan ID
    public function show($id)
    {
        $pengirim = Pengirim::find($id);
        if (!$pengirim) {
            return response()->json([
                'status' => 404,
                'message' => 'Pengirim not found',
                'data' => null
            ], 404);
        }
        return response()->json([
            'status' => 200,
            'message' => 'Pengirim retrieved successfully',
            'data' => $pengirim
        ], 200);
    }

    // Mengupdate data pengirim
    public function update(Request $request, $id)
    {
        $pengirim = Pengirim::find($id);
        if (!$pengirim) {
            return response()->json([
                'status' => 404,
                'message' => 'Pengirim not found.',
                'data' => null
            ], 404);
        }

        $request->validate([
            'nama_pengirim' => 'required|string|max:255',
            'alamat_pengirim' => 'required|string',
            'telepon_pengirim' => 'required|string|max:20'
        ]);

        $pengirim->update($request->all());

        return response()->json([
            'status' => 200,
            'message' => 'Pengirim updated successfully.',
            'data' => $pengirim
        ], 200);
    }

    // Menghapus pengirim
    public function destroy($id)
    {
        $pengirim = Pengirim::find($id);
        if (!$pengirim) {
            return response()->json([
                'status' => 404,
                'message' => 'Pengirim not found.',
                'data' => null
            ], 404);
        }
        $pengirim->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Pengirim deleted successfully.',
            'data' => null
        ], 200);
    }
}