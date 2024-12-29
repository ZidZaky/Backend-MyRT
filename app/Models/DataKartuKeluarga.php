<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataKartuKeluarga extends Model
{
    use HasFactory;

    // Table name (explicitly set since it doesn't follow Laravel's pluralization)
    protected $table = 'data_kartu_keluargas';

    // The primary key is 'NoKK' which is a bigInteger
    protected $primaryKey = 'NoKK';

    // The fields that can be mass-assigned
    protected $fillable = [
        'NoKK',
        'alamat',
    ];

    // Define the relationship with the 'AnggotaKeluarga' model (one-to-many)
    public function anggota()
    {
        return $this->hasMany(AnggotaKeluarga::class, 'NoKK', 'NoKK');  // Foreign key is 'NoKK' in AnggotaKeluarga table
    }
}
