<?php

function permissions()
{
    return \Spatie\Permission\Models\Permission::orderBy('name', 'asc')->get();
}

function roles()
{
    return \Spatie\Permission\Models\Role::where('id', '!=', 1)->orderBy('name', 'asc')->get();
}

function unitKerja()
{
    return \App\Models\UnitKerja::orderBy('nama', 'asc')->get();
}

function skpd()
{
    return \App\Models\Skpd::with(['unitKerja'])->orderBy('nama', 'asc')->get();
}

function jabatan()
{
    return \App\Models\Jabatan::with(['skpd', 'parent', 'children'])->get();
}

function indukJabatan()
{
    return \App\Models\Skpd::with(['jabatan'])->get();
}
