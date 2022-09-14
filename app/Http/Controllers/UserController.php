<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::with(['roles'])->orderBy('name', 'asc');
            return Datatables::of($data)
                ->filter(function ($query) use ($request) {
                    if (!empty($request->get('search'))) {
                        if (request()->has('search')) {
                            $query->where('name', 'like', "%" . request('search') . "%")->orWhere('username', 'like', "%" . request('search') . "%")->orWhere('email', 'like', "%" . request('search') . "%");
                        }
                    }
                })
                ->addIndexColumn()
                ->addColumn('role', function ($data) {
                    return $data->roles->pluck('name')[0];
                })
                ->addColumn('edit', function ($data) {
                    return '<a href="' . route('user.edit', $data->id) . '" class="text-success btn-modal-show">Edit</a>';
                })
                ->addColumn('destroy', function ($data) {
                    return '<a href="' . route('user.destroy', $data->id) . '" class="text-danger btn-destroy">Hapus</a>';
                })
                ->rawColumns(['role', 'edit', 'destroy'])
                ->make(true);
        }

        return view('user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
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
                'name' => 'required|string|max:255',
                'username' => 'required|string|max:255|unique:users,username|alpha_dash',
                'email' => 'required|email|max:255|unique:users,email',
                'password' => 'required|between:8,20|string',
                'role' => 'required|string|max:36',
            ]);

            if ($validator->fails()) {
                return response()->json(['failed' => $validator->errors()->toArray()]);
            }

            $user = User::create([
                'name' => ucfirst($request->name),
                'username' => strtolower($request->username),
                'email' => strtolower($request->email),
                'password' => bcrypt($request->password),
            ]);

            $user->assignRole($request->role);

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
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
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
                'name' => 'required|string|max:255',
                'username' => 'required|string|max:255|alpha_dash|unique:users,username,' . $id . ',id',
                'email' => 'required|email|max:255|unique:users,email,' . $id . ',id',
                'password' => 'nullable|between:8,20|string',
                'role' => 'required|string|max:36',
            ]);

            if ($validator->fails()) {
                return response()->json(['failed' => $validator->errors()->toArray()]);
            }

            $user = User::findOrFail($id);

            $user->update([
                'name' => $request->name,
                'username' => strtolower($request->username),
                'email' => strtolower($request->email),
                'password' => $request->password ? bcrypt($request->password) : $user->password,
            ]);

            $user->syncRoles($request->role);

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
            $user = User::findOrFail($id);
            $user->delete();
            $user->roles()->detach();
            $user->permissions()->detach();

            return response()->json(['success' => 'Berhasil dihapus']);
        }
    }
}
