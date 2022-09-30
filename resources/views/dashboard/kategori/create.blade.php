@extends('dashboard.layouts.main')

@section('container')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Tambah Kategori Arsip Surat</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tambah Kategori Arsip</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-md-30 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal" action="/dashboard/kategori-arsip" method="POST">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Kode Kategori</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="kode_kategori"
                                                class="form-control @error('kode_kategori') is-invalid @enderror"
                                                name="kode_kategori" placeholder="Kode Kategori">
                                            @error('kode_kategori')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label>Nama Kategori</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="name"
                                                class="form-control @error('name') is-invalid @enderror" name="name"
                                                placeholder="Nama Kategori">
                                            @error('name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-12 d-flex justify-content-lg-start">
                                            <a href="/dashboard/kategori-arsip" type="back"
                                                class="btn btn-primary me-1 mb-1">Kembali</a>
                                            <button type="submit" class="btn btn-success me-1 mb-1">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
