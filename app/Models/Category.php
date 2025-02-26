<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'id_penerima'; // Sesuai dengan primary key baru
    public $incrementing = true;
    protected $keyType = 'int';
    protected $fillable = ['nama_penerima', 'alamat_penerima', 'telepon_penerima'];
    
    use HasFactory;
}
