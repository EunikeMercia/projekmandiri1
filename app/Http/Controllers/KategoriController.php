<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index(Request $request){
        $kategori = Kategori::all();
        return view('admin.masterkategori', compact('kategori'));
    }
    public function create(Request $request){
        return view('admin.tambahkategori');
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'nm_kategori' => 'required|min:3|max:255|regex:/^[a-zA-Z ]*$/',
        ]);
        
        $kategori = Kategori::create($validatedData);

        if($kategori){
            //redirect dengan pesan sukses
            return redirect(route('kategori.index'))->with(['success' => 'Data Berhasil Ditambahkan!']);
        }else{
            //redirect dengan pesan error
            return redirect(route('kategori.index'))->with(['error' => 'Data Gagal Ditambahkan!']);
        }
    }

    public function edit($id)
    {
        $kategori = Kategori::where('id', $id)->first();
        // dd($kategori);

        return view('admin.editkategori', ['kategori' => $kategori]);
    }

    
    
    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'nm_kategori' => 'required|min:3|max:255|regex:/^[a-zA-Z ]*$/',
        ]);
        // dd($validatedData);
    
        $kategori = Kategori::findOrFail($id);    
        $kategori->update($validatedData);
    
        if($kategori){
            //redirect dengan pesan sukses
            return redirect(route('kategori.index'))->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect(route('kategori.index'))->with(['error' => 'Data Gagal Diupdate!']);
        }
        
    }
    
    public function delete($id){
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();
    
        if($kategori){
            //redirect dengan pesan sukses
            return redirect(route('kategori.index'))->with(['success' => 'Data Berhasil Dihapus!']);
        }else{
            //redirect dengan pesan error
            return redirect(route('kategori.index'))->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
}
