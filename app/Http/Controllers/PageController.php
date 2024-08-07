<?php

namespace App\Http\Controllers;
use App\Models\Produk;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $data = DB::table('produk')->orderBy('updated_at', 'asc')->get();
        return view('cservice', ['data' => $data]);
    }
    public function produksiPage(){
        $data = DB::table('produk')->get();
        return view('produksi', ['data' => $data]);
    }
    public function qualityControl(){
        $data = DB::table('produk')->get();
        return view('qcontrol', ['data' => $data]);
    }
    public function packaging(){
        $data = DB::table('produk')->get();
        return view('packaging', ['data' => $data]);
    }
    public function pengiriman(){
        $data = DB::table('produk')->get();
        return view('pengiriman', ['data' => $data]);
    }
    public function keterangan(){
        $data = DB::table('produk')->join('ketproduksi', 'produk.id', '=', 'ketproduksi.id_produk')->get();
        return view('keterangan', ['data' => $data]);
    }
    public function login(){
        return view('login');
    }

    public function masuk(Request $request)
    {
        $validator = Validator::make($request->all(),[
            '*.required' => 'Kolom :attribute wajib diisi.',
        ]);
    
        if ($validator->fails()) {
            return redirect()
                ->route('/')
                ->withErrors($validator)
                ->withInput();
        }
        $credentials = $request->only('email', 'password');
        // dd($credentials);
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            // Jika autentikasi berhasil
            if ($user->isCustomerService()) {
                return redirect()->intended('/cs');
            } elseif ($user->isProduksi()) {
                return redirect()->intended('/produksi');
            }
            elseif ($user->isQualityControl()) {
                return redirect()->intended('/qc');
            }
            elseif ($user->isPackage()) {
                return redirect()->intended('/package');
            }
            elseif ($user->isPengiriman()) {
                return redirect()->intended('/pengiriman');
            }
        } else {
            // Jika autentikasi gagal
            // dd($credentials);
            return back()->withErrors(['email' => 'Email atau password salah.']);
        }
    }
}
