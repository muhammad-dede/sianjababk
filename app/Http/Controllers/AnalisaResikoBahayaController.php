<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;
use App\Models\AnalisaResikoBahaya;
use Illuminate\Support\Facades\Validator;

class AnalisaResikoBahayaController extends Controller
{
    public function index(Request $request, $id_jabatan)
    {
        if ($request->ajax()) {
            $data = AnalisaResikoBahaya::where('id_jabatan', $id_jabatan)->get();

            return view('analisa-resiko-bahaya.index', compact('data'));
        }
    }

    public function create($id_jabatan)
    {
        $jabatan = Jabatan::findOrFail($id_jabatan);
        return view('analisa-resiko-bahaya.create', compact('jabatan'));
    }

    public function store(Request $request, $id_jabatan)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'nama_resiko' => 'required|string|max:255',
                'penyebab' => 'required|string|max:255',
            ]);

            if ($validator->fails()) {
                return response()->json(['failed' => $validator->errors()->toArray(), 'message' => 'Gagal disimpan!']);
            }

            AnalisaResikoBahaya::create([
                'id_jabatan' => $id_jabatan,
                'nama_resiko' => $request->nama_resiko,
                'penyebab' => $request->penyebab,
            ]);

            return response()->json(['success' => 'resiko-bahaya', 'message' => 'Berhasil disimpan!']);
        }
    }

    public function edit($id_resiko_bahaya)
    {
        $resiko_bahaya = AnalisaResikoBahaya::findOrFail($id_resiko_bahaya);
        return view('analisa-resiko-bahaya.edit', compact('resiko_bahaya'));
    }

    public function update(Request $request, $id_resiko_bahaya)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'nama_resiko' => 'required|string|max:255',
                'penyebab' => 'required|string|max:255',
            ]);

            if ($validator->fails()) {
                return response()->json(['failed' => $validator->errors()->toArray(), 'message' => 'Gagal disimpan!']);
            }

            $resiko_bahaya = AnalisaResikoBahaya::findOrFail($id_resiko_bahaya);

            $resiko_bahaya->update([
                'id_jabatan' => $resiko_bahaya->id_jabatan,
                'nama_resiko' => $request->nama_resiko,
                'penyebab' => $request->penyebab,
            ]);

            return response()->json(['success' => 'resiko-bahaya', 'message' => 'Berhasil disimpan!']);
        }
    }

    public function destroy(Request $request, $id_resiko_bahaya)
    {
        if ($request->ajax()) {
            $resiko_bahaya = AnalisaResikoBahaya::findOrFail($id_resiko_bahaya);
            $resiko_bahaya->delete();

            return response()->json(['success' => 'resiko-bahaya', 'message' => 'Berhasil dihapus!']);
        }
    }
}
