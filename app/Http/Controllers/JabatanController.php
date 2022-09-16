<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\Jabatan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Jabatan::with(['skpd', 'parent', 'children'])->orderBy('kode', 'asc')->get();
            return Datatables::of($data)
                ->filter(function ($query) use ($request) {
                    if (!empty($request->get('search'))) {
                        $query->collection = $query->collection->filter(function ($row) use ($request) {
                            if (Str::contains(Str::lower($row['kode']), Str::lower($request->get('search')))) {
                                return true;
                            }
                            if (Str::contains(Str::lower($row['nama']), Str::lower($request->get('search')))) {
                                return true;
                            }
                            if (Str::contains(Str::lower($row['skpd']), Str::lower($request->get('search')))) {
                                return true;
                            }
                            return false;
                        });
                    }
                })
                ->addIndexColumn()
                ->editColumn('kode', function ($data) {
                    return $data->children->count() > 0 ? '<div class="fw-bold">' . $data->kode . '</div>' : '<div class="text-primary">' . $data->kode . '</div>';
                })
                ->editColumn('nama', function ($data) {
                    return $data->children->count() > 0 ? '<div class="fw-bold">' . $data->nama . '</div>' : '<div class="text-primary">' . $data->nama . '</div>';
                })
                ->addColumn('skpd', function ($data) {
                    return $data->skpd ? ($data->children->count() > 0 ? '<div class="fw-bold">' . $data->skpd->nama . '</div>' : '<div class="text-primary">' . $data->skpd->nama . '</div>') : '-';
                })
                ->addColumn('edit', function ($data) {
                    return '<a href="' . route('jabatan.edit', $data->id) . '" class="text-success btn-modal-show">Edit</a>';
                })
                ->addColumn('destroy', function ($data) {
                    return '<a href="' . route('jabatan.destroy', $data->id) . '" class="text-danger btn-destroy">Hapus</a>';
                })
                ->rawColumns(['kode', 'nama', 'skpd', 'edit', 'destroy'])
                ->make(true);
        }

        return view('jabatan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jabatan.create');
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
                'kode' => 'required|string|max:36|unique:jabatan,kode',
                'nama' => 'required|string|max:255',
                'id_skpd' => 'required|string',
                'induk' => 'nullable|string',
            ]);

            if ($validator->fails()) {
                return response()->json(['failed' => $validator->errors()->toArray()]);
            }

            Jabatan::create([
                'kode' => strtoupper($request->kode),
                'nama' => strtoupper($request->nama),
                'id_skpd' => $request->id_skpd,
                'induk' => $request->induk,
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
        $jabatan = Jabatan::findOrFail($id);
        return view('jabatan.edit', compact('jabatan'));
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
                'kode' => 'required|string|max:36|unique:jabatan,kode,' . $id . ',id',
                'nama' => 'required|string|max:255',
                'id_skpd' => 'required|string',
                'induk' => 'nullable|string',
            ]);

            if ($validator->fails()) {
                return response()->json(['failed' => $validator->errors()->toArray()]);
            }

            $jabatan = Jabatan::findOrFail($id);

            $jabatan->update([
                'kode' => strtoupper($request->kode),
                'nama' => strtoupper($request->nama),
                'id_skpd' => $request->id_skpd,
                'induk' => $request->induk,
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
            $jabatan = Jabatan::findOrFail($id);
            $jabatan->delete();

            return response()->json(['success' => 'Berhasil dihapus!']);
        }
    }
}
