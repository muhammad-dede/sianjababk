<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;
use App\Models\AnalisaLingkunganKerja;
use Illuminate\Support\Facades\Validator;

class AnalisaLingkunganKerjaController extends Controller
{
    public function index(Request $request, $id_jabatan)
    {
        if ($request->ajax()) {
            $data = AnalisaLingkunganKerja::where('id_jabatan', $id_jabatan)->get();

            return view('analisa-lingkungan-kerja.index', compact('data'));
        }
    }

    public function create($id_jabatan)
    {
        $jabatan = Jabatan::findOrFail($id_jabatan);
        return view('analisa-lingkungan-kerja.create', compact('jabatan'));
    }

    public function store(Request $request, $id_jabatan)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'aspek' => 'required|string|max:255',
                'faktor' => 'required|string|max:255',
            ]);

            if ($validator->fails()) {
                return response()->json(['failed' => $validator->errors()->toArray(), 'message' => 'Gagal disimpan!']);
            }

            AnalisaLingkunganKerja::create([
                'id_jabatan' => $id_jabatan,
                'aspek' => $request->aspek,
                'faktor' => $request->faktor,
            ]);

            return response()->json(['success' => 'lingkungan-kerja', 'message' => 'Berhasil disimpan!']);
        }
    }

    public function edit($id_lingkungan_kerja)
    {
        $lingkungan_kerja = AnalisaLingkunganKerja::findOrFail($id_lingkungan_kerja);
        return view('analisa-lingkungan-kerja.edit', compact('lingkungan_kerja'));
    }

    public function update(Request $request, $id_lingkungan_kerja)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'aspek' => 'required|string|max:255',
                'faktor' => 'required|string|max:255',
            ]);

            if ($validator->fails()) {
                return response()->json(['failed' => $validator->errors()->toArray(), 'message' => 'Gagal disimpan!']);
            }

            $lingkungan_kerja = AnalisaLingkunganKerja::findOrFail($id_lingkungan_kerja);

            $lingkungan_kerja->update([
                'id_jabatan' => $lingkungan_kerja->id_jabatan,
                'aspek' => $request->aspek,
                'faktor' => $request->faktor,
            ]);

            return response()->json(['success' => 'lingkungan-kerja', 'message' => 'Berhasil disimpan!']);
        }
    }

    public function destroy(Request $request, $id_lingkungan_kerja)
    {
        if ($request->ajax()) {
            $lingkungan_kerja = AnalisaLingkunganKerja::findOrFail($id_lingkungan_kerja);
            $lingkungan_kerja->delete();

            return response()->json(['success' => 'lingkungan-kerja', 'message' => 'Berhasil dihapus!']);
        }
    }
}
