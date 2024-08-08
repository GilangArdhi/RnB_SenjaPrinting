<?php

namespace App\Http\Controllers;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $pengguna = Auth::user();
        $data = DB::table('produk')->orderBy('updated_at', 'asc')->get();
        $user = User::where('role','=','customer service')->first();
        $notifications = $user ? $user->notifications : collect();
        return view('cservice', ['data' => $data], ['pengguna' => $pengguna], compact('notifications'));
    }
    public function produksiPage(){
        $pengguna = Auth::user();
        $data = DB::table('produk')->get();
        $user = User::where('role','=','produksi')->first();
        $notifications = $user ? $user->notifications : collect();
        return view('produksi', ['data' => $data],['pengguna' => $pengguna], compact('notifications'));
    }
    public function qualityControl(){
        $pengguna = Auth::user();
        $data = DB::table('produk')->get();
        $user = User::where('role','=','quality control')->first();
        $notifications = $user ? $user->notifications : collect();
        return view('qcontrol', ['data' => $data],['pengguna' => $pengguna], compact('notifications'));
    }
    public function packaging(){
        $pengguna = Auth::user();
        $data = DB::table('produk')->get();
        $user = User::where('role','=','package')->first();
        $notifications = $user ? $user->notifications : collect();
        return view('packaging', ['data' => $data],['pengguna' => $pengguna], compact('notifications'));
    }
    public function pengiriman(){
        $pengguna = Auth::user();
        $data = DB::table('produk')->get();
        $user = User::where('role','=','pengiriman')->first();
        $notifications = $user ? $user->notifications : collect();
        return view('pengiriman', ['data' => $data],['pengguna' => $pengguna], compact('notifications'));
    }
    public function keterangan(){
        $pengguna = Auth::user();
        $data = DB::table('produk')->join('ketproduksi', 'produk.id', '=', 'ketproduksi.id_produk')->get();
        return view('keterangan', ['data' => $data],['pengguna' => $pengguna], compact('notifications'));
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
