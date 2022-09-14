@extends('layouts.app')

@section('title', __('Analisa'))

@section('content')
    <div class="container-xl">
        <div class="page-header d-print-none">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        {{ __('Analisa') }}
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-body">
                    <div class="row g-3 align-items-center mb-3 border-bottom pb-3">
                        <div class="col-auto">
                            <label for="id_skpd" class="col-form-label">{{ __('Pilih SKPD') }}</label>
                        </div>
                        <div class="col-6">
                            <select class="form-select select2" name="id_skpd" id="id_skpd"
                                data-placeholder="{{ __('Pilih Salah Satu SKPD Untuk Menampilkan Data') }}">
                                <option value=""></option>
                                @foreach (skpd() as $row)
                                    <option value="{{ $row->id }}">
                                        {{ $row->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div id="table-default" class="table-responsive">
                        <table class="table table-vcenter table-bordered" id="dataTable" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID SKPD</th>
                                    <th class="w-1">No</th>
                                    <th>Kode</th>
                                    <th class="text-center">Nama Jabatan</th>
                                    <th class="text-center"></th>
                                    <th class="text-center"></th>
                                </tr>
                            </thead>
                            <tbody class="table-body"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {

            $('.select2').select2({
                theme: 'bootstrap-5',
                width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' :
                    'style',
                placeholder: $(this).data('placeholder'),
                allowClear: true,
            });

            $('body').on('change', '#id_skpd', function() {
                table.draw();
            });

            var table = $('#dataTable').DataTable({
                responsive: true,
                paging: true,
                pageLength: 25,
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('analisa.index') }}",
                    data: function(d) {
                        d.id_skpd = $('#id_skpd').val(),
                            d.search = $('input[type="search"]').val()
                    }
                },
                columns: [{
                        data: 'id_skpd',
                        name: 'id_skpd',
                        visible: false,
                    },
                    {
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'kode',
                        name: 'kode',
                        orderable: false,
                        width: '15%',
                    },
                    {
                        data: 'nama',
                        name: 'nama',
                        width: '55%',
                        orderable: false,
                    },
                    {
                        data: 'detail',
                        name: 'detail',
                        orderable: false,
                        searchable: false,
                        className: "dt-center",
                        width: '10%',
                    },
                    {
                        data: 'cetak',
                        name: 'cetak',
                        orderable: false,
                        searchable: false,
                        className: "dt-center",
                        width: '10%',
                    },
                ],
                rowGroup: {
                    dataSrc: 'id_skpd'
                }
            });
        })
    </script>
@endpush
