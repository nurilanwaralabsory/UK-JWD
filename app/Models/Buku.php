<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Penerbit;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = "buku";

    public $timestamps = false;

    protected $fillable = [
        'kode',
        'kategori',
        'nama_buku',
        'harga',
        'stok',
        'penerbit',
    ];

    public function nerbit()
    {
        return $this->belongsTo(Penerbit::class, 'penerbit', 'id');
    }
}
