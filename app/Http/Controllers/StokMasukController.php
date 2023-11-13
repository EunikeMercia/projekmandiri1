<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\StokKeluar;
use App\Models\StokMasuk;
use PDF;
use Illuminate\Http\Request;

class StokMasukController extends Controller
{
    public function index(Request $request){
        $stokmasuk = StokMasuk::when($request->mulai_tanggal != null, function ($q) use ($request) {
                                return $q->whereDate('tanggal', '>=', $request->mulai_tanggal);
                            })
                            ->when($request->sampai_tanggal != null, function ($q) use ($request) {
                                return $q->whereDate('tanggal', '<=', $request->sampai_tanggal);
                            })->get();
        return view('admin.masterstokmasuk', compact('stokmasuk'));
    }

    public function indexkonfirmasi(Request $request){
        $stokmasuk = StokMasuk::where('status', '=', 'Pending')
                    ->when($request->mulai_tanggal != null, function ($q) use ($request) {
                        return $q->whereDate('tanggal', '>=', $request->mulai_tanggal);
                    })
                    ->when($request->sampai_tanggal != null, function ($q) use ($request) {
                        return $q->whereDate('tanggal', '<=', $request->sampai_tanggal);
                    })->get();
        return view('admin.confirmstokmasuk', compact('stokmasuk'));
    }

    public function indexlaporan(Request $request){
        $stokmasuk = StokMasuk::where('status', '=', 'Accepted')
                    ->when($request->mulai_tanggal != null, function ($q) use ($request) {
                        return $q->whereDate('tanggal', '>=', $request->mulai_tanggal);
                    })
                    ->when($request->sampai_tanggal != null, function ($q) use ($request) {
                        return $q->whereDate('tanggal', '<=', $request->sampai_tanggal);
                    })->get();
        return view('laporan.stokmasuk', compact('stokmasuk'));
    }

    public function konfirmasi(Request $request, $id)
    {

        $stokmasuk = StokMasuk::findOrFail($id);    
        $stokmasuk->update([
            'status' => 'Accepted'
        ]);
        if ($stokmasuk) {
            # code...
            $barang = Barang::findOrFail($stokmasuk->barang_id); 

            $stokmasuk->update([
                'stok_terakhir' => $barang->stok,
            ]);

            $barang->update([
                'stok' => $barang->stok + $stokmasuk->stok_masuk,
            ]);
        }
    
        if($stokmasuk){
            //redirect dengan pesan sukses
            return redirect(route('stokmasuk.indexkonfirmasi'))->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect(route('stokmasuk.indexkonfirmasi'))->with(['error' => 'Data Gagal Diupdate!']);
        }
        
    }

    public function create(Request $request){
        $barangs = Barang::all();
        return view('admin.tambahstokmasuk', compact('barangs'));
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'barang_id' => 'required',
            'stok_masuk' => 'required|integer|min:1',
            'tanggal' => 'required',
            'keterangan' => 'nullable',
        ]);


        $stokmasuk = StokMasuk::create($validatedData);

        if($stokmasuk){
            //redirect dengan pesan sukses
            return redirect(route('stokmasuk.index'))->with(['success' => 'Data Berhasil Ditambahkan!']);
        }else{
            //redirect dengan pesan error
            return redirect(route('stokmasuk.index'))->with(['error' => 'Data Gagal Ditambahkan!']);
        }
    }

    public function edit($id)
    {
        $stokmasuk = StokMasuk::where('id', $id)->first();
        $barangs = Barang::all();
        return view('admin.editstokmasuk', compact('stokmasuk', 'barangs'));
    }

    
    
    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'barang_id' => 'required',
            'stok_masuk' => 'required|integer|min:1',
            'tanggal' => 'required',
            'keterangan' => 'nullable',
        ]);
        // dd($validatedData);
    
        $stokmasuk = StokMasuk::findOrFail($id);    
        $stokmasuk->update($validatedData);
    
        if($stokmasuk){
            //redirect dengan pesan sukses
            return redirect(route('stokmasuk.index'))->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect(route('stokmasuk.index'))->with(['error' => 'Data Gagal Diupdate!']);
        }
        
    }
    
    public function delete($id){
        $stokmasuk = StokMasuk::findOrFail($id);
        $stokmasuk->delete();
    
        if($stokmasuk){
            //redirect dengan pesan sukses
            return redirect(route('stokmasuk.index'))->with(['success' => 'Data Berhasil Dihapus!']);
        }else{
            //redirect dengan pesan error
            return redirect(route('stokmasuk.index'))->with(['error' => 'Data Gagal Dihapus!']);
        }
    }

    public function downloadpdf(Request $request){
        $stokmasuk = StokMasuk::where('status', '=', 'Accepted')
                                ->when($request->mulai_tanggal != null, function ($q) use ($request) {
                                    return $q->whereDate('tanggal', '>=', $request->mulai_tanggal);
                                })
                                ->when($request->sampai_tanggal != null, function ($q) use ($request) {
                                    return $q->whereDate('tanggal', '<=', $request->sampai_tanggal);
                                })->get();
        $pdf = PDF::loadView('laporan.pdfstokmasuk', compact('stokmasuk'));
        // $pdf = setPaper('A4', 'potrait');
        return $pdf->download('laporan_stokmasuk.pdf');
        // return $pdf->stream('laporan_stokmasuk.pdf');
    }
}
