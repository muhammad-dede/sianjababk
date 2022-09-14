<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;
use App\Models\AnalisaPerangkatKerja;
use Illuminate\Support\Facades\Validator;

class AnalisaPerangkatKerjaController extends Controller
{
    public function index(Request $request, $id_jabatan)
    {
        if ($request->ajax()) {
            $data = AnalisaPerangkatKerja::where('id_jabatan', $id_jabatan)->get();

            return view('analisa-perangkat-kerja.index', compact('data'));
        }
    }

    public function create($id_jabatan)
    {
        $jabatan = Jabatan::findOrFail($id_jabatan);
        return view('analisa-perangkat-kerja.create', compact('jabatan'));
    }

    public function store(Request $request, $id_jabatan)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'perangkat_kerja' => 'required|string|max:255',
                'penggunaan_perangkat_kerja' => 'required|string|max:255',
            ]);

            if ($validator->fails()) {
                return response()->json(['failed' => $validator->errors()->toArray(), 'message' => 'Gagal disimpan!']);
            }

            AnalisaPerangkatKerja::create([
                'id_jabatan' => $id_jabatan,
                'perangkat_kerja' => $request->perangkat_kerja,
                'penggunaan_perangkat_kerja' => $request->penggunaan_perangkat_kerja,
            ]);

            return response()->json(['success' => 'perangkat-kerja', 'message' => 'Berhasil disimpan!']);
        }
    }

    public function edit($id_perangkat_kerja)
    {
        $perangkat_kerja = AnalisaPerangkatKerja::findOrFail($id_perangkat_kerja);
        return view('analisa-perangkat-kerja.edit', compact('perangkat_kerja'));
    }

    public function update(Request $request, $id_perangkat_kerja)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'perangkat_kerja' => 'required|string|max:255',
                'penggunaan_perangkat_kerja' => 'required|string|max:255',
            ]);

            if ($validator->fails()) {
                return response()->json(['failed' => $validator->errors()->toArray(), 'message' => 'Gagal disimpan!']);
            }

            $perangkat_kerja = AnalisaPerangkatKerja::findOrFail($id_perangkat_kerja);

            $perangkat_kerja->update([
                'id_jabatan' => $perangkat_kerja->id_jabatan,
                'perangkat_kerja' => $request->perangkat_kerja,
                'penggunaan_perangkat_kerja' => $request->penggunaan_perangkat_kerja,
            ]);

            return response()->json(['success' => 'perangkat-kerja', 'message' => 'Berhasil disimpan!']);
        }
    }

    public function destroy(Request $request, $id_perangkat_kerja)
    {
        if ($request->ajax()) {
            $perangkat_kerja = AnalisaPerangkatKerja::findOrFail($id_perangkat_kerja);
            $perangkat_kerja->delete();

            return response()->json(['success' => 'perangkat-kerja', 'message' => 'Berhasil dihapus!']);
        }
    }
}
