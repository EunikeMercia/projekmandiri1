<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Rak;
use App\Models\StokKeluar;
use App\Models\StokMasuk;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){;
        $stok_masuk = StokMasuk::where('status', '=', 'Accepted')->count();
        $stok_keluar = StokKeluar::where('status', '=', 'Accepted')->count();
        $rak = Rak::count();
        $barang = Barang::count();

        return view('admin.dashboard', compact('stok_masuk', 'stok_keluar', 'rak', 'barang'));
    }
}
