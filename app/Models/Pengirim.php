<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengirim extends Model
{
    protected $table = 'pengirims';
    protected $primaryKey = 'id_pengirim'; // Sesuai dengan primary key baru
    public $incrementing = true;
    protected $keyType = 'int';
    protected $fillable = ['nama_pengirim', 'alamat_pengirim', 'telepon_pengirim'];

    use HasFactory;
}
