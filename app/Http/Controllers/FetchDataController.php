<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;

class FetchDataController extends Controller
{
    public function fetchIndukJabatan(Request $request)
    {
        if ($request->ajax()) {
            $data = Jabatan::where('id_skpd', $request->id_skpd)->orderBy('id', 'asc')->get();

            return response()->json($data);
        }
    }
}
