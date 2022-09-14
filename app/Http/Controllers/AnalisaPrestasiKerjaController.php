<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;
use App\Models\AnalisaPrestasiKerja;
use Illuminate\Support\Facades\Validator;

class AnalisaPrestasiKerjaController extends Controller
{
    public function index(Request $request, $id_jabatan)
    {
        if ($request->ajax()) {
            $data = AnalisaPrestasiKerja::where('id_jabatan', $id_jabatan)->get();

            return view('analisa-prestasi-kerja.index', compact('data'));
        }
    }

    public function create($id_jabatan)
    {
        $jabatan = Jabatan::findOrFail($id_jabatan);
        return view('analisa-prestasi-kerja.create', compact('jabatan'));
    }

    public function store(Request $request, $id_jabatan)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'hasil_prestasi_kerja' => 'required|string|max:255',
                'jumlah_hasil_prestasi_kerja' => 'required|numeric',
                'jam_prestasi_kerja' => 'required|numeric',
            ]);

            if ($validator->fails()) {
                return response()->json(['failed' => $validator->errors()->toArray(), 'message' => 'Gagal disimpan!']);
            }

            AnalisaPrestasiKerja::create([
                'id_jabatan' => $id_jabatan,
                'hasil_prestasi_kerja' => $request->hasil_prestasi_kerja,
                'jumlah_hasil_prestasi_kerja' => $request->jumlah_hasil_prestasi_kerja,
                'jam_prestasi_kerja' => $request->jam_prestasi_kerja,
            ]);

            return response()->json(['success' => 'prestasi-kerja', 'message' => 'Berhasil disimpan!']);
        }
    }

    public function edit($id_prestasi_kerja)
    {
        $prestasi_kerja = AnalisaPrestasiKerja::findOrFail($id_prestasi_kerja);
        return view('analisa-prestasi-kerja.edit', compact('prestasi_kerja'));
    }

    public function update(Request $request, $id_prestasi_kerja)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'hasil_prestasi_kerja' => 'required|string|max:255',
                'jumlah_hasil_prestasi_kerja' => 'required|numeric',
                'jam_prestasi_kerja' => 'required|numeric',
            ]);

            if ($validator->fails()) {
                return response()->json(['failed' => $validator->errors()->toArray(), 'message' => 'Gagal disimpan!']);
            }

            $prestasi_kerja = AnalisaPrestasiKerja::findOrFail($id_prestasi_kerja);

            $prestasi_kerja->update([
                'id_jabatan' => $prestasi_kerja->id_jabatan,
                'hasil_prestasi_kerja' => $request->hasil_prestasi_kerja,
                'jumlah_hasil_prestasi_kerja' => $request->jumlah_hasil_prestasi_kerja,
                'jam_prestasi_kerja' => $request->jam_prestasi_kerja,
            ]);

            return response()->json(['success' => 'prestasi-kerja', 'message' => 'Berhasil disimpan!']);
        }
    }

    public function destroy(Request $request, $id_prestasi_kerja)
    {
        if ($request->ajax()) {
            $prestasi_kerja = AnalisaPrestasiKerja::findOrFail($id_prestasi_kerja);
            $prestasi_kerja->delete();

            return response()->json(['success' => 'prestasi-kerja', 'message' => 'Berhasil dihapus!']);
        }
    }
}
