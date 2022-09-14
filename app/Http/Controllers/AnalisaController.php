<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\Analisa;
use App\Models\Jabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PDF;

class AnalisaController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Jabatan::with('children', 'parent', 'skpd')->orderBy('id', 'asc');
            return Datatables::of($data)
                ->filter(function ($query) use ($request) {
                    if (request()->has('id_skpd')) {
                        $query->where('id_skpd', request('id_skpd'));
                    }
                    if (request()->has('search')) {
                        $query->where('nama', 'like', "%" . request('search') . "%")->where('id_skpd', request('id_skpd'));
                    }
                })
                ->addIndexColumn()
                ->addColumn('id_skpd', function ($data) {
                    return $data->id_skpd;
                })
                ->editColumn('kode', function ($data) {
                    return $data->children->count() ? '<a href="' . route('analisa.show', $data->id) . '" class="fw-bold text-dark">' . $data->kode . '</a>' : '<a href="' . route('analisa.show', $data->id) . '" class="text-primary">' . $data->kode . '</a>';
                })
                ->editColumn('nama', function ($data) {
                    return $data->children->count() ? '<a href="' . route('analisa.show', $data->id) . '" class="fw-bold text-dark">' . $data->nama . '</a>' : '<a href="' . route('analisa.show', $data->id) . '" class="text-primary">' . $data->nama . '</a>';
                })
                ->addColumn('detail', function ($data) {
                    return '<a href="' . route('analisa.show', $data->id) . '" class="btn btn-sm btn-link">Detail</a>';
                })
                ->addColumn('cetak', function ($data) {
                    return '<a href="' . route('analisa.cetak', $data->id) . '" class="btn btn-sm btn-link" target="_blank">Cetak</a>';
                })
                ->rawColumns(['id_skpd', 'kode', 'nama', 'detail', 'cetak'])
                ->startsWithSearch()
                ->make(true);
        }

        return view('analisa.index');
    }

    public function show($id_jabatan)
    {
        $jabatan = Jabatan::with(['analisa'])->where('id', $id_jabatan)->first();

        if (!$jabatan) {
            return abort('404');
        }

        return view('analisa.show', compact('jabatan'));
    }

    public function save(Request $request, $id_jabatan)
    {
        if ($request->ajax()) {

            $validator = Validator::make($request->all(), [
                'jpt_utama' => 'nullable|string|max:255',
                'jpt_madya' => 'nullable|string|max:255',
                'jpt_pratama' => 'nullable|string|max:255',
                'administrator' => 'nullable|string|max:255',
                'pengawas' => 'nullable|string|max:255',
                'pelaksana' => 'nullable|string|max:255',
                'jabatan_fungsional' => 'nullable|string|max:255',
                'ikhtisar' => 'nullable|string',
                'pendidikan_formal' => 'nullable|string|max:255',
                'pendidikan_pelatihan_penjenjangan' => 'nullable|string|max:255',
                'pendidikan_pelatihan_teknis' => 'nullable|string|max:255',
                'pengalaman_kerja_struktural' => 'nullable|string|max:255',
                'pengalaman_kerja_fungsional' => 'nullable|string|max:255',
                'pengalaman_kerja_bidang_jabatan' => 'nullable|string|max:255',
                'hasil_kerja' => 'nullable|string|max:255',
                'keterampilan_kerja' => 'nullable|string|max:255',
                'bakat_kerja' => 'nullable|string|max:255',
                'temperamen_kerja' => 'nullable|string|max:255',
                'minat_kerja' => 'nullable|string|max:255',
                'upaya_fisik' => 'nullable|string|max:255',
                'jk' => 'nullable|string',
                'umur' => 'nullable|numeric',
                'tinggi_badan' => 'nullable|numeric',
                'berat_badan' => 'nullable|numeric',
                'postur_badan' => 'nullable|string',
                'penampilan' => 'nullable|string|max:255',
                'fungsi_pekerjaan' => 'nullable|string|max:255',
                'kelas_jabatan' => 'nullable|string|max:255',
            ]);

            if ($validator->fails()) {
                return response()->json(['failed' => $validator->errors()->toArray(), 'message' => 'Gagal disimpan!']);
            }

            Analisa::updateOrCreate(['id_jabatan' => $id_jabatan], [
                'id_jabatan' => $id_jabatan,
                'jpt_utama' => $request->jpt_utama,
                'jpt_madya' => $request->jpt_madya,
                'jpt_pratama' => $request->jpt_pratama,
                'administrator' => $request->administrator,
                'pengawas' => $request->pengawas,
                'pelaksana' => $request->pelaksana,
                'jabatan_fungsional' => $request->jabatan_fungsional,
                'ikhtisar' => $request->ikhtisar,
                'pendidikan_formal' => $request->pendidikan_formal,
                'pendidikan_pelatihan_penjenjangan' => $request->pendidikan_pelatihan_penjenjangan,
                'pendidikan_pelatihan_teknis' => $request->pendidikan_pelatihan_teknis,
                'pengalaman_kerja_struktural' => $request->pengalaman_kerja_struktural,
                'pengalaman_kerja_fungsional' => $request->pengalaman_kerja_fungsional,
                'pengalaman_kerja_bidang_jabatan' => $request->pengalaman_kerja_bidang_jabatan,
                'hasil_kerja' => $request->hasil_kerja,
                'keterampilan_kerja' => $request->keterampilan_kerja,
                'bakat_kerja' => $request->bakat_kerja,
                'temperamen_kerja' => $request->temperamen_kerja,
                'minat_kerja' => $request->minat_kerja,
                'upaya_fisik' => $request->upaya_fisik,
                'jk' => $request->jk,
                'umur' => $request->umur,
                'tinggi_badan' => $request->tinggi_badan,
                'berat_badan' => $request->berat_badan,
                'postur_badan' => $request->postur_badan,
                'penampilan' => $request->penampilan,
                'fungsi_pekerjaan' => $request->fungsi_pekerjaan,
                'kelas_jabatan' => $request->kelas_jabatan,
            ]);

            return response()->json(['success' => 'Sukses', 'message' => 'Berhasil disimpan!']);
        }
    }

    public function cetak($id_jabatan)
    {
        $jabatan = Jabatan::findOrFail($id_jabatan);

        $pdf = PDF::loadView('analisa.cetak', ['jabatan' => $jabatan])->setPaper('a4', 'landscape')->setWarnings(false);

        return $pdf->stream();
    }
}
