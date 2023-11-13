<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Rak;
use App\Models\SatuanBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    public function index(Request $request){
        $barang = Barang::when($request->rak_id != null, function ($q) use ($request) {
                            return $q->where('rak_id', $request->rak_id);
                        })
                        ->when($request->kategori_id != null, function ($q) use ($request) {
                            return $q->where('kategori_id', $request->kategori_id);
                        })
                        ->when($request->status != null, function ($q) use ($request) {
                            if ($request->status == "Kurang") {
                                return $q->where('stok', '<' , 10);
                            }elseif ($request->status == "Baik") {
                                return $q->whereBetween('stok', [11, 50]);
                            }elseif ($request->status == "Sangat Baik") {
                                return $q->where('stok', '>' , 50);
                            }
                        })
                        ->with('satuan', 'rak', 'kategori')
                        ->get();
        $raks = Rak::all();
        $kategoris = Kategori::all();
        return view('admin.masterbarang', compact('barang', 'kategoris', 'raks'));
    }
    public function create(Request $request){
        $raks = Rak::all();
        $kategoris = Kategori::all();
        $satuans = SatuanBarang::all();
        return view('admin.tambahbarang', compact('raks', 'kategoris', 'satuans'));
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'nm_barang' => 'required|min:3|max:255',
            'stok' => 'nullable|integer|min:0',
            'image' => 'required|image|mimes:png,jpg,jpeg',
            'rak_id' => 'required',
            'kategori_id' => 'required',
            'satuan_barang_id' => 'required',
        ]);

        $image = $request->file('image');
        $image->storeAs('public/gambar_barang', $image->hashName());
        // dd($image);

        $validatedData['image'] = $image->hashName();
        
        $barang = Barang::create($validatedData);

        if($barang){
            //redirect dengan pesan sukses
            return redirect(route('barang.index'))->with(['success' => 'Data Berhasil Ditambahkan!']);
        }else{
            //redirect dengan pesan error
            return redirect(route('barang.index'))->with(['error' => 'Data Gagal Ditambahkan!']);
        }
    }

    public function edit($id)
    {
        $barang = Barang::where('id', $id)->first();
        $raks = Rak::all();
        $kategoris = Kategori::all();
        $satuans = SatuanBarang::all();
        // dd($barang);

        return view('admin.editbarang', compact('barang', 'raks', 'kategoris', 'satuans'));
    }

    
    
    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'nm_barang' => 'required|min:3|max:255',
            'stok' => 'nullable|integer|min:0',
            'image' => 'nullable|image|mimes:png,jpg,jpeg',
            'rak_id' => 'required',
            'kategori_id' => 'required',
            'satuan_barang_id' => 'required',
        ]);
        // dd($validatedData);
    
        $barang = Barang::findOrFail($id);    
       
        if($request->file('image') == "") {
    
            $barang->update([
                'nm_barang'     => $validatedData['nm_barang'],
                'stok'   => $validatedData['stok'],
                'rak_id'   => $validatedData['rak_id'],
                'kategori_id'   => $validatedData['kategori_id'],
                'satuan_barang_id'   => $validatedData['satuan_barang_id']
            ]);
    
        } else {
    
            //hapus old image
            Storage::disk('local')->delete('public/gambar_barang/'.$barang->image);
    
            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/gambar_barang', $image->hashName());
    
            $barang->update([
                'image'     => $image->hashName(),
                'nm_barang'     => $validatedData['nm_barang'],
                'stok'   => $validatedData['stok'],
                'rak_id'   => $validatedData['rak_id'],
                'kategori_id'   => $validatedData['kategori_id'],
                'satuan_barang_id'   => $validatedData['satuan_barang_id']
            ]);
    
        }

        if($barang){
            //redirect dengan pesan sukses
            return redirect(route('barang.index'))->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect(route('barang.index'))->with(['error' => 'Data Gagal Diupdate!']);
        }
        
    }
    
    public function delete($id){
        $barang = Barang::findOrFail($id);
        Storage::disk('local')->delete('public/gambar_barang/'.$barang->image);
        $barang->delete();
    
        if($barang){
            //redirect dengan pesan sukses
            return redirect(route('barang.index'))->with(['success' => 'Data Berhasil Dihapus!']);
        }else{
            //redirect dengan pesan error
            return redirect(route('barang.index'))->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
}
