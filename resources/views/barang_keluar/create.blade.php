@extends('layouts.app')
@section('title', 'Pencatatan Barang Keluar')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Masukan Data Barang Keluar</h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <form action="{{ route('barang_keluar.store') }}" method="POST">
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
                                <select class="form-control" name="kode_barang" id="kode_barang">
                                    <option value="">-- Pilih Barang --</option>
                                    @foreach ($barang as $item)
                                        <option value="{{ $item->kode_barang }}">{{ $item->nama_barang }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="no_barang_keluar">Nomor Barang Keluar:</label>
                                <input type="text" name="no_barang_keluar" id="no_barang_keluar" class="form-control"
                                    placeholder="Isi Nomor barang keluar....">
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
                                <label for="city-column">Destination (Tujuan barang) </label>
                                <input type="text" name="destination" id="destination" class="form-control"
                                    placeholder="Isi destinasi barang ....">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="Tanggal Keluar">Tanggal Keluar</label>
                                <input type="date" name="tanggal_keluar" id="tanggal_keluar" class="form-control">
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
@endsection
