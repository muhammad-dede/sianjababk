@extends('layouts.app')

@section('title', __('Role'))

@section('content')
    <div class="container-xl">
        <div class="page-header d-print-none">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        {{ __('Role') }}
                    </h2>
                </div>
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="d-flex">
                        <a href="{{ route('role.create') }}" class="btn btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" />
                            </svg>
                            {{ __('Tambah') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong class="text-success">{{ Session::get('success') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <div id="table-default" class="table-responsive">
                        <table class="table table-vcenter" id="datatables" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="w-1">No</th>
                                    <th>Name</th>
                                    <th class="w-1"></th>
                                    <th class="w-1"></th>
                                </tr>
                            </thead>
                            <tbody class="table-body">
                                @foreach ($data as $row)
                                    <tr>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>
                                            {{ $row->name }}
                                        </td>
                                        <td>
                                            <a href="{{ route('role.edit', $row->id) }}"
                                                class="text-primary">{{ __('Edit') }}</a>
                                        </td>
                                        <td>
                                            <a href="{{ route('role.destroy', $row->id) }}"
                                                class="text-danger btn-delete">{{ __('Hapus') }}</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal modal-blur fade" id="modal-delete" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="#" method="POST" id="form-delete">
                    @csrf
                    @method('delete')
                    <div class="modal-body">
                        <div class="modal-title">{{ __('Anda yakin ingin menghapus') }}?</div>
                        <div>{{ __('Data tidak dapat dikembalikan') }}.</div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link link-secondary me-auto"
                            data-bs-dismiss="modal">{{ __('Batal') }}</button>
                        <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">{{ __('Hapus') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('#datatables').DataTable();

            $(".btn-delete").on("click", function(event) {
                event.preventDefault();
                var url = $(this).attr("href");
                $("#modal-delete").modal("show");
                $("#form-delete").attr("action", url);
            });
        })
    </script>
@endpush
