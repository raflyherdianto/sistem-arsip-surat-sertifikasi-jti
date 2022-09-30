@extends('dashboard.layouts.main')

@section('container')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Arsip Surat</h3>
                <p class="text-subtitle text-muted">Berikut ini adalah surat-surat yang telah terbit dan diarsipkan <br> Klik "Lihat" pada kolom aksi untuk menampilkan surat</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Arsip</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Nomor Surat</th>
                            <th>Kategori</th>
                            <th>Judul</th>
                            <th>Waktu Pengarsipan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($surats as $surat)
                        <tr>
                            <td>{{ $surat->nomor_surat }}</td>
                            <td>{{ $surat->kategori_surat->name }}</td>
                            <td>{{ $surat->judul }}</td>
                            <td>{{ $surat->created_at }}</td>
                            <td>
                                <a href="/storage/{{ $surat->file }}" download class="btn btn-sm btn-primary">Unduh</a>
                                <a href="/dashboard/arsip/detail/{{ $surat->id }}" class="btn btn-sm btn-secondary">Lihat</a>
                                <a href="/dashboard/arsip/{{ $surat->id }}/edit" class="btn btn-sm btn-warning">Edit</a>
                                <form action="/dashboard/arsip/{{ $surat->id }}" method="POST">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button type="submit" class="btn btn-sm btn-danger show-alert-delete-box" data-toggle="tooltip" title='Delete'>Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <a href="/dashboard/arsip/create" class="btn btn-success">Arsipkan Surat...</a>
</div>

@endsection
