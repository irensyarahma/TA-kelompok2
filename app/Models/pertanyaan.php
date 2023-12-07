<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pertanyaan extends Model
{
    use HasFactory;
    protected $table = 'pertanyaans';
    protected $fillable = [
        'id_uaser',
        'id_kategori',
        'pertanyaan',
    ];

    public function kategori()
    {
        return $this->hasOne(kategori::class, 'id', 'id_kategori');
    }
}
