@extends('admin.layouts.app')

@section('title', 'User')

@push('css')
    <style>
        table.dataTable thead th {
            border-bottom: none;
        }
    </style>
@endpush

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        {{ __('User') }}
                    </h2>
                    {{-- <div class="text-muted mt-1" id="table-info">1-18 of 413 people</div> --}}
                </div>
                <!-- Page title actions -->
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="d-flex">
                        <input type="search" id="search" class="form-control d-inline-block w-9 me-3"
                            placeholder="{{ __('Cari…') }}" name="search" />
                        <a href="#" class="btn btn-primary">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" />
                            </svg>
                            {{ __('Tambah User') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col-12">
                    <div class="card">
                        <div class="table-responsive pb-1">
                            <table class="table table-vcenter" id="datatables" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="w-1">No</th>
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th class="w-1"></th>
                                        <th class="w-1"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{--  --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {

            $("#search").on("keyup", function() {
                table.draw();
            });

            var table = $('#datatables').DataTable({
                processing: true,
                serverSide: true,
                searching: false,
                lengthChange: false,
                info: false,
                pagingType: "simple",
                ajax: {
                    url: "{{ route('admin.user.index') }}",
                    data: function(d) {
                        d.search = $('#search').val()
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'name',
                        name: 'name',
                    },
                    {
                        data: 'username',
                        name: 'username',
                    },
                    {
                        data: 'email',
                        name: 'email',
                    },
                    {
                        data: 'role',
                        name: 'role'
                    },
                    {
                        data: 'edit',
                        name: 'edit',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'delete',
                        name: 'delete',
                        orderable: false,
                        searchable: false
                    },
                ]
            });

            $("#table-info").html(table.rows().count());
        });
    </script>
@endpush
