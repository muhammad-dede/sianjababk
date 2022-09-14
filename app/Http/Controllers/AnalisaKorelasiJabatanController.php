<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;
use App\Models\AnalisaKorelasiJabatan;
use Illuminate\Support\Facades\Validator;

class AnalisaKorelasiJabatanController extends Controller
{
    public function index(Request $request, $id_jabatan)
    {
        if ($request->ajax()) {
            $data = AnalisaKorelasiJabatan::where('id_jabatan', $id_jabatan)->get();

            return view('analisa-korelasi-jabatan.index', compact('data'));
        }
    }

    public function create($id_jabatan)
    {
        $jabatan = Jabatan::findOrFail($id_jabatan);
        return view('analisa-korelasi-jabatan.create', compact('jabatan'));
    }

    public function store(Request $request, $id_jabatan)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'nama_korelasi_jabatan' => 'required|string|max:255',
                'unit_kerja_korelasi_jabatan' => 'required|string|max:255',
                'dalam_hal' => 'required|string|max:255',
            ]);

            if ($validator->fails()) {
                return response()->json(['failed' => $validator->errors()->toArray(), 'message' => 'Gagal disimpan!']);
            }

            AnalisaKorelasiJabatan::create([
                'id_jabatan' => $id_jabatan,
                'nama_korelasi_jabatan' => $request->nama_korelasi_jabatan,
                'unit_kerja_korelasi_jabatan' => $request->unit_kerja_korelasi_jabatan,
                'dalam_hal' => $request->dalam_hal,
            ]);

            return response()->json(['success' => 'korelasi-jabatan', 'message' => 'Berhasil disimpan!']);
        }
    }

    public function edit($id_korelasi_jabatan)
    {
        $korelasi_jabatan = AnalisaKorelasiJabatan::findOrFail($id_korelasi_jabatan);
        return view('analisa-korelasi-jabatan.edit', compact('korelasi_jabatan'));
    }

    public function update(Request $request, $id_korelasi_jabatan)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'nama_korelasi_jabatan' => 'required|string|max:255',
                'unit_kerja_korelasi_jabatan' => 'required|string|max:255',
                'dalam_hal' => 'required|string|max:255',
            ]);

            if ($validator->fails()) {
                return response()->json(['failed' => $validator->errors()->toArray(), 'message' => 'Gagal disimpan!']);
            }

            $korelasi_jabatan = AnalisaKorelasiJabatan::findOrFail($id_korelasi_jabatan);

            $korelasi_jabatan->update([
                'id_jabatan' => $korelasi_jabatan->id_jabatan,
                'nama_korelasi_jabatan' => $request->nama_korelasi_jabatan,
                'unit_kerja_korelasi_jabatan' => $request->unit_kerja_korelasi_jabatan,
                'dalam_hal' => $request->dalam_hal,
            ]);

            return response()->json(['success' => 'korelasi-jabatan', 'message' => 'Berhasil disimpan!']);
        }
    }

    public function destroy(Request $request, $id_korelasi_jabatan)
    {
        if ($request->ajax()) {
            $korelasi_jabatan = AnalisaKorelasiJabatan::findOrFail($id_korelasi_jabatan);
            $korelasi_jabatan->delete();

            return response()->json(['success' => 'korelasi-jabatan', 'message' => 'Berhasil dihapus!']);
        }
    }
}
