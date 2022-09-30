@extends('dashboard.layouts.main')

@section('container')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>About</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">About</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <div class="avatar avatar-xl">
                            <img src="/img/faces/2031710008.jpg" alt="Face 1">
                        </div>
                        <div class="ms-3 name">
                            <h5 class="font-bold">Aplikasi ini dibuat oleh: </h5>
                            <h6 class="text-muted mb-0">Nama: Mochammad Rafly Herdianto</h6>
                            <h6 class="text-muted mb-0">NIM: 2141764008</h6>
                            <h6 class="text-muted mb-0">Tanggal: 28 Agustus 2022</h6>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
