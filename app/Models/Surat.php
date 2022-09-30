<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;

    protected $guarded=['id'];

    public function kategori_surat(){
        return $this->belongsTo(KategoriSurat::class);
    }
}
