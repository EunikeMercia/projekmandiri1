<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\StokKeluar;
use Illuminate\Http\Request;
use PDF;

class StokKeluarController extends Controller
{
    public function index(Request $request){
        $stokkeluar = StokKeluar::when($request->mulai_tanggal != null, function ($q) use ($request) {
                                    return $q->whereDate('tanggal', '>=', $request->mulai_tanggal);
                                })
                                ->when($request->sampai_tanggal != null, function ($q) use ($request) {
                                    return $q->whereDate('tanggal', '<=', $request->sampai_tanggal);
                                })->get();
        return view('admin.masterstokkeluar', compact('stokkeluar'));
    }

    public function indexkonfirmasi(Request $request){
        $stokkeluar = StokKeluar::where('status', '=', 'Pending')
                                ->when($request->mulai_tanggal != null, function ($q) use ($request) {
                                    return $q->whereDate('tanggal', '>=', $request->mulai_tanggal);
                                })
                                ->when($request->sampai_tanggal != null, function ($q) use ($request) {
                                    return $q->whereDate('tanggal', '<=', $request->sampai_tanggal);
                                })->get();
        return view('admin.confirmstokkeluar', compact('stokkeluar'));
    }
    public function indexlaporan(Request $request){
        $stokkeluar = StokKeluar::where('status', '=', 'Accepted')
                                ->when($request->mulai_tanggal != null, function ($q) use ($request) {
                                    return $q->whereDate('tanggal', '>=', $request->mulai_tanggal);
                                })
                                ->when($request->sampai_tanggal != null, function ($q) use ($request) {
                                    return $q->whereDate('tanggal', '<=', $request->sampai_tanggal);
                                })->get();
        return view('laporan.stokkeluar', compact('stokkeluar'));
    }

    public function konfirmasi(Request $request, $id)
    {

        $stokkeluar = StokKeluar::findOrFail($id);    
        $stokkeluar->update([
            'status' => 'Accepted'
        ]);
        if ($stokkeluar) {
            # code...
            $barang = Barang::findOrFail($stokkeluar->barang_id); 

            $stokkeluar->update([
                'stok_terakhir' => $barang->stok,
            ]);

            $barang->update([
                'stok' => $barang->stok - $stokkeluar->stok_keluar,
            ]);
        }
        

    
        if($barang){
            //redirect dengan pesan sukses
            return redirect(route('stokkeluar.indexkonfirmasi'))->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect(route('stokkeluar.indexkonfirmasi'))->with(['error' => 'Data Gagal Diupdate!']);
        }
        
    }

    public function create(Request $request){
        $barangs = Barang::all();
        return view('admin.tambahstokkeluar', compact('barangs'));
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'barang_id' => 'required',
            'stok_keluar' => 'required|integer|min:1',
            'tanggal' => 'required',
            'keterangan' => 'nullable',
        ]);


        $stokkeluar = StokKeluar::create($validatedData);

        if($stokkeluar){
            //redirect dengan pesan sukses
            return redirect(route('stokkeluar.index'))->with(['success' => 'Data Berhasil Ditambahkan!']);
        }else{
            //redirect dengan pesan error
            return redirect(route('stokkeluar.index'))->with(['error' => 'Data Gagal Ditambahkan!']);
        }
    }

    public function edit($id)
    {
        $stokkeluar = StokKeluar::where('id', $id)->first();
        $barangs = Barang::all();
        return view('admin.editstokkeluar', compact('stokkeluar', 'barangs'));
    }

    
    
    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'barang_id' => 'required',
            'stok_keluar' => 'required|integer|min:1',
            'tanggal' => 'required',
            'keterangan' => 'nullable',
        ]);
        // dd($validatedData);
    
        $stokkeluar = StokKeluar::findOrFail($id);    
        $stokkeluar->update($validatedData);
    
        if($stokkeluar){
            //redirect dengan pesan sukses
            return redirect(route('stokkeluar.index'))->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect(route('stokkeluar.index'))->with(['error' => 'Data Gagal Diupdate!']);
        }
        
    }
    
    public function delete($id){
        $stokkeluar = StokKeluar::findOrFail($id);
        $stokkeluar->delete();
    
        if($stokkeluar){
            //redirect dengan pesan sukses
            return redirect(route('stokkeluar.index'))->with(['success' => 'Data Berhasil Dihapus!']);
        }else{
            //redirect dengan pesan error
            return redirect(route('stokkeluar.index'))->with(['error' => 'Data Gagal Dihapus!']);
        }
    }

    public function downloadpdf(Request $request){
        $stokkeluar = StokKeluar::where('status', '=', 'Accepted')
                                ->when($request->mulai_tanggal != null, function ($q) use ($request) {
                                    return $q->whereDate('tanggal', '>=', $request->mulai_tanggal);
                                })
                                ->when($request->sampai_tanggal != null, function ($q) use ($request) {
                                    return $q->whereDate('tanggal', '<=', $request->sampai_tanggal);
                                })->get();
        $pdf = PDF::loadView('laporan.pdfstokkeluar', compact('stokkeluar'));
        // $pdf = setPaper('A4', 'potrait');
        return $pdf->download('laporan_stokkeluar.pdf');
    }
}
