<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\UnitKerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UnitKerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = UnitKerja::orderBy('nama', 'asc');
            return Datatables::of($data)
                ->filter(function ($query) use ($request) {
                    if (!empty($request->get('search'))) {
                        if (request()->has('search')) {
                            $query->where('nama', 'like', "%" . request('search') . "%");
                        }
                    }
                })
                ->addIndexColumn()
                ->addColumn('edit', function ($data) {
                    return '<a href="' . route('unit-kerja.edit', $data->id) . '" class="text-success btn-modal-show">Edit</a>';
                })
                ->addColumn('destroy', function ($data) {
                    return '<a href="' . route('unit-kerja.destroy', $data->id) . '" class="text-danger btn-destroy">Hapus</a>';
                })
                ->rawColumns(['edit', 'destroy'])
                ->make(true);
        }

        return view('unit-kerja.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('unit-kerja.create');
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
            ]);

            if ($validator->fails()) {
                return response()->json(['failed' => $validator->errors()->toArray()]);
            }

            UnitKerja::create([
                'nama' => strtoupper($request->nama),
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
        $unit_kerja = UnitKerja::findOrFail($id);
        return view('unit-kerja.edit', compact('unit_kerja'));
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
            ]);

            if ($validator->fails()) {
                return response()->json(['failed' => $validator->errors()->toArray()]);
            }

            $unit_kerja = UnitKerja::findOrFail($id);

            $unit_kerja->update([
                'nama' => strtoupper($request->nama),
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
            $unit_kerja = UnitKerja::findOrFail($id);

            $unit_kerja->delete();

            return response()->json(['success' => 'Berhasil dihapus!']);
        }
    }
}
