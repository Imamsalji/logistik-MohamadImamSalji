@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="col-12 col-lg-9">
        <div class="row">
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                <div class="stats-icon purple mb-2">
                                    <i class="iconly-boldBookmark"></i>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Jumlah Stok Barang</h6>
                                <h6 class="font-extrabold mb-0">{{ $seluruhBarang['stok'] }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                <div class="stats-icon blue mb-2">
                                    <i class="iconly-boldArrow---Left"></i>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Jumlah Barang Masuk</h6>
                                <h6 class="font-extrabold mb-0">{{ $seluruhBarang['total_barang_masuk'] }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                <div class="stats-icon green mb-2">
                                    <i class="iconly-boldArrow---Right"></i>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Jumlah Barang Keluar</h6>
                                <h6 class="font-extrabold mb-0">{{ $seluruhBarang['total_barang_keluar'] }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                <div class="stats-icon red mb-2">
                                    <i class="iconly-boldCategory"></i>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <h6 class="text-muted font-semibold">Total Barang</h6>
                                <h6 class="font-extrabold mb-0">{{ $seluruhBarang['total_barang'] }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Pemasukan Perbulan</h4>
                    </div>
                    <div class="card-body">
                        <div id="chart-profile-visit"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-3">
        <div class="card">
            <div class="card-body py-4 px-4">
                <div class="d-flex align-items-center">
                    <div class="ms-3 name">
                        <h5 class="font-bold">Mohamad Imam Salji</h5>
                        <h6 class="text-muted mb-0">@imamsalji</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4>Barang Masuk & Keluar</h4>
            </div>
            <div class="card-body">
                <div id="chart-visitors-profile"></div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/extensions/apexcharts/apexcharts.min.js') }}"></script>
    <script>
        const totalQuantityPerYear = @json($totalQuantityPerYear);
        const barangData = @json($barangData);

        const Vtahun = [];
        const Vtotal = [];
        // Loop through the data
        totalQuantityPerYear.forEach((item, index) => {
            Vtahun.push(item.tahun);
            Vtotal.push(item.total_quantity);
        });


        const Vstok = [];
        const Vbarang = [];
        // Loop through the data
        barangData.forEach((item, index) => {
            Vstok.push(item.stok);
            Vbarang.push(item.nama_barang);
        });

        var optionsProfileVisit = {
            annotations: {
                position: "back",
            },
            dataLabels: {
                enabled: false,
            },
            chart: {
                type: "bar",
                height: 300,
            },
            fill: {
                opacity: 1,
            },
            plotOptions: {},
            series: [{
                name: "sales",
                // data: [9, 20, 30, 20, 10, 20, 30, 20, 10, 20],
                data: Vtotal,
            }, ],
            colors: "#435ebe",
            xaxis: {
                categories: Vtahun
                // categories: [
                //     "Jan",
                //     "Feb",
                //     "Mar",
                //     "Apr",
                //     "May",
                //     "Jun",
                //     "Jul",
                //     "Aug",
                //     "Sep",
                //     "Oct",
                // ],
            },
        }

        let optionsVisitorsProfile = {
            series: Vstok,
            labels: Vbarang,
            colors: ["#435ebe", "#55c6e8"],
            chart: {
                type: "donut",
                width: "100%",
                height: "350px",
            },
            legend: {
                position: "bottom",
            },
            plotOptions: {
                pie: {
                    donut: {
                        size: "30%",
                    },
                },
            },
        }
        var chartVisitorsProfile = new ApexCharts(
            document.getElementById("chart-visitors-profile"),
            optionsVisitorsProfile
        )
        var chartProfileVisit = new ApexCharts(
            document.querySelector("#chart-profile-visit"),
            optionsProfileVisit
        )
        chartProfileVisit.render()
        chartVisitorsProfile.render()
    </script>

@endsection
