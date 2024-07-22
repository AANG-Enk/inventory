<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Barang;

class BarangKeluar extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'barang_id',
        'stock',
        'tanggal',
        'penerima',
        'deleted_at'
    ];

    public function keluars()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }
}
