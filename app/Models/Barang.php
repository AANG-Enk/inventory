<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BarangMasuk;
use App\Models\BarangKeluar;
use App\Models\Satuan;

class Barang extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'nama',
        'stock',
        'satuan_id',
        'merk',
        'tipe',
        'kondisi',
        'keterangan',
        'deleted_at'
    ];

    public function keluars()
    {
        return $this->hasMany(BarangKeluar::class, 'barang_id');
    }

    public function masuks()
    {
        return $this->hasMany(BarangMasuk::class, 'barang_id');
    }

    public function satuan()
    {
        return $this->belongsTo(Satuan::class, 'satuan_id');
    }
}
