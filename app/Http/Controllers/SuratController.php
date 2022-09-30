<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use Illuminate\Http\Request;
use App\Models\KategoriSurat;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreSuratRequest;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\UpdateSuratRequest;

class SuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.arsip.index', [
            'surats' => Surat::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.arsip.create', [
            'kategoris'=>KategoriSurat::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSuratRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nomor_surat' => 'required|max:255',
            'judul' => 'required|max:255',
            'kategori_surat_id' => 'required|max:255',
            'file' => 'required|mimes:pdf|max:2048',
        ]);

        if ($request->file('file')){
            $validatedData['file'] = $request->file('file')->store('uploads');
        }

        Surat::create($validatedData);
        Alert::success('Data berhasil ditambahkan!');
        return redirect('/dashboard/arsip');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Surat  $surat
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Surat  $surat
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Surat::findOrFail($id);
        return view('dashboard.arsip.edit', [
            'surat'=> $data,
            'kategoris'=>KategoriSurat::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSuratRequest  $request
     * @param  \App\Models\Surat  $surat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'nomor_surat' => 'required|max:255',
            'judul' => 'required|max:255',
            'kategori_surat_id' => 'required|max:255',
            'file' => 'required|mimes:pdf|max:2048',
        ];

        $validateData = $request->validate($rules);

        if ($request->file('file')){
            if ($request->oldFile) {
                Storage::delete($request->oldFile);
            }
            $validateData['file'] = $request->file('file')->store('uploads');
        }

        Surat::findOrFail($id)->update($validateData);
        Alert::success('Data berhasil diubah!');
        return redirect('/dashboard/arsip');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Surat  $surat
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $surat=Surat::findOrFail($id);
        if ($surat->file) {
            Storage::delete($surat->file);
        }
        Surat::destroy($surat->id);
        Alert::success('Data berhasil dihapus!');
        return redirect('/dashboard/arsip');
    }

    public function showDetail(Surat $surat){
        return view('dashboard.arsip.details', [
            'surat' => Surat::where('id', $surat->id)->first(),
        ]);
    }
}
