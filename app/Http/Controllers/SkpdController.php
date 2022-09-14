<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\Skpd;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SkpdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Skpd::with(['unitKerja'])->orderBy('nama', 'asc')->get();
            return Datatables::of($data)
                ->filter(function ($query) use ($request) {
                    if (!empty($request->get('search'))) {
                        $query->collection = $query->collection->filter(function ($row) use ($request) {
                            if (Str::contains(Str::lower($row['nama']), Str::lower($request->get('search')))) {
                                return true;
                            }
                            if (Str::contains(Str::lower($row['unit_kerja']), Str::lower($request->get('search')))) {
                                return true;
                            }
                            return false;
                        });
                    }
                })
                ->addIndexColumn()
                ->addColumn('unit_kerja', function ($data) {
                    return $data->unitKerja->nama;
                })
                ->addColumn('edit', function ($data) {
                    return '<a href="' . route('skpd.edit', $data->id) . '" class="text-success btn-modal-show">Edit</a>';
                })
                ->addColumn('destroy', function ($data) {
                    return '<a href="' . route('skpd.destroy', $data->id) . '" class="text-danger btn-destroy">Hapus</a>';
                })
                ->rawColumns(['unit_kerja', 'edit', 'destroy'])
                ->make(true);
        }

        return view('skpd.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('skpd.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'nama' => 'required|string|max:255',
                'id_unit_kerja' => 'required|string',
            ]);

            if ($validator->fails()) {
                return response()->json(['failed' => $validator->errors()->toArray()]);
            }

            Skpd::create([
                'nama' => strtoupper($request->nama),
                'id_unit_kerja' => $request->id_unit_kerja,
            ]);

            return response()->json(['success' => 'Berhasil disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return abort('404');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $skpd = Skpd::findOrFail($id);
        return view('skpd.edit', compact('skpd'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'nama' => 'required|string|max:255',
                'id_unit_kerja' => 'required|string',
            ]);

            if ($validator->fails()) {
                return response()->json(['failed' => $validator->errors()->toArray()]);
            }

            $skpd = Skpd::findOrFail($id);

            $skpd->update([
                'nama' => strtoupper($request->nama),
                'id_unit_kerja' => $request->id_unit_kerja,
            ]);

            return response()->json(['success' => 'Berhasil disimpan!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            $skpd = Skpd::findOrFail($id);

            $skpd->delete();

            return response()->json(['success' => 'Berhasil dihapus!']);
        }
    }
}
