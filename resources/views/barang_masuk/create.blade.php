@extends('layouts.app')
@section('title', 'Pencatatan Barang Masuk')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Masukan Data Barang Masuk</h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <form action="{{ route('barang_masuk.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="first-name-column">Nama Barang:</label>
                                <select class="choices form-control" name="kode_barang" id="kode_barang">
                                    <option value="">-- Pilih Barang --</option>
                                    @foreach ($barang as $item)
                                        <option value="{{ $item->kode_barang }}">{{ $item->nama_barang }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="first-name-column">Nomor Barang Masuk:</label>
                                <input type="text" name="no_barang_masuk" id="no_barang_masuk" class="form-control"
                                    placeholder="Isi Nomor barang masuk....">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="last-name-column">Quantity</label>
                                <input class="form-control" type="number" name="quantity" id="quantity">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="city-column">Asal Barang</label>
                                <input type="text" name="origin" id="origin" class="form-control"
                                    placeholder="Asal Barang">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="Tanggal Masuk">Tanggal Masuk</label>
                                <input type="date" name="tanggal_masuk" id="tanggal_masuk" class="form-control">
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/extensions/choices.js/public/assets/scripts/choices.js') }}"></script>
    <script src="{{ asset('assets/static/js/pages/form-element-select.js') }}"></script>
@endsection
