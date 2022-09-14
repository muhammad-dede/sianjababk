<?php

namespace App\Http\Controllers;

use App\Models\AnalisaTanggungJawab;
use App\Models\Jabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AnalisaTanggungJawabController extends Controller
{
    public function index(Request $request, $id_jabatan)
    {
        if ($request->ajax()) {
            $data = AnalisaTanggungJawab::where('id_jabatan', $id_jabatan)->get();

            return view('analisa-tanggung-jawab.index', compact('data'));
        }
    }

    public function create($id_jabatan)
    {
        $jabatan = Jabatan::findOrFail($id_jabatan);
        return view('analisa-tanggung-jawab.create', compact('jabatan'));
    }

    public function store(Request $request, $id_jabatan)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'uraian_tanggung_jawab' => 'required|string|max:255',
            ]);

            if ($validator->fails()) {
                return response()->json(['failed' => $validator->errors()->toArray(), 'message' => 'Gagal disimpan!']);
            }

            AnalisaTanggungJawab::create([
                'id_jabatan' => $id_jabatan,
                'uraian_tanggung_jawab' => $request->uraian_tanggung_jawab,
            ]);

            return response()->json(['success' => 'tanggung-jawab', 'message' => 'Berhasil disimpan!']);
        }
    }

    public function edit($id_tanggung_jawab)
    {
        $tanggung_jawab = AnalisaTanggungJawab::findOrFail($id_tanggung_jawab);
        return view('analisa-tanggung-jawab.edit', compact('tanggung_jawab'));
    }

    public function update(Request $request, $id_tanggung_jawab)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'uraian_tanggung_jawab' => 'required|string|max:255',
            ]);

            if ($validator->fails()) {
                return response()->json(['failed' => $validator->errors()->toArray(), 'message' => 'Gagal disimpan!']);
            }

            $tanggung_jawab = AnalisaTanggungJawab::findOrFail($id_tanggung_jawab);

            $tanggung_jawab->update([
                'id_jabatan' => $tanggung_jawab->id_jabatan,
                'uraian_tanggung_jawab' => $request->uraian_tanggung_jawab,
            ]);

            return response()->json(['success' => 'tanggung-jawab', 'message' => 'Berhasil disimpan!']);
        }
    }

    public function destroy(Request $request, $id_tanggung_jawab)
    {
        if ($request->ajax()) {
            $tanggung_jawab = AnalisaTanggungJawab::findOrFail($id_tanggung_jawab);
            $tanggung_jawab->delete();

            return response()->json(['success' => 'tanggung-jawab', 'message' => 'Berhasil dihapus!']);
        }
    }
}
