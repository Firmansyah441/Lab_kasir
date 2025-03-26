<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\DetailTrans;
use App\Models\Kategori;
use App\Models\Keranjang;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data ['barang'] = Barang::all();
        $data ['t_keranjang'] = Keranjang::all();
        $data ['total'] = $data['t_keranjang']->sum('subtotal');
        $data ['kodeTransaksi'] = $this->KodeOtomatis();
        return view('admin.transaksi',$data);

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
        //
    }

    public function add_cart($id){
        $barang = Barang::findOrFail($id);
        $keranjang = Keranjang::where('kode_barang',$barang->kode_barang)->first();
        if($keranjang){
           $keranjang->qty += 1;
           $keranjang->subtotal = $keranjang->qty * $keranjang->harga;
        }else{
           $keranjang = new Keranjang();
           $keranjang->kode_barang = $barang->kode_barang;
           $keranjang->nama_barang = $barang->nama_barang;
           $keranjang->harga = $barang->harga;
           $keranjang->qty = 1;
           $keranjang->subtotal = $keranjang->qty * $keranjang->harga;
        }
        $keranjang->save();
        return redirect('/transaksi');
    }

    public function updateqty(Request $request, $id){
       $request ->validate([
           'qty' => 'required|numeric|min:1'
       ]);
       $keranjang = Keranjang::findOrFail($id);
       $keranjang->qty = $request->input('qty');
       $keranjang->subtotal = $keranjang->qty * $keranjang->harga;
       $keranjang->save();
       return redirect('/transaksi');
    }
    public function KodeOtomatis(){
        $query = Transaksi::selectRaw('MAX(RIGHT(kode_transaksi, 3)) as max_number');
        $kode = "001";
        if ($query->count() > 0) {
            $data = $query->first();
            $number = ((int) $data->max_number)+1;
            $kode = sprintf("%03s", $number);
        }
        return 'TRS'. $kode;
    }

    public function simpanTransaksi()
    {
        $kode_transaksi = $this->KodeOtomatis();
        $tanggal_transaksi = Carbon::now()->format('y-m-d');
        $keranjang = Keranjang::all();
        $total = $keranjang->sum('subtotal');

        $transaksi = new Transaksi();
        $transaksi->kode_transaksi = $kode_transaksi;
        $transaksi->tanggal_transaksi = $tanggal_transaksi;
        $transaksi->total = $total;
        $transaksi->save();

        foreach ($keranjang as $cart) {
            $detail_transaksi = new DetailTrans();
            $detail_transaksi->transaksi_id = $kode_transaksi;
            $detail_transaksi->barang_id = $cart->kode_barang;
            $detail_transaksi->qty = $cart->qty;
            $detail_transaksi->harga = $cart->harga;
            $detail_transaksi->subtotal = $cart->subtotal;
            $detail_transaksi->save();
            }
            Keranjang::truncate();
            toast('Berhasil Transaksi','success');
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $keranjang = Keranjang::findOrFail($id);

        $keranjang->delete();
        toast('Berhasil Tambah Keranjang','success');
        return redirect('/transaksi');
    }
}
