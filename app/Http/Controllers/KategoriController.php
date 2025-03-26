<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data ['kategori']= Kategori::all();
        return view('admin.kategori',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data yang diterima
        $validatedData = $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        // Simpan data ke database
        Kategori::create([
            'nama_kategori' => $validatedData['nama_kategori'],
            'keterangan' => $validatedData['keterangan'] ?? null,
        ]);

        // Redirect ke halaman daftar kategori dengan pesan sukses
        alert()->success('SuccessAlert','berhasil ngap.');
        return redirect()->back();
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        // query update
        $kategori = Kategori::findOrFail($id);
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->keterangan = $request->keterangan;
        $kategori->save();
        alert()->success('SuccessAlert','berhasil ngap.');
        return redirect()->back();
        // dd($kategori);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // query delete
        $kategori = Kategori::findOrFail($id);
        $kategori = Kategori::where('id', $id);
        $kategori->delete();
        toast('Berhasil Di Hapus.','info');
        return redirect()->back();
        // dd($kategori);
    }
}
