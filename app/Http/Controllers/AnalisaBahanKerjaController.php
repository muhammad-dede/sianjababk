<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;
use App\Models\AnalisaBahanKerja;
use Illuminate\Support\Facades\Validator;

class AnalisaBahanKerjaController extends Controller
{
    public function index(Request $request, $id_jabatan)
    {
        if ($request->ajax()) {
            $data = AnalisaBahanKerja::where('id_jabatan', $id_jabatan)->get();

            return view('analisa-beban-kerja.index', compact('data'));
        }
    }

    public function create($id_jabatan)
    {
        $jabatan = Jabatan::findOrFail($id_jabatan);
        return view('analisa-beban-kerja.create', compact('jabatan'));
    }

    public function store(Request $request, $id_jabatan)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'bahan_kerja' => 'required|string|max:255',
                'penggunaan_bahan_kerja' => 'required|string|max:255',
            ]);

            if ($validator->fails()) {
                return response()->json(['failed' => $validator->errors()->toArray(), 'message' => 'Gagal disimpan!']);
            }

            AnalisaBahanKerja::create([
                'id_jabatan' => $id_jabatan,
                'bahan_kerja' => $request->bahan_kerja,
                'penggunaan_bahan_kerja' => $request->penggunaan_bahan_kerja,
            ]);

            return response()->json(['success' => 'bahan-kerja', 'message' => 'Berhasil disimpan!']);
        }
    }

    public function edit($id_bahan_kerja)
    {
        $bahan_kerja = AnalisaBahanKerja::findOrFail($id_bahan_kerja);
        return view('analisa-beban-kerja.edit', compact('bahan_kerja'));
    }

    public function update(Request $request, $id_bahan_kerja)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'bahan_kerja' => 'required|string|max:255',
                'penggunaan_bahan_kerja' => 'required|string|max:255',
            ]);

            if ($validator->fails()) {
                return response()->json(['failed' => $validator->errors()->toArray(), 'message' => 'Gagal disimpan!']);
            }

            $bahan_kerja = AnalisaBahanKerja::findOrFail($id_bahan_kerja);

            $bahan_kerja->update([
                'id_jabatan' => $bahan_kerja->id_jabatan,
                'bahan_kerja' => $request->bahan_kerja,
                'penggunaan_bahan_kerja' => $request->penggunaan_bahan_kerja,
            ]);

            return response()->json(['success' => 'bahan-kerja', 'message' => 'Berhasil disimpan!']);
        }
    }

    public function destroy(Request $request, $id_bahan_kerja)
    {
        if ($request->ajax()) {
            $bahan_kerja = AnalisaBahanKerja::findOrFail($id_bahan_kerja);
            $bahan_kerja->delete();

            return response()->json(['success' => 'bahan-kerja', 'message' => 'Berhasil dihapus!']);
        }
    }
}
