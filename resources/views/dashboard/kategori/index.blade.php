@extends('dashboard.layouts.main')

@section('container')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Kategori Surat</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Kategori Surat</li>
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
                            <th>Kode Kategori</th>
                            <th>Nama Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kategoris as $kategori)
                        <tr>
                            <td>{{ $kategori->kode_kategori }}</td>
                            <td>{{ $kategori->name }}</td>
                            <td>
                                <a href="/dashboard/kategori-arsip/{{ $kategori->id }}/edit" class="btn btn-sm btn-warning">Edit</a>
                                <span>
                                    <form action="/dashboard/kategori-arsip/{{ $kategori->id }}" method="POST">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button type="submit" class="btn btn-danger btn-sm show-alert-delete-box" data-toggle="tooltip" title='Delete'>Hapus</button>
                                    </form>
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <a href="/dashboard/kategori-arsip/create" class="btn btn-success">Tambah Data</a>
</div>

@endsection
