@extends('dashboard.layouts.main')

@section('container')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Unggah Arsip Surat</h3>
                    <p class="text-subtitle text-muted">Unggah surat yang telah terbit pada form ini untuk diarsipkan.
                        <br>Catatan: <br>&nbsp; - Gunakan file berformat PDF
                    </p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Unggah Arsip</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-md-30 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal" action="/dashboard/arsip" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Nomor Surat</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="nomor_surat" class="form-control @error('nomor_surat') is-invalid @enderror" name="nomor_surat"
                                                placeholder="Nomor Surat...">
                                                @error('nomor_surat')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label>Kategori</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <select class="form-select @error('kategori_surat_id') is-invalid @enderror" id="kategori_surat_id"
                                            name="kategori_surat_id">
                                                <option selected>Pilih...</option>
                                                @foreach ($kategoris as $kategori)
                                                    <option value="{{ $kategori->id }}">{{ $kategori->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('kategori_surat_id')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label>Judul</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="judul" class="form-control @error('judul') is-invalid @enderror" name="judul"
                                                placeholder="Judul...">
                                                @error('judul')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label>File Surat (PDF)</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <div class="input-group mb-3">
                                                <label class="input-group-text" for="file">
                                                    <i class="bi bi-upload"></i></label>
                                                <input type="file" class="form-control" id="file" name="file">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 d-flex justify-content-lg-start">
                                            <a href="/dashboard/arsip" type="back"
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
