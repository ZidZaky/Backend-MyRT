<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnggotaKeluarga extends Model
{
    use HasFactory;

    // Table name (explicitly set since it doesn't follow Laravel's pluralization)
    protected $table = 'anggota_keluargas';

    // The primary key is 'NIK' (National Identity Number)
    protected $primaryKey = 'NIK';

    // The fields that can be mass-assigned
    protected $fillable = [
        'NIK',
        'NamaLengkap',
        'JenisKelamin',
        'TempatLahir',
        'Agama',
        'Pendidikan',
        'Pekerjaan',
        'StatusPernikahan',
        'StatusDalamKeluarga',
        'Kewarganegaraan',
        'NamaAyah',
        'NamaIbu',
        'NoKK',  // Foreign key referencing the family card number (NoKK)
    ];

    // Define the relationship with the DataKartuKeluarga model (many-to-one)
    public function kartuKeluarga()
    {
        return $this->belongsTo(DataKartuKeluarga::class, 'NoKK', 'NoKK');  // Foreign key is 'NoKK' in AnggotaKeluarga table
    }
}
