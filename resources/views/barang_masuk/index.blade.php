@extends('layouts.app')
@section('title', 'Daftar Barang Masuk')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Data Barang Masuk</h4>
        </div>
        <div class="card-content">
            <div class="d-flex justify-content-end">
                <a href="{{ url('/laporan/barang-masuk') }}" class="btn btn-primary pull-right">Download PDF</a>
            </div>
            <!-- table striped -->
            <div class="table-responsive">
                <table class="table table-striped mb-0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No. Barang Masuk</th>
                            <th>Nama Barang Masuk</th>
                            <th>Kode Barang</th>
                            <th>Quantity</th>
                            <th>Asal Barang</th>
                            <th>Tanggal Masuk</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($barangMasuk as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->no_barang_masuk }}</td>
                                <td class="text-bold-500">{{ $item->barang->nama_barang }}</td>
                                <td>{{ $item->barang->kode_barang }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->origin }}</td>
                                <td>{{ $item->tanggal_masuk }}</td>
                                <td>
                                    <form id="delete-form-{{ $item->id_barang_masuk }}"
                                        action="{{ route('barang_masuk.destroy', $item->id_barang_masuk) }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                        @method('POST')
                                    </form>
                                    <button onclick="confirmDelete({{ $item->id_barang_masuk }})" class="btn btn-danger">
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
                @if ($barangMasuk->onFirstPage())
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $barangMasuk->previousPageUrl() }}" rel="prev">Previous</a>
                    </li>
                @endif

                @foreach ($barangMasuk as $element)
                    {{-- Separator (Tiga Titik) --}}
                    @if (is_string($element))
                        <li class="page-item disabled">
                            <span class="page-link">{{ $element }}</span>
                        </li>
                    @endif

                    {{-- Nomor Halaman --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $barangMasuk->currentPage())
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
                @if ($barangMasuk->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $barangMasuk->nextPageUrl() }}" rel="next">Next</a>
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
