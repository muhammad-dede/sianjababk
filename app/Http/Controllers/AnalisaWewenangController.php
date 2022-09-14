<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;
use App\Models\AnalisaWewenang;
use Illuminate\Support\Facades\Validator;

class AnalisaWewenangController extends Controller
{
    public function index(Request $request, $id_jabatan)
    {
        if ($request->ajax()) {
            $data = AnalisaWewenang::where('id_jabatan', $id_jabatan)->get();

            return view('analisa-wewenang.index', compact('data'));
        }
    }

    public function create($id_jabatan)
    {
        $jabatan = Jabatan::findOrFail($id_jabatan);
        return view('analisa-wewenang.create', compact('jabatan'));
    }

    public function store(Request $request, $id_jabatan)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'uraian_wewenang' => 'required|string|max:255',
            ]);

            if ($validator->fails()) {
                return response()->json(['failed' => $validator->errors()->toArray(), 'message' => 'Gagal disimpan!']);
            }

            AnalisaWewenang::create([
                'id_jabatan' => $id_jabatan,
                'uraian_wewenang' => $request->uraian_wewenang,
            ]);

            return response()->json(['success' => 'wewenang', 'message' => 'Berhasil disimpan!']);
        }
    }

    public function edit($id_wewenang)
    {
        $wewenang = AnalisaWewenang::findOrFail($id_wewenang);
        return view('analisa-wewenang.edit', compact('wewenang'));
    }

    public function update(Request $request, $id_wewenang)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'uraian_wewenang' => 'required|string|max:255',
            ]);

            if ($validator->fails()) {
                return response()->json(['failed' => $validator->errors()->toArray(), 'message' => 'Gagal disimpan!']);
            }

            $wewenang = AnalisaWewenang::findOrFail($id_wewenang);

            $wewenang->update([
                'id_jabatan' => $wewenang->id_jabatan,
                'uraian_wewenang' => $request->uraian_wewenang,
            ]);

            return response()->json(['success' => 'wewenang', 'message' => 'Berhasil disimpan!']);
        }
    }

    public function destroy(Request $request, $id_wewenang)
    {
        if ($request->ajax()) {
            $wewenang = AnalisaWewenang::findOrFail($id_wewenang);
            $wewenang->delete();

            return response()->json(['success' => 'wewenang', 'message' => 'Berhasil dihapus!']);
        }
    }
}
