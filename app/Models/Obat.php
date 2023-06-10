<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;

    protected $table = 'obat';
    protected $fillable = [
        'nama',
        'jenis',
        'deskripsi',
        'satuan',
        'harga',
        'status',
        'stok',
    ];

    protected $hidden;

    public function order()
    {
        return $this->hasOne(Order::class, 'obat_id');
    }
}
