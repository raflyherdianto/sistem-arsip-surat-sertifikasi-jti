@extends('dashboard.layouts.main')

@section('container')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Lihat Arsip Surat</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Lihat Arsip Surat</li>
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
                        <div class="ms-3 name">
                            <h6 class="font-bold">Nomor : {{ $surat->nomor_surat }}</h6>
                            <h6 class="font-bold">Kategori : {{ $surat->kategori_surat->name }}</h6>
                            <h6 class="font-bold">Judul : {{ $surat->judul }}</h6>
                            <h6 class="font-bold">Waktu Unggah : {{ $surat->created_at }}</h6>
                        </div>
                    </div>
                </div>
                <div class="viewer mb-10">
                    <embed type="application/pdf" src="\storage\{{ $surat->file }}" width="900" height="400"></embed>
                </div>
                <br>
                <div class="col-sm-12 d-flex justify-content-lg-start">
                    <a href="/dashboard/arsip" type="back"
                        class="btn btn-primary me-1 mb-1">Kembali</a>
                    <a href="/storage/{{ $surat->file }}" download type="download" class="btn btn-success me-1 mb-1">Unduh</a>
                    <a href="/dashboard/arsip/{{ $surat->id }}/edit" type="edit" class="btn btn-warning me-1 mb-1">Edit</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
