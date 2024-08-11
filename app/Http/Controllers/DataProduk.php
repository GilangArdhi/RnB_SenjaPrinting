<?php

namespace App\Http\Controllers;
use App\Models\Produk;
use App\Models\User;
use App\Models\ketProduksi;
use App\Notifications\ProductStatusNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class DataProduk extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DB::table('produk')->orderBy('updated_at', 'asc')->get();
        return view('cservice', ['data' => $data]);
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
        $idProduk = $request -> id;
        $namaPemesan = $request -> namaPemesan;
        $namaProduk = $request -> namaProduk;
        $asalPemesan = $request -> asalPemesan;
        $jmlPesanan = $request -> jmlPesanan;
        $bahan = $request -> bahan;
        $ukuran = $request -> ukuran;
        $warna = $request -> warna;
        $jeniSablon = $request -> jeniSablon;
        $status = $request->status;

        if ($request->hasFile('gambar1')) {
            $gambarUtama = $request -> file('gambar1');
            $filenameGambarUtama = date('Y-m-d').$gambarUtama->getClientOriginalName();
            $path = 'assets/images/'.$filenameGambarUtama;
            Storage::disk('public')->put($path, file_get_contents($gambarUtama));
        }

        
            $insert = Produk::create([
                'namaPemesan' => $namaPemesan,
                'namaProduk' => $namaProduk,
                'asalPemesan' => $asalPemesan,
                'jmlPesanan' => $jmlPesanan,
                'bahan' => $bahan,
                'ukuran' => $ukuran,
                'warna' => $warna,
                'desain'=> $filenameGambarUtama,
                'jeniSablon' => $jeniSablon,
            ]);
            
            if ($insert) {
                $produk = Produk::find($idProduk);
                if ($status == 'Selesai') {
                    $adminUsers = User::where('role', 'quality control')->get();
                    foreach ($adminUsers as $admin) {
                        $admin->notify(new ProductStatusNotification($produk));
                    }
                }
                return back()->with('sukses', 'Data berhasil ditambahkan');
            } else {
                return back()->with('error', 'Data gagal ditambahkan');
            }
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
    public function edit(Request $request)
    {
        $idProduk = $request->idProduk;
        $produk = Produk::find($idProduk);
        $status = $request->status;
        // dd($idProduk);
        if ($produk) {
            $produk->status = $status;
            $produk->save();
            if ($status == 'Selesai'){
                $adminUsers = User::where('role', 'quality control')->get();
                foreach ($adminUsers as $admin) {
                    $admin->notify(new ProductStatusNotification($produk));
                }
            }
            if ($status == 'Terpenuhi'){
                $adminUsers = User::where('role', 'package')->get();
                foreach ($adminUsers as $admin) {
                    $admin->notify(new ProductStatusNotification($produk));
                }
            }
            if ($status == 'Menunggu Kurir'){
                $adminUsers = User::where('role', 'pengiriman')->get();
                foreach ($adminUsers as $admin) {
                    $admin->notify(new ProductStatusNotification($produk));
                }
            }
            if ($status == 'Diterima Pelanggan'){
                $adminUsers = User::where('role', 'customer service')->get();
                foreach ($adminUsers as $admin) {
                    $admin->notify(new ProductStatusNotification($produk));
                }
            }
        } else {
            return redirect()->back()->withErrors('Produk tidak ditemukan');
        }

        return redirect()->back()->with('success', 'Status produk berhasil diperbarui');
    }

    public function fixed(Request $request){
        $idProduk = $request->id_produk;
        $produk = Produk::find($idProduk);
        $keterangan = DB::table('ketproduksi')->where('id_produk', $idProduk);
        $status = $request->status;
        // dd($keterangan);
        if($keterangan){
            $produk->status = $status;
            $produk->save();
            if ($status == 'Fixed'){
                $adminUsers = User::where('role', 'quality control')->get();
                foreach ($adminUsers as $admin) {
                    $admin->notify(new ProductStatusNotification($produk));
                }
            }
            $keterangan->delete();
        } else {
            return redirect()->back()->withErrors('Produk tidak ditemukan');
        }

        return redirect()->back()->with('success', 'Status produk berhasil diperbarui');
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
        //
    }

    public function tolak(Request $request){
        $idProduk = $request->idProduk;
        $ket = $request->keterangan;
        $produk = Produk::find($idProduk);
        $status = $request->status;
        // dd($idProduk);
        if ($produk) {
            $produk->status = $status;
            $produk->save();

            $insert = ketProduksi::create([
                'id_produk' => $idProduk,
                'keterangan' => $ket
            ]);

        } else {
            return redirect()->back()->withErrors('Produk tidak ditemukan');
        }

        return redirect()->back()->with('success', 'Status produk berhasil diperbarui');
    }
}
