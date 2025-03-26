<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $data['barang'] = Barang::all();
      $data['kategori'] = Kategori::all();
      $data['KodeBarang'] = $this->KodeOtomatis();
      return view('admin.barang', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    public function KodeOtomatis()
    {
        $query = Barang::selectRaw('MAX(RIGHT(kode_barang,3)) AS MAX_number');
        $kode = "001";
        if ($query->count() > 0) {
            $data = $query->first();
            $number = ((int) $data->MAX_number) + 1;
            $kode = sprintf("%03s", $number);
        }
        return 'BRG' . $kode;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Simpan file gambar
        // $barang = Barang::create($request->all());
        $barang = Barang::create([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'kategori_id' => $request->kategori_id,
            'gambar' => $request->gambar,
            'harga' => $request->harga,
            'stok' => $request->stok,
        ]);
        if ($request->file()) {
            $file = $request->file('gambar');
            $extension = $file->getClientOriginalExtension() ;
            $filename = $request->nama_barang . '_' . time() . '.' . $extension;
            $filepath = $file->storeAs('gambar_barang',$filename,'public');
            $barang->gambar = $filepath;
            $barang->save();
        }
        // Redirect ke halaman daftar barang dengan pesan sukses
        alert()->success('SuccessAlert','berhasil ngap.');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang $barang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barang $barang,$id)
    {
        $Barang = Barang::findOrfail($id);
        $Barang-> kode_barang=$request->kode ?? $Barang->kode_barang;
        $Barang->nama_barang=$request->nama ?? $Barang->nama_barang;
        $Barang->kategori_id=$request->kategori ?? $Barang->kategori_id;
        $Barang->gambar=$request->gambar ?? $Barang->gambar;
        $Barang->stok=$request->stok ?? $Barang->stok;
        $Barang->harga=$request->harga ?? $Barang->harga;
        $Barang->save();

      if ($request->file()) {
          $file = $request->file('gambar');
          $extension = $file->getClientOriginalExtension() ;
          $filename = $request->nama_barang . '_' . time() . '.' . $extension;
          $filepath = $file->storeAs('gambar_barang',$filename,'public');
          $Barang->gambar = $filepath;
          $Barang->save();
    }

        alert()->success('SuccessAlert', 'berhasil ngap.');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang,$id  )
    {
        $Barang = Barang::findOrfail($id);
        $Barang->delete();
        alert()->success('SuccessAlert', 'berhasil ngap.');
        return redirect()->back();
    }
}
