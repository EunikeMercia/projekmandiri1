<?php

namespace App\Http\Controllers;

use App\Models\Rak;
use Illuminate\Http\Request;

class RakController extends Controller
{
    public function index(Request $request){
        $rak = Rak::all();
        return view('admin.masterrak', compact('rak'));
    }
    public function create(Request $request){
        return view('admin.tambahrak');
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'nm_rak' => 'required|min:3|max:255',
        ]);
        
        $rak = Rak::create($validatedData);

        if($rak){
            //redirect dengan pesan sukses
            return redirect(route('rak.index'))->with(['success' => 'Data Berhasil Ditambahkan!']);
        }else{
            //redirect dengan pesan error
            return redirect(route('rak.index'))->with(['error' => 'Data Gagal Ditambahkan!']);
        }
    }

    public function edit($id)
    {
        $rak = Rak::where('id', $id)->first();
        // dd($rak);

        return view('admin.editrak', ['rak' => $rak]);
    }

    
    
    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'nm_rak' => 'required|min:3|max:255',
        ]);
        // dd($validatedData);
    
        $rak = Rak::findOrFail($id);    
        $rak->update($validatedData);
    
        if($rak){
            //redirect dengan pesan sukses
            return redirect(route('rak.index'))->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect(route('rak.index'))->with(['error' => 'Data Gagal Diupdate!']);
        }
        
    }
    
    public function delete($id){
        $rak = Rak::findOrFail($id);
        $rak->delete();
    
        if($rak){
            //redirect dengan pesan sukses
            return redirect(route('rak.index'))->with(['success' => 'Data Berhasil Dihapus!']);
        }else{
            //redirect dengan pesan error
            return redirect(route('rak.index'))->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
}
