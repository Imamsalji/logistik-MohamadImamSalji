@extends('layouts.app')
@section('title', 'Daftar Barang Keluar')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Data Barang Keluar</h4>
        </div>
        <div class="card-content">
            <div class="d-flex justify-content-end">
                <a href="{{ url('/laporan/barang-keluar') }}" class="btn btn-primary pull-right">Download PDF</a>
            </div>
            <!-- table striped -->
            <div class="table-responsive">
                <table class="table table-striped mb-0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No. Barang Keluar</th>
                            <th>Nama Barang Keluar</th>
                            <th>Kode Barang</th>
                            <th>Quantity</th>
                            <th>Destination (Tujuan barang)</th>
                            <th>Tanggal Keluar</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($barangKeluar as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->no_barang_keluar }}</td>
                                <td class="text-bold-500">{{ $item->barang->nama_barang }}</td>
                                <td>{{ $item->barang->kode_barang }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->destination }}</td>
                                <td>{{ $item->tanggal_keluar }}</td>
                                <td>
                                    <form id="delete-form-{{ $item->id_barang_keluar }}"
                                        action="{{ route('barang_keluar.destroy', $item->id_barang_keluar) }}"
                                        method="POST" style="display: none;">
                                        @csrf
                                        @method('POST')
                                    </form>
                                    <button onclick="confirmDelete({{ $item->id_barang_keluar }})" class="btn btn-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <nav aria-label="Page navigation example ">
            <ul class="pagination pagination-primary  justify-content-end mt-2">
                @if ($barangKeluar->onFirstPage())
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $barangKeluar->previousPageUrl() }}" rel="prev">Previous</a>
                    </li>
                @endif

                @foreach ($barangKeluar as $element)
                    {{-- Separator (Tiga Titik) --}}
                    @if (is_string($element))
                        <li class="page-item disabled">
                            <span class="page-link">{{ $element }}</span>
                        </li>
                    @endif

                    {{-- Nomor Halaman --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $barangKeluar->currentPage())
                                <li class="page-item active">
                                    <span class="page-link">{{ $page }}</span>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endif
                        @endforeach
                    @endif
                @endforeach
                @if ($barangKeluar->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $barangKeluar->nextPageUrl() }}" rel="next">Next</a>
                    </li>
                @else
                    <li class="page-item disabled">
                        <span class="page-link">Next</span>
                    </li>
                @endif
            </ul>
        </nav>
    </div>

    {{-- sweetalert --}}
    <script src="{{ asset('assets/extensions/sweetalert2/sweetalert2.min.js') }}"></script>
    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }
    </script>
    @if (session('success'))
        <script>
            const Swal2 = Swal.mixin({
                customClass: {
                    input: 'form-control'
                }
            })
            Swal2.fire({
                icon: "success",
                title: "Success",
                text: "{{ session('success') }}"
            })
        </script>
    @endif
@endsection
