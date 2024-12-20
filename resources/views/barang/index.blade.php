@extends('layouts.app')
@section('title', 'Daftar Stok Barang')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Data Barang</h4>
        </div>
        <div class="card-content">
            <div class="d-flex justify-content-end">
                <a href="{{ url('/laporan/barang') }}" class="btn btn-primary pull-right">Download PDF</a>
            </div>
            <!-- table striped -->
            <div class="table-responsive">
                <table class="table table-striped mb-0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Kode Barang</th>
                            <th>deskripsi barang</th>
                            <th>Stok</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($barang as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->nama_barang }}</td>
                                <td>{{ $item->kode_barang }}</td>
                                <td>{{ $item->deskripsi_barang }}</td>
                                <td>{{ $item->stok }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <nav aria-label="Page navigation example ">
            <ul class="pagination pagination-primary  justify-content-end mt-2">
                @if ($barang->onFirstPage())
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $barang->previousPageUrl() }}" rel="prev">Previous</a>
                    </li>
                @endif

                @foreach ($barang as $element)
                    {{-- Separator (Tiga Titik) --}}
                    @if (is_string($element))
                        <li class="page-item disabled">
                            <span class="page-link">{{ $element }}</span>
                        </li>
                    @endif

                    {{-- Nomor Halaman --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $barang->currentPage())
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
                @if ($barang->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $barang->nextPageUrl() }}" rel="next">Next</a>
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
