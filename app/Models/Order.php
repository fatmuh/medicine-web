<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'pesanan';
    protected $fillable = [
        'obat_id',
        'user_id',
        'jumlah',
        'total_harga',
        'waktu_ambil',
        'type_of_payment',
        'proof_of_payment',
        'status',
    ];

    protected $hidden;

    public function obat()
    {
        return $this->belongsTo(Obat::class, 'obat_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
