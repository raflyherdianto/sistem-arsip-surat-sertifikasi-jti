<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriSurat;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreKategoriSuratRequest;
use App\Http\Requests\UpdateKategoriSuratRequest;

class KategoriSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.kategori.index', [
            'kategoris' => KategoriSurat::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.kategori.create', [
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKategoriSuratRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode_kategori' => 'required|max:255',
            'name' => 'required|max:255',
        ]);

        KategoriSurat::create($validatedData);
        Alert::success('Data berhasil ditambahkan!');
        return redirect('/dashboard/kategori-arsip');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KategoriSurat  $kategoriSurat
     * @return \Illuminate\Http\Response
     */
    public function show(KategoriSurat $kategoriSurat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KategoriSurat  $kategoriSurat
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd($kategoriSurat);
        $data = KategoriSurat::findOrFail($id);
        return view('dashboard.kategori.edit', [
            'kategori'=>$data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKategoriSuratRequest  $request
     * @param  \App\Models\KategoriSurat  $kategoriSurat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required|max:255',
            'kode_kategori' => 'required|max:255',
        ];

        $validateData = $request->validate($rules);

        KategoriSurat::findOrFail($id)->update($validateData);
        Alert::success('Data berhasil diubah!');
        return redirect('/dashboard/kategori-arsip');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KategoriSurat  $kategoriSurat
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        KategoriSurat::findOrFail($id)->delete();
        Alert::success('Data berhasil dihapus!');
        return redirect('/dashboard/kategori-arsip');
    }
}
