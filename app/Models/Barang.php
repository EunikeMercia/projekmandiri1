<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function satuan()
    {
        return $this->belongsTo(SatuanBarang::class, 'satuan_barang_id', 'id');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id');
    }

    public function rak()
    {
        return $this->belongsTo(Rak::class, 'rak_id', 'id');
    }
}
