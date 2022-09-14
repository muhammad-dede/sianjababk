<?php

namespace App\Http\Controllers;

use App\Models\AnalisaTugasPokok;
use App\Models\Jabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AnalisaTugasPokokController extends Controller
{
    public function index(Request $request, $id_jabatan)
    {
        if ($request->ajax()) {
            $data = AnalisaTugasPokok::where('id_jabatan', $id_jabatan)->get();

            return view('analisa-tugas-pokok.index', compact('data'));
        }
    }

    public function create($id_jabatan)
    {
        $jabatan = Jabatan::findOrFail($id_jabatan);
        return view('analisa-tugas-pokok.create', compact('jabatan'));
    }

    public function store(Request $request, $id_jabatan)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'uraian_tugas_pokok' => 'required|string|max:255',
                'hasil_kerja_tugas_pokok' => 'required|string|max:255',
                'jumlah_hasil' => 'required|numeric',
                'waktu_penyelesaian' => 'required|numeric',
                'waktu_efektif' => 'required|numeric',
            ]);

            if ($validator->fails()) {
                return response()->json(['failed' => $validator->errors()->toArray(), 'message' => 'Gagal disimpan!']);
            }

            AnalisaTugasPokok::create([
                'id_jabatan' => $id_jabatan,
                'uraian_tugas_pokok' => $request->uraian_tugas_pokok,
                'hasil_kerja_tugas_pokok' => $request->hasil_kerja_tugas_pokok,
                'jumlah_hasil' => $request->jumlah_hasil,
                'waktu_penyelesaian' => $request->waktu_penyelesaian,
                'waktu_efektif' => $request->waktu_efektif,
                'kebutuhan_pegawai' => ($request->jumlah_hasil * $request->waktu_penyelesaian) / $request->waktu_efektif,
            ]);

            return response()->json(['success' => 'tugas-pokok', 'message' => 'Berhasil disimpan!']);
        }
    }

    public function edit($id_tugas_pokok)
    {
        $tugas_pokok = AnalisaTugasPokok::findOrFail($id_tugas_pokok);
        return view('analisa-tugas-pokok.edit', compact('tugas_pokok'));
    }

    public function update(Request $request, $id_tugas_pokok)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'uraian_tugas_pokok' => 'required|string|max:255',
                'hasil_kerja_tugas_pokok' => 'required|string|max:255',
                'jumlah_hasil' => 'required|numeric',
                'waktu_penyelesaian' => 'required|numeric',
                'waktu_efektif' => 'required|numeric',
            ]);

            if ($validator->fails()) {
                return response()->json(['failed' => $validator->errors()->toArray(), 'message' => 'Gagal disimpan!']);
            }

            $tugas_pokok = AnalisaTugasPokok::findOrFail($id_tugas_pokok);

            $tugas_pokok->update([
                'id_jabatan' => $tugas_pokok->id_jabatan,
                'uraian_tugas_pokok' => $request->uraian_tugas_pokok,
                'hasil_kerja_tugas_pokok' => $request->hasil_kerja_tugas_pokok,
                'jumlah_hasil' => $request->jumlah_hasil,
                'waktu_penyelesaian' => $request->waktu_penyelesaian,
                'waktu_efektif' => $request->waktu_efektif,
                'kebutuhan_pegawai' => ($request->jumlah_hasil * $request->waktu_penyelesaian) / $request->waktu_efektif,
            ]);

            return response()->json(['success' => 'tugas-pokok', 'message' => 'Berhasil disimpan!']);
        }
    }

    public function destroy(Request $request, $id_tugas_pokok)
    {
        if ($request->ajax()) {
            $tugas_pokok = AnalisaTugasPokok::findOrFail($id_tugas_pokok);
            $tugas_pokok->delete();

            return response()->json(['success' => 'tugas-pokok', 'message' => 'Berhasil dihapus!']);
        }
    }
}
