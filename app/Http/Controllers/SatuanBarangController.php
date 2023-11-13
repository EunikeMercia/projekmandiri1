<?php

namespace App\Http\Controllers;

use App\Models\SatuanBarang;
use Illuminate\Http\Request;

class SatuanBarangController extends Controller
{
    public function index(Request $request){
        $satuan = SatuanBarang::all();
        return view('admin.mastersatuan', compact('satuan'));
    }
    public function create(Request $request){
        return view('admin.tambahsatuan');
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'nm_satuan' => 'required|max:255|regex:/^[a-zA-Z ]*$/',
        ]);
        
        $satuan = SatuanBarang::create($validatedData);

        if($satuan){
            //redirect dengan pesan sukses
            return redirect(route('satuan.index'))->with(['success' => 'Data Berhasil Ditambahkan!']);
        }else{
            //redirect dengan pesan error
            return redirect(route('satuan.index'))->with(['error' => 'Data Gagal Ditambahkan!']);
        }
    }

    public function edit($id)
    {
        $satuan = SatuanBarang::where('id', $id)->first();
        // dd($satuan);

        return view('admin.editsatuan', ['satuan' => $satuan]);
    }

    
    
    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'nm_satuan' => 'required|max:255|regex:/^[a-zA-Z ]*$/',
        ]);
        // dd($validatedData);
    
        $satuan = SatuanBarang::findOrFail($id);    
        $satuan->update($validatedData);
    
        if($satuan){
            //redirect dengan pesan sukses
            return redirect(route('satuan.index'))->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect(route('satuan.index'))->with(['error' => 'Data Gagal Diupdate!']);
        }
        
    }
    
    public function delete($id){
        $satuan = SatuanBarang::findOrFail($id);
        $satuan->delete();
    
        if($satuan){
            //redirect dengan pesan sukses
            return redirect(route('satuan.index'))->with(['success' => 'Data Berhasil Dihapus!']);
        }else{
            //redirect dengan pesan error
            return redirect(route('satuan.index'))->with(['error' => 'Data Gagal Dihapus!']);
        }
    }

}
